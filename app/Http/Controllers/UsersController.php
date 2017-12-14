<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;


class UsersController extends Controller
{
    public function postSignUp(Request $request){
    	$email = $request['email'];
    	$first_name = $request['first_name'];
    	$last_name = $request['last_name'];
    	$password = bcrypt($request['password']);
    	$hipster = $request['hipster'];
     	$hustler =$request['hustler'];
     	$hacker = $request['hacker'];

        $hipster = $hipster!=NULL ? true : false;
        $hustler =$hustler!=NULL ? true : false;
        $hacker = $hacker!=NULL ? true : false;

    	$users = new Users();
    	$users->email = $email;
    	$users->first_name = $first_name;
    	$users->last_name = $last_name;
    	$users->password = $password;
    	$users->hipster = $hipster;
        $users->hustler =$hustler;
        $users->hacker = $hacker;

    	$users->save();

    	return redirect()->back();

    }

    public function postSignIn(Request $request){

    }
}
