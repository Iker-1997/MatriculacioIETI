<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/test', function () {
    return view('test');
});


/*User Roles */
Route::get('/dashboard', function () {
    if (Auth::check()) {
        if(Auth::user()->role == "admin"){
            return view('admin');
        }
        if (Auth::user()->role == "alumne") {
            return view('dashboard');
        }
    }
})->middleware(['auth'])->name('dashboard');


Route::name('admin')
  ->prefix('admin')
  ->middleware(['auth', 'can:Admin'])
  ->group(function () {
    Route::get('dashboard', function() {
        return view('admin');
    });        

    Route::resource('users', 'UserController');
});

Route::name('terms')
  ->prefix('admin')
  ->middleware(['auth', 'can:Admin'])
  ->group(function () {
    Route::get('terms', function() {
        return view('terms');
    });

    /*CRUD Term*/
    Route::resource('terms', TermsController::class);
});
require __DIR__ . '/auth.php';

