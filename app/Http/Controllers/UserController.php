<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function register(Request $request){
        /**
         * Register User
         */
        $fields = $request->validate([
            "username" => "required|string",
            "email" => "required|string|unique:users,email",
            "password" => "required|string",
            "password_confirm" => "required_with:password|same:password",
        ]);

        $user = User::create([
            'username' => $fields["username"],
            "email" => $fields["email"],
            "password" => bcrypt($fields["password"])
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return Redirect::to("/");
    }

    public function login(Request $request){

        $fields = $request->validate([
            "username" => "required|string",
            "password" => "required|string",
        ]);


        // Check Password
        if( !Auth::attempt($request->only("username","password")) ){
              return back()->withErrors('Username or Password is incorrect.');
        } 
        $user = User::where("username", $fields["username"])->first();
        $token = $user->createToken("auth_token")->plainTextToken;
        setcookie("token", $token);
        return redirect("app");
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            "message"=> "Token Destroyed",
        ];
    }
}
