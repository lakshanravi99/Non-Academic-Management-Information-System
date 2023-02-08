<?php

namespace App\Http\Controllers;
use App\Models\RequestInsurance;
use App\Models\RequestList;
use App\Models\Comment;
use App\Models\RequestPromCurrentPositionGrade;
use App\Models\RequestPromotion;
use App\Models\RequestPromServiceDetail;
use App\Models\RequestTransfer;
use App\Models\RequestTransferExpectCompany;
use App\Models\RequestTransferLoan;
use App\Models\RequestType;
use App\Models\RequestVehicle;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use DateTime;



class UserRequestController extends Controller
{
    function UserRequestmodule(){
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','');
        Session::put('request','side-menu--active');
        Session::put('complain', '');
        Session::put('rave', '');
        Session::put('attedance', '');
        Session::put('leave', '');
        Session::put('social','');
        Session::put('mobile','');
        Session::save();
        $data = DB::table('request_lists')
            ->where('emp_id', '=',session('emp_id') )
            ->get();
        $notice = DB::table('notices')
            ->get();
        $requesttypesfresh=RequestType::orderBy("created_at","desc")->get();

//        $transportcount = count(DB::table('request_vehicles')
//            ->select('id',)
//            ->where(['status' ,'=', 'Pending',
//                'emp_id','=',session('emp_id')
//                ])
//            ->get());
        $transportlist = RequestVehicle::where([
            'emp_id' => session('emp_id'),
            'status' => 'Pending'
        ])->get();
        $transportcount = count($transportlist);
        $furniture = RequestList::where([
            'status' => 'Pending',
            'req_type' => 'Furniture'
        ])->get();
        $countfurniture = count($furniture);
        $transfer = RequestTransfer::where([
            'emp_id' => session('emp_id'),
            'status' => 'Pending',
        ])->get();
        $counttransfer = count($transfer);
        $insurance = RequestInsurance::where([
            'emp_id' => session('emp_id'),
            'status' => 'Pending',

        ])->get();
        $countinsurance = count($insurance);
        $promotion = RequestPromotion::where([
            'emp_id' => session('emp_id'),
            'status' => 'Pending',
        ])->get();
        $countpromotion = count($promotion);
        $increment = RequestList::where([
            'emp_id' => session('emp_id'),
            'status' => 'Pending',
            'req_type' => 'Increment'
        ])->get();
        $countincrement = count($increment);
        $other = RequestList::where([
            'emp_id' => session('emp_id'),
            'status' => 'Pending',
            'req_type' => 'Other'
        ])->get();
        $countother = count($other);
        return view('user.request.userRequest',compact('notice','transportcount','countfurniture','counttransfer','countinsurance','countpromotion','countincrement','countother'));
//        return view('user.userRequest',compact('data','requesttypesfresh'));
    }
    function storeRequest(Request $req){
        if (session('emp_id')){
            $RequestSave = new RequestList;
            $RequestSave->emp_id = session('emp_id');
            $RequestSave->description = $req->description;
            $RequestSave->req_type = $req->reqtype;
            $RequestSave->priority = $req->reqpriority;
            $RequestSave->save();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Added Transport Request,']);
        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }
    }
    function storeTransferRequest(Request $req){

        $exist = RequestTransfer::where([
            'emp_id' => session('emp_id'),
        ])->get();

            if ($exist->isEmpty()) {
                $justnowtime = Carbon::today();
                $date = (explode(" ", $justnowtime)[0]);
                if (session('emp_id')) {
                    if ($date != $req->dob) {
                        $RequestSave = new RequestTransfer();
                        $RequestSave->emp_id = session('emp_id');
                        $RequestSave->fname = $req->name;
                        $RequestSave->reason_for_transfer = $req->reason_for_transfer;
                        $RequestSave->partners_place = $req->partners_place;
                        $RequestSave->partner_position = $req->partner_position;
                        $RequestSave->transfered_reason = $req->transfered_reason;
                        $RequestSave->Length_of_service_days = $req->Length_of_service_days;
                        $RequestSave->Length_of_service_months = $req->Length_of_service_months;
                        $RequestSave->Length_of_service_years = $req->Length_of_service_years;
                        $RequestSave->current_faculty = $req->current_faculty;
                        $RequestSave->name_of_current_working_institute = $req->name_of_current_working_institute;
                        $RequestSave->Date_confirmed_in_present_post = $req->Date_confirmed_in_present_post;
                        $RequestSave->Present_position_date_of_appointment = $req->Present_position_date_of_appointment;
                        $RequestSave->present_position = $req->present_position;
                        $RequestSave->martial_status = $req->martial_status;
                        $RequestSave->mobile = $req->mobile;
                        $RequestSave->tempory_address = $req->tempory_address;
                        $RequestSave->permenant_address = $req->permenant_address;
                        $RequestSave->dob = $req->dob;
                        $RequestSave->save();

                        $uni = RequestPromServiceDetail::where([
                            'emp_id' => session('emp_id'),
                        ])->get();
                        $data = RequestTransferLoan::where([
                            'emp_id' => session('emp_id'),
                        ])->get();
                        $com = RequestTransferExpectCompany::where([
                            'emp_id' => session('emp_id'),
                        ])->get();

                        return view('user.request.userRequestTransfer2', compact('data', 'uni', 'com'))->withErrors(['sucess' => 'Successfully Added Transfer Details,']);

                    } else {
                        return Redirect::back()->withErrors(['msg' => 'Failure: Please Enter Correct BirthDay ']);
                    }

                } else {
                    return Redirect::back()->withErrors(['msg' => 'Failure:  ']);


                }
            }else {
                return Redirect::back()->withErrors(['msg' => 'Failure: Try Again Already Exist Transfer request']);
            }
        }

