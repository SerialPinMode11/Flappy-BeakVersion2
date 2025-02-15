<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ControllerName;
use App\Http\Controllers\ProductController;

Route::get('/', function () { return view('welcome'); } );

Route::get("/login", [AuthController::class, "login"])->name('login');
Route::post("/login", [AuthController::class, "loginPost"])->name("login.post");

Route::get("/register", [AuthController::class, "register"])->name('register');
Route::post("/register", [AuthController::class, "registerPost"])->name("register.post");


Route::middleware("auth")->group(function(){
    // Route::get("/home",[AuthController::class, "home"])->name("home");
    Route::get("/contactUs", [ControllerName::class, "contactUs"])->name("contact");
    Route::post("contactUs", [ControllerName::class, "contactPost"])->name("contact.post");
    Route::get("aboutUs", [ControllerName::class, "aboutUs"])->name("about");
    //
    Route::get('/home', [ProductController::class,'index'])->name('home');
    Route::get('/home/productformat/{product}', [ProductController::class,'show'])->name('customer.productformat');
});