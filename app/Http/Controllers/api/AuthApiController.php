<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthApiController extends Controller
{
    function auth(Request $request){

        $resp = array("success"=>false);
        $emp_id = $request->emp_id;
        $pass = $request->password;
        $checkusers=DB::table('allusers')
            ->select('password')
            ->where('emp_id', '=', $emp_id)
            ->get();
        if (!empty($checkusers[0]->password)) {
            if ($checkusers[0]->password == $pass) {
                $user = DB::table('allusers')
                    ->where('emp_id', '=', $emp_id)
                    ->get();
                $emp = employee::where('emp_id', '=', $emp_id)->first();
                $name =' '.join(array($emp->fname , $emp->mname ,$emp->lname));
                $resp = array("success" => true, "emp_id" => $emp_id, "name" => $name);
            }
        }

        return response()->json($resp);
    }
}