    function storeTransferRequestexpectCompany(Request $req){
        $loan = new RequestTransferExpectCompany;
        $loan->company = $req->company;
        $loan->emp_id = session('emp_id');
        $loan->save();

        if (session('emp_id')){
            $com = RequestTransferExpectCompany::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $uni = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $data = RequestTransferLoan::where([
                'emp_id' => session('emp_id'),
            ])->get();

            return view('user.request.userRequestTransfer2',compact('data','uni','com'))->withErrors(['sucess' => 'Successfully Added Loan Details,']);

        }else{
            return back();
        }
    }

    function storeTransferRequestLoan(Request $req){
        $loan = new RequestTransferLoan;
        $loan->remain_years = $req->remain_years;
        $loan->remain_monthss = $req->remain_monthss;
        $loan->remain_days = $req->remain_days;
        $loan->loan = $req->loan;
        $loan->emp_id = session('emp_id');
        $loan->save();

        if (session('emp_id')){
            $uni = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $data = RequestTransferLoan::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $com = RequestTransferExpectCompany::where([
                'emp_id' => session('emp_id'),
            ])->get();

            return view('user.request.userRequestTransfer2',compact('data','uni','com'))->withErrors(['sucess' => 'Successfully Added Loan Details,']);

        }else{
            return back();
        }
    }


    function editrequestdesc(Request $req){
        $id = $req->id;
        $description = $req->description;
        if(session('emp_id')){
            $affected = DB::table('request_lists')
                ->where('request_id', $id)
                ->update(['description' => $description]);
            return Redirect::back()->withErrors(['sucess' => 'Successfully Edited  Request,']);

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }
    }
//    edit transport requests
    function editTransportrequestdesc(Request $req){
        $id = $req->id;
        $description = $req->description;
        if(session('emp_id')){
            $affected = DB::table('request_vehicles')
                ->where('id', $id)
                ->update(['description' => $description]);
            return Redirect::back()->withErrors(['sucess' => 'Successfully Edited Transport Request,']);

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }
    }
    function EditTransferRequest(Request $req){

        if(session('emp_id')){
            $affected = DB::table('request_transfers')
                ->where('emp_id', session('emp_id'))
                ->update([
                    'dob' => $req->dob,
                    'permenant_address' => $req->permenant_address,
                    'tempory_address' => $req->tempory_address,
                    'mobile' => $req->mobile,
                    'martial_status' => $req->martial_status,
                    'present_position' => $req->present_position,
                    'Present_position_date_of_appointment' => $req->Present_position_date_of_appointment,
                    'Date_confirmed_in_present_post' => $req->Date_confirmed_in_present_post,
                    'name_of_current_working_institute' => $req->name_of_current_working_institute,
                    'current_faculty' => $req->current_faculty,
                    'Length_of_service_years' => $req->Length_of_service_years,
                    'Length_of_service_months' => $req->Length_of_service_months,
                    'Length_of_service_days' => $req->Length_of_service_days,
                    'transfered_reason' => $req->transfered_reason,
                    'partner_position' => $req->partner_position,
                    'partners_place' => $req->partners_place,
                    'reason_for_transfer' => $req->reason_for_transfer,

                ]);
            $com = RequestTransferExpectCompany::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $uni = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $data = RequestTransferLoan::where([
                'emp_id' => session('emp_id'),
            ])->get();

            return view('user.request.userRequestTransfer2',compact('data','uni','com'))->withErrors(['sucess' => 'Successfully Edited Details,']);


        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }
    }

