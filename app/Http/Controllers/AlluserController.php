<?php

namespace App\Http\Controllers;

use App\Models\Appliciant;
use App\Models\Attendence;
use App\Models\personalfile;
use App\Models\RequestList;
use Illuminate\Http\Request;
use  App\Models\Alluser;
use  App\Models\employee;
use  App\Models\Comment;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;


class AlluserController extends Controller
{
    function login(Request $req)
    {
        $emp_id = $req->emp_id;
        $pass = $req->password;
        Session::put('lightmode','light');
        Session::put('lightmodeicon','first-quarter-moon');
        Session::save();

        if (str_contains($emp_id, '@')) {
            $checkusers=DB::table('users')
                ->select('email','password')
                ->where('email', '=', $emp_id)
                ->get();
            //check empty
            if (empty($emp_id) || empty($pass)){
                return back();
            }
            //check from db entered email
            elseif (empty($checkusers[0]->email) || empty($checkusers[0]->password)){
                echo 'Not Availble in db';
                return back();
            }elseif ($checkusers[0]->email != $emp_id || $checkusers[0]->password != $pass){
                echo 'Not match email or Password';
                return back();
            }elseif($checkusers[0]->email == $emp_id && $checkusers[0]->password == $pass){
                //echo 'Sucessfully Login';
                $usertable=DB::table('users')
                    ->where('email', '=', $emp_id)
                    ->get();
                $data1 = DB::table('recruitment_seasons')
                    ->select('end_date')
                    ->where('currently_active', 1)
                    ->get();
                $end_date=$data1[0]->end_date;

                Session::put('current_intake_end_date',$end_date);
                Session::put('temp_user_email',$emp_id);
                Session::put('temp_user_name',$usertable[0]->name);
                Session::put('temp_user_id',$usertable[0]->id);
                Session::save();

                $designations = DB::table('designations')
                    ->select('*')
                    ->get();

                // $data1 = DB::table('recruitment_seasons')
                //     ->select('end_date')
                //     ->where('currently_active', 1)
                //     ->get();
                //     $end_date=$data1[0]->end_date;

                $applied_designations =[];

                if (Appliciant::where('email', session('temp_user_email'))->exists()) {
                    $applied_designations = DB::table('appliciants')
                        ->leftjoin('designations', 'appliciants.designation_id', '=', 'designations.designation_id')
                        ->select('*')
                        ->where('user_id', session('temp_user_id'))
                        ->get();

                    // dd($applied_designations);

                }


                return view('appliciant.index',compact('designations','applied_designations'));


            }



        } else if (empty($emp_id) || empty($pass) || $pass < 8) {
            return back();
        } else {
            //get employee details
            $employee_data = DB::table('allusers')
                ->leftjoin('employees', 'allusers.emp_id', '=', 'employees.emp_id')
                ->leftjoin('faculties', 'employees.faculty_id', '=', 'faculties.faculty_id')
                ->leftjoin('departments', 'departments.faculty_id', '=', 'faculties.faculty_id')
                ->leftjoin('designations', 'employees.designation_id', '=', 'designations.designation_id')
                ->where('allusers.emp_id', $emp_id)
                ->get();

            // checking from database (pull from db)
            $data = DB::table('allusers')
                ->where('emp_id', '=', $emp_id)
                ->get();
            //check empid from dba nd return back
            //check from username
            if ($data->isEmpty()) {
                $datausername = DB::table('allusers')
                    ->where('fname', '=', $emp_id)
                    ->get();
                if ($datausername->isEmpty()) {
                    return back();
                } else {
                    $dt = DB::table('allusers')
                        ->where('fname', '=', $emp_id)
                        ->get();
                    $emp_idd = $dt[0]->emp_id;
                    //pull pro pic
                    $propic = DB::table('employees')
                        ->where('emp_id', '=', $emp_idd)
                        ->get();
                    $dp = $propic[0]->emp_pic;
                    //employee
                    $employeeemail = DB::table('employees')
                        ->select('email')
                        ->where('emp_id', '=', $emp_idd)
                        ->get();
                    $emp_email = $employeeemail[0]->email;
                    //assign
                    $pw = $dt[0]->password;
                    $username = $dt[0]->fname;
                    $usertype = $dt[0]->usertype;
                    $place = $dt[0]->place;
                    Session::put('place', $place);
                    Session::save();



                    //validate password   and  usertype
                    if ($pw == $pass && $usertype == 'admin') {


                        // if(Session::has('emp_id')){
                        //     session()->pull('usernamee');
                        //     session()->pull('emp_id');
                        //     session()->pull('usertype');
                        //     Session::flush();
                        //  }
                        //slidebar navigation sessions
                        Session::put('index', 'side-menu--active');
                        Session::put('manage', '');
                        Session::put('employee', '');
                        Session::put('request', '');
                        Session::put('complain', '');
                        Session::put('rave', '');
                        Session::put('social', '');
                        Session::put('mobile', '');
                        Session::put('notice', '');
                        Session::put('personal', '');
                        Session::put('leave', '');


                        Session::put('usernamee', $username);
                        Session::put('emp_id', $emp_idd);
                        Session::put('usertype', $usertype);
                        Session::put('propic', $dp);
                        Session::put('user_email', $emp_email);
                        Session::put('user_id', $emp_id);
// --------------------------mudeesha session---------------------------------------
                        Session::put('employee_email', $emp_email);
                        Session::put('employee_id', $emp_id);
                        Session::put('employee_name', $username);
                        Session::put('employee_department_name', $employee_data[0]->department_name);
                        Session::put('employee_faculty_name', $employee_data[0]->faculty_name);
                        Session::put('employee_designation_name', $employee_data[0]->designation_name);
                        Session::save();
                        $notice = DB::table('notices')
                            ->get();
                        $allusercount = Alluser::orderBy("created_at", "desc")
                            ->count();
                        $todayDate = Carbon::now()->format('Y-m-d');
                        $todaypresent = Attendence::orderBy("created_at", "desc")
                            ->where('date', '=', $todayDate)
                            ->count();
                        $personalfilescount = personalfile::orderBy("created_at", "desc")
                            ->count();
                        $applicantcount = Appliciant::orderBy("created_at", "desc")
                            ->where('created_at', '=', $todayDate)
                            ->count();
                        return view('admin.index', compact('notice', 'allusercount', 'todaypresent', 'personalfilescount', 'applicantcount'));

                    } elseif ($pw == $pass && $usertype == 'superAdmin') {

                        // if(Session::has('emp_id')){
                        //     session()->pull('usernamee');
                        //     session()->pull('emp_id');
                        //     session()->pull('usertype');
                        //     Session::flush();
                        //  }
                        //slidebar navigation sessions
                        Session::put('index', 'side-menu--active');
                        Session::put('manage', '');
                        Session::put('employee', '');
                        Session::put('request', '');
                        Session::put('complain', '');
                        Session::put('rave', '');
                        Session::put('social', '');
                        Session::put('mobile', '');
                        Session::put('notice', '');
                        Session::put('personal', '');
                        Session::put('leave', '');


                        Session::put('usernamee', $username);
                        Session::put('emp_id', $emp_idd);
                        Session::put('usertype', $usertype);
                        Session::put('propic', $dp);
                        Session::put('user_email', $emp_email);
                        Session::put('user_id', $emp_idd);
                        Session::save();
                        $notice = DB::table('notices')
                            ->get();
                        $allusercount = Alluser::orderBy("created_at", "desc")
                            ->count();
                        $todayDate = Carbon::now()->format('Y-m-d');
                        $todaypresent = Attendence::orderBy("created_at", "desc")
                            ->where('date', '=', $todayDate)
                            ->count();
                        $personalfilescount = personalfile::orderBy("created_at", "desc")
                            ->count();
                        $applicantcount = Appliciant::orderBy("created_at", "desc")
                            ->where('created_at', '=', $todayDate)
                            ->count();
                        return view('admin.index', compact('notice', 'allusercount', 'todaypresent', 'personalfilescount', 'applicantcount'));


                    } elseif ($pw == $pass && $usertype == 'ma') {
                        Session::put('usernamee', $username);
                        Session::put('emp_id', $emp_idd);
                        Session::put('usertype', $usertype);
                        Session::put('propic', $dp);
                        Session::save();
                        return view('welcome');


                    } elseif ($pw == $pass && $usertype == 'vc') {
                        Session::put('usernamee', $username);
                        Session::put('emp_id', $emp_idd);
                        Session::put('usertype', $usertype);
                        Session::put('propic', $dp);
                        Session::save();
                        return view('welcome');


                    } elseif ($pw == $pass && $usertype == 'dvc') {
                        Session::put('usernamee', $username);
                        Session::put('emp_id', $emp_idd);
                        Session::put('usertype', $usertype);
                        Session::put('propic', $dp);
                        Session::save();
                        return view('welcome');


                    } elseif ($pw == $pass && $usertype == 'ar') {
                        Session::put('usernamee', $username);
                        Session::put('emp_id', $emp_idd);
                        Session::put('usertype', $usertype);
                        Session::put('propic', $dp);
                        Session::save();
                        return view('welcome');


                    } elseif ($pw == $pass && $usertype == 'HOD') {

                        Session::put('index', 'side-menu--active');
                        Session::put('manage', '');
                        Session::put('employee', '');
                        Session::put('request', '');
                        Session::put('complain', '');
                        Session::put('rave', '');
                        Session::put('social', '');
                        Session::put('mobile', '');
                        Session::put('notice', '');
                        Session::put('personal', '');
                        Session::put('leave', '');


                        Session::put('usernamee', $username);
                        Session::put('emp_id', $emp_idd);
                        Session::put('usertype', $usertype);
                        Session::put('propic', $dp);
                        Session::put('user_email', $emp_email);
                        Session::put('user_id', $emp_idd);
                        Session::save();
                        $notice = DB::table('notices')
                            ->get();
                        $allusercount = Alluser::orderBy("created_at", "desc")
                            ->count();
                        $todayDate = Carbon::now()->format('Y-m-d');
                        $todaypresent = Attendence::orderBy("created_at", "desc")
                            ->where('date', '=', $todayDate)
                            ->count();
                        $personalfilescount = personalfile::orderBy("created_at", "desc")
                            ->count();
                        $applicantcount = Appliciant::orderBy("created_at", "desc")
                            ->where('created_at', '=', $todayDate)
                            ->count();
                        return view('admin.index', compact('notice', 'allusercount', 'todaypresent', 'personalfilescount', 'applicantcount'));


                    } elseif ($pw == $pass && $usertype == 'Dean') {

                        Session::put('index', 'side-menu--active');
                        Session::put('manage', '');
                        Session::put('employee', '');
                        Session::put('request', '');
                        Session::put('complain', '');
                        Session::put('rave', '');
                        Session::put('social', '');
                        Session::put('mobile', '');
                        Session::put('notice', '');
                        Session::put('personal', '');
                        Session::put('leave', '');


                        Session::put('usernamee', $username);
                        Session::put('emp_id', $emp_idd);
                        Session::put('usertype', $usertype);
                        Session::put('propic', $dp);
                        Session::put('user_email', $emp_email);
                        Session::put('user_id', $emp_id);
                        Session::save();
                        $notice = DB::table('notices')
                            ->get();
                        $allusercount = Alluser::orderBy("created_at", "desc")
                            ->count();
                        $todayDate = Carbon::now()->format('Y-m-d');
                        $todaypresent = Attendence::orderBy("created_at", "desc")
                            ->where('date', '=', $todayDate)
                            ->count();
                        $personalfilescount = personalfile::orderBy("created_at", "desc")
                            ->count();
                        $applicantcount = Appliciant::orderBy("created_at", "desc")
                            ->where('created_at', '=', $todayDate)
                            ->count();
                        return view('admin.index', compact('notice', 'allusercount', 'todaypresent', 'personalfilescount', 'applicantcount'));


                    } elseif ($pw == $pass && $usertype == 'Genaral') {
//            genaral user
//            ----------sidebar---------------------
                        Session::put('index', '');
                        Session::put('manage', '');
                        Session::put('employee', '');
                        Session::put('request', 'side-menu--active');
                        Session::put('complain', '');
                        Session::put('rave', '');
                        Session::put('social', '');
                        Session::put('mobile', '');
//--------------------------------------------------------
                        Session::put('usernamee', $username);
                        Session::put('emp_id', $emp_idd);
                        Session::put('usertype', $usertype);
                        Session::put('propic', $dp);
                        Session::save();

                        $data = DB::table('request_lists')
                            ->where('emp_id', '=', $emp_id)
                            ->get();
                        return Redirect()->route('UserRequestmodule');

//            return view('user.userRequest',compact('data'));
//            $data=RequestList::orderBy("created_at","asc")->get();


                    } elseif ($pw != $pass) {
                        return back();
                    }


                }

            } else {
                //pull pro pic
                $propic = DB::table('employees')
                    ->where('emp_id', '=', $emp_id)
                    ->get();
                $dp = $propic[0]->emp_pic;
                //employee
                $employeeemail = DB::table('employees')
                    ->select('email')
                    ->where('emp_id', '=', $emp_id)
                    ->get();
                $emp_email = $employeeemail[0]->email;
                //assign
                $pw = $data[0]->password;
                $username = $data[0]->fname;
                $usertype = $data[0]->usertype;
                $place = $data[0]->place;
                Session::put('place', $place);
                Session::save();


                //validate password   and  usertype
                if ($pw == $pass && $usertype == 'admin') {

                    // if(Session::has('emp_id')){
                    //     session()->pull('usernamee');
                    //     session()->pull('emp_id');
                    //     session()->pull('usertype');
                    //     Session::flush();
                    //  }
                    //slidebar navigation sessions
                    Session::put('index', 'side-menu--active');
                    Session::put('manage', '');
                    Session::put('employee', '');
                    Session::put('request', '');
                    Session::put('complain', '');
                    Session::put('rave', '');
                    Session::put('social', '');
                    Session::put('mobile', '');
                    Session::put('notice', '');
                    Session::put('personal', '');
                    Session::put('leave', '');


                    Session::put('usernamee', $username);
                    Session::put('emp_id', $emp_id);
                    Session::put('usertype', $usertype);
                    Session::put('propic', $dp);
                    Session::put('user_email', $emp_email);
                    Session::put('user_id', $emp_id);
                    Session::save();
                    $notice = DB::table('notices')
                        ->get();
                    $allusercount = Alluser::orderBy("created_at", "desc")
                        ->count();
                    $todayDate = Carbon::now()->format('Y-m-d');
                    $todaypresent = Attendence::orderBy("created_at", "desc")
                        ->where('date', '=', $todayDate)
                        ->count();
                    $personalfilescount = personalfile::orderBy("created_at", "desc")
                        ->count();
                    $applicantcount = Appliciant::orderBy("created_at", "desc")
                        ->where('created_at', '=', $todayDate)
                        ->count();
                    return view('admin.index', compact('notice', 'allusercount', 'todaypresent', 'personalfilescount', 'applicantcount'));

                } elseif ($pw == $pass && $usertype == 'superAdmin') {

                    // if(Session::has('emp_id')){
                    //     session()->pull('usernamee');
                    //     session()->pull('emp_id');
                    //     session()->pull('usertype');
                    //     Session::flush();
                    //  }
                    //slidebar navigation sessions
                    Session::put('index', 'side-menu--active');
                    Session::put('manage', '');
                    Session::put('employee', '');
                    Session::put('request', '');
                    Session::put('complain', '');
                    Session::put('rave', '');
                    Session::put('social', '');
                    Session::put('mobile', '');
                    Session::put('notice', '');
                    Session::put('personal', '');
                    Session::put('leave', '');


                    Session::put('usernamee', $username);
                    Session::put('emp_id', $emp_id);
                    Session::put('usertype', $usertype);
                    Session::put('propic', $dp);
                    Session::put('user_email', $emp_email);
                    Session::put('user_id', $emp_id);
// --------------------------mudeesha session---------------------------------------
                    Session::put('employee_email', $emp_email);
                    Session::put('employee_id', $emp_id);
                    Session::put('employee_name', $username);
                    Session::put('employee_department_name', $employee_data[0]->department_name);
                    Session::put('employee_faculty_name', $employee_data[0]->faculty_name);
                    Session::put('employee_designation_name', $employee_data[0]->designation_name);
                    Session::save();
                    $notice = DB::table('notices')
                        ->get();
                    $allusercount = Alluser::orderBy("created_at", "desc")
                        ->count();
                    $todayDate = Carbon::now()->format('Y-m-d');
                    $todaypresent = Attendence::orderBy("created_at", "desc")
                        ->where('date', '=', $todayDate)
                        ->count();
                    $personalfilescount = personalfile::orderBy("created_at", "desc")
                        ->count();
                    $applicantcount = Appliciant::orderBy("created_at", "desc")
                        ->where('created_at', '=', $todayDate)
                        ->count();
                    return view('admin.index', compact('notice', 'allusercount', 'todaypresent', 'personalfilescount', 'applicantcount'));


                } elseif ($pw == $pass && $usertype == 'ma') {
                    Session::put('usernamee', $username);
                    Session::put('emp_id', $emp_id);
                    Session::put('usertype', $usertype);
                    Session::put('propic', $dp);
                    Session::save();
                    return view('welcome');


                } elseif ($pw == $pass && $usertype == 'vc') {
                    Session::put('usernamee', $username);
                    Session::put('emp_id', $emp_id);
                    Session::put('usertype', $usertype);
                    Session::put('propic', $dp);
                    Session::save();
                    return view('welcome');


                } elseif ($pw == $pass && $usertype == 'dvc') {
                    Session::put('usernamee', $username);
                    Session::put('emp_id', $emp_id);
                    Session::put('usertype', $usertype);
                    Session::put('propic', $dp);
                    Session::save();
                    return view('welcome');


                } elseif ($pw == $pass && $usertype == 'ar') {
                    Session::put('usernamee', $username);
                    Session::put('emp_id', $emp_id);
                    Session::put('usertype', $usertype);
                    Session::put('propic', $dp);
                    Session::save();
                    return view('welcome');


                } elseif ($pw == $pass && $usertype == 'HOD') {
                    Session::put('index', 'side-menu--active');
                    Session::put('manage', '');
                    Session::put('employee', '');
                    Session::put('request', '');
                    Session::put('complain', '');
                    Session::put('rave', '');
                    Session::put('social', '');
                    Session::put('mobile', '');
                    Session::put('notice', '');
                    Session::put('personal', '');
                    Session::put('leave', '');


                    Session::put('usernamee', $username);
                    Session::put('emp_id', $emp_id);
                    Session::put('usertype', $usertype);
                    Session::put('propic', $dp);
                    Session::put('user_email', $emp_email);
                    Session::put('user_id', $emp_id);
// --------------------------mudeesha session---------------------------------------
                    Session::put('employee_email', $emp_email);
                    Session::put('employee_id', $emp_id);
                    Session::put('employee_name', $username);
                    Session::put('employee_department_name', $employee_data[0]->department_name);
                    Session::put('employee_faculty_name', $employee_data[0]->faculty_name);
                    Session::put('employee_designation_name', $employee_data[0]->designation_name);
                    Session::save();
                    $notice = DB::table('notices')
                        ->get();
                    $allusercount = Alluser::orderBy("created_at", "desc")
                        ->count();
                    $todayDate = Carbon::now()->format('Y-m-d');
                    $todaypresent = Attendence::orderBy("created_at", "desc")
                        ->where('date', '=', $todayDate)
                        ->count();
                    $personalfilescount = personalfile::orderBy("created_at", "desc")
                        ->count();
                    $applicantcount = Appliciant::orderBy("created_at", "desc")
                        ->where('created_at', '=', $todayDate)
                        ->count();
                    return view('admin.index', compact('notice', 'allusercount', 'todaypresent', 'personalfilescount', 'applicantcount'));


                } elseif ($pw == $pass && $usertype == 'Dean') {

                    Session::put('index', 'side-menu--active');
                    Session::put('manage', '');
                    Session::put('employee', '');
                    Session::put('request', '');
                    Session::put('complain', '');
                    Session::put('rave', '');
                    Session::put('social', '');
                    Session::put('mobile', '');
                    Session::put('notice', '');
                    Session::put('personal', '');
                    Session::put('leave', '');


                    Session::put('usernamee', $username);
                    Session::put('emp_id', $emp_id);
                    Session::put('usertype', $usertype);
                    Session::put('propic', $dp);
                    Session::put('user_email', $emp_email);
                    Session::put('user_id', $emp_id);
// --------------------------mudeesha session---------------------------------------
                    Session::put('employee_email', $emp_email);
                    Session::put('employee_id', $emp_id);
                    Session::put('employee_name', $username);
                    Session::put('employee_department_name', $employee_data[0]->department_name);
                    Session::put('employee_faculty_name', $employee_data[0]->faculty_name);
                    Session::put('employee_designation_name', $employee_data[0]->designation_name);
                    Session::save();
                    $notice = DB::table('notices')
                        ->get();
                    $allusercount = Alluser::orderBy("created_at", "desc")
                        ->count();
                    $todayDate = Carbon::now()->format('Y-m-d');
                    $todaypresent = Attendence::orderBy("created_at", "desc")
                        ->where('date', '=', $todayDate)
                        ->count();
                    $personalfilescount = personalfile::orderBy("created_at", "desc")
                        ->count();
                    $applicantcount = Appliciant::orderBy("created_at", "desc")
                        ->where('created_at', '=', $todayDate)
                        ->count();
                    return view('admin.index', compact('notice', 'allusercount', 'todaypresent', 'personalfilescount', 'applicantcount'));


                } elseif ($pw == $pass && $usertype == 'Genaral') {
//            genaral user
//            ----------sidebar---------------------
                    Session::put('index', '');
                    Session::put('manage', '');
                    Session::put('employee', '');
                    Session::put('request', 'side-menu--active');
                    Session::put('complain', '');
                    Session::put('rave', '');
                    Session::put('social', '');
                    Session::put('mobile', '');
//--------------------------------------------------------
                    Session::put('usernamee', $username);
                    Session::put('emp_id', $emp_id);
                    Session::put('usertype', $usertype);
                    Session::put('propic', $dp);
                    Session::save();

                    $data = DB::table('request_lists')
                        ->where('emp_id', '=', $emp_id)
                        ->get();
                    return Redirect()->route('UserRequestmodule');

//            return view('user.userRequest',compact('data'));
//            $data=RequestList::orderBy("created_at","asc")->get();


                } elseif ($pw != $pass) {
                    return back();
                }
            }
        }
    }


