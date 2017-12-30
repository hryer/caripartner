<?php

namespace App\Http\Controllers;

use App\Votes;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;





class PostController extends Controller
{
    public function getDashboard(){

        $post = Post::orderBy('created_at','desc')->get();
        return view('dashboard',['posts'=>$post]);
    }

    public function postCreatePost(Request $request){

        $this->validate($request,[
            'body' => 'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request['body'];
        $message = 'Error';

        if($request->user()->post()->save($post)){
         $message = 'Success';
        }

        return redirect('dashboard')->with(['message' => $message]);
    }

    public function getDeletePost($post_id){
        $post = Post::where('id',$post_id)->first();
//        Post::find($post_id)->first();

        if(Auth::user() != $post->users){
            return redirect()->back()->with(['message' => "Failed"]);
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => "Successfully Deleted!"]);
    }

    public function postEditPost(Request $request){
        $this->validate($request,[
            'body' => 'required'
        ]);

        $post = Post::find($request['postId']);
        if(Auth::user() != $post->users){
            return redirect()->back();
        }

        $post->body = $request['body'];
        $post->update();

        return response()->json(['new_body' => $post->body],200);
    }

    public function postVotePost(Request $request){

        $post_id = $request['postId'];
        $is_vote = $request['isVote'] === 'true';
        $update = false;
        $post = Post::find($post_id);

        if(!$post){
            return null;
        }

        $user = Auth::user();
        $vote = $user->votes()->where('post_id',$post_id)->first();

        if($vote){
            $already_vote = $vote->vote;
            $update = true;
            if($already_vote == $is_vote){
                $vote->delete();
                return null;
            }
        }else{
            $vote = new Vote();
        }

        $vote->vote = $is_vote;
        $vote->user_id = $user->id;
        $vote->post_id = $post->id;

        if($update){
            $vote->update();
        }else{
            $vote->save();
        }
        return null;
    }
}
