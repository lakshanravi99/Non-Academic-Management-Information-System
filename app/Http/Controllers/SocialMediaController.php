<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\employee;
use App\Models\post;
use App\Models\reaction;
use App\Models\SocialMediaNotification;
use App\Models\socialmediaprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;




class SocialMediaController extends Controller
{
    function begin(){
        if(session('emp_id')){
            Session::put('index', '');
            Session::put('manage', '');
            Session::put('employee','');
            Session::put('request','');
            Session::put('complain', '');
            Session::put('rave', '');
            Session::put('leave', '');
            Session::put('social','side-menu--active');
            Session::put('mobile','');
            Session::save();

            //loading posts-----------------------------------------------------------------------------------------------------
            $data=Post::orderBy("updated_at","desc")->get();

            $id= DB::table('posts')
                ->select('id')
                ->orderBy('id','asc')
                ->get();


            $index = 0;
            $myArray = array();
            for($index; $index<count($id); $index++){
                $got_id = $id[$index]->id;


                $count_q = DB::table('reactions')
                    ->select('post_id')
                    ->where('post_id', '=',$got_id)
                    ->get();
                $count=$count_q->count();



            }


            //load employee row
            $employeerow = DB::table('employees')
                ->where('emp_id', '=',session('emp_id') )
                ->get();
            //load employee table
            $employeeall=employee::orderBy("created_at","desc")->get();

            //loading comments
            $comments=Comment::orderBy("updated_at","desc")->get();
            //count comments
//        SELECT post_id,COUNT(post_id) FROM `comments` GROUP BY post_id;
            $commentCount = DB::table('comments')
                ->select('post_id', DB::raw('count(*) as total'))
                ->groupBy('post_id')
                ->get();
//count reactions
            $reactCount = DB::table('reactions')
                ->select('post_id', DB::raw('count(*) as total'))
                ->groupBy('post_id')
                ->get();
            //load reactors
            $reactors = DB::table('reactions')
                ->where('emp_id','=',session('emp_id'))
                ->get();



            //load notofications
            $notifi = DB::table('social_media_notifications')
                ->where('to_people','=',session('emp_id'))
                ->orderBy('created_at','desc')
                ->get();


            //load socialprofile table
            $socpro = DB::table('socialmediaprofiles')
                ->where('emp_id', '=',session('emp_id') )
                ->get();
            //make sessions for social media user side
            $dp=$socpro[0]->profilepic;
            $bio=$socpro[0]->bio;
            $username=$socpro[0]->username;
            $name=$socpro[0]->name;
            $socpostcount=$socpro[0]->postcount;
            $socemail=$socpro[0]->email;
            $socinsta=$socpro[0]->insta;
            $soctwitter=$socpro[0]->twitter;

            Session::put('socpropic',$dp);
            Session::put('socbio',$bio);
            Session::put('socusername',$username);
            Session::put('socname',$name);
            Session::put('socpostcount',$socpostcount);
            Session::put('socemail',$socemail);
            Session::put('socinsta',$socinsta);
            Session::put('soctwitter',$soctwitter);
            Session::save();


            return view('socialmedia',compact('data','employeeall','commentCount','reactCount','comments','reactors','notifi','myArray'));
//        return view('socialmedia','data');


        }else{
            return back();
        }
         }
//load addpost page
    function addpost(){
        if(session('emp_id')){
            //load notofications
            $notifi = DB::table('social_media_notifications')
                ->where('to_people','=',session('emp_id'))
                ->get();
            return view('addpost',compact('notifi'));
        }else{
            return back();
        }

    }
    //uplooad post
    function savepost(Request $req){
        if(session('emp_id')){
            if ($req->picture){
                $post = new post();
                $post->title = $req->title;
                $post->location = $req->location;
                $post->description = $req->description;
                $post->fname = session('usernamee');
                $post->emp_id = session('emp_id');

                $image = time(). ".".$req->picture->extension();
                $post->picture = $image;
                $req->picture->move(public_path('/'),$image);

                $post->save();
                return Redirect::route('social')->withErrors(['sucess' => 'Successfully Added Post,']);
                return redirect()->route('social');
            }else{
                $post = new post();
                $post->title = $req->title;
                $post->location = $req->location;
                $post->description = $req->description;
                $post->fname = session('usernamee');
                $post->emp_id = session('emp_id');


                $post->save();
                return Redirect::route('social')->withErrors(['sucess' => 'Successfully Added Post,']);
                return redirect()->route('social');

            }



        }else{
            return back();
        }

    }

