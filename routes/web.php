<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\WebController;
;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WebController::class, 'index'])->name('home');

Route::resource('login', LoginController::class);

Route::group(['prefix'=>'admin'],function(){
    Route::resource('login',LoginController::class
        // session()->put('user_id',[29]);
        // return redirect('admin/dashboard');
    );  
    Route::resource('/',LoginController::class);
    Route::group(['middleware' => ['guard']],function(){
        Route::resource('dashboard',DashboardController::class);
        Route::get('logout',[LoginController::class,'logout'])->name('logout');
        Route::resource('user',UserController::class);
        Route::resource('category',CategoryController::class);
        Route::resource('permission',PermissionController::class);
        Route::resource('role',RoleController::class);
        Route::resource('product',ProductController::class);
        Route::resource('page',PageController::class);
        Route::resource('slider',SliderController::class);
        Route::resource('block',BlockController::class);
    });
});


Route::get('/no-access',function(){
    echo "You're not to access the page";
    die();
});
// Route::group(['middleware' => ['guard']], function () {
//     // Route::resource('category',CategoryController::class);
//     // Route::resource('permission',PermissionController::class);
//     Route::resource('role',RoleController::class);
//     Route::resource('dashboard',DashboardController::class);
// });

// Route::resource('admin-dashboard',AdmindashboardController::class);
// Route::resource('admin-login',AdminloginController::class);
// ->middleware('guard')