<?php

namespace App\Http\Controllers;
use App\Models\requestChat;
use App\Models\RequestInsurance;
use App\Models\RequestPromCurrentPositionGrade;
use App\Models\RequestPromotion;
use App\Models\RequestPromServiceDetail;
use App\Models\RequestTransfer;
use App\Models\RequestTransferExpectCompany;
use App\Models\RequestTransferLoan;
use App\Models\RequestType;
use App\Models\RequestVehicle;
use App\Models\UserType;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Models\RequestList;



class RequestModuleController extends Controller
{
    function show()
    {
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee', '');
        Session::put('request', 'side-menu--active');
        Session::put('complain', '');
        Session::put('rave', '');
        Session::put('recruitment', '');
        Session::put('notice', '');
        Session::put('personal', '');
        Session::put('leave', '');
        Session::put('social', '');
        Session::put('mobile', '');
        Session::put('attedance', '');
        Session::save();
        if (session('emp_id')) {
            $data = DB::table('request_lists')
                ->where('emp_id', '=', session('emp_id'))
                ->get();
            $usertypesfresh = UserType::orderBy("created_at", "desc")->get();
            $notice = DB::table('notices')
                ->get();
            $transportReq = DB::table('request_vehicles')
                ->where('status', '=', 'Pending')
                ->get();
            $transportReqcount = count($transportReq);
            $furniture = RequestList::where([
                'status' => 'Pending',
                'req_type' => 'Furniture'
            ])->get();
            $countfurniture = count($furniture);
            $transfer = RequestTransfer::where([
                'status' => 'Pending',
            ])->get();
            $counttransfer = count($transfer);
            $insurance = RequestInsurance::where([
                'status' => 'Pending',
            ])->get();
            $countinsurance = count($insurance);
            $promotion = RequestPromotion::where([
                'status' => 'Pending',
            ])->get();
            $countpromotion = count($promotion);
            $increment = RequestList::where([
                'status' => 'Pending',
                'req_type' => 'Increment'
            ])->get();
            $countincrement = count($increment);
            $other = RequestList::where([
                'status' => 'Pending',
                'req_type' => 'Other'
            ])->get();
            $countother = count($other);



            return view('admin.request.adminrequestMain', compact('notice', 'usertypesfresh', 'transportReqcount','countfurniture','counttransfer','countinsurance','countpromotion','countother','countincrement'));

        } else {
            return back();
        }




    }



    function insurancedetails($emp_id){

        if (session('emp_id')){
            $data = RequestInsurance::where([
                'emp_id' => $emp_id,
            ])->get();

            return view('admin.request.adminrequestInsuranceDetails',compact('data',));
        }else{
            return back();
        }
    }

    function detailstransport($id){
        $data = RequestVehicle::orderBy('id','asc')
            ->where('id','=',$id)
            ->get();

        if (session('emp_id')){
               return view('admin.request.adminDetailsTransport',compact('data'));
        }else{
            return back();
        }
    }
    function detailstransportuser($id){
        $data = RequestVehicle::orderBy('id','asc')
            ->where('id','=',$id)
            ->get();

        if (session('emp_id')){
            return view('user.request.userDetailsTransport',compact('data'));
        }else{
            return back();
        }
    }
    function transferdetails($emp_id){

        if (session('emp_id')){
            $data = RequestTransfer::where([
                'emp_id' => $emp_id,
            ])->get();
            $com = RequestTransferExpectCompany::where([
                'emp_id' => $emp_id,
            ])->get();
            $loan = RequestTransferLoan::where([
                'emp_id' => $emp_id,
            ])->get();
            $uni = RequestPromServiceDetail::where([
                'emp_id' => $emp_id,
            ])->get();
            return view('admin.request.adminrequestTransferDetails',compact('data','com','loan','uni'));
        }else{
            return back();
        }
    }
    function promodetails($emp_id){

        if (session('emp_id')){
            $data = RequestPromotion::where([
                'emp_id' => $emp_id,
            ])->get();
            $grade = RequestPromCurrentPositionGrade::where([
                'emp_id' => $emp_id,
            ])->get();
            $uni = RequestPromServiceDetail::where([
                'emp_id' => $emp_id,
            ])->get();
            return view('admin.request.adminrequestPromoDetails',compact('data','grade','uni'));
        }else{
            return back();
        }
    }

