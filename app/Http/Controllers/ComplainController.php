<?php

namespace App\Http\Controllers;
use App\Models\Complain;
use App\Models\UserType;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
 function show(){
     if(session('emp_id')){
         Session::put('index', '');
         Session::put('manage', '');
         Session::put('manageemployee', '');
         Session::put('employee','');
         Session::put('request','');
         Session::put('complain', 'side-menu--active');
         Session::put('rave', '');
         Session::put('notice', '');
         Session::put('social','');
         Session::put('mobile','');
         Session::put('personal','');
         Session::put('leave','');
         Session::save();
//         $data=Complain::orderBy("created_at","desc")
//             ->get();
         $data=DB::table('employees')
             ->crossJoin('complains')
             ->select('complains.*', 'employees.place')
             ->where('employees.place','=',session('place'))
             ->where('employees.emp_id','=',DB::raw('complains.emp_id'))
             ->get();
         $usertypesfresh=UserType::orderBy("created_at","desc")->get();

         return view('complain', compact('data','usertypesfresh'));


     }else{
         return back();
     }
     }

     function admindeletecomplain($id){
         if (session('emp_id')){
             Complain::where('complain_id', '=', $id)->delete();
             return Redirect::back()->withErrors(['sucess' => 'Successfully Deleted Complain,']);
         }else{
             return Redirect::back()->withErrors(['msg' => 'Failure: Try Again Delete Complain']);
         }

     }
}