    function cancelrequest($id){
        if (session('emp_id')){
            RequestList::where('request_id', '=', $id)->delete();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Canceled  Request,']);
        }else{

        }

    }
    function canceltransportrequest($id){
        if (session('emp_id')){
            RequestVehicle::where('id', '=', $id)->delete();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Canceled  Request,']);
        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }

    }

    function usertransportrequest(){
        if (session('emp_id')){
            $data = RequestVehicle::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $vehicle = Vehicle::Orderby("created_at","desc")->get();
            return view('user.request.userRequestTransport',compact('data','vehicle'));

        }else{
            return back();
        }
    }
    function userrequestfurniture(){
        if (session('emp_id')){
            $data = RequestList::where([
                'emp_id' => session('emp_id'),
                'req_type' => 'Furniture'
            ])->get();
            return view('user.request.userRequestFurniture',compact('data'));
        }else{
            return back();
        }
    }
    function userrequesttransfer(){
        if (session('emp_id')){
            $data = RequestTransfer::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestTransfer',compact('data'));
        }else{
            return back();
        }
    }
    function userrequestinsurance(){
        if (session('emp_id')){
            $data = RequestInsurance::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestInsurance',compact('data'));
        }else{
            return back();
        }
    }
    function deleteuniversitydetail($id){
        if (session('emp_id')){
            RequestPromServiceDetail::where('id', '=', $id)->delete();
            $data = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestPromotion3',compact('data'));

        }
    }
    function deletecompanydetailtransfer($id){
        if (session('emp_id')){
            RequestTransferExpectCompany::where('id', '=', $id)->delete();
            $com = RequestTransferExpectCompany::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $uni = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $data = RequestTransferLoan::where([
                'emp_id' => session('emp_id'),
            ])->get();

            return view('user.request.userRequestTransfer2',compact('data','uni','com'))->withErrors(['sucess' => 'Successfully Deleted Service Details,']);
        }
    }
    function deleteloandetailtransfer($id){
        if (session('emp_id')){
            RequestTransferLoan::where('id', '=', $id)->delete();
            $uni = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $data = RequestTransferLoan::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $com = RequestTransferExpectCompany::where([
                'emp_id' => session('emp_id'),
            ])->get();

            return view('user.request.userRequestTransfer2',compact('data','uni','com'))->withErrors(['sucess' => 'Successfully Deleted Service Details,']);
        }
    }
    function deleteuniversitydetailtransfer($id){
        if (session('emp_id')){
            RequestPromServiceDetail::where('id', '=', $id)->delete();
            $uni = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $data = RequestTransferLoan::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $com = RequestTransferExpectCompany::where([
                'emp_id' => session('emp_id'),
            ])->get();

            return view('user.request.userRequestTransfer2',compact('data','uni','com'))->withErrors(['sucess' => 'Successfully Deleted Service Details,']);
        }
    }
    function deleteuniversitydetailedit($id){
        if (session('emp_id')){
            RequestPromServiceDetail::where('id', '=', $id)->delete();
            $data = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestPromoEdit3',compact('data'));

        }
    }
    function deletecurrentgradeEdit($id){
        if (session('emp_id')){
            RequestPromCurrentPositionGrade::where('id', '=', $id)->delete();
            $data = RequestPromCurrentPositionGrade::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestPromoEdit2',compact('data'));

        }

    }
    function deletecurrentgrade($id){
        if (session('emp_id')){
            RequestPromCurrentPositionGrade::where('id', '=', $id)->delete();
            $data = RequestPromCurrentPositionGrade::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestPromotion2',compact('data'));

        }

    }
    function userrequestpromotion(){
        if (session('emp_id')){
            $data = RequestPromotion::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestPromotion',compact('data'));
        }else{
            return back();
        }

    }
    function userrequestincrements(){
        if (session('emp_id')){
            $data = RequestList::where([
                'emp_id' => session('emp_id'),
                'req_type' => 'Increment'
            ])->get();
            return view('user.request.userRequestsIncrements',compact('data'));
        }else{
            return back();
        }
    }
    function userrequestother(){
        if (session('emp_id')){
            $data = RequestList::where([
                'emp_id' => session('emp_id'),
                'req_type' => 'Other'
            ])->get();
            return view('user.request.userRequestOther',compact('data'));
        }else{
            return back();
        }
    }
    function nextpromotion(){
        if (session('emp_id')){
            $data = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestPromotion3',compact('data'));
        }else{
            return back();
        }
    }
    function nexteditpromotion(){
        if (session('emp_id')){
            $data = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestPromoEdit3',compact('data'));
        }else{
            return back();
        }
    }
    function editinsurance(Request $req){
        if (session('emp_id')){
            $affected = DB::table('request_insurances')
                ->where('emp_id', session('emp_id'))
                ->update([
                    'emp_id' => session('emp_id'),
                    'fullname' => $req->fullname,
                    'personal_address' => $req->personal_address,
                    'nic' => $req->nic,
                    'position' => $req->position,
                    'mobile' => $req->mobile,
                    'office_mobile' => $req->office_mobile,
                    'institute' => $req->institute,
                    'official_address' => $req->official_address,
                    'insurance_scheme' => $req->insurance_scheme,
                    'status' => "Pending",
                ]);
            $data = RequestInsurance::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestInsurance',compact('data'));
        }else{
            return back();
        }
    }
    function editpromotion(Request $req){
        if (session('emp_id')){
            $affected = DB::table('request_promotions')
                ->where('emp_id', session('emp_id'))
                ->update([
                    'other' => $req->other,
                    'leave_end_date' => $req->leave_end_date,
                    'leave_start_date' => $req->leave_start_date,
                    'done_study_or_abroad' => $req->done_study_or_abroad,
                    'expect_post' => $req->expect_post,
                    'date_of_join_present_post' => $req->date_of_join_present_post,
                    'current_position_grade' => $req->current_position_grade,
                    'current_position' => $req->current_position,
                    'post_confirm' => $req->post_confirm,
                    'mobile' => $req->mobile,
                    'name' => $req->name,
                    'status' => "Pending",
                ]);
            $data = RequestPromCurrentPositionGrade::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestPromoEdit2',compact('data'));
        }else{
            return back();
        }
    }

