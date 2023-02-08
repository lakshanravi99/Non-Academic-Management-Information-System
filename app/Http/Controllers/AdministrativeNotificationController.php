<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeNotification;
use App\Models\AdministrativeReadUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Pusher\Pusher;

class AdministrativeNotificationController extends Controller
{
    public function dataForAdminNotifications(){
        $designation = DB::table('designations')
            ->select('designation_name')
            ->get();
        
        $faculty = DB::table('faculties')
            ->select('faculty_name')
            ->get();

        $department = DB::table('departments')
            ->select('department_name')
            ->get();

        return view('admin.notification.admin_notification',compact('faculty', 'department', 'designation'));
        // echo $designation;
        // echo $faculty;
        // echo $department;

    }

    public function fetcAdminNotifications(){
        $data = DB::table('administrative_notifications')
            ->select('*')
            ->get();
        return response()->json([
            'data'=>$data,
        ]);
        
    }

    public function storeAdminNotifications(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'message_name'=>'required|max:191',
            'description'=>'required|max:1000',
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
            
            $designation = new AdministrativeNotification;
            $designation->sender_id = session('employee_id');
            $designation->single_user_id = $request->input('emp_id');
            $designation->designation_name = $request->input('designation');
            $designation->faculty_name = $request->input('faculty');
            $designation->department_name = $request->input('department');
            $designation->name = $request->input('message_name');
            $designation->description = $request->input('description');
            $designation->save();

        // //start pusher
        //     $option = array(
        //     'cluster' => 'ap2',
        //     'useTLS' => true
        //     );

        //     //define pusher
        //     $pusher = new Pusher(
        //         env('PUSHER_APP_KEY'),
        //         env('PUSHER_APP_SECRET'),
        //         env('PUSHER_APP_ID'),
        //         $option
        //     );

        //     $data = ['from'=>session('user_id')];
        //     $pusher->trigger('my-channel', 'my-event', $data);

        // //end pusher

            return response()->json([
                'status'=>200,
                'message'=>'Notification Sending Sucessfully',
            ]);

        }
    }

    public function UserFetchAdminActiveNotification(Request $request){

        //emp_id
        //echo session('user_emp_id');
            $single_emp_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('administrative_notifications.single_user_id', session('employee_id'))
                ->where('administrative_read_users.active', NULL)
                ->where('designation_name', 'Not-specified')
                ->where('faculty_name', 'Not-specified')
                ->where('department_name', 'Not-specified')
                ->get();
            //echo $single_emp_admin_notifi;echo "<br>";
            


        //designation only
            $desig_only_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('designation_name', session('employee_designation_name'))
                ->where('faculty_name', "Not-specified")
                ->where('department_name', "Not-specified")
                ->where('administrative_read_users.active', NULL)
                ->get();
            //echo $desig_only_admin_notifi;echo "<br>";

        //faculty only
            $fac_only_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('faculty_name', session('employee_faculty_name'))
                ->where('designation_name', "Not-specified")
                ->where('department_name', "Not-specified")
                ->where('administrative_read_users.active', NULL)
                ->get();
            //echo $fac_only_admin_notifi;echo "<br>";

        //faculty && department only
            $fdept_only_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('department_name', session('employee_department_name'))
                ->where('faculty_name', session('employee_faculty_name'))
                ->where('designation_name', "Not-specified")
                ->where('administrative_read_users.active', NULL)
                ->get();
            //echo $fdept_only_admin_notifi;echo "<br>";
        
        //designation && faculty only
            $fdes_only_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('department_name', "Not-specified")
                ->where('faculty_name', session('employee_faculty_name'))
                ->where('designation_name', session('employee_designation_name'))
                ->where('administrative_read_users.active', NULL)
                ->get();
            //echo $fdes_only_admin_notifi;echo "<br>";
        
        //designation && faculty && department both  
            $both_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('department_name', session('employee_department_name'))
                ->where('faculty_name', session('employee_faculty_name'))
                ->where('designation_name', session('employee_designation_name'))
                ->where('administrative_read_users.active', NULL)
                ->get();
            //echo $both_admin_notifi;echo "<br>";

            //define active_admin_notification array
            $aan=array();

            $count=0;
            //emp_id
            if (count($single_emp_admin_notifi) > 0) {
                $aan[$count]=$single_emp_admin_notifi;
                $count++;
                //echo "1";echo "<br>";
            }
            //designation only
            if(count($desig_only_admin_notifi)> 0){
                $aan[$count]=$desig_only_admin_notifi;
                $count++;
                //echo "2";echo "<br>";
            }
            //faculty only
            if(count($fac_only_admin_notifi)> 0){
                $aan[$count]=$fac_only_admin_notifi;
                $count++;
                //echo "3";echo "<br>";
            }
            
            //faculty && department only
            if(count($fdept_only_admin_notifi)> 0){
                $aan[$count]=$fdept_only_admin_notifi;
                $count++;
                //echo "5";echo "<br>";
            }
            //designation && faculty ony
            if(count($fdes_only_admin_notifi)> 0){
                $aan[$count]=$fdes_only_admin_notifi;
                $count++;
                //echo "6";echo "<br>";
            }
            //designation && faculty && department both  
            if(count($both_admin_notifi)> 0){
                $aan[$count]=$both_admin_notifi;
                $count++;
                //echo "7";echo "<br>";
            }
            
            return response()->json([
                'admin_active'=>$aan,
            ]);
            //return implode(" ",$aan);
        
    }

    public function UserMarkReadAdminActiveNotification(Request $request){
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
            
            $designation = new AdministrativeReadUser;
            $designation->notification_id = $request->input('id');
            $designation->emp_id = session('employee_id');
            $designation->active = 0;
            $designation->save();

            $status=200;
            $message="success";  
        }
        return response()->json([
            'status'=>$status,
            'message'=>$message,
        ]);
    }


    public function UserFetchAdminDeactiveNotification(){
        //emp_id
        //echo session('user_emp_id');
            $single_emp_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('administrative_notifications.single_user_id', session('employee_id'))
                ->where('administrative_read_users.active', 0)
                ->get();
                //echo $single_emp_admin_notifi;echo "<br>";
    


        //designation only
            $desig_only_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('designation_name', session('employee_designation_name'))
                ->where('faculty_name', "Not-specified")
                ->where('department_name', "Not-specified")
                ->where('administrative_read_users.active', 0)
                ->get();
            //echo $desig_only_admin_notifi;echo "<br>";

        //faculty only
            $fac_only_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('faculty_name', session('employee_faculty_name'))
                ->where('designation_name', "Not-specified")
                ->where('department_name', "Not-specified")
                ->where('administrative_read_users.active', 0)
                ->get();
            //echo $fac_only_admin_notifi;echo "<br>";

        //faculty && department only
            $fdept_only_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('department_name', session('employee_department_name'))
                ->where('faculty_name', session('employee_faculty_name'))
                ->where('designation_name', "Not-specified")
                ->where('administrative_read_users.active', 0)
                ->get();
            //echo $fdept_only_admin_notifi;echo "<br>";

        //designation && faculty only
            $fdes_only_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('department_name', "Not-specified")
                ->where('faculty_name', session('employee_faculty_name'))
                ->where('designation_name', session('employee_designation_name'))
                ->where('administrative_read_users.active', 0)
                ->get();
            //echo $fdes_only_admin_notifi;echo "<br>";

        //designation && faculty && department both  
            $both_admin_notifi = DB::table('administrative_notifications')
                ->leftJoin('administrative_read_users','administrative_read_users.notification_id', '=', 'administrative_notifications.id')
                ->select('administrative_notifications.*')
                ->where('department_name', session('employee_department_name'))
                ->where('faculty_name', session('employee_faculty_name'))
                ->where('designation_name', session('employee_designation_name'))
                ->where('administrative_read_users.active', 0)
                ->get();
            //echo $both_admin_notifi;echo "<br>";

        //define deactive_admin_notification array
        $adn=array();

        $count=0;
        //emp_id
        if (count($single_emp_admin_notifi) > 0) {
            $adn[$count]=$single_emp_admin_notifi;
            $count++;
            //echo "1";echo "<br>";
        }
        //designation only
        if(count($desig_only_admin_notifi)> 0){
            $adn[$count]=$desig_only_admin_notifi;
            $count++;
            //echo "2";echo "<br>";
        }
        //faculty only
        if(count($fac_only_admin_notifi)> 0){
            $adn[$count]=$fac_only_admin_notifi;
            $count++;
            //echo "3";echo "<br>";
        }
        
        //faculty && department only
        if(count($fdept_only_admin_notifi)> 0){
            $adn[$count]=$fdept_only_admin_notifi;
            $count++;
            //echo "5";echo "<br>";
        }
        //designation && faculty ony
        if(count($fdes_only_admin_notifi)> 0){
            $adn[$count]=$fdes_only_admin_notifi;
            $count++;
            //echo "6";echo "<br>";
        }
        //designation && faculty && department both  
        if(count($both_admin_notifi)> 0){
            $adn[$count]=$both_admin_notifi;
            $count++;
            //echo "7";echo "<br>";
        }
        
        return response()->json([
            'admin_deactive'=>$adn
        ]);
        
    }
}
