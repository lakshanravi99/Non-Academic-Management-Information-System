<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\personalfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
class PersonalFileController extends Controller
{

    function personalfilee(){

        if(session('emp_id')){
            Session::put('index', '');
            Session::put('manage', '');
            Session::put('manageemployee', '');
            Session::put('employee','');
            Session::put('request','');
            Session::put('complain', '');
            Session::put('rave', '');
            Session::put('notice', '');
            Session::put('social','');
            Session::put('mobile','');
            Session::put('recruitment','');
            Session::put('personal','side-menu--active');
            Session::put('leave','');
            Session::save();
            $notice = DB::table('notices')
                ->get();

            $count = DB::table('personalfiles')
                ->select('filetype', DB::raw('count(*) as total'))
                ->groupBy('filetype')
//                ->where(['filetype' => 'Duty'])
                ->get();

            foreach ($count as $ap){
                if ($ap->filetype == 'Appoiment'){
                    $appoiment = $ap->total;
                }else if($ap->filetype == 'Promotion'){
                    $promotion = $ap->total;
                }else if($ap->filetype == 'Increment'){
                    $increments = $ap->total;
                }else if($ap->filetype == 'PoliceReport'){
                    $PoliceReport = $ap->total;
                }else if($ap->filetype == 'Secret'){
                    $Secret = $ap->total;
                }else if($ap->filetype == 'Confidential'){
                    $Confidential = $ap->total;
                }else if($ap->filetype == 'Duty'){
                    $Duty = $ap->total;
                }else if($ap->filetype == 'Other'){
                    $other = $ap->total;
                }
            }
            return view('admin.personalfile.adminPersonalFile',compact('notice','appoiment','Duty','Confidential','promotion','Secret','other','PoliceReport','increments'));
        }
    }
    function pfappoiment(){
        if (session('emp_id')){
            Session::put('filetype','Appoiment');
            Session::put('bar','Appoiment Letter');
            Session::save();
            $employee =employee::orderBy("emp_id","asc")->get();
            $fileselect = personalfile::where([
//                'emp_id' => 'NA001',
                'filetype' => session('filetype')
            ])->get();
            $filetypes = DB::table('personalfile_types')
                ->get();

            return view('admin.personalfile.pfappoimentletter',compact('employee','fileselect','filetypes'));
        }else{
            return back();
        }
    }
    function pfpromotion(){
        if (session('emp_id')){
            Session::put('filetype','Promotion');
            Session::put('bar','Promotion Letter');
            Session::save();
            $employee =employee::orderBy("created_at","asc")->get();
            $fileselect = personalfile::where([
//                'emp_id' => 'NA001',
                'filetype' => session('filetype')
            ])->get();
            $filetypes = DB::table('personalfile_types')
                ->get();

            return view('admin.personalfile.pfappoimentletter',compact('employee','fileselect','filetypes'));
        }else{
            return back();
        }
    }
    function pfincrements(){
        if (session('emp_id')){
            Session::put('filetype','Increment');
            Session::put('bar','Increment Letter');
            Session::save();
            $employee =employee::orderBy("created_at","asc")->get();
            $fileselect = personalfile::where([
//                'emp_id' => 'NA001',
                'filetype' => session('filetype')
            ])->get();
            $filetypes = DB::table('personalfile_types')
                ->get();

            return view('admin.personalfile.pfappoimentletter',compact('employee','fileselect','filetypes'));
        }else{
            return back();
        }
    }
    function pfPoliceReport(){
        if (session('emp_id')){
            Session::put('filetype','PoliceReport');
            Session::put('bar','Police Report');
            Session::save();
            $employee =employee::orderBy("created_at","asc")->get();
            $fileselect = personalfile::where([
//                'emp_id' => 'NA001',
                'filetype' => session('filetype')
            ])->get();
            $filetypes = DB::table('personalfile_types')
                ->get();

            return view('admin.personalfile.pfappoimentletter',compact('employee','fileselect','filetypes'));
        }else{
            return back();
        }
    }
    function pfSecretReport(){
        if (session('emp_id')){
            Session::put('filetype','Secret');
            Session::put('bar','Secret Report');
            Session::save();
            $employee =employee::orderBy("created_at","asc")->get();
            $fileselect = personalfile::where([
//                'emp_id' => 'NA001',
                'filetype' => session('filetype')
            ])->get();
            $filetypes = DB::table('personalfile_types')
                ->get();

            return view('admin.personalfile.pfappoimentletter',compact('employee','fileselect','filetypes'));
        }else{
            return back();
        }
    }
    function pfConfidential(){
        if (session('emp_id')){
            Session::put('filetype','Confidential');
            Session::put('bar','Confidential Letter');
            Session::save();
            $employee =employee::orderBy("created_at","asc")->get();
            $fileselect = personalfile::where([
//                'emp_id' => 'NA001',
                'filetype' => session('filetype')
            ])->get();
            $filetypes = DB::table('personalfile_types')
                ->get();

            return view('admin.personalfile.pfappoimentletter',compact('employee','fileselect','filetypes'));
        }else{
            return back();
        }
    }
    function pfDutyAssumeLetter(){
        if (session('emp_id')){
            Session::put('filetype','Duty');
            Session::put('bar','Duty Assume Letter ');
            Session::save();
            $employee =employee::orderBy("created_at","asc")->get();
            $fileselect = personalfile::where([
//                'emp_id' => 'NA001',
                'filetype' => session('filetype')
            ])->get();
            $filetypes = DB::table('personalfile_types')
                ->get();
            return view('admin.personalfile.pfappoimentletter',compact('employee','fileselect','filetypes'));
        }else{
            return back();
        }
    }
    function pfOther(){
        if (session('emp_id')){
            Session::put('filetype','Other');
            Session::put('bar','Other Report');
            Session::save();
            $employee =employee::orderBy("created_at","asc")->get();
            $fileselect = personalfile::where([
//                'emp_id' => 'NA001',
                'filetype' => session('filetype')
            ])->get();
            $filetypes = DB::table('personalfile_types')
                ->get();

            return view('admin.personalfile.pfappoimentletter',compact('employee','fileselect','filetypes'));
        }else{
            return back();
        }
    }



