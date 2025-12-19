<?php


use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[FrontendController::class,'index']);
Route::post('/add/to/cart',[FrontendController::class,'addTocart']);
Route::get('/checkout',[FrontendController::class,'Checkout']);
Route::post('/cart/product/update/{id}',[FrontendController::class,'updateCartProduct']);
Route::get('/cart/product/delete/{id}',[FrontendController::class,'deleteCartProduct']);
Route::post('/order/place',[FrontendController::class,'OrderPlace']);




Route::get('/admin/login',[AdminController::class,'adminLoginForm']);

Route::post('/admin/login',[AdminController::class,'adminLogin']);
Route::get('/admin/dashboard',[AdminController::class,'adminDasboard']);

Route::get('/orders',[AdminController::class,'Orders']);

Route::get('/category/add',[CategoryController::class,'showCategoryform']);
Route::get('/category/manage',[CategoryController::class,'showallCategory']);
Route::post('/category/store',[CategoryController::class,'categoryStore']);
Route::get('/category/edit/{id}',[CategoryController::class,'categoryEdit']);
Route::post('/category/update/{id}',[CategoryController::class,'categoryUpdate']);
Route::get('/category/active/{id}',[CategoryController::class,'categoryInactive']);
Route::get('/category/inactive/{id}',[CategoryController::class,'categoryActive']);
Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete']);

//Brand controller
Route::get('/brand/add',[BrandController::class,'showBrandform']);
Route::get('/brand/manage',[BrandController::class,'showallBrand']);
Route::post('/brand/store',[BrandController::class,'brandStore']);
Route::get('/brand/edit/{id}',[BrandController::class,'brandEdit']);
Route::post('/brand/update/{id}',[BrandController::class,'brandUpdate']);
Route::get('/brand/active/{id}',[BrandController::class,'brandInactive']);
Route::get('/brand/inactive/{id}',[BrandController::class,'brandActive']);
Route::get('/brand/delete/{id}',[BrandController::class,'brandDelete']);

//product controller
Route::get('/product/add',[ProductController::class,'addProduct']);
Route::get('/product/manage',[ProductController::class,'manageProduct']);
Route::post('/product/store',[ProductController::class,'storeProduct']);
Route::get('/product/active/{id}',[ProductController::class,'activeProduct']);
Route::get('/product/inactive/{id}',[ProductController::class,'inactiveProduct']);

