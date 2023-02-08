<?php

namespace App\Http\Controllers;

use App\Models\AppliciantExamUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Pusher\Pusher;

class AppliciantExamUserController extends Controller
{
    // Ajax
    public function fetchExamMarks(){
        $data = DB::table('appliciant_exam_users')
            ->leftjoin('appliciant_exams', 'appliciant_exam_users.exam_id', '=', 'appliciant_exams.exam_id')
            ->leftjoin('appliciant_tests', 'appliciant_exams.test_id', '=', 'appliciant_tests.test_id')
            ->select('appliciant_exam_users.*','appliciant_exams.*', 'appliciant_tests.test_name')
            ->orderBy("appliciant_exam_users.appliciant_id")
            ->get();



        return response()->json([
            'data'=>$data,
        ]);

    }


    public function deleteExamMarks($id)
    {
        //$deleted = DB::table('appliciant_tests')->where('test_id', '=', $id)->delete();
        $deleted = AppliciantExamUser::where('mark_id', '=', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Test Deleted Successfully.'
        ]);

    }

    public function editExamMarks($id){
        $check_id = DB::table('appliciant_exam_users')
            ->select('*')
            ->where('mark_id', $id)
            ->get();

        if($check_id){
            $details = DB::table('appliciant_exam_users')
                ->select('*')
                ->where('mark_id', $id)
                ->get();

            return response()->json([
                'status'=>200,
                'details'=>$details,
                'message'=>'Sucess',
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Mark Not Found',
            ]);
        }
    }

    public function updateExamMarks(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'exam_id'=>'required|max:191',
            'appliciant_id'=>'required',
            'mark'=>'required'

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                //'errors'=>$validator->messages(),
                'message'=>"require field missing",
            ]);
        }
        else{
            $find = DB::table('appliciant_exam_users')
                ->select('mark_id')
                ->where('mark_id', $id)
                ->get();

            if ($find) {

                $mark_limit = DB::table('appliciant_exams')
                    ->leftjoin('appliciant_exam_users', 'appliciant_exam_users.exam_id', '=', 'appliciant_exams.exam_id')
                    ->select('appliciant_exams.mark_limit')
                    ->where('appliciant_exam_users.exam_id', $request->exam_id)
                    ->get();

                $mark_limit = $mark_limit[0]->mark_limit;

                if ($request->mark >= $mark_limit) {

                    $appliciant_status = "PASS";
                    $status=200;
                    $message = "Appliciant Test Update Sucessfully";

                } elseif ($request->mark < $mark_limit) {

                    $appliciant_status = "FAILED";
                    $status=200;
                    $message = "Appliciant Test Update Sucessfully";

                } elseif ($mark_limit==null) {

                    $appliciant_status = "NOT DEFINED";
                    $status=200;
                    $message = "Appliciant Test Update Sucessfully";

                } else {
                    $status=400;
                    $message="Invalid Mark!";
                }

                $update = AppliciantExamUser::where('mark_id', '=', $id)->update(
                    array(
                        'appliciant_id' => $request->input('appliciant_id'),
                        'exam_id' => $request->input('exam_id'),
                        'marks' => $request->input('mark'),
                        'status' => $appliciant_status,
                        'edit_status' => 1,
                        'updated_by' => session('user_id')
                    )
                );

                return response()->json([
                    'status'=>$status,
                    'message'=>$message

                ]);
            }
        }
    }

    public function AddExamMarks(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'exam_id'=>'required',
            'appliciant_id'=>'required|max:191',
            'marks'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'message'=>"Validated error! Required fields missed!"
                //'errors'=>$validator->messages(),
            ]);
        }
        else{
            $s_notifi_date = Carbon::now()->format('Y-m-d');
            $s_notifi_time = Carbon::now()->format('H:i:m');

            $mark_limit = DB::table('appliciant_exams')
                ->select('appliciant_exams.mark_limit')
                ->where('exam_id', $request->exam_id)
                ->get();

            $mark_limit = $mark_limit[0]->mark_limit;

            if($request->marks >= $mark_limit){

                $status=200;
                $appliciant_status = "PASS";
                $message="Added sucessfull!";

            }
            elseif($request->marks < $mark_limit){

                $status=200;
                $appliciant_status = "FAILED";
                $message="Added sucessfull!";

            }
            elseif($mark_limit==NULL){

                $status=200;
                $appliciant_status = "NOT DEFINED";
                $message="Added sucessfull!";

            }
            else{
                $status=400;
                $message="Invalid Mark!";
            }

            $appliciant_marks = new AppliciantExamUser;
            $appliciant_marks->season_id=session('current_season');
            $appliciant_marks->exam_id=$request->exam_id;
            $appliciant_marks->appliciant_id=$request->appliciant_id;
            $appliciant_marks->marks=$request->marks;
            $appliciant_marks->status=$appliciant_status;
            $appliciant_marks->created_by=session('user_id');
            $appliciant_marks->save();

            return response()->json([
                'status'=>$status,
                'message'=>$message

            ]);

        }

    }

    public function AutoFillExamMarks (Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'appliciant_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'message'=>"Validated error! Required fields missed!"
                //'errors'=>$validator->messages(),
            ]);
        }
        else{

            $exam_id = DB::table('appliciants')
                ->leftjoin ('designations' , 'appliciants.designation_id', '=', 'designations.designation_id')
                ->leftjoin ('appliciant_tests' , 'appliciant_tests.designation_id', '=', 'designations.designation_id' )
                ->leftjoin ('appliciant_exams' , 'appliciant_exams.test_id', '=', 'appliciant_tests.test_id')
                ->select('appliciant_exams.exam_id','appliciant_tests.test_name','appliciant_tests.test_part')
                ->where('appliciants.appliciant_id', $request->appliciant_id)
                ->get();

            return response()->json([
                'status'=>200,
                'data'=>$exam_id

            ]);

        }
    }

    public function passFailCount(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'exam_id'=>'required'
        ]);

        if($validator->fails() || $request->exam_id=='all'){
            $exams = DB::table('appliciant_exams')
                ->leftjoin('appliciant_tests', 'appliciant_exams.test_id', '=', 'appliciant_tests.test_id')
                ->select('appliciant_exams.exam_id', 'appliciant_tests.test_name', 'appliciant_tests.test_part')
                ->where('season_id', session('current_season'))
                ->get();

            $exam_all_appliciants_q = DB::table('appliciant_exam_users')
                ->select('mark_id')
                ->where('season_id', session('current_season'))
                ->get();
            $exam_all_appliciant_count= $exam_all_appliciants_q->count();

            $exam_pass_appliciants_q = DB::table('appliciant_exam_users')
                ->select('mark_id')
                ->where('season_id', session('current_season'))
                ->where('status', "PASS")
                ->get();
            $exam_pass_appliciant_count= $exam_pass_appliciants_q->count();

            $exam_failed_appliciants_q = DB::table('appliciant_exam_users')
                ->select('mark_id')
                ->where('season_id', session('current_season'))
                ->where('status', "FAILED")
                ->get();
            $exam_failed_appliciant_count= $exam_failed_appliciants_q->count();

            $exam_pending_appliciants_q = DB::table('appliciant_exam_users')
                ->select('mark_id')
                ->where('season_id', session('current_season'))
                ->where('status', "PENDING")
                ->get();
            $exam_pending_appliciant_count= $exam_pending_appliciants_q->count();

            return response()->json([
                'all'=>$exam_all_appliciant_count,
                'pass'=>$exam_pass_appliciant_count,
                'failed'=>$exam_failed_appliciant_count,
                'pending'=>$exam_pending_appliciant_count,
                'exams'=>$exams
            ]);
        }
        else{
            $exams = DB::table('appliciant_exams')
                ->leftjoin('appliciant_tests', 'appliciant_exams.test_id', '=', 'appliciant_tests.test_id')
                ->select('appliciant_exams.exam_id', 'appliciant_tests.test_name', 'appliciant_tests.test_part')
                ->where('season_id', session('current_season'))
                ->get();

            $exam_all_appliciants_q = DB::table('appliciant_exam_users')
                ->select('mark_id')
                ->where('season_id', session('current_season'))
                ->where('exam_id', $request->exam_id)
                ->get();
            $exam_all_appliciant_count= $exam_all_appliciants_q->count();

            $exam_pass_appliciants_q = DB::table('appliciant_exam_users')
                ->select('mark_id')
                ->where('season_id', session('current_season'))
                ->where('exam_id', $request->exam_id)
                ->where('status', "PASS")
                ->get();
            $exam_pass_appliciant_count= $exam_pass_appliciants_q->count();

            $exam_failed_appliciants_q = DB::table('appliciant_exam_users')
                ->select('mark_id')
                ->where('season_id', session('current_season'))
                ->where('exam_id', $request->exam_id)
                ->where('status', "FAILED")
                ->get();
            $exam_failed_appliciant_count= $exam_failed_appliciants_q->count();

            $exam_pending_appliciants_q = DB::table('appliciant_exam_users')
                ->select('mark_id')
                ->where('season_id', session('current_season'))
                ->where('exam_id', $request->exam_id)
                ->where('status', "PENDING")
                ->get();
            $exam_pending_appliciant_count= $exam_pending_appliciants_q->count();

            return response()->json([
                'all'=>$exam_all_appliciant_count,
                'pass'=>$exam_pass_appliciant_count,
                'failed'=>$exam_failed_appliciant_count,
                'pending'=>$exam_pending_appliciant_count,
                'exams'=>$exams
            ]);
        }
    }

    public function applicationStatus(){
        $appliciant_approved = DB::table('appliciants')
            ->select('appliciant_id')
            ->where('season_id', session('current_season'))
            ->where('application_status', "approved")
            ->get();
        $appliciant_approved_count = $appliciant_approved->count();

        $appliciant_rejected = DB::table('appliciants')
            ->select('appliciant_id')
            ->where('season_id', session('current_season'))
            ->where('application_status', "rejected")
            ->get();
        $appliciant_rejected_count= $appliciant_rejected->count();

        $appliciant_pending = DB::table('appliciants')
            ->select('appliciant_id')
            ->where('season_id', session('current_season'))
            ->where('application_status', "pending")
            ->get();
        $appliciant_pending_count = $appliciant_pending->count();

        $array1=array();
        $array1[0]=$appliciant_pending_count;
        $array1[1]=$appliciant_approved_count;
        $array1[2]=$appliciant_rejected_count;

        return response()->json([
            'array'=>$array1,
        ]);
    }



    //start Exam mark filter
    public function fetchExamMarkFilter(Request $request){

        $exams = DB::table('appliciant_exams')
            ->leftjoin ('appliciant_tests' , 'appliciant_exams.test_id', '=', 'appliciant_tests.test_id')
            ->select('appliciant_exams.*','appliciant_tests.test_name','appliciant_tests.test_part')
            ->where('season_id', session('current_season'))
            ->get();


        //validation
        $validator = Validator::make($request->all(), [
            'exam_id'=>'required',
            'required_count'=>'required'
        ]);

        if($validator->fails()){
            $data = DB::table('appliciant_exam_users')
                ->select('*')
                ->orderBy("appliciant_exam_users.marks")
                ->get();

            return response()->json([
                'data'=>$data,
                'exams'=>$exams
            ]);
        }
        else{

            $data = DB::table('appliciant_exam_users')
                ->leftjoin ('appliciant_exams' , 'appliciant_exam_users.exam_id', '=', 'appliciant_exams.exam_id')
                ->select('appliciant_exam_users.appliciant_id','appliciant_exam_users.marks')
                ->where('appliciant_exam_users.exam_id', $request->exam_id)
                ->get();
            $data = $data->sortBy('appliciant_exam_users.marks')->take($request->required_count);

            return response()->json([
                'data'=>$data,
                'exams'=>$exams
            ]);
        }
    }
    //End Exam mark filter

    //Start Define Cutoff
    public function defineCutoff(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'exam_id'=>'required',
            'required_count'=>'required'
        ]);

        if($validator->fails()){

            return response()->json([
                'status'=>400,
                'message'=>"Validation faield"
            ]);
        }
        else{

            $data = DB::table('appliciant_exam_users')
                ->leftjoin ('appliciant_exams' , 'appliciant_exam_users.exam_id', '=', 'appliciant_exams.exam_id')
                ->select('appliciant_exam_users.appliciant_id','appliciant_exam_users.marks')
                ->where('appliciant_exam_users.exam_id', $request->exam_id)
                ->get();
            $count = count($data);
            $data = $data->sortBy('appliciant_exam_users.marks');

            if($count<$request->required_count){
                $message="Out of total Appliciants count!";

                return response()->json([
                    'message'=> $message
                ]);
                exit();
            }
            else{
                $x=($request->required_count)-1;
                $result=$data[$x]->marks;

                return response()->json([
                    'data'=>$data,
                    'result'=>$result
                ]);
            }
        }
    }
    //End define cutoff

    //Start Define Cutoff
    public function defineCount(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'exam_id'=>'required',
            'cutoff'=>'required'
        ]);

        if($validator->fails()){

            return response()->json([
                'status'=>400,
                'message'=>"Validation faield"
            ]);
        }
        else{

            $data = DB::table('appliciant_exam_users')
                ->leftjoin ('appliciant_exams' , 'appliciant_exam_users.exam_id', '=', 'appliciant_exams.exam_id')
                ->select('appliciant_exam_users.marks')
                ->where('appliciant_exam_users.exam_id', $request->exam_id)
                ->where('appliciant_exam_users.marks','>=', $request->cutoff)
                ->get();
            $count = count($data);


            if($count==0){
                $message="No one selected!";

                return response()->json([
                    'message'=> $message,
                    'count'=>$count
                ]);
                exit();
            }
            else{
                return response()->json([
                    'data'=>$data,
                    'count'=>$count
                ]);
            }
        }
    }
    //End define cutoff
    //End ajax
}
