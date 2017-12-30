<?php

namespace App\Http\Controllers;

use App\Users;

use App\Votee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



use Illuminate\Http\Response;




class UsersController extends Controller
{


    public function postSignUp(Request $request){

        $this->validate($request,[
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:12',
            'last_name' => 'max:12',
            'password' => 'required|min:4'
        ]);

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

    	Auth::login($users);
    	return redirect()->route('dashboard');

    }


    public function postSignIn(Request $request){
       if( Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
           return redirect()->route('dashboard');
       }
       return redirect()->back();
    }

    public function postUpdateAccount(Request $request){
        $this->validate($request,[
            'first_name' => 'required|max:12',
            'last_name' => 'max:12'
        ]);

        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'] . '-' . $user->id . '.jpg';

        if($file){
            Storage::disk('local')->put($filename,File::get($file));
        }

        return redirect()->route('account');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function getAccount(){
        return view('account',['user' => Auth::user()]);
    }

    public function getUserImage($filename){

        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
    }
}