    function logout()
    {
        session()->pull('usernamee');
        session()->pull('emp_id');
        session()->pull('usertype');
        Session::flush();
        return Redirect()->route('/');

    }

    function loginform()
    {
        return view('login');
    }

    public function mobileapp()
    {

        return view('backend.mobileapp');
    }

    public function EmployeeModule()
    {
        //session for slidebar
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','side-menu--active');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('rave', '');
        Session::put('social','');
        Session::put('mobile','');

        return view('backend.user.employee.employeeModule');
    }

    //dashbord
    function dashboard()
    {
        if (session('emp_id')) {
            Session::put('index', 'side-menu--active');
            Session::put('manage', '');
            Session::put('employee','');
            Session::put('request','');
            Session::put('complain', '');
            Session::put('rave', '');
            Session::put('social','');
            Session::put('mobile','');
            Session::put('notice','');
            Session::put('leave','');
            Session::put('recruitment', '');
            Session::put('attedance','');
            Session::save();

            $notice = DB::table('notices')
                ->get();
            $allusercount = Alluser::orderBy("created_at", "desc")
                ->count();
            $todayDate = Carbon::now()->format('Y-m-d');
            $todaypresent = Attendence::orderBy("created_at", "desc")
                ->where('date','=',$todayDate)
                ->count();
            $personalfilescount = personalfile::orderBy("created_at", "desc")
                ->count();
            $applicantcount = Appliciant::orderBy("created_at", "desc")
                ->where('created_at','=',$todayDate)
                ->count();



            return view('admin.index',compact('notice','allusercount','todaypresent','personalfilescount','applicantcount'));
        }
    }

