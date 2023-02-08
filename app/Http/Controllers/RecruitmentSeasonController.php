<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentSeason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Pusher\Pusher;

class RecruitmentSeasonController extends Controller
{
    // Ajax
    public function selectSeason(Request $request){
        $validator = Validator::make($request->all(), [
            'selected_season'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                //'errors'=>$validator->messages(),
                'message'=>"require field missing",
            ]);
        }
        else{
            $find = DB::table('recruitment_seasons')
                ->select('id')
                ->where('id', $request->input('selected_season'))
                ->get();

            

            if ($find) {
                $reset = RecruitmentSeason::where('currently_active', '=', 1)->update(
                    array(
                        'currently_active' => 0
                    )
                );

                $update = RecruitmentSeason::where('id', '=', $request->input('selected_season'))->update(
                    array(
                        'currently_active' => 1
                    )
                );

                $season_q = DB::table('recruitment_seasons')
                ->select('*')
                ->where('currently_active', 1)
                ->get();
                $season=$season_q[0]->season;
                $request->session()->put('current_season',$season_q[0]->id);

                return response()->json([
                    'status'=>200,
                    'message'=>'Seted!.',
                    'season'=>$season,
                    'sea_id'=>$season_q[0]->id,
                    'sess'=>session('current_season')
                ]);
            }
        }
    }

    public function fetchSeason(){
        $data = DB::table('recruitment_seasons')
            ->select('*')
            ->get();

        $currently_active = DB::table('recruitment_seasons')
            ->select('currently_active')
            ->where('currently_active', 1)
            ->get();

        return response()->json([
            'data'=>$data,
            'currently_active'=>$currently_active
        ]);

    }

    public function deleteSeason($id)
    {
        //$deleted = DB::table('appliciant_tests')->where('test_id', '=', $id)->delete();
        $deleted = RecruitmentSeason::where('id', '=', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Season Deleted Successfully.'
        ]);

    }

    public function editSeason($id){
        $check_id = DB::table('recruitment_seasons')
            ->select('id')
            ->where('id', $id)
            ->get();

        if($check_id){
            $details = DB::table('recruitment_seasons')
                ->select('*')
                ->where('id', $id)
                ->get();

            return response()->json([
                'status'=>200,
                'details'=>$details,
                'message'=>'Sucess',
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Mark Not Found',
            ]);
        }
    }

    public function checkSeason(){
        return response()->json([
            'season'=>session('current_season')
        ]);
    }

    public function updateSeason(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'new_season'=>'required|max:191',
            'new_start_date'=>'required|max:191',
            'new_end_date'=>'required'

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                //'errors'=>$validator->messages(),
                'message'=>"require field missing",
            ]);
        }
        else{
            $find = DB::table('recruitment_seasons')
                ->select('id')
                ->where('id', $id)
                ->get();

            if ($find) {
                $update = RecruitmentSeason::where('id', '=', $id)->update(
                    array(
                        'season' => $request->input('new_season'),
                        'start_date' => $request->input('new_start_date'),
                        'end_date' => $request->input('new_end_date'),
                        'edit_status' => 1,
                        'updated_by' => session('user_id')
                    )
                );
            }
        }
    }


    public function AddSeason(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'season'=>'required',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'message'=>"Validated error! Required fields missed!"
                //'errors'=>$validator->messages(),
            ]);
        }
        else{
            $season = new RecruitmentSeason;
            $season->season=$request->season;
            $season->start_date=$request->start_date;
            $season->end_date=$request->end_date;
            $season->created_by=session('user_id');
            $season->save();

            return response()->json([
                'status'=>200,
                'message'=>"Season adding Sucessfull!",

            ]);
        }

    }

    //End ajax
}
