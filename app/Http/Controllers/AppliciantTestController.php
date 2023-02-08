<?php

namespace App\Http\Controllers;

use App\Models\AppliciantTest;
use App\Models\AppliciantExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Pusher\Pusher;

class AppliciantTestController extends Controller
{
    // Ajax
    public function fetcAppliciantTest(){
        $data = DB::table('appliciant_tests')
            ->leftjoin('designations', 'appliciant_tests.designation_id', '=', 'designations.designation_id')
            ->select('appliciant_tests.*','designations.designation_name')
            ->orderBy("appliciant_tests.test_id")
            ->get();

        return response()->json([
            'data'=>$data,
        ]);

    }

    public function deleteAppliciantTest($id)
    {
        //$deleted = DB::table('appliciant_tests')->where('test_id', '=', $id)->delete();
        $deleted = AppliciantTest::where('test_id', '=', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Test Delete Successful!'
        ]);

    }

    public function editAppliciantTest($id){
        $edit_details = DB::table('appliciant_tests')
            ->select('appliciant_tests.*')
            ->where('appliciant_tests.test_id', $id)
            ->get();

        $designation = DB::table('appliciant_tests')
            ->join('designations', 'designations.designation_id', '=', 'appliciant_tests.designation_id')
            ->select('designations.designation_name')
            ->where('test_id', $id)
            ->get();

        if($edit_details && $designation){
            return response()->json([
                'status'=>200,
                'edit_details'=>$edit_details,
                'designation'=>$designation,
                'message'=>'Test Edit Successful!',
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Test Not Found',
            ]);
        }
    }

    public function updateAppliciantTest(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'test_name'=>'required',
            'test_part'=>'required',
            'test_type'=>'required'

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                //'errors'=>$validator->messages(),
                'message'=>"Required fields are missing!",
            ]);
        }
        else{

            $find = DB::table('appliciant_tests')
                ->select('*')
                ->where('test_id', $id)
                ->get();

            if($find){
                //is not change designation id(cause is select box default value. it is not retrn a value when not change)
                if(is_null($request->input('designation_id'))) {
                    $update_status_failed1 = AppliciantTest::where('test_id', '=', $id)->update(
                        array(
                            'test_name' => $request->input('test_name'),
                            'test_part' => $request->input('test_part'),
                            'test_type' => $request->input('test_type'),
                            //'edit_status' => 1,
                            'updated_by' => session('user_id')
                        )
                    );
                }
                else{
                    $update_status_failed = AppliciantTest::where('test_id', '=', $id)->update(array(
                            'designation_id' => $request->input('designation_id'),
                            'test_name' => $request->input('test_name'),
                            'test_part' => $request->input('test_part'),
                            'test_type' => $request->input('test_type'),
                            'edit_status' => 1,
                            'updated_by' => session('user_id')
                        )
                    );
                }
                //$User_Update = User::where("id", '2')->update(["member_type" => $plan]);

                return response()->json([
                    'status'=>200,
                    'message'=>"Test Update Successful!",
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Test Not Found!',
                ]);
            }


        }
    }

    public function AddAppliciantTest(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'designation_id'=>'required',
            'test_name'=>'required|max:191',
            'test_part'=>'required|max:191',
            'test_type'=>'required'

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'message'=>"Required fields are missing!"
                //'errors'=>$validator->messages(),
            ]);
        }
        else{

            $appliciant_test = new AppliciantTest;
            $appliciant_test->designation_id=$request->designation_id;
            $appliciant_test->test_name=$request->test_name;
            $appliciant_test->test_part=$request->test_part;
            $appliciant_test->test_type=$request->test_type;
            $appliciant_test->created_by=session('user_id');
            $appliciant_test->save();

            return response()->json([
                'status'=>200,
                'message'=>'Test Adding Successful!',
            ]);

        }
    }
    //End ajax
}
