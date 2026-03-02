<?php

namespace App\Http\Controllers;

use \Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home(){
        return view("homepage");
    }

    public function contact(){
        return view("contact");
    }
}
