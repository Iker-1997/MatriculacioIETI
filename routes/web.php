<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Terms;
use App\Http\Controllers\TermsController;

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

<<<<<<< HEAD
<<<<<<< HEAD
=======
Route::get('/test', function () {
    return view('test');
});


/*User Roles */
>>>>>>> fffdf8e3bb14cba0598c0227267561a5b01fb99c
Route::get('/dashboard', function () {

    //
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
<<<<<<< HEAD
=======
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin_dashboard', 'Admin\DashboardController@index')->middleware('role:admin');
Route::get('/seller_dashboard', 'Seller\DashboardController@index')->middleware('role:seller');
>>>>>>> adri
=======

Route::name('dashboard')
  ->prefix('admin')
  ->middleware(['auth', 'can:accessAdmin'])
  ->group(function () {
    Route::get('/dashboard', function() {
        return view('admin');
    });        

    Route::resource('users', 'UserController');
    Route::resource('terms', TermsController::class);
});

Route::get("/log", function(){
    $user = auth::id();
    Log::channel('mysql_logging')->debug("This is a log example with a user id", ['user_Id' => $user]);
});
>>>>>>> fffdf8e3bb14cba0598c0227267561a5b01fb99c