    //show system profile
    function systemprofile(){
        if(session('emp_id')){
            Session::put('index', '');
            Session::put('manage', '');
            Session::put('employee','');
            Session::put('request','');
            Session::put('complain', '');
            Session::put('rave', '');
            Session::put('social','');
            Session::put('mobile','');
            Session::save();
            $employees = DB::table('employees')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            $pass = DB::table('allusers')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            foreach ($pass as $p){
                $xx =($p->password);
            }


            return view('user.userSystemProfile',compact('employees','xx'));

        }else{
            return back ();
        }
    }

    function systemupdateprofile(Request $req){
        if (session('emp_id')){
            $image = time() . "." . $req->picture->extension();
            $req->picture->move(public_path('/'), $image);

            $affected = DB::table('employees')
                ->where('emp_id', session('emp_id'))
                ->update([
                    'current_postal_address' => $req->caddress,
                    'permanent_postal_address' => $req->paddress,
                    'current_mobile' => $req->cmobile,
                    'permanent_mobile' => $req->pmobile,
                    'emp_pic' => $image,
                ],
                );
            Session::put('propic',$image);
            Session::save();
            return back();
        }else{
            return back();
        }

    }
    function adminsystemprofile(){
        if (session('emp_id')){
            $employees = DB::table('employees')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            $pass = DB::table('allusers')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            foreach ($pass as $p){
                $xx =($p->password);
            }
            return view('admin.adminSystemProfile',compact('employees','xx'));
        }else{
            return back();
        }
    }

    function adminsystemupdateprofile(Request $req){
        if (session('emp_id')){
            $image = time() . "." . $req->picture->extension();
            $req->picture->move(public_path('/'), $image);

            $affected = DB::table('employees')
                ->where('emp_id', session('emp_id'))
                ->update([
                    'current_postal_address' => $req->caddress,
                    'permanent_postal_address' => $req->paddress,
                    'current_mobile' => $req->cmobile,
                    'permanent_mobile' => $req->pmobile,
                    'emp_pic' => $image,
                ],
                );
            Session::put('propic',$image);
            Session::save();
            return back();
        }else{
            return back();
        }

    }
    function darmodeon(){
        if (session('lightmode') == 'light'){
            Session::put('lightmode','dark');
            Session::put('lightmodeicon','sun');
            Session::save();
            return back();
        }elseif (session('lightmode') == 'dark'){
            Session::put('lightmode','light');
            Session::put('lightmodeicon','first-quarter-moon');
            Session::save();
            return back();
        }
    }



}
