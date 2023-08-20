<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Site\Cart\CartController;
use App\Http\Controllers\Site\Category\CategoryController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\Product\ProductController as SiteProductController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get("/test", [TestController::class, "test"]);
Route::get("/test1", [TestController::class, "test1"]);
Route::post("/test", [TestController::class, "testForm"]);

Route::get("/form", function () {
    return "
        <form method=post>
            <input type=text/>
            <button type=submit>Send</button>
            " . csrf_field() . "
        </form>
    ";
});
Route::post("/form", function () {
    return "Form Success";
});


// Router Admin
Route::get("/login", [AuthController::class, "getLogin"])->middleware("checklogin");
Route::post("/login", [AuthController::class, "postLogin"])->middleware("checklogin");


Route::group(["prefix" => "/admin", "middleware"=>"checkadmin"], function () {
    Route::get("/logout", [AdminController::class, "logout"]);
    Route::get("/", [AdminController::class, "index"]);
    Route::group(["prefix"=>"/product"], function(){
        Route::get("/", [ProductController::class, "index"]);
        Route::get("/create", [ProductController::class, "create"]);
        Route::post("/store", [ProductController::class, "store"]);
        Route::get("/edit/{id}", [ProductController::class, "edit"]);
        Route::post("/update/{id}", [ProductController::class, "update"]);
        Route::get("/delete/{id}", [ProductController::class,"delete"]);
    });
});
//Site Router
Route::get("/",[SiteController::class,"index"]);
Route::get("/ve-chung-toi",[SiteController::class,"about"]);
Route::get("/lien-he",[SiteController::class,"contact"]);

//Category Router
Route::get("/danh-muc/{slug}.html",[CategoryController::class,"index"]);

//Product Controller
Route::get("/san-pham",[SiteProductController::class,"shop"]);
Route::get("/san-pham/{slug}.html",[SiteProductController::class,"details"]);
Route::get("/san-pham/tim-kiem",[SiteProductController::class,"filter"]);

//Cart Router
Route::group(["prefix"=>"/gio-hang"], function (){
    Route::get("/",[CartController::class,"cart"]);
    Route::get("/them-hang/{id}",[CartController::class,"addToCart"]);
    Route::get("/cat-nhat-gio-hang/{rowId}/{qty}",[CartController::class,"updateCart"]);
    Route::get("/xoa-hang",[CartController::class,"deleteCart"]);
    Route::get("/thanh-toan.html",[CartController::class,"checkout"]);
    Route::post("/thanh-toan",[CartController::class,"payment"]);
    Route::get("/hoan-thanh",[CartController::class,"complete"]);
});



