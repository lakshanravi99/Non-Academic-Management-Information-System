<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Appliciant;
use App\Models\User;
use App\Models\AppliciantSchoolAttended;
use App\Models\AppliciantOlExamination;
use App\Models\AppliciantAlExamination;
use App\Models\AppliciantOtherEducation;
use App\Models\AppliciantUniversityEducation;
use App\Models\AppliciantProfessionalQualification;
use App\Models\AppliciantEmploymentRecord;
use App\Models\AppliciantPresentOccaption;
use App\Models\AppliciantReferences;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class AppliciantController extends Controller
{
    public function testNotification(Request $req){
        echo $req->post('fname');
        echo $req->post('lname');

        app('App\Http\Controllers\SelfNotificationController')->storeNotifications();

    }
    function signup1p(){
        return view('appliciant.signup');
    }

    public function returnDashbord(){
        $designations = DB::table('designations')
            ->select('*')
            ->get();

        // $data1 = DB::table('recruitment_seasons')
        //     ->select('end_date')
        //     ->where('currently_active', 1)
        //     ->get();
        //     $end_date=$data1[0]->end_date;

        $applied_designations =[];

        if (Appliciant::where('email', session('temp_user_email'))->exists()) {
            $applied_designations = DB::table('appliciants')
                ->leftjoin('designations', 'appliciants.designation_id', '=', 'designations.designation_id')
                ->select('*')
                ->where('user_id', session('temp_user_id'))
                ->get();

            //dd($applied_designations);

        }


        return view('appliciant.index',compact('designations','applied_designations'));

    }

    public function returnApplication(Request $req){

        $desig_name = $req->desig_name;
        $req->session()->put('temp_user_designation_name',$desig_name);

        $desig_id = $req->desig_id;
        $req->session()->put('temp_user_designation_id',$desig_id);

        return view('appliciant.application',compact('desig_id','desig_name'));

    }

    public function returnApplication2(){

        return view('appliciant.application2');

    }

    function submitApplication(Request $req){
        $data = DB::table('recruitment_seasons')
            ->select('id')
            ->where('currently_active', 1)
            ->get();
        $seasion_id = $data[0]->id;
        $req->session()->put('appliciant_session_id',$seasion_id);

        $validator = Validator::make($req->all(), [

        ]);

        if($validator->fails()){
            $message = "Required fields are missing!";
            $status = 400;
        }



        else{
            $age_as_at_closing_date = $req->age_years." Years, ".$req->age_years." Months, ".$req->age_years." Days";
            $hight = $req->height_feets." Feets, ".$req->height_inches." Inches";

            $appliciant = new Appliciant;
            $appliciant->user_id=session('temp_user_id');
            $appliciant->designation_id=$req->desig_id;
            $appliciant->season_id=$seasion_id;
            $appliciant->initial=$req->initial;
            $appliciant->fname=$req->fname;
            $appliciant->mname=$req->mname;
            $appliciant->lname=$req->lname;
            $appliciant->initial_name=$req->initial_name;
            $appliciant->gender=$req->gender;
            $appliciant->civil_status=$req->civil_status;
            $appliciant->current_address_line1=$req->current_address_line1;
            $appliciant->current_address_line2=$req->current_address_line2;
            $appliciant->current_address_line3=$req->current_address_line3;
            $appliciant->permenent_address_line1=$req->permenent_address_line1;
            $appliciant->permenent_address_line2=$req->permenent_address_line2;
            $appliciant->permenent_address_line3=$req->permenent_address_line3;
            $appliciant->permenant_mobile=$req->permenant_mobile;
            $appliciant->current_mobile=$req->current_mobile;
            $appliciant->email=$req->email;
            $appliciant->nic=$req->nic;
            $appliciant->police_division=$req->police_division;
            $appliciant->dob=$req->dob;
            $appliciant->civil_status=$req->civil_status;
            $appliciant->age_as_at_closing_date=$age_as_at_closing_date;
            $appliciant->driving_licen_no=$req->driving_licence_no;
            $appliciant->driving_licen_issuing_date=$req->driving_licence_issuied_date;
            $appliciant->citizenship=$req->citizenship;
            $appliciant->hight=$hight;
            $appliciant->chest=$req->chest;
            $appliciant->sport_qualification=$req->sport_activity;
            $appliciant->guilty_status=$req->guilty_status;
            $appliciant->guilty_description=$req->guilty_description;
            $appliciant->save();

            $status=200;
            $message="Success";

            $data = DB::table('appliciants')
                ->select('appliciant_id')
                ->where('user_id', session('temp_user_id'))
                ->orderBy('appliciant_id', 'DESC')
                ->first();

            Session::put('appliciant_id',$data->appliciant_id);
            Session::save();

            app('App\Http\Controllers\AppliciantSelfNotificationController')->submitApplicationNotify();

        }
        return response()->json([
            'status'=>$status,
            'message'=>$message,
            'appliciant_id'=>$data
        ]);



        //return redirect('appliciant/dashbord');


    }

    public function loadViewOwnDetails(Request $req){
        $application_id= $req->appliciant_id;
        return view('appliciant.edit_details',['application_id'=>$application_id]);

    }
    public function loadViewOwnDetailsAdd(){
        return view('appliciant.edit_details',['application_id'=>session('appliciant_id')]);

    }

    public function viewOwnDetails(Request $req){
        $today = Carbon::now()->format('Y-m-d');
        $application_id = $req->application_id;

        $data = DB::table('appliciants')
            ->select('*')
            ->where('user_id', session('temp_user_id'))
            ->where('appliciant_id',  $application_id)
            ->get();

        $data1 = DB::table('recruitment_seasons')
            ->select('end_date')
            ->where('currently_active', 1)
            ->get();
        $data1=$data1[0]->end_date;

        return response()->json([
            'data'=>$data,
            'data1'=>$data1,
            'status'=>200,
            'today'=>$today,
            'message'=>"Success"
        ]);

    }

    public function loadEditDetails(){
        $data = DB::table('appliciants')
            ->select('*')
            ->where('user_id', session('user_id'))
            ->get();

        return view('appliciant.edit_details',['data'=>$data]);

    }

    public function updateApplication(Request $req){

        $age_as_at_closing_date = $req->age_years." Years, ".$req->age_years." Months, ".$req->age_years." Days";
        $hight = $req->height_feets." Feets, ".$req->height_inches." Inches";

        $update_status_failed = Appliciant::where('user_id', '=', session('temp_user_id'))->update(array(
                'initial'=>$req->initial,
                'fname'=>$req->fname,
                'mname'=>$req->mname,
                'lname'=>$req->lname,
                'initial_name'=>$req->initial_name,
                'gender'=>$req->gender,
                'civil_status'=>$req->civil_status,
                'current_address_line1'=>$req->current_address_line1,
                'current_address_line2'=>$req->current_address_line2,
                'current_address_line3'=>$req->current_address_line3,
                'permenent_address_line1'=>$req->permenent_address_line1,
                'permenent_address_line2'=>$req->permenent_address_line2,
                'permenent_address_line3'=>$req->permenent_address_line3,
                'permenant_mobile'=>$req->permenant_mobile,
                'current_mobile'=>$req->current_mobile,
                'email'=>$req->email,
                'nic'=>$req->nic,
                'police_division'=>$req->police_division,
                'dob'=>$req->dob,
                'civil_status'=>$req->civil_status,
                'age_as_at_closing_date'=>$age_as_at_closing_date,
                'driving_licen_no'=>$req->driving_licence_no,
                'driving_licen_issuing_date'=>$req->driving_licence_issuied_date,
                'citizenship'=>$req->citizenship,
                'hight'=>$hight,
                'chest'=>$req->chest,
                'sport_qualification'=>$req->sport_activity,
                'guilty_status'=>$req->guilty_status,
                'guilty_description'=>$req->guilty_description,
            )
        );

        // app('App\Http\Controllers\MailController')->updateApplication();
        // app('App\Http\Controllers\MailController')->test();

        return response()->json([
            'status'=>200,
            'message'=>"Your Application is Updated Successfully!",
        ]);


    }

    //Ajax Admin
    public function fetcAppliciant(){
        $data = DB::table('appliciants')
            ->select('*')
            ->where('season_id', session('current_season'))
            ->get();

        $designations = DB::table('designations')
            ->select('designation_id')
            ->get();

        $designation_name = DB::table('designations')
            ->select('designation_name')
            ->get();

        $all_app = DB::table('appliciants')
            ->select('appliciant_id')
            ->where('season_id', session('current_season'))
            ->get();
        $count_all = $all_app->count();

        $reject = DB::table('appliciants')
            ->select('appliciant_id')
            ->where('season_id', session('current_season'))
            ->where('application_status', 'rejected')
            ->get();
        $all_rejected = $reject->count();

        $pending = DB::table('appliciants')
            ->select('appliciant_id')
            ->where('season_id', session('current_season'))
            ->where('application_status', 'pending')
            ->get();
        $all_pending = $pending->count();

        $approved = DB::table('appliciants')
            ->select('appliciant_id')
            ->where('season_id', session('current_season'))
            ->where('application_status', 'approved')
            ->get();
        $all_approved = $approved->count();

        $selected = DB::table('appliciants')
            ->select('appliciant_id')
            ->where('season_id', session('current_season'))
            ->where('selected_for_job', 'selected')
            ->get();
        $all_selected = $selected->count();

        $dc_array=array();

        for($index=0; $index < count($designations); $index++){

            $x = DB::table('appliciants')
                ->select('designation_id')
                ->where('season_id', session('current_season'))
                ->where('designation_id', $designations[$index]->designation_id)
                ->get();
            $count = $x->count();
            $dn = $designation_name[$index]->designation_name;

            $rejected_app = DB::table('appliciants')
                ->select('appliciant_id')
                ->where('season_id', session('current_season'))
                ->where('application_status', 'rejected')
                ->where('designation_id', $designations[$index]->designation_id)
                ->get();
            $rejected = $rejected_app->count();

            $vacancies = DB::table('recruitment_vacancies')
                ->leftjoin('designations', 'recruitment_vacancies.designation_id', '=', 'designations.designation_id')
                ->leftjoin('appliciants', 'appliciants.appliciant_id', '=', 'designations.designation_id')
                ->select('recruitment_vacancies.vacancies')
                ->where('recruitment_vacancies.season_id', session('current_season'))
                ->where('designations.designation_id', $designations[$index]->designation_id)
                ->get();
            $vacan = $vacancies[0]->vacancies;

            $count_array['designation_name']=$dn;
            $count_array['designation_count']=$count;
            $count_array['rejected_application']=$rejected;
            $count_array['vacancies']=$vacan;

            $dc_array[$index]=$count_array;
        }

        return response()->json([
            'data'=>$data,
            'dc_array'=>$dc_array,
            'count_all'=>$count_all,
            'rejected_all'=>$all_rejected,
            'approved_all'=>$all_approved,
            'pending_all'=>$all_pending,
            'selected_all'=>$all_selected
        ]);

    }

    public function fetcAppliciantIntake(){

        $index = 0;
        $appliciant_index_count=array();

        $intake = DB::table('recruitment_seasons')
            ->select('season','id')
            ->get();

        for($index; $index < count($intake); $index++){

            $appliciant = DB::table('appliciants')
                ->select('appliciant_id')
                ->where('season_id', $intake[$index]->id)
                ->where('selected_for_job', "selected")
                ->get();

            $count = $appliciant->count();

            $count_array['intakes']=$intake[$index]->season;
            $count_array['appliciant_count']=$count;

            $appliciant_index_count[$index]=$count_array;
        }
        return response()->json([
            'data33'=>$appliciant_index_count,
        ]);


    }

    public function fetcExamPassAppliciantIntake(){

        $index = 0;
        $appliciant_index_count=array();

        $intake = DB::table('recruitment_seasons')
            ->select('season','id')
            ->get();

        for($index; $index < count($intake); $index++){

            $appliciant = DB::table('appliciants')
                ->select('appliciant_id')
                ->where('season_id', $intake[$index]->id)
                ->where('selected_for_job', "selected")
                ->get();

            $count = $appliciant->count();

            $count_array['intakes']=$intake[$index]->season;
            $count_array['appliciant_count']=$count;

            $appliciant_index_count[$index]=$count_array;
        }
        return response()->json([
            'data33'=>$appliciant_index_count,
        ]);


    }

    public function viewAppliciant($id){
        $details = DB::table('appliciants')
            ->select('*')
            ->where('appliciant_id', $id)
            ->get();
        if($details){
            return response()->json([
                'status'=>200,
                'details'=>$details,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Student Not Found',
            ]);
        }
    }

    public function rejectAppliciant($id){
        if(isset($id)){
            $update = Appliciant::where('appliciant_id', '=', $id)->update(
                array(
                    'appliciant_id' => $id,
                    'application_status' => "rejected",
                    'selected_for_job' => "rejected",
                    'status_update_by' => session('employee_id')
                )
            );
            return response()->json([
                'status'=>200,
                'message'=>'The Application is Rejected!',
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Error!',
            ]);
        }
    }

    public function approveAppliciant($id){
        if(isset($id)){
            $update = Appliciant::where('appliciant_id', '=', $id)->update(
                array(
                    'appliciant_id' => $id,
                    'application_status' => "approved",
                    'status_update_by' => session('employee_id')
                )
            );
            return response()->json([
                'status'=>200,
                'message'=>'The Application is Success!',
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Error!',
            ]);
        }
    }

    public function selectAppliciant($id){
        if(isset($id)){
            $update = Appliciant::where('appliciant_id', '=', $id)->update(
                array(
                    'appliciant_id' => $id,
                    'selected_for_job' => "selected",
                    'status_update_by' => session('employee_id')
                )
            );
            return response()->json([
                'status'=>200,
                'message'=>'The Application is selected for the Job!',
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Error!',
            ]);
        }
    }

    //End Ajax Admin

    //Start appliciant ajax
    public function fetchSchool(Request $req){
        $data = DB::table('appliciant_school_attendeds')
            ->leftjoin('appliciants', 'appliciants.appliciant_id', '=', 'appliciant_school_attendeds.appliciant_id')
            ->select('appliciant_school_attendeds.*')
            ->where('appliciant_school_attendeds.appliciant_id',$req->application_id)
            ->get();

        return response()->json([
            'data'=>$data,
        ]);
    }

    public function addSchool(Request $request){
        $validator = Validator::make($request->all(), [
            'school'=>'required',
            'from'=>'required',
            'to'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_school = new AppliciantSchoolAttended;
            $appliciant_school->appliciant_id=$request->application_id;
            $appliciant_school->school=$request->school;
            $appliciant_school->from=$request->from;
            $appliciant_school->to=$request->to;
            $appliciant_school->save();

            $status=200;
            $message="School Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }

    //ol-----------------------------------------------------------------------------------------------------------------
    public function fetchOl(Request $req){
        $ol1 = DB::table('appliciant_ol_examinations')
            ->leftjoin('users', 'users.id', '=', 'appliciant_ol_examinations.id')
            ->select('appliciant_ol_examinations.*')
            ->where('appliciant_ol_examinations.appliciant_id',$req->application_id)
            ->where('appliciant_ol_examinations.shy',1)
            ->get();

        $ol2 = DB::table('appliciant_ol_examinations')
            ->leftjoin('users', 'users.id', '=', 'appliciant_ol_examinations.id')
            ->select('appliciant_ol_examinations.*')
            ->where('appliciant_ol_examinations.appliciant_id',$req->application_id)
            ->where('appliciant_ol_examinations.shy',2)
            ->get();

        return response()->json([
            'ol1'=>$ol1,
            'ol2'=>$ol2
        ]);
    }


    public function addOl(Request $request, $shy){
        $validator = Validator::make($request->all(), [
            'subject'=>'required',
            'grade'=>'required',
            'year'=>'required',
            'index'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_ol = new AppliciantOlExamination;
            $appliciant_ol->appliciant_id=$request->application_id;;
            $appliciant_ol->subject=$request->subject;
            $appliciant_ol->grade=$request->grade;
            $appliciant_ol->year=$request->year;
            $appliciant_ol->index_no=$request->index;
            $appliciant_ol->shy=$shy;
            $appliciant_ol->save();

            $status=200;
            $message="School Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //o/l----------------------------------------------------------------------------------------------------------------------

    //start a/l----------------------------------------------------------------------------------------------------------------------
    public function fetchAl(Request $req){
        $al = DB::table('appliciant_al_examinations')
            ->leftjoin('users', 'users.id', '=', 'appliciant_al_examinations.id')
            ->select('appliciant_al_examinations.*')
            ->where('appliciant_al_examinations.appliciant_id',$req->application_id)
            ->get();

        return response()->json([
            'al_data'=>$al
        ]);
    }

    public function addAl(Request $request){
        $validator = Validator::make($request->all(), [
            'subject'=>'required',
            'grade'=>'required',
            'year'=>'required',
            'index'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_al = new AppliciantAlExamination;
            $appliciant_al->appliciant_id=$request->application_id;;
            $appliciant_al->subject=$request->subject;
            $appliciant_al->grade=$request->grade;
            $appliciant_al->year=$request->year;
            $appliciant_al->index_no=$request->index;
            $appliciant_al->save();

            $status=200;
            $message="School a/l a subject Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End a/l------------------------------------------------------------------------------------------------------------------------

    //start university----------------------------------------------------------------------------------------------------------------------
    public function fetchUniversity(Request $req){
        $al = DB::table('appliciant_university_education')
            ->leftjoin('users', 'users.id', '=', 'appliciant_university_education.id')
            ->select('appliciant_university_education.*')
            ->where('appliciant_university_education.appliciant_id',$req->application_id)
            ->get();

        return response()->json([
            'university_data'=>$al
        ]);
    }

    public function addUniversity(Request $request){
        $validator = Validator::make($request->all(), [
            'institute'=>'required',
            'degree'=>'required',
            'year'=>'required',
            'class'=>'required',
            'date'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_university = new AppliciantUniversityEducation;
            $appliciant_university->appliciant_id=$request->application_id;;
            $appliciant_university->institute=$request->institute;
            $appliciant_university->degree=$request->degree;
            $appliciant_university->class=$request->class;
            $appliciant_university->year=$request->year;
            $appliciant_university->effective_date=$request->date;
            $appliciant_university->save();

            $status=200;
            $message="University details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End University------------------------------------------------------------------------------------------------------------------------

    //start other----------------------------------------------------------------------------------------------------------------------
    public function fetchOther(Request $req){
        $other = DB::table('appliciant_other_education')
            ->leftjoin('users', 'users.id', '=', 'appliciant_other_education.id')
            ->select('appliciant_other_education.*')
            ->where('appliciant_other_education.appliciant_id',$req->application_id)
            ->get();

        return response()->json([
            'other_data'=>$other
        ]);
    }

    public function addOther(Request $request){
        $validator = Validator::make($request->all(), [
            'institute'=>'required',
            'course'=>'required',
            'from'=>'required',
            'to'=>'required',
            'date'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_other = new AppliciantOtherEducation;
            $appliciant_other->appliciant_id=$request->application_id;;
            $appliciant_other->institute=$request->institute;
            $appliciant_other->course=$request->course;
            $appliciant_other->from=$request->from;
            $appliciant_other->to=$request->to;
            $appliciant_other->effective_date=$request->date;
            $appliciant_other->save();

            $status=200;
            $message="Other education details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End other------------------------------------------------------------------------------------------------------------------------

    //start pro----------------------------------------------------------------------------------------------------------------------
    public function fetchProfessional(Request $req){
        $pro = DB::table('appliciant_professional_qualifications')
            ->leftjoin('users', 'users.id', '=', 'appliciant_professional_qualifications.id')
            ->select('appliciant_professional_qualifications.*')
            ->where('appliciant_professional_qualifications.appliciant_id',$req->application_id)
            ->get();

        return response()->json([
            'professional_data'=>$pro
        ]);
    }

    public function addProfessional(Request $request){
        $validator = Validator::make($request->all(), [
            'institute'=>'required',
            'course'=>'required',
            'from'=>'required',
            'to'=>'required',
            'date'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_pro = new AppliciantProfessionalQualification;
            $appliciant_pro->appliciant_id=$request->application_id;;
            $appliciant_pro->institute=$request->institute;
            $appliciant_pro->course=$request->course;
            $appliciant_pro->from=$request->from;
            $appliciant_pro->to=$request->to;
            $appliciant_pro->effective_date=$request->date;
            $appliciant_pro->save();

            $status=200;
            $message="Professional education details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End pro------------------------------------------------------------------------------------------------------------------------

    //start employment----------------------------------------------------------------------------------------------------------------------
    public function fetchEmployment(Request $req){
        $employment = DB::table('appliciant_employment_records')
            ->leftjoin('users', 'users.id', '=', 'appliciant_employment_records.id')
            ->select('appliciant_employment_records.*')
            ->where('appliciant_employment_records.appliciant_id',$req->application_id)
            ->get();

        return response()->json([
            'employment_data'=>$employment
        ]);
    }

    public function addEmployment(Request $request){
        $validator = Validator::make($request->all(), [
            'institute'=>'required',
            'post'=>'required',
            'from'=>'required',
            'to'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_pro = new AppliciantEmploymentRecord;
            $appliciant_pro->appliciant_id=$request->application_id;;
            $appliciant_pro->post=$request->post;
            $appliciant_pro->institute=$request->institute;
            $appliciant_pro->from=$request->from;
            $appliciant_pro->to=$request->to;
            $appliciant_pro->save();

            $status=200;
            $message="Employment details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End Employment------------------------------------------------------------------------------------------------------------------------

    //start occupation----------------------------------------------------------------------------------------------------------------------
    public function fetchOccupation(Request $req){
        $occ = DB::table('appliciant_present_occaptions')
            ->leftjoin('users', 'users.id', '=', 'appliciant_present_occaptions.id')
            ->select('appliciant_present_occaptions.*')
            ->where('appliciant_present_occaptions.appliciant_id',$req->application_id)
            ->get();

        return response()->json([
            'occ_data'=>$occ
        ]);
    }

    public function addOccupation(Request $request){
        $validator = Validator::make($request->all(), [
            'institute'=>'required',
            'post'=>'required',
            'salary'=>'required',
            'from'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_pro = new AppliciantPresentOccaption;
            $appliciant_pro->appliciant_id=$request->application_id;;
            $appliciant_pro->institute=$request->institute;
            $appliciant_pro->post=$request->post;
            $appliciant_pro->salary_drawn=$request->salary;
            $appliciant_pro->from_where=$request->from;
            $appliciant_pro->save();

            $status=200;
            $message="Occupation details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End occupation------------------------------------------------------------------------------------------------------------------------

    //start reference----------------------------------------------------------------------------------------------------------------------
    public function fetchReference(Request $req){
        $ref = DB::table('appliciant_references')
            ->leftjoin('users', 'users.id', '=', 'appliciant_references.id')
            ->select('appliciant_references.*')
            ->where('appliciant_references.appliciant_id',$req->application_id)
            ->get();

        return response()->json([
            'reference_data'=>$ref
        ]);
    }

    public function addReference(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'designation'=>'required',
            'address'=>'required',
            'telephone'=>'required'
        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_ref = new AppliciantReferences;
            $appliciant_ref->appliciant_id=$request->application_id;;
            $appliciant_ref->name=$request->name;
            $appliciant_ref->designation=$request->designation;
            $appliciant_ref->address=$request->address;
            $appliciant_ref->telephone=$request->telephone;
            $appliciant_ref->save();

            $status=200;
            $message="Reference details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }

    //add education details
    //Start appliciant ajax
    public function fetchSchoolAdd(){
        $data = DB::table('appliciant_school_attendeds')
            ->leftjoin('users', 'users.id', '=', 'appliciant_school_attendeds.id')
            ->select('appliciant_school_attendeds.*')
            ->where('appliciant_school_attendeds.appliciant_id',session('appliciant_id'))
            ->get();

        return response()->json([
            'data'=>$data,
        ]);
    }

    public function addSchoolAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'school'=>'required',
            'from'=>'required',
            'to'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_school = new AppliciantSchoolAttended;
            $appliciant_school->appliciant_id=session('appliciant_id');
            $appliciant_school->school=$request->school;
            $appliciant_school->from=$request->from;
            $appliciant_school->to=$request->to;
            $appliciant_school->save();

            $status=200;
            $message="School Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }

    //ol-----------------------------------------------------------------------------------------------------------------
    public function fetchOlAdd(){
        $ol1 = DB::table('appliciant_ol_examinations')
            ->leftjoin('users', 'users.id', '=', 'appliciant_ol_examinations.id')
            ->select('appliciant_ol_examinations.*')
            ->where('appliciant_ol_examinations.appliciant_id',session('appliciant_id'))
            ->where('appliciant_ol_examinations.shy',1)
            ->get();

        $ol2 = DB::table('appliciant_ol_examinations')
            ->leftjoin('users', 'users.id', '=', 'appliciant_ol_examinations.id')
            ->select('appliciant_ol_examinations.*')
            ->where('appliciant_ol_examinations.appliciant_id',session('appliciant_id'))
            ->where('appliciant_ol_examinations.shy',2)
            ->get();

        return response()->json([
            'ol1'=>$ol1,
            'ol2'=>$ol2
        ]);
    }


    public function addOlAdd(Request $request, $shy){
        $validator = Validator::make($request->all(), [
            'subject'=>'required',
            'grade'=>'required',
            'year'=>'required',
            'index'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_ol = new AppliciantOlExamination;
            $appliciant_ol->appliciant_id=session('appliciant_id');
            $appliciant_ol->subject=$request->subject;
            $appliciant_ol->grade=$request->grade;
            $appliciant_ol->year=$request->year;
            $appliciant_ol->index_no=$request->index;
            $appliciant_ol->shy=$shy;
            $appliciant_ol->save();

            $status=200;
            $message="School Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //o/l----------------------------------------------------------------------------------------------------------------------

    //start a/l----------------------------------------------------------------------------------------------------------------------
    public function fetchAlAdd(){
        $al = DB::table('appliciant_al_examinations')
            ->leftjoin('users', 'users.id', '=', 'appliciant_al_examinations.id')
            ->select('appliciant_al_examinations.*')
            ->where('appliciant_al_examinations.appliciant_id',session('appliciant_id'))
            ->get();

        return response()->json([
            'al_data'=>$al
        ]);
    }

    public function addAlAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'subject'=>'required',
            'grade'=>'required',
            'year'=>'required',
            'index'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_al = new AppliciantAlExamination;
            $appliciant_al->appliciant_id=session('appliciant_id');
            $appliciant_al->subject=$request->subject;
            $appliciant_al->grade=$request->grade;
            $appliciant_al->year=$request->year;
            $appliciant_al->index_no=$request->index;
            $appliciant_al->save();

            $status=200;
            $message="School a/l a subject Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End a/l------------------------------------------------------------------------------------------------------------------------

    //start university----------------------------------------------------------------------------------------------------------------------
    public function fetchUniversityAdd(){
        $al = DB::table('appliciant_university_education')
            ->leftjoin('users', 'users.id', '=', 'appliciant_university_education.id')
            ->select('appliciant_university_education.*')
            ->where('appliciant_university_education.appliciant_id',session('appliciant_id'))
            ->get();

        return response()->json([
            'university_data'=>$al
        ]);
    }

    public function addUniversityAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'institute'=>'required',
            'degree'=>'required',
            'year'=>'required',
            'class'=>'required',
            'date'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_university = new AppliciantUniversityEducation;
            $appliciant_university->appliciant_id=session('appliciant_id');
            $appliciant_university->institute=$request->institute;
            $appliciant_university->degree=$request->degree;
            $appliciant_university->class=$request->class;
            $appliciant_university->year=$request->year;
            $appliciant_university->effective_date=$request->date;
            $appliciant_university->save();

            $status=200;
            $message="University details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End University------------------------------------------------------------------------------------------------------------------------

    //start other----------------------------------------------------------------------------------------------------------------------
    public function fetchOtherAdd(){
        $other = DB::table('appliciant_other_education')
            ->leftjoin('users', 'users.id', '=', 'appliciant_other_education.id')
            ->select('appliciant_other_education.*')
            ->where('appliciant_other_education.appliciant_id',session('appliciant_id'))
            ->get();

        return response()->json([
            'other_data'=>$other
        ]);
    }

    public function addOtherAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'institute'=>'required',
            'course'=>'required',
            'from'=>'required',
            'to'=>'required',
            'date'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_other = new AppliciantOtherEducation;
            $appliciant_other->appliciant_id=session('appliciant_id');
            $appliciant_other->institute=$request->institute;
            $appliciant_other->course=$request->course;
            $appliciant_other->from=$request->from;
            $appliciant_other->to=$request->to;
            $appliciant_other->effective_date=$request->date;
            $appliciant_other->save();

            $status=200;
            $message="Other education details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End other------------------------------------------------------------------------------------------------------------------------

    //start pro----------------------------------------------------------------------------------------------------------------------
    public function fetchProfessionalAdd(){
        $pro = DB::table('appliciant_professional_qualifications')
            ->leftjoin('users', 'users.id', '=', 'appliciant_professional_qualifications.id')
            ->select('appliciant_professional_qualifications.*')
            ->where('appliciant_professional_qualifications.appliciant_id',session('appliciant_id'))
            ->get();

        return response()->json([
            'professional_data'=>$pro
        ]);
    }

    public function addProfessionalAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'institute'=>'required',
            'course'=>'required',
            'from'=>'required',
            'to'=>'required',
            'date'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_pro = new AppliciantProfessionalQualification;
            $appliciant_pro->appliciant_id=session('appliciant_id');
            $appliciant_pro->institute=$request->institute;
            $appliciant_pro->course=$request->course;
            $appliciant_pro->from=$request->from;
            $appliciant_pro->to=$request->to;
            $appliciant_pro->effective_date=$request->date;
            $appliciant_pro->save();

            $status=200;
            $message="Professional education details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End pro------------------------------------------------------------------------------------------------------------------------

    //start employment----------------------------------------------------------------------------------------------------------------------
    public function fetchEmploymentAdd(){
        $employment = DB::table('appliciant_employment_records')
            ->leftjoin('users', 'users.id', '=', 'appliciant_employment_records.id')
            ->select('appliciant_employment_records.*')
            ->where('appliciant_employment_records.appliciant_id',session('appliciant_id'))
            ->get();

        return response()->json([
            'employment_data'=>$employment
        ]);
    }

    public function addEmploymentAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'institute'=>'required',
            'post'=>'required',
            'from'=>'required',
            'to'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_pro = new AppliciantEmploymentRecord;
            $appliciant_pro->appliciant_id=session('appliciant_id');
            $appliciant_pro->post=$request->post;
            $appliciant_pro->institute=$request->institute;
            $appliciant_pro->from=$request->from;
            $appliciant_pro->to=$request->to;
            $appliciant_pro->save();

            $status=200;
            $message="Employment details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End Employment------------------------------------------------------------------------------------------------------------------------

    //start occupation----------------------------------------------------------------------------------------------------------------------
    public function fetchOccupationAdd(){
        $occ = DB::table('appliciant_present_occaptions')
            ->leftjoin('users', 'users.id', '=', 'appliciant_present_occaptions.id')
            ->select('appliciant_present_occaptions.*')
            ->where('appliciant_present_occaptions.appliciant_id',session('appliciant_id'))
            ->get();

        return response()->json([
            'occ_data'=>session('appliciant_id')
        ]);
    }

    public function addOccupationAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'institute'=>'required',
            'post'=>'required',
            'salary'=>'required',
            'from'=>'required'

        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_pro = new AppliciantPresentOccaption;
            $appliciant_pro->appliciant_id=session('appliciant_id');
            $appliciant_pro->institute=$request->institute;
            $appliciant_pro->post=$request->post;
            $appliciant_pro->salary_drawn=$request->salary;
            $appliciant_pro->from_where=$request->from;
            $appliciant_pro->save();

            $status=200;
            $message="Occupation details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //End occupation------------------------------------------------------------------------------------------------------------------------

    //start reference----------------------------------------------------------------------------------------------------------------------
    public function fetchReferenceAdd(){
        $ref = DB::table('appliciant_references')
            ->leftjoin('users', 'users.id', '=', 'appliciant_references.id')
            ->select('appliciant_references.*')
            ->where('appliciant_references.appliciant_id',session('appliciant_id'))
            ->get();

        return response()->json([
            'reference_data'=>$ref
        ]);
    }

    public function addReferenceAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'designation'=>'required',
            'address'=>'required',
            'telephone'=>'required'
        ]);

        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }
        else{

            $appliciant_ref = new AppliciantReferences;
            $appliciant_ref->appliciant_id=session('appliciant_id');
            $appliciant_ref->name=$request->name;
            $appliciant_ref->designation=$request->designation;
            $appliciant_ref->address=$request->address;
            $appliciant_ref->telephone=$request->telephone;
            $appliciant_ref->save();

            $status=200;
            $message="Reference details Adding Sucessfully";


        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }
    //end add education details

    public function Signup(Request $req){

        if (User::where('email', $req->email)->exists()) {
            $message = "Email is already exist!";
            $status = 400;
            //return back();

            //return Redirect::back()->withErrors(['Failure' => $message]);
            return response()->json([
                'status'=>$status,
                'message'=>$message
            ]);
        }

        if(!$req->password){
            $user = new User();
            $user->name=$req->username;
            $user->email=$req->email;
            $user->password=$req->password;
            $user->save();

            //return back();
            //return Redirect::back()->withErrors(['Failure' => "Created account successfully!"]);

            // $usertable=DB::table('users')
            //     ->where('email', '=', $req->email)
            //     ->get();

            // Session::put('temp_user_email',$req->email);
            // Session::put('temp_user_name',$req->username);
            // Session::put('temp_user_id',$usertable[0]->id);
            // Session::save();

            // $designations = DB::table('designations')
            // ->select('*')
            // ->get();

            // $applied_designations = DB::table('appliciants')
            //     ->leftjoin('designations', 'appliciants.designation_id', '=', 'designations.designation_id')
            //     ->select('designation_name')
            //     ->where('email', session('temp_user_email'))
            //     ->get();

            // return view('appliciant.index',compact('designations','applied_designations'));
            return redirect('/');
        }

    }
    //End reference------------------------------------------------------------------------------------------------------------------------




    public function DeleteAppliciantItem(Request $request){
        $validator = Validator::make($request->all(), [
            'id'=>'required',
            'table'=>'required'
        ]);
        if($validator->fails()){

            $status = 400;
            $message = "Validated error! Required fields missed!";
        }

        else{
            DB::table($request->table)->where('id', $request->id)->delete();

            $status=200;
            $message="Item Deleted Sucessfully!";
        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);
    }
    //end appliciant table------------------------------------------------------------------------------------------------------


    //End appliciant ajax
}
