<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

use App\Models\User;
use App\Models\Terms;
use App\Models\Enrolments;

use App\Http\Controllers\TermsController;
use App\Http\Controllers\StudentListController;

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

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Redirect user to admin panel or student panel.
Route::get('/dashboard', function () {
    if (Auth::check()) {
        if(Auth::user()->role == "admin"){
            return redirect('/admin/dashboard');
        }
        if (Auth::user()->role == "student") {
            return view('dashboard');
        }
    }
})->middleware(['auth'])->name('dashboard');

/* ------------- AdminPanel --------------------*/

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
})->middleware(['auth',  'can:accessAdmin'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin');
})->middleware(['auth',  'can:accessAdmin'])->name('dashboard');

/* ------------- Cursos --------------------*/
Route::get('/admin/dashboard/terms', function () {
    $data = Terms::all();
    return view('terms', ['terms' => $data]);
})->middleware(['auth',  'can:accessAdmin'])->name('terms');


/* ------------- Student --------------------*/
Route::get('/admin/dashboard/ad_student_list', function () {
    $data = Enrolments::all();
    return view('ad_student_list', ['ad_student_list' => $data]);
})->middleware(['auth',  'can:accessAdmin'])->name('ad_student_list');


require __DIR__.'/auth.php';

/*------------- Delete routes--------------------*/
Route::name('termsDelete')
  ->prefix('admin')
  ->middleware(['auth', 'can:accessAdmin'])
  ->group(function () {
    Route::get('/terms/delete/{id}', function() {
        return view('delTerm');
    });        
    Route::resource('terms', TermsController::class);
});

/* ------------- Log --------------------*/
Route::get("/log", function(){
    $user = auth::id();
    Log::channel('mysql_logging')->debug("This is a log example with a user id", ['user_Id' => $user]);
});