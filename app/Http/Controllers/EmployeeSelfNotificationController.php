<?php

namespace App\Http\Controllers;

use App\Models\EmployeeSelfNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Pusher\Pusher;

class EmployeeSelfNotificationController extends Controller
{
    //Start Appliciant notification-----------------------------------------------------------------------------------------------------
    public function UserFetchSelfActiveNotification(Request $request){
       

        $data1 = DB::table('employee_self_notifications')
            ->select('*')
            ->where('emp_id', session('employee_id'))
            ->where('active', 1)
            ->get();

            return response()->json([
                'user_self_active'=>$data1
            ]);
        }

    public function UserFetchSelfDeactiveNotification(){
        $data2 = DB::table('employee_self_notifications')
            ->select('*')
            ->where('emp_id', session('employee_id'))
            ->where('active', 0)
            ->get();

            return response()->json([
                'user_self_deactive'=>$data2
            ]);
    }

    public function UserMarkReadSelfActiveNotification(Request $request){
        $validator = Validator::make($request->all(), [
            'id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                //'errors'=>$validator->messages(),
                'message'=>"notification id missing",
            ]);
        }
        else{                
            $update_status_failed = EmployeeSelfNotification::where('id', '=', $request->input('id'))->update(array(
                    'active' => 0,
                )
            );

                $status=200;
                $message="success";  
            }

            return response()->json([
                'status'=>$status,
                'message'=>$message,
            ]);
        }
}
