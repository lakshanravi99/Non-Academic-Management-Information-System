<?php

namespace App\Http\Controllers;

use App\Models\CasualLeave;
use App\Models\HalfDayLeave;
use App\Models\ShortLeave;
use App\Models\MedicalLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use DateTime;

class LeaveController extends Controller
{
    function UserLeavemodule(){
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('leave','side-menu--active');
        Session::put('rave', '');
        Session::put('attedance', '');
        Session::put('social','');
        Session::put('mobile','');
        Session::save();

        $leavecount = DB::table('leave_counts')
            ->where('emp_id','=',session('emp_id'))
            ->get();

        $notice = DB::table('notices')
            ->get();

        return view('user.userLeave',compact('leavecount','notice'));
    }

    function usershortleave(){
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('leave','side-menu--active');
        Session::put('rave', '');
        Session::put('social','');
        Session::put('mobile','');
        Session::save();

        $short = DB::table('short_leaves')
            ->where('emp_id','=',session('emp_id'))
            ->get();
        $reason = DB::table('leave_reasons')
            ->get();
        return view('user.Leaves.userShortLeave',compact('reason','short'));

    }
    function storeShortLeave(Request $req){

        $place = DB::table('allusers')
            ->where('emp_id','=',session('emp_id'))
            ->get();
        $leavecount = DB::table('leave_counts')
            ->where('emp_id','=',session('emp_id'))
            ->get();
        foreach ($leavecount as $l){
            $shortleavecount = $l->short_leave;
        }

        foreach ($place as $p){
            $placeselected= $p->place;
        }
        if (session('emp_id')){
            $shortleave = new ShortLeave;
            $shortleave->emp_id = session('emp_id');
            $shortleave->usertype = session('usertype');
            $shortleave->Place = $placeselected;
            $shortleave->Count = $req->count;
            $shortleave->initiate_date = $req->initiatedate;
            $shortleave->leave_start_day = $req->leavestartdate;
            $shortleave->leave_end_day = $req->againpresentdate;
            $shortleave->reason = $req->reason;
            $shortleave->comment = $req->comment;
            $shortleave->save();


//            textit()->sms('0702228130', 'Your Short leave submitted!');

            $remain = ((int)$shortleavecount - (int)$req->count);
            $affected = DB::table('leave_counts')
                ->where('emp_id', session('emp_id'))
                ->update(['short_leave' => $remain]);


            return Redirect::back()->withErrors(['sucess' => 'Successfully Added Short Leave,']);

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }

    }

    function editshortleave(Request $req){

        $id = $req->id;
        $count = $req->count;
//        $initiate_date =$req->initiate_date;
        $leave_start_day=$req->leave_start_day;
        $leave_end_day=$req->leave_end_day;
        $reason=$req->Reason;

        if(session('emp_id')){
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',session('emp_id'))
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
            $resetscount = ((int)$nowsleavecount + (int)$pc);
            $newsleavecount = ((int)$resetscount - (int)$count);
            $affected = DB::table('leave_counts')
                ->where('emp_id', session('emp_id'))
                ->update(['short_leave' => $newsleavecount]);

            $affected = DB::table('short_leaves')
                ->where('id', $id)
                ->update(['count' => $count, 'leave_start_day' => $leave_start_day, 'leave_end_day' => $leave_end_day, 'Reason' => $reason]);
            return Redirect::back()->withErrors(['sucess' => 'Successfully Edited Short Leave,']);

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again to Edit ']);
        }

    }
    function cancelshortleave($id){
        if(session('emp_id')){
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',session('emp_id'))
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
                ->where('emp_id',session('emp_id'))
                ->update(['short_leave' => $newcount]);

            ShortLeave::where('id', '=', $id)->delete();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Canceled Short Leave,']);

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }
    }

