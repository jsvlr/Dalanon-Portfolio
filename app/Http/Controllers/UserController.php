<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(Request $request, User $user){
         $request->validate([
            'name'                  => "required|min:10|max:255",
            'email'                 => "required|email|max:255|unique:users,email," . Auth::user()->id,
            'password'              => "required|min:8|max:255|confirmed",
            'g-recaptcha-response'  => "required|captcha",
         ]);
         
        // $user = Auth::user();
        
        $user->name = $request['name'];
        $user->email = $request['email'];

        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }

        if (!$user->isDirty()) {
        return redirect()->back()->withErrors(['failed' => 'No changes were made']);
        }

        if(!$user->save()){
            return redirect()->back()->withErrors(['failed' => "Account failed to update"]);
        }
        
        return redirect()->back()->with(['success' => "Account updated successfully"]);
    }
    
}
