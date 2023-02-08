<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use App\Models\Leave;
use App\Models\LeaveCount;
use Illuminate\Http\Request;

class LeaveApiController extends Controller
{
    function list(Request $request){

        return LeaveCount::where('emp_id', $request->route('id'))
            ->get();
    }
}
