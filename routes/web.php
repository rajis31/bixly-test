<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name("login");


Route::post("/", [UserController::class, "login"]);

Route::get('/register', function () {
    return view('auth.register');
});

Route::post("/register", [UserController::class, "register"]);
Route::get('/app', [AppController::class, "showPage"]);
