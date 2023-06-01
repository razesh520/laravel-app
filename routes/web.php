<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\NewsController;

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

Route::get('/', function () {
    return view('site/index');
});

Route::get('/about', function () {
    return view('site/about');
});

Route::match(['get', 'post'], '/signin', [AuthController::class,'signin'])->name('signin');
Route::match(['get', 'post'], '/signup', [AuthController::class,'signup'])->name('signup');
Route::post('save', [AuthController::class, 'save'])->name('save'); 

Route::prefix('admin')->group(function () {
    Route::group(['middleware'=> 'auth'],function(){
        Route::resource('posts', PostsController::class);
        Route::resource('students', StudentsController::class);
        Route::resource('news',NewsController::class);
    });
    Route::match(['get', 'post'], '/signout', [AuthController::class,'signout']);
});

// Route::group(['middleware'=>'customAuth'],function(){
//     Route::get('/list','AuthController@list');
//     Route::view('/add','add');
//     Route::post('addAuth','AuthController@addAuth');
//     Route::view('register','register');
//     Route::view('login','login');
//     Route::get('logout','AuthController@logout');
// });

