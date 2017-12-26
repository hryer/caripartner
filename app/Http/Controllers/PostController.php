<?php

namespace App\Http\Controllers;

use App\Post;
use App\Users;
use App\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => "Successfully Deleted!"]);
    }
}
