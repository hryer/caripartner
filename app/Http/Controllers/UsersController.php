<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;


class UsersController extends Controller
{
    public function postSignUp(Request $request){
    	$email = $request['email'];
    	$first_name = $request['first_name'];
    	$last_name = $request['last_name'];
    	$password = bcrypt($request['password']);
    	$role = $request['role'];

    	$user = new Users();
    	$user->email = $email;
    	$user->first_name = $first_name;
    	$user->last_name = $last_name;
    	$user->password = $password;
    	$user->role = $role;

    	$user->save();

    	return redirect()->back();

    }

    public function postSignIn(Request $request){

    }
}
