<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function sendOtp(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $otp = str_pad(random_int(0, 999999), 6, 0, STR_PAD_LEFT);

        $user = User::where('email', $request['email'])->first();

        $user->update([
            'otp' =>  Hash::make($otp),
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new OtpMail($otp));

        return response()->json(['message' => 'OTP has been sent to your email']);

    }

    public function verifyOtp(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp'   => 'required|digits:6'
        ]);

        $user = User::where('email', $request->email)->first();


        if(!$user->otp || now()->isAfter($user->otp_expires_at)){
            return response()->json(['message' => "invalid expires"], 422);
        }

        if(!Hash::check($request->otp, $user->otp)){
            return response()->json(['message' => 'invalid OTP'], 422);
        }

        $user->update([
            'otp' => null,
            'otp_expires_at' => null
        ]);

        return response()->json(['message' => 'OTP verified. Proceed to reset password']);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        User::where('email', $request->email)->update([
            'password' => $request->password
        ]);

        return response()->json(['message' => 'Password reset successfully']);
    }


}
