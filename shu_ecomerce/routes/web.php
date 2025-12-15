<?php


use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/admin/login',[AdminController::class,'adminLoginForm']);

Route::post('/admin/login',[AdminController::class,'adminLogin']);
Route::get('/admin/dashboard',[AdminController::class,'adminDasboard']);
Route::get('/category/add',[CategoryController::class,'showCategoryform']);
Route::get('/category/manage',[CategoryController::class,'showallCategory']);
Route::post('/category/store',[CategoryController::class,'categoryStore']);
