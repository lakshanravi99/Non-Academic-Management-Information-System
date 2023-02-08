<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class EmployeeModuleController extends Controller
{

    public function EmployeeModule(){
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','side-menu--active');
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

        return view('backend.user.employee.employeeModule');
    }



}
