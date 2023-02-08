<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\RecruitmentVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Pusher\Pusher;

class DesignationController extends Controller
{
    public function fetcDesignation(){

        $data = DB::table('designations')
            ->select('*')
            ->get();

        $designations = DB::table('designations')
            ->select('designation_id')
            ->get();

        $designation_name = DB::table('designations')
            ->select('designation_name')
            ->get();

        $all_app = DB::table('appliciants')
            ->select('appliciant_id')
            ->where('season_id', session('current_season'))
            ->get();
        $count_all = $all_app->count();

        $dc_array=array();

        for($index=0; $index < count($designations); $index++){

            $x = DB::table('appliciants')
                ->select('designation_id')
                ->where('season_id', session('current_season'))
                ->where('designation_id', $designations[$index]->designation_id)
                ->get();
            $count = $x->count();
            $dn = $designation_name[$index]->designation_name;

            $employee = DB::table('employees')
                ->select('emp_id')
                ->where('designation_id', $designations[$index]->designation_id)
                ->get();
            $emp_count = $employee->count();

            $rejected_app = DB::table('appliciants')
                ->select('appliciant_id')
                ->where('season_id', session('current_season'))
                ->where('application_status', 'rejected')
                ->where('designation_id', $designations[$index]->designation_id)
                ->get();
            $rejected = $rejected_app->count();

            $vacancies = DB::table('recruitment_vacancies')
                ->leftjoin('designations', 'recruitment_vacancies.designation_id', '=', 'designations.designation_id')
                ->leftjoin('appliciants', 'appliciants.appliciant_id', '=', 'designations.designation_id')
                ->select('recruitment_vacancies.vacancies')
                ->where('recruitment_vacancies.season_id', session('current_season'))
                ->where('designations.designation_id', $designations[$index]->designation_id)
                ->get();
            $vacan = $vacancies[0]->vacancies;

            $count_array['designation_name']=$dn;
            $count_array['designation_count']=$count;
            $count_array['employee_count']=$emp_count;
            $count_array['rejected_application']=$rejected;
            $count_array['vacancies']=$vacan;

            $dc_array[$index]=$count_array;
        }


        return response()->json([
            'data'=>$data,
            'dc_array'=>$dc_array,
            'count_all'=>$count_all,
            'season'=>session('current_season')
        ]);

    }

    public function deleteDesignation($id)
    {
        $deleted = DB::table('designations')->where('designation_id', '=', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Designation Deleted Successfully.'
        ]);

    }

    public function editDesignation($id){
        $edit_details = DB::table('designations')
            ->select('*')
            ->where('designation_id', $id)
            ->get();
        if($edit_details){
            return response()->json([
                'status'=>200,
                'edit_details'=>$edit_details,
                'message'=>'Sucess',
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Student Not Found',
            ]);
        }
    }

    public function updateDesignation(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'designation_name'=>'required',
            'age'=>'required',
            'salary'=>'required',
            'cadre'=>'required',
            'qualification'=>'required',
            'details'=>'required'

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                //'errors'=>$validator->messages(),
                'message'=>"require field missing",
            ]);
        }
        else{

            $find = DB::table('designations')
                ->select('*')
                ->where('designation_id', $id)
                ->get();

            if($find){
                $update_status_failed = DB::table('designations')
                    ->where('designation_id', '=', $id)
                    ->update([
                        'designation_name' => $request->input('designation_name'),
                        'age' => $request->input('age'),
                        'salary' => $request->input('salary'),
                        'cadre' => $request->input('cadre'),
                        'qualification' => $request->input('qualification'),
                        'details' => $request->input('details')
                        //edit status=true(add new field "edit status" to table)
                    ]);

                return response()->json([
                    'status'=>200,
                    'message'=>"Designation Details Update Success!",
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

    public function AddDesignation(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'designation_name'=>'required|max:191',
            'age'=>'required|max:191',
            'salary'=>'required|max:191',
            'cadre'=>'required',
            'qualification'=>'required|max:1000',
            'details'=>'required|max:1000'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                //'errors'=>$validator->messages(),
            ]);
        }
        else{
            $s_notifi_date = Carbon::now()->format('Y-m-d');
            $s_notifi_time = Carbon::now()->format('H:i:m');

            $designation = new Designation;
            $designation->designation_name=$request->input('designation_name');
            $designation->qualification= $request->input('qualification');
            $designation->details=$request->input('details');
            $designation->age=$request->input('age');
            $designation->salary=$request->input('salary');
            $designation->cadre=$request->input('cadre');
            $designation->created_by=session('user_id');
            $designation->save();

            //get new added row id
            $q = DB::table('designations')->latest('designation_id')->first();
            $desig_id = $q->designation_id;

            $recruitmentVacancy = new RecruitmentVacancy;
            $recruitmentVacancy->season_id =session('current_season');
            $recruitmentVacancy->designation_id= $desig_id;
            $recruitmentVacancy->created_by=session('user_id');
            $recruitmentVacancy->save();

            return response()->json([
                'status'=>200,
                'message'=>'Designation Adding Sucessfully',
            ]);

        }
    }

    public function viewQualification($id){
        $qualification = DB::table('designations')
            ->select('qualification')
            ->where('designation_id', $id)
            ->get();
        if($qualification){
            return response()->json([
                'status'=>200,
                'qualification'=>$qualification,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Student Not Found',
            ]);
        }
    }

    public function viewDetails($id){
        $details = DB::table('designations')
            ->select('details','age','salary')
            ->where('designation_id', $id)
            ->get();
        if($details){
            return response()->json([
                'status'=>200,
                'details'=>$details,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Student Not Found',
            ]);
        }
    }

    public function test(){
        $data = DB::table('appliciant_exams')
            ->join('appliciant_tests', 'appliciant_exams.test_id', '=', 'appliciant_tests.test_id')
            ->join('designations', 'designations.designation_id', '=', 'appliciant_tests.designation_id')
            ->select('appliciant_exams.*', 'appliciant_tests.*', 'designations.*')
            ->get();

        return $data;
    }
}
