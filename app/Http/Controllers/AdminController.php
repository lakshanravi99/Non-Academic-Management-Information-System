<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Administrative_Notification;
use Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function Logout(){

        Auth::logout();
        return Redirect()->route('login');
    }

    //Start recruitment
    public function returnDashbord(Request $req){
        //slidebar navigation sessions
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('rave', '');
        Session::put('notice', '');
        Session::put('social','');
        Session::put('mobile','');
        Session::put('personal','');
        Session::put('leave','');
        Session::put('attedance', '');
        Session::put('recruitment','side-menu--active');
        $designations = DB::table('designations')
            ->select('*')
            ->get();
        $notice = DB::table('notices')
            ->get();
        //session_email login
        $user_id=4;
        $req->session()->put('user_id',$user_id);

        return view('admin.recruitment.index',compact('designations','notice'));
    }

    public function appliciant(Request $req){
        $appliciants = DB::table('appliciants')
            ->select('*')
            ->get();
        return view('admin.recruitment.appliciant',compact('appliciants'));
    }

    public function appliciantExam(Request $req){
        $designations = DB::table('designations')
            ->select('designation_id','designation_name')
            ->get();
        //

        $appliciant_tests = DB::table('appliciant_tests')
            ->select('test_id','test_name','test_part','test_type')
            ->get();
        //

        $data = DB::table('appliciant_exams')
            ->join('appliciant_tests', 'appliciant_exams.test_id', '=', 'appliciant_tests.test_id')
            ->join('designations', 'designations.designation_id', '=', 'appliciant_tests.designation_id')
            ->select('appliciant_exams.*', 'appliciant_tests.*', 'designations.designation_name')
            ->get();
        //dd($data);

        $marks = DB::table('appliciant_exam_users')
            ->select('*')
            ->get();
        return view('admin.recruitment.exam',compact('designations','data', 'marks','appliciant_tests'));
    }

    public function ExamAdjustment(){
        return view('admin.recruitment.exam_adjustment');
    }

    public function test(Request $req){
        return "hello test";

        $req->post('desig_name');
    }

    public function deleteNotification($id)
    {
        $deleted = DB::table('administrative_notifications')->where('id', '=', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Student Deleted Successfully.'
        ]);

    }

    public function editNotification($id){
        $edit_details = DB::table('administrative_notifications')
            ->select('*')
            ->where('id', $id)
            ->get();
        if($edit_details){
            return response()->json([
                'status'=>200,
                'edit_details'=>$edit_details,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Student Not Found',
            ]);
        }
    }

    public function updateNotification(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'message_name'=>'required|max:191',
            'description'=>'required|max:1000'
        ]);

        // if($validator->fails()){
        //     return response()->json([
        //         'status'=>400,
        //         //'errors'=>$validator->messages(),
        //     ]);
        // }
        //else{

        $find = DB::table('administrative_notifications')
            ->select('*')
            ->where('id', $id)
            ->get();

        if($find){
            $update_status_failed = DB::table('administrative_notifications')
                ->where('id', '=', $id)
                ->update([
                    // 'sender_id' => session('user_id'),
                    // 'single_user_id' => $request->input('emp_id'),
                    // 'designation_name' => $request->input('designation'),
                    // 'faculty_name' => $request->input('faculty'),
                    // 'department_name' => $request->input('department'),
                    // 'name' => $request->input('message_name'),
                    'description' => $request->input('description')
                    // 'single_user_id' => $request->input('edit_user_id'),
                    //edit status=true(add new field "edit status" to table)
                ]);

            return response()->json([
                'status'=>200,
                'message'=>$id,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Student Not Found',
            ]);
        }


        // }
    }

    public function viewNotification($id){
        $description = DB::table('administrative_notifications')
            ->select('description')
            ->where('id', $id)
            ->get();
        if($description){
            return response()->json([
                'status'=>200,
                'description'=>$description,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Student Not Found',
            ]);
        }
    }
//End recruitment
}
