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

Route::get('/test', function () {
    return view('test');
});


// Redirect user to admin panel or user panel according to their role
Route::get('/admin', function () {
    if (Auth::check()) {
        if(Auth::user()->role == "admin"){
            return redirect('/admin/dashboard');
        }
        if (Auth::user()->role == "alumne") {
            return view('dashboard');
        }
    }
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
})->middleware(['auth',  'can:accessAdmin'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin');
})->middleware(['auth',  'can:accessAdmin'])->name('dashboard');

Route::get('/admin/dashboard/cursos', function () {
    return view('terms');
})->middleware(['auth',  'can:accessAdmin'])->name('terms');

require __DIR__ . '/auth.php';


//Page to test logs, if you enter to this route a log will be written in the logs table
Route::get("/log", function(){
    $user = auth::id();
    Log::channel('mysql_logging')->debug("This is a log example with a user id", ['user_Id' => $user]);
});