    function storePromotionRequest(Request $req){
        $exist = RequestPromotion::where([
            'emp_id' => session('emp_id'),
        ])->get();
        if ($exist->isEmpty()) {
            if (session('emp_id')) {
                $promoreq = new RequestPromotion;
                $promoreq->other = $req->other;
                $promoreq->grade_of_expect_post = $req->grade_of_expect_post;
                $promoreq->leave_end_date = $req->leave_end_date;
                $promoreq->leave_start_date = $req->leave_start_date;
                $promoreq->done_study_or_abroad = $req->done_study_or_abroad;
                $promoreq->expect_post = $req->expect_post;
                $promoreq->date_of_join_present_post = $req->date_of_join_present_post;
                $promoreq->current_position_grade = $req->current_position_grade;
                $promoreq->current_position = $req->current_position;
                $promoreq->post_confirm = $req->post_confirm;
                $promoreq->mobile = $req->mobile;
                $promoreq->name = $req->name;
                $promoreq->emp_id = $req->emp_id;
                $promoreq->save();
                $data = RequestPromCurrentPositionGrade::where([
                    'emp_id' => session('emp_id'),
                ])->get();
                return view('user.request.userRequestPromotion2', compact('data'));


            } else {

            }
        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Already Exist Promotion request']);

        }

        }

