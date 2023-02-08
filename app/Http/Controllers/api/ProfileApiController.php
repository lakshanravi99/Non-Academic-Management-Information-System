<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use App\Models\Employee;
use Illuminate\Http\Request;

class ProfileApiController extends Controller
{
    function get(Request $request){

        return  employee::where('emp_id', '=', $request->route('id'))->first();
    }

    function update(Request $request){
        $emp_id = $request->empId;
         employee::where('emp_id', '=', $emp_id)->update([
            'fname'=>$request->fname,
        'lname' => $request->lname,
        'mname' => $request->mname,
        'email' => $request->email,
       'nic' => $request->nic
        ]);

      return employee::where('emp_id', '=', $emp_id)->first();
    }
}