    //upload comment
    function saveComment(Request $req){
        if(session('emp_id')){
            $pid = $req->post_id;
            $savecom = new Comment();
            $savecom->text = $req->text;
            $savecom->emp_id = session('emp_id');
            $savecom->post_id = $req->post_id;
            $savecom->save();
            $pid = $req->post_id;
//            $pcount = post::select("comment_count")
//                ->where("id", "=", $pid)
//                ->first();
//
//            $pp = $pcount+1;
//            dd($pp);
//            $affected = DB::table('posts')
//                ->where('id', $req->postid)
//                ->update(['comment_count' => $pp,]);
            $notify = new SocialMediaNotification();
            $notify->text = 'Commented on your'.' '.$req->post_title .' photo';
            $notify->pic_people = session('propic');
            $notify->to_people = $req->to_people;
            $notify->did_people = session('usernamee');

            $notify->save();
            $justnowtime = Carbon::now();
            $affected = DB::table('posts')
                ->where('id', $req->post_id)
                ->update(['updated_at'=> $justnowtime]);

            return back();

        }else{
            return back();
        }

    }
    //edit post
    function usereditpost($postid){
        $posts = DB::table('posts')
            ->where('id', '=',$postid )
            ->get();
        //load notofications
        $notifi = DB::table('social_media_notifications')
            ->where('to_people','=',session('emp_id'))
            ->get();
        return view('user.usersocialmediaeditpost',compact('posts','notifi'));
    }

    //react store
    function storereact(Request $req){

        $find = DB::table('reactions')
            ->where('emp_id', '=',session('emp_id') )
            ->where('post_id', '=',$req->react_id)
            ->get();

        if(count($find)>0){

            $data = reaction::where([
                'emp_id' => session('emp_id'),
                'post_id' => $req->react_id,
            ])->delete();
            $like="false";

//            $justnowtime = Carbon::now();
//            $check = $find = DB::table('reactions')
//                ->where('post_id', '=',$req->react_id)
//                ->where('emp_id', '=',session('emp_id'))
//                ->get();
//
            $current_count = $find = DB::table('posts')
                ->select('react_count')
                ->where('id', '=',$req->react_id)
                ->get();

            $update_count = DB::table('posts')
                ->where('id', '=',$req->react_id)
                ->update(['react_count' => $current_count[0]->react_count-1]);

        }
        else{
            $react = new reaction;
            $react->emp_id=session('emp_id');
            $react->post_id=$req->react_id;
            $react->save();
            $like="true";

            $justnowtime = Carbon::now();

            $current_count = $find = DB::table('posts')
                ->select('react_count')
                ->where('id', '=',$req->react_id)
                ->get();


            $update_count = DB::table('posts')
                ->where('id', '=',$req->react_id)
                ->update(['react_count' => $current_count[0]->react_count+1]);

        }

        $count_q = DB::table('reactions')
            ->select('post_id')
            ->where('post_id', '=',$req->react_id)
            ->get();
        $count=$count_q->count();

        $post_react_count = $find = DB::table('posts')
            ->select('react_count')
            ->where('id', '=',$req->react_id)
            ->get();

        return response()->json([
            'data'=>$find,
            'like'=>$like,
            'count'=>$count,
            'post_react_count'=>$post_react_count[0]->react_count
        ]);

    }
    function editpostsavebyuser(Request $req){
        if(session('emp_id')) {
            if ($req->picture){
                $postid = $req->postid;
                $title = $req->title;
                $location = $req->location;
                $description = $req->description;

                $image = time() . "." . $req->picture->extension();
                $pic = $image;
                $req->picture->move(public_path('/'), $image);

                $justnowtime = Carbon::now();
                $affected = DB::table('posts')
                    ->where('id', $postid)
                    ->update(['title' => $title, 'location' => $location, 'description' => $description, 'picture' => $pic,'updated_at'=> $justnowtime]);

                return Redirect()->route('social')->withErrors(['sucess' => 'Successfully Updated Post,']);
            }else{
                $postid = $req->postid;
                $title = $req->title;
                $location = $req->location;
                $description = $req->description;


                $justnowtime = Carbon::now();
                $affected = DB::table('posts')
                    ->where('id', $postid)
                    ->update(['title' => $title, 'location' => $location, 'description' => $description, 'updated_at'=> $justnowtime]);
                return Redirect()->route('social');

            }

        }else{
            return back();
        }

    }
    function socialmediaprofile(){
        $postsforpro = DB::table('posts')
            ->where('emp_id', '=',session('emp_id') )
            ->get();
        $profile = DB::table('socialmediaprofiles')
            ->where('emp_id', '=',session('emp_id') )
            ->get();
        $postsforprocount = DB::table('posts')
            ->where('emp_id', '=',session('emp_id') )
            ->get()->count();
        //load notofications
        $notifi = DB::table('social_media_notifications')
            ->where('to_people','=',session('emp_id'))
            ->orderBy('created_at','desc')
            ->get();


        return view('user.socialmediaprofile',compact('postsforpro','profile','postsforprocount','notifi'));
    }
    function removepropic(){
        if (session('emp_id')){
            session()->pull('socpropic');
            Session::put('socpropic','noimage.jpg');
            Session::save();

            $affected = DB::table('socialmediaprofiles')
                ->where('emp_id', session('emp_id'))
                ->update(['profilepic' => 'noimage.jpg']);
            $postsforpro = DB::table('posts')
                ->where('emp_id', '=',session('emp_id') )
                ->get();
            $profile = DB::table('socialmediaprofiles')
                ->where('emp_id', '=',session('emp_id') )
                ->get();
            $postsforprocount = DB::table('posts')
                ->where('emp_id', '=',session('emp_id') )
                ->get()->count();
            return Redirect::route('socialmediaprofile',compact('postsforpro','profile','postsforprocount'))->withErrors(['sucess' => 'Successfully Removed Profile Picture,']);




        }else{
            return back();
        }
    }

