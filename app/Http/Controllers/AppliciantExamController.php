<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppliciantExam;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Pusher\Pusher;

class AppliciantExamController extends Controller
{
    // Ajax
    public function fetchExamSchedule(){
        $data = DB::table('appliciant_exams')
            ->join('appliciant_tests', 'appliciant_exams.test_id', '=', 'appliciant_tests.test_id')
            ->join('designations', 'designations.designation_id', '=', 'appliciant_tests.designation_id')
            ->select('appliciant_exams.*', 'appliciant_tests.*', 'designations.*')
            ->get();
        $count_all = $data->count();

        $all_app = DB::table('appliciants')
            ->select('appliciant_id')
            ->where('season_id', session('current_season'))
            ->get();
        $all_appliciant = $all_app->count();

        return response()->json([
            'data'=>$data,
            'exam_count'=>$count_all,
            'all_appliciant'=>$all_appliciant
        ]);

    }

    public function deleteExamSchedule($id)
    {
        //$deleted = DB::table('appliciant_tests')->where('test_id', '=', $id)->delete();
        $deleted = AppliciantExam::where('exam_id', '=', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Test Deleted Successfully.'
        ]);

    }

    public function editExamSchedule($id){
        $check_id = DB::table('appliciant_tests')
            ->select('*')
            ->where('test_id', $id)
            ->get();

        if($check_id){

            $edit_details = DB::table('appliciant_exams')
                ->leftjoin('appliciant_tests', 'appliciant_exams.test_id', '=', 'appliciant_tests.test_id')
                ->leftjoin('designations', 'designations.designation_id', '=', 'appliciant_tests.designation_id')
                ->select('designations.designation_id','designations.designation_name','appliciant_exams.*','appliciant_tests.*')
                ->where('appliciant_exams.exam_id', $id)
                ->where('appliciant_exams.season_id', session('current_season'))
                ->get();

            return response()->json([
                'status'=>200,
                'edit_details'=>$edit_details,
                'message'=>'Sucess'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Test Not Found',
            ]);
        }
    }

    public function updateExamSchedule(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'test_id'=>'required',
            'mark_date'=>'required',
            'mark_time'=>'required',
            'mark_limit'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                //'errors'=>$validator->messages(),
                'message'=>"require field missing",
            ]);
        }
        else{

            $find = DB::table('appliciant_exams')
                ->select('exam_id')
                ->where('exam_id', $id)
                ->get();

            if($find){

                $update_status_failed = AppliciantExam::where('exam_id', '=', $id)->update(array(
                        'season_id' => session('current_season'),
                        'test_id' => $request->input('test_id'),
                        'date' => $request->input('mark_date'),
                        'time' => $request->input('mark_time'),
                        'mark_limit' => $request->input('mark_limit'),
                        'edit_status' => 1,
                        'updated_by' => session('user_id')
                    )
                );

                return response()->json([
                    'status'=>200,
                    'message'=>"Update Sucessfull!",
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Student Not Found',
                ]);
            }


        }
    }

    public function AddExamSchedule(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'test_id'=>'required',
            'test_date'=>'required',
            'test_time'=>'required',
            'mark_limit'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_test = new AppliciantExam;
            $appliciant_test->season_id=session('current_season');
            $appliciant_test->test_id=$request->test_id;
            $appliciant_test->date=$request->test_date;
            $appliciant_test->time=$request->test_time;
            $appliciant_test->mark_limit=$request->mark_limit;
            $appliciant_test->created_by=session('user_id');
            $appliciant_test->save();

            $status=200;
            $message="Appliciant Test Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);
    }

    public function AutoFillExamSchedule(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'test_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'message'=>"Validated error! Required fields missed!"
                //'errors'=>$validator->messages(),
            ]);
        }
        else{

            $details = DB::table('appliciant_tests')
                ->leftjoin ('designations' , 'appliciant_tests.designation_id', '=', 'designations.designation_id')
                ->select('appliciant_tests.test_id','appliciant_tests.test_name','appliciant_tests.test_part', 'appliciant_tests.test_type', 'designations.designation_name')
                ->where('appliciant_tests.test_id', $request->test_id)
                ->get();

            return response()->json([
                'status'=>200,
                'data'=>$details

            ]);

        }
    }
    //End ajax
}
