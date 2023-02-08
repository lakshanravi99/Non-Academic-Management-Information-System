<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\Rave;
use App\Models\rave_comments;
use App\Models\RaveComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class RaveController extends Controller
{
    public function rave(){
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('rave', 'side-menu--active');
        Session::put('recruitment', '');
        Session::put('social','');
        Session::put('mobile','');
        Session::put('notice','');
        Session::put('personal','');
        Session::put('leave','');
        Session::save();

        $data=DB::table('employees')
            ->where('emp_id','!=',session('emp_id'))
            ->select('*')->get();

//        $data1=DB::table('rave_comments')
//            ->where('rave_comments.from_id' ,'=', 'employees.emp_id')
//            ->get();
        $data1=DB::table('rave_comments')
            ->get();
        $pic=DB::table('employees')
            ->get();

        $data2=DB::table('employees')
            ->leftJoin('rave_comments' , 'rave_comments.from_id', '=', 'employees.emp_id')
            ->select('employees.*', 'rave_comments.*')
            ->get();

        $ratesum = DB::table('raves')
            ->where('rate_to', '=', session('emp_id'))
            ->sum('rate_count');

        $checkusers=DB::table('raves')
            ->select('rate_count')
            ->where('rate_to', '=', session('emp_id'))
            ->get();


        $countrecords = count($checkusers);

        $final_rate = number_format($ratesum/$countrecords);

        return view('backend.user.rave_view',compact('data','data1','data2','final_rate','pic') );
    }

//    public function RecentComments(){
//        $dataCom['comment']=DB::table('rave_comments')
//            ->select('*')->get();
//
//        return view('backend.user.rave_view', $dataCom );
//    }

    function SendRaveComment(Request $req){

        if (session('emp_id')){
            $stars = 5;
            $rave = new rave_comments();
            $rave->content = $req->comment;
            $rave->from_id = $req->emp_id;
            $rave->to_id = $req->too;
            $data=DB::table('employees')
                ->select('emp_id')->get();
            $empcount = count($data);
            $rate = $stars/$empcount;
            $rave->save();
            return back();

        }else{

            return back();
        }


    }

    function storeRating(Request $req){
        if (session('emp_id')){
            $checkusers=DB::table('raves')
                ->select('rate_count')
                ->where('rate_to', '=', $req->rate_to)
                ->where('emp_id', '=', $req->emp_id)
                ->get();

            $countrecords = count($checkusers);
            if ($countrecords>0){
                $update_count = DB::table('raves')
                    ->where('rate_to', '=', $req->rate_to)
                    ->where('emp_id', '=', $req->emp_id)
                    ->update(['rate_count' => $req->value]);


            }else{
                $rave = new Rave();
                $rave->emp_id = $req->emp_id;
                $rave->rate_count = $req->value;
                $rave->rate_to = $req->rate_to;
                $rave->save();
                return $countrecords;
            }




        }else{
            return back();
        }
    }
}
