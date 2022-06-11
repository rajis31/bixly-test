<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
            'name' => $fields["username"],
            "email" => $fields["email"],
            "password" => bcrypt($fields["password"])
        ]);

        $token = $user->createToken("myapptoken")->plainTextToken;
        $response = [
            "user" => $user,
            "token" => $token
        ];

        return response($response,201);
    }

    public function login(Request $request){
        $fields = $request->validate([
            "username" => "required|string",
            "password" => "required|string",
        ]);

        // Check email 
        $user = User::where("email", $fields["email"])->first();

        // Check Password
        if( !$user || !Hash::check($fields["password"], $user->password)){
              return response([
                "message" => "Bad Creds",
              ], 401);
        }

        $token = $user->createToken("myapptoken")->plainTextToken;
        $response = [
            "user" => $user,
            "token" => $token
        ];

        return response($response,201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            "message"=> "Token Destroyed",
        ];
    }
}
