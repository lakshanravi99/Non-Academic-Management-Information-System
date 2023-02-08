<?php

namespace App\Http\Controllers;


use App\Models\AppliciantSelfNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Pusher\Pusher;

class AppliciantSelfNotificationController extends Controller
{
    //Start Appliciant notification-----------------------------------------------------------------------------------------------------
    public function AppFetchSelfActiveNotification(Request $request){
       

        $data1 = DB::table('appliciant_self_notifications')
            ->select('*')
            ->where('user_id', session('temp_user_id'))
            ->where('active', 1)
            ->get();

        // if (sizeof($data1)>0) {
            return response()->json([
                'data1'=>$data1
            ]);
        // }
            
    }

    public function AppFetchSelfDeactiveNotification(){
         $data2 = DB::table('appliciant_self_notifications')
            ->select('*')
            ->where('user_id', session('temp_user_id'))
            ->where('active', 0)
            ->get();

            return response()->json([
                'data2'=>$data2
            ]);
    }

    public function AppMarkReadSelfActiveNotification(Request $request){
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
            $update_status_failed = AppliciantSelfNotification::where('id', '=', $request->input('id'))->update(array(
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

    //Start notifications
    //System Registration
    public function AppsystemRegistrationNotify(){

        $name = "System Registration";
        $description = "Hello (Appliciant name), You have successfully rigistered in Non-acedamic management system of university of Ruhuna.";

        $appSysRegNotify = new AppliciantSelfNotification;
        $appSysRegNotify->user_id=session('temp_user_id');
        $appSysRegNotify->name= $name;
        $appSysRegNotify->description=$description;
        $appSysRegNotify->save();

        

        app('App\Http\Controllers\MailController')->systemRegistration($name, $description);
    }

    //Application Submition
    public function submitApplicationNotify(){
        $name = "Submit the Job Application";
        $description = "Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.";

        $appSysRegNotify = new AppliciantSelfNotification;
        $appSysRegNotify->user_id=session('temp_user_id');
        $appSysRegNotify->name= $name;
        $appSysRegNotify->description=$description;
        $appSysRegNotify->save();

        //start pusher
        $option = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        //define pusher
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $option
        );

        $data = ['from'=>session('temp_user_id')];
        $pusher->trigger('my-channel', 'my-event', $data);

        //end pusher

        app('App\Http\Controllers\MailController')->updateApplication();
    }

    //Application Update
    public function updateApplicationNotify(){
        $name = "Update the Job Application";
        $description = "Hello (Appliciant name), You have successfully Updated the job Application in Non-acedamic management system of university of Ruhuna.";

        $appSysRegNotify = new AppliciantSelfNotification;
        $appSysRegNotify->user_id=session('temp_user_id');
        $appSysRegNotify->name= $name;
        $appSysRegNotify->description=$description;
        $appSysRegNotify->save();
        
    }
    //End Notifications


    //End Appliciant notification--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
}
