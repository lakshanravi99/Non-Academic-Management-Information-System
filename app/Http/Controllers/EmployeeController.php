<?php

namespace App\Http\Controllers;

use App\Models\Alluser;
use App\Models\department;
use App\Models\Employee;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class EmployeeController extends Controller
{
    public function EmployeeModule(){
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('notice', '');
        Session::put('personal', '');
        Session::put('rave', '');
        Session::put('attedance', '');
        Session::put('leave', '');
        Session::put('social','');
        Session::put('mobile','');
        Session::put('manageemployee','side-menu--active');
        Session::save();
        return view("admin.Employee.EmployeeModule");
    }


    public function EmployeeAdd(){
        $usertypesfresh = UserType::orderBy("created_at", "desc")->get();
        $department = department::orderBy("created_at", "desc")->get();
        $empid = Employee::orderBy("created_at", "desc")->get()->first();
        $newempid =$empid->	emp_id;
        $splitid = explode('A',$newempid);
        $lastempid = $splitid[1]+1;

        return view("admin.Employee.EmployeeAdd",compact('usertypesfresh','department','lastempid'));
    }

    function employeeupdate($id){
        if (session('emp_id')){
            $employee = Employee::orderBy("created_at", "desc")
                ->where('emp_id','=',$id)
                ->get();
            $usertypesfresh = UserType::orderBy("created_at", "desc")->get();
            $department = department::orderBy("created_at", "desc")->get();

            return view('admin.Employee.EmployeeUpdate',compact('usertypesfresh','department','employee'));
        }else{
            return back();
        }

    }

    function updateemployee(Request $req){
        if (session('emp_id')){
            $image = time() . "." . $req->picture->extension();
            $req->picture->move(public_path('/'), $image);
            $affected = DB::table('employees')
                ->where('emp_id',$req->emp_id)
                ->update([
                    'status' => $req->status,
                    'salary' => $req->salary,
                    'driving_licen_issuing_date' => $req->driving_licen_issuing_date,
                    'driving_licen_no' => $req->driving_licen_no,
                    'nic' => $req->nic,
                    'citizenship' => $req->citizenship,
                    'age_as_at_closing_date' => $req->age_as_at_closing_date,
                    'dob' => $req->dob,
                    'email' => $req->email,
                    'emp_pic' => $image,
                    'police_division' => $req->police_division,
                    'permanent_mobile' => $req->permanent_mobile,
                    'current_mobile' => $req->current_mobile,
                    'permanent_postal_address' => $req->permanent_postal_address,
                    'current_postal_address' => $req->current_postal_address,
                    'civil_status' => $req->civil_status,
                    'gender' => $req->gender,
                    'place' => $req->place,
                    'lname' => $req->lname,
                    'mname' => $req->mname,
                    'fname' => $req->fname
                ],
                );

            return back();
        }else{
            return back();
        }

    }

    public function storeemployee(Request $req){
        $fid = Employee::orderBy("created_at", "desc")->get()->first();
        $newfid =$fid->	fingerprint_id+1;

        if ($req->picture){
            $employee = new Employee;
            $employee->emp_id = $req->emp_id;
            $employee->fname = $req->fname;
            $employee->mname = $req->mname;
            $employee->lname = $req->lname;
            $employee->gender = $req->gender;
            $employee->place = $req->place;
            $image = time(). ".".$req->picture->extension();
            $employee->emp_pic = $image;
            $req->picture->move(public_path('/'),$image);
            $employee->civil_status = $req->civil_status;
            $employee->current_postal_address = $req->current_postal_address;
            $employee->permanent_postal_address = $req->permanent_postal_address;
            $employee->current_mobile = $req->current_mobile;
            $employee->permanent_mobile = $req->permanent_mobile;
            $employee->police_division = $req->police_division;
            $employee->email = $req->email;
            $employee->dob = $req->dob;
            $employee->age_as_at_closing_date = $req->age_as_at_closing_date;
            $employee->citizenship = $req->citizenship;
            $employee->nic = $req->nic;
            $employee->driving_licen_no = $req->driving_licen_no;
            $employee->driving_licen_issuing_date = $req->driving_licen_issuing_date;
            $employee->salary = $req->salary;
            $employee->status = $req->status;
            $employee->fingerprint_id = $newfid;
            $employee->faculty_id = $req->faculty_id;
            $employee->save();
            return view("admin.Employee.EmployeeModule");

        }else{
            $employee = new Employee;
            $employee->emp_id = $req->emp_id;
            $employee->fname = $req->fname;
            $employee->mname = $req->mname;
            $employee->lname = $req->lname;
            $employee->gender = $req->gender;
            $employee->place = $req->place;
            $employee->civil_status = $req->civil_status;
            $employee->current_postal_address = $req->current_postal_address;
            $employee->permanent_postal_address = $req->permanent_postal_address;
            $employee->current_mobile = $req->current_mobile;
            $employee->permanent_mobile = $req->permanent_mobile;
            $employee->police_division = $req->police_division;
            $employee->email = $req->email;
            $employee->dob = $req->dob;
            $employee->age_as_at_closing_date = $req->age_as_at_closing_date;
            $employee->citizenship = $req->citizenship;
            $employee->nic = $req->nic;
            $employee->driving_licen_no = $req->driving_licen_no;
            $employee->driving_licen_issuing_date = $req->driving_licen_issuing_date;
            $employee->salary = $req->salary;
            $employee->status = $req->status;
            $employee->fingerprint_id = $newfid;
            $employee->faculty_id = $req->faculty_id;
            $employee->save();
            return view("admin.Employee.EmployeeModule");
        }




    }



    public function EmployeeView(){

        $data['allData'] = employee::orderBy("emp_id", "asc")->get();
        return view('admin.Employee.EmployeeView', $data);

    }


}