    function approverequest($id)
    {
        if (session('emp_id')) {
            $affected = DB::table('request_lists')
                ->where('request_id', $id)
                ->update(['status' => 'Approved']);
            return back();
        } else {
            return back();
        }

    }
    function approveinsuranceorequest($id)
    {
        if (session('emp_id')) {
            $affected = DB::table('request_insurances')
                ->where('id', $id)
                ->update(['status' => 'Approved']);
            return back();
        } else {
            return back();
        }

    }
    function approvepromorequest($id)
    {
        if (session('emp_id')) {
            $affected = DB::table('request_promotions')
                ->where('id', $id)
                ->update(['status' => 'Approved']);
            return back();
        } else {
            return back();
        }

    }
    function approvetransportrequest($id,$f)
    {
        if (session('emp_id')) {
            if ($f == 'hod'){
                    $affected = DB::table('request_vehicles')
                        ->where('id', $id)
                        ->update(['HOD_status' => 'Approved']);
                    return back();


            }elseif ($f == 'dean'){
                $affected = DB::table('request_vehicles')
                    ->where('id', $id)
                    ->update(['Dean_status' => 'Approved']);
                return back();
            }

        } else {
            return back();
        }

    }
    function approvetransferrequest($id)
    {
        if (session('emp_id')) {
            $affected = DB::table('request_transfers')
                ->where('id', $id)
                ->update(['status' => 'Approved']);
            return back();
        } else {
            return back();
        }

    }
    function deleterequestpromotion($id){
        if (session('emp_id')){
            RequestPromotion::where('id', '=', $id)->delete();
            return back()->withErrors(['sucess' => 'Successfully Deleted  Request,']);
        }else{
            return back();
        }

    }
    function deleterequestinsurance($id){
        if (session('emp_id')){
            RequestInsurance::where('id', '=', $id)->delete();
            return back()->withErrors(['sucess' => 'Successfully Deleted  Request,']);
        }else{
            return back();
        }

    }
    function deletetransferrequest($id){
        if (session('emp_id')){
            RequestTransfer::where('id', '=', $id)->delete();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Deleted  Request,']);
        }else{

        }

    }
    function rejecttransferrequest($id)
    {
        if (session('emp_id')) {
            $affected = DB::table('request_transfers')
                ->where('id', $id)
                ->update(['status' => 'Rejected']);
            return back();
        } else {
            return back();
        }

    }


    function rejectrequest($id)
    {
        if (session('emp_id')) {
            $affected = DB::table('request_lists')
                ->where('request_id', $id)
                ->update(['status' => 'Rejected']);
            return back();
        } else {
            return back();
        }

    }
    function rejectinsurancerequest($id)
    {
        if (session('emp_id')) {
            $affected = DB::table('request_insurances')
                ->where('id', $id)
                ->update(['status' => 'Rejected']);
            return back();
        } else {
            return back();
        }

    }
    function rejectpromorequest($id)
    {
        if (session('emp_id')) {
            $affected = DB::table('request_promotions')
                ->where('id', $id)
                ->update(['status' => 'Rejected']);
            return back();
        } else {
            return back();
        }

    }
    function rejectTransportrequest($id,$f)
    {
        if (session('emp_id')) {
            if ($f == 'hod'){
                $affected = DB::table('request_vehicles')
                    ->where('id', $id)
                    ->update(['HOD_status' => 'Rejected']);
                return back();
            }elseif ($f == 'dean'){

                $affected = DB::table('request_vehicles')
                    ->where('id', $id)
                    ->update(['Dean_status' => 'Rejected']);
                return back();
            }
        } else {
            return back();
        }

    }

    function admintransportrequest()
    {
        if (session('emp_id')) {
            Session::put('index', '');
            Session::put('manage', '');
            Session::put('employee', '');
            Session::put('request', 'side-menu--active');
            Session::put('complain', '');
            Session::put('rave', '');
            Session::put('recruitment', '');
            Session::put('notice', '');
            Session::put('personal', '');
            Session::put('attedance', '');
            Session::put('leave', '');
            Session::put('social', '');
            Session::put('mobile', '');
            Session::save();
            $data = DB::table('request_vehicles')
                ->get();
            $usertypesfresh = UserType::orderBy("created_at", "desc")->get();
            if (session('usertype') == 'HOD' ){
//                    SELECT request_vehicles.*,employees.place from employees,request_vehicles
//                    WHERE employees.place='ICT' and employees.emp_id = request_vehicles.emp_id;
                    $data=DB::table('employees')
                        ->crossJoin('request_vehicles')
                        ->select('request_vehicles.*', 'employees.place')
                        ->where('employees.place','=',session('place'))
                        ->where('employees.emp_id','=',DB::raw('request_vehicles.emp_id'))
                        ->get();
                        return view('request', compact('data', 'usertypesfresh'));
            }elseif (session('usertype') == 'Dean'){
                $data = DB::table('request_vehicles')
                    ->where('HOD_status','=', 'Approved')
                    ->get();
//                $data=DB::table('employees')
//                    ->crossJoin('request_vehicles')
//                    ->select('request_vehicles.*', 'employees.*')
//                    ->where('employees.emp_id','=',DB::raw('request_vehicles.emp_id'))
//                    ->get();

                return view('request', compact('data', 'usertypesfresh'));

            }

            return view('request', compact('data', 'usertypesfresh'));

        } else {
            return back();
        }
    }