    function usercasualleave(){
        if(session('emp_id')){
            $casual = DB::table('casual_leaves')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            $reason = DB::table('leave_reasons')
                ->get();
            return view('user.Leaves.userCasualLeave',compact('casual','reason'));


        }else{
            return back();
        }
    }
    function storeCasualLeave(Request $req){
        $place = DB::table('allusers')
            ->where('emp_id','=',session('emp_id'))
            ->get();
        foreach ($place as $p){
            $placeselected= $p->place;
        }
        $leavecount = DB::table('leave_counts')
            ->where('emp_id','=',session('emp_id'))
            ->get();
        foreach ($leavecount as $l){
            $casualleavecount = $l->casual_leave;
        }
        if (session('emp_id')){
            $shortleave = new CasualLeave;
            $shortleave->emp_id = session('emp_id');
            $shortleave->usertype = session('usertype');
            $shortleave->Place = $placeselected;
            $shortleave->initiate_date = $req->initiatedate;
            $shortleave->leave_start_day = $req->leavestartdate;
            $shortleave->leave_end_day = $req->againpresentdate;
            $shortleave->reason = $req->reason;

            $fdate = $req->leavestartdate;
            $tdate = $req->againpresentdate;
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $shortleave->Count = $days;
            if ($days != 0){
                $shortleave->save();

                $remain = ((int)$casualleavecount - (int)$req->count);
                $affected = DB::table('leave_counts')
                    ->where('emp_id', session('emp_id'))
                    ->update(['casual_leave' => $remain]);


                return Redirect::back()->withErrors(['sucess' => 'Successfully Added Casual Leave,']);

            }else{
                return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
            }
            }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }



    }

    function cancelcasualleave($id){
        if(session('emp_id')){
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',session('emp_id'))
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
                ->where('emp_id',session('emp_id'))
                ->update(['casual_leave' => $newcount]);

            CasualLeave::where('id', '=', $id)->delete();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Canceled Casual Leave,']);

        }else{
            return back();
        }

    }

    function editcasualleave(Request $req){
        $id = $req->id;
        $count = $req->count;
//        $initiate_date =$req->initiate_date;
        $leave_start_day=$req->leave_start_day;
        $leave_end_day=$req->leave_end_day;
        $reason=$req->Reason;

        if(session('emp_id')){

            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            foreach ($leavecount as $l){
                $nowsleavecount= $l->casual_leave;
            }
            $previouscleavecount = DB::table('casual_leaves')
                ->where('id','=',$id)
                ->get();
            foreach ($previouscleavecount as $p){
                $pc=$p->count;
            }
            $resetscount = ((int)$nowsleavecount + (int)$pc);
            $newsleavecount = ((int)$resetscount - (int)$count);
            $affected = DB::table('leave_counts')
                ->where('emp_id', session('emp_id'))
                ->update(['casual_leave' => $newsleavecount]);

            $affected = DB::table('casual_leaves')
                ->where('id', $id)
                ->update(['count' => $count, 'leave_start_day' => $leave_start_day, 'leave_end_day' => $leave_end_day, 'Reason' => $reason]);
            return Redirect::back()->withErrors(['sucess' => 'Successfully Edited Casual Leave,']);

        }else{
            return back();
        }

    }
    function usermedicalleave(){
        if(session('emp_id')){
            $medical = DB::table('medical_leaves')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            $reason = DB::table('leave_reasons')
                ->get();
            return view('user.Leaves.userMedicalLeave',compact('medical','reason'));


        }else{
            return back();
        }
    }

    function storeMedicalLeave(Request $req){
        $place = DB::table('allusers')
            ->where('emp_id','=',session('emp_id'))
            ->get();
        foreach ($place as $p){
            $placeselected= $p->place;

        }
        if (session('emp_id')){
            $mleave = new MedicalLeave;
            $mleave->emp_id = session('emp_id');
            $mleave->usertype = session('usertype');
            $mleave->Place = $placeselected;
            $datetime1 = new DateTime($req->leavestartdate);
            $datetime2 = new DateTime($req->againpresentdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $mleave->Count = $days;
            $mleave->initiate_date = $req->initiatedate;
            $mleave->leave_start_day = $req->leavestartdate;
            $mleave->leave_end_day = $req->againpresentdate;
            $mleave->reason = $req->reason;
            if ($req->picture){
                $image = time(). ".".$req->picture->extension();
                $mleave->medical_file = $image;
                $req->picture->move(public_path('/medical/'),$image);
            }
            $mleave->save();

            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            foreach ($leavecount as $l){
                $medicalleavecount = $l->medical_leave;
            }
            $remain = ((int)$medicalleavecount - (int)$req->count);
            $affected = DB::table('leave_counts')
                ->where('emp_id', session('emp_id'))
                ->update(['medical_leave' => $remain]);
            return Redirect::back()->withErrors(['sucess' => 'Successfully Added Sick Leave,']);

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }


    }

    function cancelmedicalleave($id){
        if(session('emp_id')){
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',session('emp_id'))
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
                ->where('emp_id',session('emp_id'))
                ->update(['medical_leave' => $newcount]);

            MedicalLeave::where('id', '=', $id)->delete();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Canceled Sick Leave,']);

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }

    }
    function editmedicalleave(Request $req){
        $id = $req->id;
//        $initiate_date =$req->initiate_date;
        $leave_start_day=$req->leave_start_day;
        $leave_end_day=$req->leave_end_day;
        $datetime1 = new DateTime($req->leave_start_day);
        $datetime2 = new DateTime($req->leave_end_day);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $count = $days;
        $reason=$req->reason;


        if(session('emp_id')){
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            foreach ($leavecount as $l){
                $nowsleavecount= $l->medical_leave;
            }
            $previouscleavecount = DB::table('medical_leaves')
                ->where('id','=',$id)
                ->get();
            foreach ($previouscleavecount as $p){
                $pc=$p->count;
            }
            $resetscount = ((int)$nowsleavecount + (int)$pc);
            $newsleavecount = ((int)$resetscount - (int)$count);
            $affected = DB::table('leave_counts')
                ->where('emp_id', session('emp_id'))
                ->update(['medical_leave' => $newsleavecount]);
            if ($req->picture){
                $image = time(). ".".$req->picture->extension();
                $medical_file = $image;
                $req->picture->move(public_path('/medical/'),$image);
                $affected = DB::table('medical_leaves')
                    ->where('id', $id)
                    ->update(['medical_file' => $medical_file,'count' => $count, 'leave_start_day' => $leave_start_day, 'leave_end_day' => $leave_end_day, 'Reason' => $reason]);
                return Redirect::back()->withErrors(['sucess' => 'Successfully Edited Sick Leave,']);

            }else{
                $affected = DB::table('medical_leaves')
                    ->where('id', $id)
                    ->update(['count' => $count, 'leave_start_day' => $leave_start_day, 'leave_end_day' => $leave_end_day, 'Reason' => $reason]);
                return Redirect::back()->withErrors(['sucess' => 'Successfully Edited Sick Leave,']);

            }

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }

    }
    function userhalfdayleave(){
        if(session('emp_id')){
            $half = DB::table('half_day_leaves')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            $reason = DB::table('leave_reasons')
                ->get();
            return view('user.Leaves.userHalfDayLeave',compact('half','reason'));


        }else{
            return back();
        }
    }
    function storehalfdayLeave(Request $req){

        $place = DB::table('allusers')
            ->where('emp_id','=',session('emp_id'))
            ->get();
        foreach ($place as $p){
            $placeselected= $p->place;
        }
        if (session('emp_id')){
            $halfleave = new HalfDayLeave();
            $halfleave->emp_id = session('emp_id');
            $halfleave->usertype = session('usertype');
            $halfleave->Place = $placeselected;
            $halfleave->Count = $req->count;
            $halfleave->initiate_date = $req->initiatedate;
            $halfleave->leave_start_day = $req->leavestartdate;
            $halfleave->leave_end_day = $req->againpresentdate;
            $halfleave->reason = $req->reason;
            $halfleave->save();
//------------------------------------------------------------
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',session('emp_id'))
                ->get();
            foreach ($leavecount as $l){
                $halfdayleavecount = $l->casual_leave;
            }
            $remain = ((int)$halfdayleavecount - 0.5);

            $affected = DB::table('leave_counts')
                ->where('emp_id', session('emp_id'))
                ->update(['casual_leave' => $remain]);

            return Redirect::back()->withErrors(['sucess' => 'Successfully Added Half Day Leave,']);

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }

    }

    function cancelhalfdayleave($id){
        if(session('emp_id')){
            $leavecount = DB::table('leave_counts')
                ->where('emp_id','=',session('emp_id'))
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
                ->where('emp_id',session('emp_id'))
                ->update(['casual_leave' => $newcount]);

            HalfDayLeave::where('id', '=', $id)->delete();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Canceled Half Day Leave,']);

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }

}

function edithalfdayleave(Request $req){
    $id = $req->id;
    $count = 0.5;
    $initiate_date =$req->initiate_date;
    $leave_start_day=$req->leave_start_day;
    $leave_end_day=$req->leave_end_day;
    $reason=$req->reason;

    if(session('emp_id')){

        $affected = DB::table('half_day_leaves')
            ->where('id', $id)
            ->update(['count' => $count,'initiate_date' => $initiate_date, 'leave_start_day' => $leave_start_day, 'leave_end_day' => $leave_end_day, 'Reason' => $reason]);
        return Redirect::back()->withErrors(['sucess' => 'Successfully Edited Half Day Leave,']);

    }else{
        return back();
    }

}

    public function searchleave(Request $request){


        $output="";
        $query = $request->get('searchleaves');

        $employee= ShortLeave::orderBy('id','DESC')->where('status', 'Like', '%' .$query. '%')->orWhere('Reason', 'Like', '%' .$query. '%')->get();

        foreach($employee as $employee) {

            $output.=
                ' <tr>
                    <th class="whitespace-nowrap">'.$employee->count.'</p> </th>
                     <th class="whitespace-nowrap">'.$employee->leave_start_day.'</th>
                    <th class="text-center whitespace-nowrap">'.$employee->leave_end_day.'</th>
                    <th class="text-center whitespace-nowrap">'.$employee->status.'</th>
                    <th class="text-center whitespace-nowrap">'.$employee->Reason.'</th>



                </tr>';
        }

        return response($output);
    }



}
