<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AppController extends Controller
{
    public function showPage(){
        // if(Auth::check()){
        //     return view("app");
        // }
        // else {
        //     return redirect("/")->withErrors("Please Login");
        // }

        return view("app");
    }
}
