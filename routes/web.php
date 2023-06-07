<?php

use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\NewsController as NewsCtrl;
use App\Http\Controllers\MagzineController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardsController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\SportsController;
use App\Http\Controllers\VideosController as VideosCtrl;
use App\Http\Controllers\CategoriesController as CategoriesCtrl;
use App\Http\Controllers\SportsController as SportsCtrl;

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
        Route::resource('', DashboardsController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('news', NewsController::class);
        Route::resource('menus', MenuController::class); 
        Route::resource('videos', VideosController::class); 
        Route::resource('sports', SportsController::class); 
    });
    Route::match(['get', 'post'], '/signout', [AuthController::class, 'signout']);
});
Route::get('', [SiteController::class, 'index'])->name('index');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/news', [NewsCtrl::class, 'index'])->name('all-news');
Route::get('/news/{id}', [NewsCtrl::class, 'show'])->name('view-news');
Route::get('/videos', [VideosCtrl::class, 'index'])->name('all-videos');
Route::get('/videos/{id}', [VideosCtrl::class, 'show'])->name('view-videos');
Route::get('/categories', [CategoriesCtrl::class, 'index'])->name('all-categories');
Route::get('/categories/{id}', [CategoriesCtrl::class, 'show'])->name('view-categories');
Route::get('/sports', [SportsCtrl::class, 'index'])->name('all-sports');
Route::get('/sports/{id}', [SportsCtrl::class, 'show'])->name('view-sports');
Route::get('/magzine', [MagzineController::class, 'index'])->name('magzine');


// Route::group(['middleware'=>'customAuth'],function(){
//     Route::get('/list','AuthController@list');   
//     Route::view('/add','add');
//     Route::post('addAuth','AuthController@addAuth');
//     Route::view('register','register');
//     Route::view('login','login');
//     Route::get('logout','AuthController@logout');
// });
