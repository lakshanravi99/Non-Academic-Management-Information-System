<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class NoticeController extends Controller
{
    function notice(){
        if (session('emp_id')){
            Session::put('index', '');
            Session::put('manage', '');
            Session::put('employee','');
            Session::put('request','');
            Session::put('complain', '');
            Session::put('rave', '');
            Session::put('social','');
            Session::put('recruitment','');
            Session::put('mobile','');
            Session::put('notice','side-menu--active');
            Session::put('personal','');
            Session::put('leave','');
            Session::put('attedance','');
            Session::put('manageemployee','');
            Session::save();
            $usertypesfresh = UserType::orderBy("created_at", "desc")->get();
            $usertypes = DB::table('user_types')
                ->get();
            $fileselect = DB::table('notices')
                ->OrderBy("created_at", "desc")
                ->get();
            return view('admin.Notice.notice',compact('usertypes','fileselect','usertypesfresh'));
        }
    }
    function selectnoticebytype($id){
        if (session('emp_id')){
            $usertypesfresh = UserType::orderBy("created_at", "desc")->get();
            $usertypes =UserType::orderBy("created_at","asc")->get();
            $fileselect =Notice::where('access','=',$id)
                ->OrderBy("created_at", "desc")
                ->get();

            return view('admin.Notice.notice',compact('usertypes','fileselect','usertypesfresh'));

        }

    }
    function readNOTICEs($f){
        if(session('emp_id')){
            $file = $f;
            return view('admin.Notice.opennoticepdf',compact('file'));
        }else{
            return back();
        }
    }
    function deleteNOTICE($id){
        if (session('emp_id')){
            Notice::where('id', '=', $id)->delete();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Deleted Notice,']);
        }else{
            return Redirect::back()->withErrors(['msg' => 'Delete Failure, Try Again ']);
        }

    }
    function downloadNotice($file){
        if (session('emp_id')){
//            return response()->download(public_path('/notice/'.$file));
            $headers = ['Content-Type: application/pdf'];

            return Response::download('', $file, $headers);

        }else{
            return back();
        }

    }
    function uploadnewnotice(Request $req){
        if (session('emp_id')){
            $fileselect = DB::table('allusers')
                ->select('usertype')
                ->where('emp_id', '=',session('emp_id') )
                ->get();
            $type= $fileselect[0]->usertype;

            $notice = new Notice;
            $notice->emp_id = $req->empid;
            $notice->usertype = $type;
            $notice->access = $req->access;
            $notice->text = $req->description;
            $image = time() . "." . $req->picture->extension();
            $notice->file =$image;
            $req->picture->move(public_path('/notice/'), $image);
            $notice->save();
            return Redirect::back()->withErrors(['sucess' => 'Successfully Added Notice,']);

        }else{
            return Redirect::back()->withErrors(['msg' => 'Failure: Try Again Upload Personal File']);
        }
    }

}
