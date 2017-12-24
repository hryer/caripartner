<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function postCreatePost(Request $request){
        $post = new Post();
        $post->body = $request['body'];
        $request->user()->post()->save($post);
        return redirect('dashboard');
    }
    //
}