    function storePromoRequestService(Request $req){
        if (session('emp_id')){
            $promoreqcp = new RequestPromServiceDetail;
            $promoreqcp->emp_id = $req->emp_id;
            $promoreqcp->to = $req->to;
            $promoreqcp->from = $req->from;
            $promoreqcp->position = $req->position;
            $promoreqcp->university = $req->university;
//            $promoreqcp->application_id = $req->emp_id;
            $promoreqcp->save();
            return back();



        }else{
            return back();
        }

    }
    function storeRequestInsurance(Request $req){
        $exist = RequestInsurance::where([
            'emp_id' => session('emp_id'),
        ])->get();
        if ($exist->isEmpty()){
            if (session('emp_id')) {
                $insurance = new RequestInsurance;
                $insurance->emp_id = $req->emp_id;
                $insurance->fullname = $req->fullname;
                $insurance->personal_address = $req->personal_address;
                $insurance->position = $req->position;
                $insurance->nic = $req->nic;
                $insurance->mobile = $req->mobile;
                $insurance->office_mobile = $req->office_mobile;
                $insurance->institute = $req->institute;
                $insurance->official_address = $req->official_address;
                $insurance->insurance_scheme = $req->insurance_scheme;
                $insurance->save();
                return back()->withErrors(['sucess' => 'Successfully Added Insurance Details,']);

            } else {
                return back();
            }
        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Already Exist Transfer request']);

        }





    }
    function storeTransferRequestService(Request $req){

        if (session('emp_id')){
            $promoreqcp = new RequestPromServiceDetail;
            $promoreqcp->emp_id = $req->emp_id;
            $promoreqcp->to = $req->to;
            $promoreqcp->from = $req->from;
            $promoreqcp->position = $req->position;
            $promoreqcp->university = $req->university;
//            $promoreqcp->application_id = $req->emp_id;
            $promoreqcp->save();
            $uni = RequestPromServiceDetail::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $data = RequestTransferLoan::where([
                'emp_id' => session('emp_id'),
            ])->get();
            $com = RequestTransferExpectCompany::where([
                'emp_id' => session('emp_id'),
            ])->get();

            return view('user.request.userRequestTransfer2',compact('data','uni','com'))->withErrors(['sucess' => 'Successfully Added Service Details,']);
        }else{
            return back();
        }

    }
    function EditPromoRequestCurrentPositionGrade(Request $req){
        if (session('emp_id')){
            $promoreqcp = new RequestPromCurrentPositionGrade;
            $promoreqcp->emp_id = $req->emp_id;
            $promoreqcp->grade = $req->grade;
            $promoreqcp->from = $req->from;
            $promoreqcp->to = $req->to;
            $promoreqcp->position = $req->position;
            $promoreqcp->save();
            $data = RequestPromCurrentPositionGrade::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestPromoEdit2',compact('data'));

        }else{
            return back();
        }
    }

    function storePromoRequestCurrentPositionGrade(Request $req){
        if (session('emp_id')){
            $promoreqcp = new RequestPromCurrentPositionGrade;
            $promoreqcp->emp_id = $req->emp_id;
            $promoreqcp->grade = $req->grade;
            $promoreqcp->from = $req->from;
            $promoreqcp->to = $req->to;
            $promoreqcp->position = $req->position;
            $promoreqcp->save();
            $data = RequestPromCurrentPositionGrade::where([
                'emp_id' => session('emp_id'),
            ])->get();
            return view('user.request.userRequestPromotion2',compact('data'));

        }else{
            return back();
        }
    }
    function storeTransportRequest(Request $req){
        if (session('emp_id')){

                $vehicle = new RequestVehicle;
                $vehicle->emp_id = session('emp_id');
                $vehicle->name = $req->vehicle;
                $vehicle->description = $req->description;
                $vehicle->priority = $req->reqpriority;
                $vehicle->status = 'Pending';
                $vehicle->fromv = $req->from;
                $vehicle->tov = $req->to;
                $vehicle->seats = $req->seats;
                $vehicle->time = $req->time;
                $vehicle->save();
                return Redirect::back()->withErrors(['sucess' => 'Successfully Added Transport Request,']);




        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again ']);
        }
    }
}