    function adminRequestMoreBTN($id, $emp_id)
    {
        if (session('emp_id')) {

            $data = DB::table('employees')
                ->where('emp_id', $emp_id)
                ->get();
            foreach ($data as $e) {
                $pic = $e->emp_pic;
            }
            $requestdetail = DB::table('request_vehicles')
                ->where('id', $id)
                ->get();
            foreach ($requestdetail as $v) {
                $name = $v->name;
                $desc = $v->description;
                $priority = $v->priority;
            }
            $chatadmin = DB::table('request_chats')
                ->where('request_id', $id)
                ->get();


            return view('admin.request.adminrequestMore', compact('pic', 'emp_id', 'name', 'desc', 'priority', 'id', 'chatadmin'));
        } else {
            return back();
        }
    }

//-----------chat------------------------
    function requestChat(Request $req)
    {
        $chat = new requestChat;
        $chat->msg = $req->msg;
        $chat->emp_id = $req->emp_id;
        $chat->selector = $req->selector;
        $chat->request_id = $req->request_id;
        $chat->save();
        return back();

    }

    function adminreqeustfurniture()
    {
        if (session('emp_id')) {
            Session::put('adminreqtitle', 'Furniture');
            Session::save();
            $usertypesfresh = UserType::orderBy("created_at", "desc")->get();
            $data = DB::table('request_lists')
                ->where('req_type', 'Furniture')
                ->get();
            return view('admin.request.adminRequestCommonTable', compact('usertypesfresh', 'data'));
        } else {
            return back();
        }
    }

    function adminrequesttransfer()
    {
        if (session('emp_id')) {
            Session::put('adminreqtitle', 'Transfer');
            Session::save();
            $usertypesfresh = UserType::orderBy("created_at", "desc")->get();
            $data=DB::table('employees')
                ->crossJoin('request_transfers')
                ->select('request_transfers.*', 'employees.place')
                ->where('employees.place','=',session('place'))
                ->where('employees.emp_id','=',DB::raw('request_transfers.emp_id'))
                ->get();
            return view('admin.request.adminRequestTransfer', compact('usertypesfresh', 'data'));
        } else {
            return back();
        }
    }

    function adminrequestinsurance()
    {
        if (session('emp_id')) {
            Session::put('adminreqtitle', 'Insurance');
            Session::save();
            $usertypesfresh = UserType::orderBy("created_at", "desc")->get();

            $data=DB::table('employees')
                ->crossJoin('request_insurances')
                ->select('request_insurances.*', 'employees.place')
                ->where('employees.place','=',session('place'))
                ->where('employees.emp_id','=',DB::raw('request_insurances.emp_id'))
                ->get();

            return view('admin.request.adminRequestInsurance', compact('usertypesfresh', 'data'));
        } else {
            return back();
        }
    }
    function adminrequestpromotion(){
        if (session('emp_id')){
            Session::put('adminreqtitle','Promotion');
            Session::save();
            $usertypesfresh=UserType::orderBy("created_at","desc")->get();

            $data=DB::table('employees')
                ->crossJoin('request_promotions')
                ->select('request_promotions.*', 'employees.place')
                ->where('employees.place','=',session('place'))
                ->where('employees.emp_id','=',DB::raw('request_promotions.emp_id'))
                ->get();
            return view('admin.request.adminRequestCommonTable',compact('usertypesfresh','data'));
        }else{
            return back();
        }
    }
    function adminrequestincrements(){
        if (session('emp_id')){
            Session::put('adminreqtitle','Increment');
            Session::save();
            $usertypesfresh=UserType::orderBy("created_at","desc")->get();
            $data = DB::table('request_lists')
                ->where('req_type','Increment')
                ->get();
            return view('admin.request.adminRequestCommonTable',compact('usertypesfresh','data'));
        }else{
            return back();
        }
    }
    function adminrequestother(){
        if (session('emp_id')){
            Session::put('adminreqtitle','Other');
            Session::save();
            $usertypesfresh=UserType::orderBy("created_at","desc")->get();

            $data=DB::table('employees')
                ->crossJoin('request_lists')
                ->select('request_lists.*', 'employees.place')
                ->where('employees.place','=',session('place'))
                ->where('employees.emp_id','=',DB::raw('request_lists.emp_id'))
                ->where('req_type','Other')
                ->get();
            return view('admin.request.adminRequestOther',compact('usertypesfresh','data'));
        }else{
            return back();
        }
    }
    function storedeanReason(Request $req){
        if (session('emp_id')){
            $affected = DB::table('request_vehicles')
                ->where('id', $req->reqid)
                ->update(['deanreason' => $req->deanreason]);
            return Redirect::back()->withErrors(['sucess' => 'Successfully Send Reason,']);
        }else{
            return back();
        }
    }
    function storeheadReason(Request $req){
        if (session('emp_id')){
            $affected = DB::table('request_vehicles')
                ->where('id', $req->reqid)
                ->update(['hodreason' => $req->hodreason]);
            return Redirect::back()->withErrors(['sucess' => 'Successfully Send Reason,']);
        }else{
            return back();
        }
    }

}
