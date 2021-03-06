<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    if (Auth::check()) {
        if(Auth::user()->role == "admin"){
            return view('dashboardadmin');
        }
        if (Auth::user()->role == "alumne") {
            return view('dashboard');
        }
    }
})->middleware(['auth'])->name('dashboard');


Route::name('admin')
  ->prefix('admin')
  ->middleware(['auth', 'can:accessAdmin'])
  ->group(function () {
    Route::get('dashboard', function() {
        return view('dashboardadmin');
    });        

    Route::resource('users', 'UserController');
});

require __DIR__ . '/auth.php';
