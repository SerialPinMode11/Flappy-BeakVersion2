<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ControllerName;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () { return view('welcome'); } );

Route::get("/login", [AuthController::class, "login"])->name('login');
Route::post("/login", [AuthController::class, "loginPost"])->name("login.post");

Route::get("/register", [AuthController::class, "register"])->name('register');
Route::post("/register", [AuthController::class, "registerPost"])->name("register.post");


Route::middleware("auth")->group(function(){
    // Route::get("/home",[AuthController::class, "home"])->name("home"); home
    Route::get("/contactUs", [ControllerName::class, "contactUs"])->name("contact");
    Route::post("contactUs", [ControllerName::class, "contactPost"])->name("contact.post");
    Route::get("aboutUs", [ControllerName::class, "aboutUs"])->name("about");
    //product_formation_
    Route::get('/home', [ProductController::class,'index'])->name('home');
    Route::get('/home/productformat/{product}', [ProductController::class,'show'])->name('customer.productformat');
    //My_Cart
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('cart.remove');
    //Checkout
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
});