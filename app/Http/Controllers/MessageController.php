<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'fullname'             =>   'required|max:255',
            'email'                =>   'required|email',
            'phone-number'         =>   'required|string|max:20|regex:/^\+?[0-9\s\-]{7,20}$/',
            'message'              =>   'required',
            'g-recaptcha-response' =>   'required|captcha'
        ]);


        $record = Message::create([
            'fullname'      => $request['fullname'],
            'email'         => $request['email'],
            'phone_number'  => $request['phone-number'],
            'message'       => $request['message']
        ]);

        return redirect()->back()->with(['success' => "Message has been sent successfully"]);
    }

    public function destroy(Message $message){
        if($message == null){
            return redirect()->back()->withErrors(['failed' => "Failed to delete this message"]);
        }

        $message->delete();

        return redirect()->back()->with(['success', "Message has been removed successfully"]);
    }
}
