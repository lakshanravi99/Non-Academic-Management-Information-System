<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use Illuminate\Http\Request;

class AttendanceApiController extends Controller
{
    function list(Request $request){

        return Attendence::where('emp_id', $request->route('id'))
            ->get();
    }
}
