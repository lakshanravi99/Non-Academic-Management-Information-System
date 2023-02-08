<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\department;
use App\Models\LeaveCount;
use App\Models\socialmediaprofile;
use App\Models\UserType;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Alluser;
use App\Models\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class UserController extends Controller

{

    public function ManageUser(){
        Session::put('index', '');
        Session::put('manage', 'side-menu--active');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('rave', '');
        Session::put('recruitment', '');
        Session::put('social','');
        Session::put('mobile','');
        Session::put('notice','');
        Session::put('personal','');
        Session::put('leave','');
        Session::put('attedance','');
        Session::put('manageemployee','');
        Session::save();

        return view('backend.user.employee.manage_user');
    }

    public function UserView(){
        //slidebar navigation sessions
        Session::put('index', '');
        Session::put('manage', 'side-menu--active');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('rave', '');
        Session::put('social','');
        Session::put('mobile','');
        Session::put('notice','');
        Session::put('personal','');
        Session::put('leave','');
        Session::save();
        // $allData = User::all();
        $storeData= Alluser::with('employees')->get();
        $employees = employee::orderBy("created_at", "desc")->get();
        $allData = Alluser::orderBy("created_at", "desc")->get();
        $data['allData']= Alluser::all();

        return view('backend.user.view_user', compact('allData','employees'));
    }


    public function UserAdd(){
        Session::put('index', '');
        Session::put('manage', 'side-menu--active');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('rave', '');
        Session::put('recruitment', '');
        Session::put('social','');
        Session::put('mobile','');
        Session::put('notice','');
        Session::put('personal','');
        Session::put('leave','');
        Session::save();
        $storeData['store'] = Alluser::with('employees')->get();
        //$data['allData']= Alluser::all();
        //$data['allUser']= Alluser::all();
        $allEmp= employee::all();
        $usertypesfresh = UserType::orderBy("created_at", "desc")->get();
        $department = department::orderBy("created_at", "desc")->get();



        return view('backend.user.add_user',compact('allEmp','usertypesfresh','department'));
    }



    public function UserStore(Request $request){
        $storeData['store'] = Alluser::with('employees')->get();
            // $validateData = $request->validate([
            //     'emp_id'=> 'required|unique:allusers',
            //     'username'=> 'required',
            // ]);
        $employee = alluser::orderBy("created_at","asc")
            ->where('emp_id','=',$request->emp_id)
            ->get();

        if ($employee->isEmpty()) {
            if ($request->password != $request->cpassword){
                return Redirect::back()->withErrors(['sucess' => 'Failure, Passwords not match']);

            }
            $emplID = $request->emp_id;

            $data = new Alluser();
            $data->emp_id = $emplID;
            $data->fname = $request->username;
            $data->password = $request->password;
            $data->usertype = $request->access;
            $data->status = $request->status;
            $data->place = $request->place;
            $data->save();


            $email = DB::table('employees')
                ->select('email')
                ->where('emp_id', '=', $emplID)
                ->get();
            $eemail = $email[0]->email;

            $scp = new socialmediaprofile();
            $scp->username = $request->username;
            $scp->insta = "";
            $scp->postcount = 0;
            $scp->bio = "";
            $scp->profilepic = "";
            $scp->twitter = "";
            $scp->name = $request->username;
            $scp->emp_id = $emplID;
            $scp->email = $eemail;
            $scp->save();

            $leaveacc = new LeaveCount();
            $leaveacc->emp_id = $emplID;
            $leaveacc->subbatical_leave = 0;
            $leaveacc->medical_leave = 21;
            $leaveacc->casual_leave = 24;
            $leaveacc->short_leave = 24;
            $leaveacc->save();

            return Redirect::route('user.view')->withErrors(['sucess' => 'Successfully :User Created ,']);


        }else{
            return Redirect::back()->withErrors(['sucess' => 'Failure :User Already Exist ,']);

        }



        $notification = array(
                'message' => 'User Added Successfully',
                'alert-type' => 'success'
            );
        return Redirect::back()->withErrors(['sucess' => 'Failure,']);

            //return redirect()-> route('user.view')->with($notification);


}

public function search(Request $request){

    $storeData = Alluser::with('employees')->get();
    $output="";
    $query = $request->get('search');

    $employee= Alluser::orderBy('id','DESC')->where('fname', 'Like', '%' .$query. '%')->orWhere('emp_id', 'Like', '%' .$query. '%')->orWhere('status', 'Like', '%' .$query. '%')->orWhere('place', 'Like', '%' .$query. '%')->orWhere('usertype', 'Like', '%' .$query. '%')->get();

    foreach($employee as $employee) {

        $output.=
        '<tr class="intro-x">
        <td class="w-40">'.'
        <div class="flex">'.'
            <div class="w-10 h-10 image-fit zoom-in">'.'
                <img alt="" class="tooltip rounded-full" src="dist/images/rm.jpg">'.'
            </div>'.'

             </div>'.'
         </td>
            <td>' .$employee->emp_id. '</td>
            <td class="text-center">' .$employee->fname. '</td>
            <td class="text-center">' .$employee->usertype. '</td>
            <td class="text-center">' .$employee->status. '</td>
            <td class="text-center">' .$employee->employees->place. '</td>



            <td class="table-report__action w-56">'.'
            <div class="flex justify-center items-center">'.'
                <a class="flex items-center mr-3" href=""> '.'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> '.' Edit </a>
                '.'<a class="flex items-center text-danger" href=""> '.'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> '.'Delete </a>
                '.' </div>
        '.'</td>

        </tr>';
    }

    return response($output);
}

    public function UserEdit($id){

        $editData = DB::table('allusers')
        ->where('emp_id', '=',$id )
        ->get();
        return view('backend.user.edit_user', compact('editData'));
    }
    public function Deleteuser($id){
        if(session('emp_id')){
            $deleted = DB::table('allusers')
                ->where('emp_id', '=', $id)
                ->delete();
            $deleted = DB::table('socialmediaprofiles')
                ->where('emp_id', '=', $id)
                ->delete();
            $deleted = DB::table('leave_counts')
                ->where('emp_id', '=', $id)
                ->delete();

            return back();
        }else{
            return back();
        }
    }

    // function checkaccountcreate(){
    //     $alluser = Alluser::with('allusers')->get();
    //     $employees = Employee::with('employees')->get();
    //     dd($alluser);
    //     foreach($alluserb  as $all){
    //         foreach($employees as $empl){
    //             if($all->emp_id != $empl->emp_id){
    //                 echo ($all->emp_id);
    //             }
    //         }

    //     }

    function userseditsave(Request $req){
        $affected = DB::table('allusers')
                ->where('emp_id', $req->emp_id)
                ->update(['fname' => $req->username,'password' => $req->password,'usertype' => $req->usertype,'status' => $req->status, ]);
            return Redirect()->route('user.view');

    }


    function deletesysuser($emp_id){
        if (session('emp_id')){
            $deleted = DB::table('allusers')
                ->where('emp_id', '=', $emp_id)
                ->delete();
            $deleted = DB::table('leave_counts')
                ->where('emp_id', '=', $emp_id)
                ->delete();
            $deleted = DB::table('socialmediaprofiles')
                ->where('emp_id', '=', $emp_id)
                ->delete();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Deleted,']);
        }else{
            return back();
        }

    }


    }