    function selectemployeedetail($id){
        if (session('emp_id')){
            $employee =employee::orderBy("emp_id","asc")->get();
            $file =personalfile::where('filetype','=','Appoiment')->get();
            $fileselect = personalfile::where([
                'emp_id' => $id,
                'filetype' => session('filetype')
            ])->get();
            return view('admin.personalfile.pfappoimentletter',compact('employee','file','fileselect'));

        }
    }
    public function readPDFs($f){
        if(session('emp_id')){
            $file = $f;
            return view('admin.personalfile.openpdf',compact('file'));
        }else{
            return back();
        }
    }
    function downloadPDFs($file){
        if (session('emp_id')){
            return response()->download(public_path('/personalfile/'.$file));

        }else{
            return back();
        }

    }
    function deletePDF($id){
        if (session('emp_id')){
            personalfile::where('id', '=', $id)->delete();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Deleted Personal File,']);
        }else{
            return back();
        }

    }
    function uploadpersonalfile(Request $req){
        if (session('emp_id')){
            $employee =employee::orderBy("created_at","asc")
                ->where('emp_id','=',$req->emp_id)
                ->get();
            if (empty($employee[0]->emp_id)){
                return Redirect::back()->withErrors(['msg' => 'Please Enter Correct Employee ID, Try Again Upload Personal File']);
            }else{
                $req->validate([
                    'emp_id'=>'required|min:5',
                    'picture'=>'required',
                    'description'=>'required|min:5'
                ]);
                $personalfile = new personalfile;
                $personalfile->emp_id = $req->emp_id;
                $personalfile->description = $req->description;
                $personalfile->filetype = $req->filtype;
                $image = time() . "." . $req->picture->extension();
                $personalfile->file =$image;
                $req->picture->move(public_path('/personalfile/'), $image);
                $personalfile->save();
                return Redirect::back()->withErrors(['sucess' => 'Successfully Added Personal File,']);
        }



        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again Upload Personal File']);
        }
    }
}
