<?php

use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\MagzineController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::match(['get', 'post'], '/signin', [AuthController::class, 'signin'])->name('signin');
Route::match(['get', 'post'], '/signup', [AuthController::class, 'signup'])->name('signup');
Route::match(['get', 'post'], '/signout', [AuthController::class, 'signout'])->name('signout');
Route::post('save', [AuthController::class, 'save'])->name('save');

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('news', NewsController::class);
        Route::resource('menus', MenuController::class); 
    });
    Route::match(['get', 'post'], '/signout', [AuthController::class, 'signout']);
});
Route::get('', [SiteController::class, 'index'])->name('index');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/magzine', [MagzineController::class, 'index'])->name('magzine');


// Route::group(['middleware'=>'customAuth'],function(){
//     Route::get('/list','AuthController@list');
//     Route::view('/add','add');
//     Route::post('addAuth','AuthController@addAuth');
//     Route::view('register','register');
//     Route::view('login','login');
//     Route::get('logout','AuthController@logout');
// });
