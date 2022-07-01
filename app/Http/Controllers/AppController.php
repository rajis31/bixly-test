<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Boat;
use App\Models\Cars;
use App\Models\Truck;


class AppController extends Controller
{
    public function showPage(){
        if(Auth::check()){
            return view("app", [
                "boats"  => Boat::all(),
                "cars"   => Cars::all(),
                "trucks" => Truck::all()
            ]);
        }
        else {
            return redirect("/")->withErrors("Please Login");
        }
    }
}