    function updateprofile(Request $req){
        if (session('emp_id')){
            if ($req->picture){
                $image = time() . "." . $req->picture->extension();
                $pic = $image;
                $req->picture->move(public_path('/'), $image);

                $bio = $req->bio;
                $username = $req->username;
                $name = $req->name;
                $email = $req->email;
                $instagram = $req->insta;
                $twitter = $req->twitter;

                $affected = DB::table('socialmediaprofiles')
                    ->where('emp_id', session('emp_id'))
                    ->update(['profilepic' => $pic, 'bio' => $bio, 'username' => $username, 'name' => $name, 'email' => $email,'insta' => $instagram,'twitter' => $twitter]);
                session()->pull('socpropic');
                session()->pull('socbio');
                session()->pull('socusername');
                session()->pull('socname');
                session()->pull('socemail');
                session()->pull('socinsta');
                session()->pull('soctwitter');


                Session::put('socpropic',$pic);
                Session::put('socbio',$bio);
                Session::put('socusername',$username);
                Session::put('socname',$name);
                Session::put('socemail',$email);
                Session::put('socinsta',$instagram);
                Session::put('soctwitter',$twitter);
                Session::save();

                $postsforpro = DB::table('posts')
                    ->where('emp_id', '=',session('emp_id') )
                    ->get();
                $profile = DB::table('socialmediaprofiles')
                    ->where('emp_id', '=',session('emp_id') )
                    ->get();
                $postsforprocount = DB::table('posts')
                    ->where('emp_id', '=',session('emp_id') )
                    ->get()->count();
                return Redirect::route('socialmediaprofile',compact('postsforpro','profile','postsforprocount'))->withErrors(['sucess' => 'Successfully Updated Profile,']);
                return Redirect()->route('socialmediaprofile');

            }else{
                $bio = $req->bio;
                $username = $req->username;
                $name = $req->name;
                $email = $req->email;
                $instagram = $req->insta;
                $twitter = $req->twitter;

                $affected = DB::table('socialmediaprofiles')
                    ->where('emp_id', session('emp_id'))
                    ->update([ 'bio' => $bio, 'username' => $username, 'name' => $name, 'email' => $email,'insta' => $instagram,'twitter' => $twitter]);
                session()->pull('socbio');
                session()->pull('socusername');
                session()->pull('socname');
                session()->pull('socemail');
                session()->pull('socinsta');
                session()->pull('soctwitter');

                Session::put('socbio',$bio);
                Session::put('socusername',$username);
                Session::put('socname',$name);
                Session::put('socemail',$email);
                Session::put('socinsta',$instagram);
                Session::put('soctwitter',$twitter);
                Session::save();
                $postsforpro = DB::table('posts')
                    ->where('emp_id', '=',session('emp_id') )
                    ->get();
                $profile = DB::table('socialmediaprofiles')
                    ->where('emp_id', '=',session('emp_id') )
                    ->get();
                $postsforprocount = DB::table('posts')
                    ->where('emp_id', '=',session('emp_id') )
                    ->get()->count();
                return Redirect::route('socialmediaprofile',compact('postsforpro','profile','postsforprocount'))->withErrors(['sucess' => 'Successfully Updated Profile,']);
                return Redirect()->route('socialmediaprofile');


            }
        }else{
            return back();
        }







    }


}
