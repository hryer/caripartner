<?php

namespace App\Http\Controllers;

use App\Post;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;



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
        $post->update;

        return response()->json(['new_body' => $post->body],200);
    }
}
