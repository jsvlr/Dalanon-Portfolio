<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{   

    public $pages = [
        'dashboard' => false,
        'profile' => false,
        'categories' => false,
        'about' => false,
        'skills' => false,
        'project' => false,
        'images' => false
    ];

    public function dashboard(){
        $user = Auth::user();
        $this->updateCurrentPage("dashboard");
        $pages = $this->pages;
        return view('admin.dashboard', compact('user', 'pages'));
    }

    private function updateCurrentPage(string $page): void{
        foreach($this->pages as $key => $value){
            $this->pages[$key] = ($key == $page);
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route("user.login");
    }

    public function displayCategories(){
        $user = Auth::user();
        $this->updateCurrentPage("categories");
        $pages = $this->pages;
        return view('admin.categories', compact('user', 'pages'));
    }

}
