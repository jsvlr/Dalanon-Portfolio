<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginLogoutController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        
        $request->validate([
            "email"                => "required|email|max:255",
            "password"             => "required|min:8|max:255",
            "g-recaptcha-response" => "required|captcha"
        ]);

        $credentials = $request->only("email","password");

        $user = User::where("email", $credentials["email"])->first();
   
        if (!$user){
            return redirect()->back()->withErrors(['account_not_found' => 'Check your credentials'])->withInput();
        }
        
        if(!Hash::check($credentials["password"], $user->password)){
            return redirect()->back()->withErrors(["wrong_password"=> "Password is incorrect"])->withInput();
        }
    
    
        if(!Auth::attempt($credentials)){
            return redirect()->back()->withErrors(["email" => "Invalid Credentials"])->withInput();
        }

        return redirect()->route("index")->with(['success' => 'Login Successfully']);

    }

    public function logout(Request $request) {
        $request->validate([
            'user-id' => "required|int"
        ]);

        if(!Auth::user()->id == $request['user-id']){
            return redirect()->back()->withInput();
        }
        Auth::logout();
        return redirect()->back();
    }

    public function ShowLoginForm(){
        return view("auth.login");
    }
    
}
