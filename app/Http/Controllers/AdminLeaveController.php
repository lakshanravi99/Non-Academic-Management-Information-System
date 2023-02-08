<?php

namespace App\Http\Controllers;

use App\Models\CasualLeave;
use App\Models\HalfDayLeave;
use App\Models\MedicalLeave;
use App\Models\ShortLeave;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class AdminLeaveController extends Controller
{
    function adminleavemode(){
        if(session('emp_id')){
            Session::put('index', '');
            Session::put('manage', '');
            Session::put('manageemployee', '');
            Session::put('recruitment', '');
            Session::put('employee','');
            Session::put('request','');
            Session::put('complain', '');
            Session::put('leave','side-menu--active');
            Session::put('rave', '');
            Session::put('notice', '');
            Session::put('social','');
            Session::put('mobile','');
            Session::save();
            $notice = DB::table('notices')
                ->get();
            $shortleavecount = DB::table('short_leaves')
                ->where('status','=','Pending')
                ->where('Place','=',session('place'))
                ->get()->count();
            $casualleavecount = DB::table('casual_leaves')
                ->where('status','=','Pending')
                ->where('Place','=',session('place'))
                ->get()->count();
            $medicaleavecount = DB::table('medical_leaves')
                ->where('status','=','Pending')
                ->where('Place','=',session('place'))
                ->get()->count();
            $halfleavecount = DB::table('half_day_leaves')
                ->where('status','=','Pending')
                ->where('Place','=',session('place'))
                ->get()->count();

            return view('admin.Leaves.AdminLeave',compact('notice','shortleavecount','casualleavecount','medicaleavecount','halfleavecount'));
        }else{
            return back();
        }
    }
//----------------------------short leave-----------------------------------------------------------
    function adminusershortleave(){
        if (session('emp_id')){

            $short = DB::table('short_leaves')
                ->where('Place','=',session('place'))
                ->get();
            $usertypesfresh=UserType::orderBy("created_at","desc")->get();

            return view('admin.Leaves.Adminshortleave',compact('short','usertypesfresh'));

        }else{
            return back();
        }

    }

    function approveshortleave($id){
        if (session('emp_id')){
            $affected = DB::table('short_leaves')
                ->where('id', $id)
                ->update(['status' => 'Approved']);
            return back();

        }else{
            return back();
        }
    }

    function rejectshortleave($id,$empid){

        if (session('emp_id')){
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',$empid)
                ->get();
            foreach ($leavecount as $l){
                $nowsleavecount= $l->short_leave;
            }
            $previoussleavecount = DB::table('short_leaves')
                ->where('id','=',$id)
                ->get();
            foreach ($previoussleavecount as $p){
                $pc=$p->count;
            }
            $newcount = ((int)$nowsleavecount + (int)$pc);
            $affected = DB::table('leave_counts')
                ->where('emp_id',$empid)
                ->update(['short_leave' => $newcount]);

            $affected = DB::table('short_leaves')
                ->where('id', '=', $id)
                ->update(['status' => "Rejected"]);

            return back();
        }else{
            return back();
        }
    }

//    ------------------casual-leave----------------------------
    function admincasualleave(){
        if (session('emp_id')){
            $casual = DB::table('casual_leaves')
                ->where('Place','=',session('place'))
                ->get();
            $usertypesfresh=UserType::orderBy("created_at","desc")->get();

            return view('admin.Leaves.Admincasualleave',compact('casual','usertypesfresh'));

            return back();
        }else{
            return back();
        }
    }

    function approvecasualtleave($id){
        if (session('emp_id')){
            $affected = DB::table('casual_leaves')
                ->where('id', $id)
                ->update(['status' => 'Approved']);
                return back();
        }else{
            return back();
        }
    }
    function rejectcasualleave($id,$empid){

        if (session('emp_id')){
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',$empid)
                ->get();
            foreach ($leavecount as $l){
                $nowsleavecount= $l->casual_leave;
            }
            $previoussleavecount = DB::table('casual_leaves')
                ->where('id','=',$id)
                ->get();
            foreach ($previoussleavecount as $p){
                $pc=$p->count;
            }
            $newcount = ((int)$nowsleavecount + (int)$pc);
            $affected = DB::table('leave_counts')
                ->where('emp_id',$empid)
                ->update(['casual_leave' => $newcount]);

            $affected = DB::table('casual_leaves')
                ->where('id', '=', $id)
                ->update(['status' => "Rejected"]);

            return back();
        }else{
            return back();
        }
    }
    //    ------------------halfday-leave----------------------------
    function adminhalfdayleave(){
        if (session('emp_id')){
            $half = DB::table('half_day_leaves')
                ->where('Place','=',session('place'))
                ->get();
            $usertypesfresh=UserType::orderBy("created_at","desc")->get();
            return view('admin.Leaves.Adminhalfday',compact('half','usertypesfresh'));

            return back();
        }else{
            return back();
        }
    }

    function approvehalftleave($id){
        if (session('emp_id')){
            $affected = DB::table('half_day_leaves')
                ->where('id', $id)
                ->update(['status' => 'Approved']);
            return back();
        }else{
            return back();
        }
    }
    function rejecthalfleave($id,$empid){

        if (session('emp_id')){
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',$empid)
                ->get();
            foreach ($leavecount as $l){
                $nowsleavecount= $l->casual_leave;
            }
            $previoussleavecount = DB::table('half_day_leaves')
                ->where('id','=',$id)
                ->get();
            foreach ($previoussleavecount as $p){
                $pc=$p->count;
            }
            $newcount = ((int)$nowsleavecount + (int)$pc);
            $affected = DB::table('leave_counts')
                ->where('emp_id',$empid)
                ->update(['casual_leave' => $newcount]);

            $affected = DB::table('half_day_leaves')
                ->where('id', '=', $id)
                ->update(['status' => "Rejected"]);
            return back();
        }else{
            return back();
        }
    }
    //    ------------------medical-leave----------------------------
    function adminmedicalleave(){
        if (session('emp_id')){
            $medical = DB::table('medical_leaves')
                ->where('Place','=',session('place'))
                ->get();
            $usertypesfresh=UserType::orderBy("created_at","desc")->get();
            return view('admin.Leaves.Adminmedicalleave',compact('medical','usertypesfresh'));

            return back();
        }else{
            return back();
        }
    }
    function approvemedicalleave($id){
        if (session('emp_id')){
            $affected = DB::table('medical_leaves')
                ->where('id', $id)
                ->update(['status' => 'Approved']);
            return back();
        }else{
            return back();
        }
    }
    function rejectmedicalleave($id,$empid){

        if (session('emp_id')){
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',$empid)
                ->get();
            foreach ($leavecount as $l){
                $nowsleavecount= $l->medical_leave;
            }
            $previoussleavecount = DB::table('medical_leaves')
                ->where('id','=',$id)
                ->get();
            foreach ($previoussleavecount as $p){
                $pc=$p->count;
            }
            $newcount = ((int)$nowsleavecount + (int)$pc);
            $affected = DB::table('leave_counts')
                ->where('emp_id',$empid)
                ->update(['medical_leave' => $newcount]);

            $affected = DB::table('medical_leaves')
                ->where('id', '=', $id)
                ->update(['status' => "Rejected"]);
            return back();
        }else{
            return back();
        }
    }





}
