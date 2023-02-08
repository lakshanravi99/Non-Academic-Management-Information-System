<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveTypeController extends Controller
{
    public function leavetypes(){
        if(session('emp_id')){
            $leaves = DB::table('leave_types')
                ->get();
            return view('user/Leaves/leavetypes',compact('leaves'));


        }else{
            return back();
        }
    }
}
