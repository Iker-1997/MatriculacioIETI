<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Terms;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\StudentListController;
use App\Models\Careers;


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

// route redirection dashboard Student
Route::get('/home', function () {
    $user = auth::id();
    Log::channel('mysql_logging')->info("User in home", ['user_Id' => $user]);
    return view('dashboard');
    
})->middleware(['auth'])->name('dashboard');

// route dashboard Student
Route::get('/dashboard', function () {
    $user = auth::id();
    Log::channel('mysql_logging')->info("User in dashboard", ['user_Id' => $user]);
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Redirect user to admin panel or student panel.
Route::get('/dashboard', function () {
    if (Auth::check()) {
        if(Auth::user()->role == "admin"){
            return redirect('/admin/dashboard');
        }
        if (Auth::user()->role == "student") {
            $user = auth::id();
            Log::channel('mysql_logging')->info("User in dashboard", ['user_Id' => $user]);
            return view('dashboard');
        }
    }
})->middleware(['auth'])->name('dashboard');

// route redirection dashboard Admin (AdminPanel)
Route::get('/admin', function () {
    return redirect('/admin/dashboard');
})->middleware(['auth',  'can:accessAdmin'])->name('dashboard');

// route dashboard Admin (AdminPanel)
Route::get('/admin/dashboard', function () {
    $user = auth::id();
    Log::channel('mysql_logging')->info("Admin in dashboard", ['user_Id' => $user]);
    return view('admin');
})->middleware(['auth',  'can:accessAdmin'])->name('dashboard');

// path for Term from AdminPanel.
Route::get('/admin/dashboard/terms', function () {
    $data = Terms::all();
    $user = auth::id();
    Log::channel('mysql_logging')->info("Admin in terms", ['user_Id' => $user]);
    return view('terms', ['terms' => $data]);
})->middleware(['auth',  'can:accessAdmin'])->name('terms');

// path for Student from AdminPanel.
Route::get('/admin/dashboard/students', function () {
    $students = User::where("role", "student")->paginate(20);
    $user = auth::id();
    Log::channel('mysql_logging')->info("Admin in students list", ['user_Id' => $user]);
    return view('Students', ['students' => $students]);
})->middleware(['auth',  'can:accessAdmin'])->name('Students');

// path for importStudent from Student.
Route::get('/admin/dashboard/importStudent', function () {
    $data = StudentListController::all();
    $user = auth::id();
    Log::channel('mysql_logging')->info("Admin in import students site", ['user_Id' => $user]);
    return view('importStudent', ['importStudent' => $data]);
})->middleware(['auth',  'can:accessAdmin'])->name('importStudent');
Route::get('/admin/dashboard/term_careers/{id}', function (Request $request) {
    $data = Careers::where("term_id", $request->route('id'))->get();
    $term = Terms::where("id", $request->route('id'))->get();
    $id = $request->route('id');
    $user = auth::id();
    Log::channel('mysql_logging')->info("Admin in careers of term id $id", ['user_Id' => $user]);
    return view('term_careers', ['careers' => $data, 'term' => $term]);
})->middleware(['auth',  'can:accessAdmin'])->name('term_careers');

require __DIR__.'/auth.php';

// Delete routes
// Delete term
Route::name('termsDelete')
  ->prefix('admin')
  ->middleware(['auth', 'can:accessAdmin'])
  ->group(function () {
    Route::get('/terms/delete/{id}', function(Request $request){
        $term = Terms::select('name_terms')
                     ->where('id', '=', $request->route('id'))
                     ->get();
        $id = $request->route('id');
        $user = auth::id();
        Log::channel('mysql_logging')->warning("Admin about to delete the term id $id", ['user_Id' => $user]);
        return view('delTerm', ["term"=>$term]);
    });        
    Route::resource('terms', TermsController::class);
});

Route::name('careersDelete')
  ->prefix('admin')
  ->middleware(['auth', 'can:accessAdmin'])
  ->group(function () {
    Route::get('/career/delete/{id}', function(Request $request){
        $career = Careers::select('name_careers')
                     ->where('id', '=', $request->route('id'))
                     ->get();
        $id = $request->route('id');
        $user = auth::id();
        Log::channel('mysql_logging')->warning("Admin about to delete the career id $id", ['user_Id' => $user]);
        return view('delCareer', ["career"=>$career]);
    });        
    Route::resource('careers', CareersController::class);
});


// Logs route
Route::get("/log", function(){
    $user = auth::id();
    Log::channel('mysql_logging')->debug("This is a log example with a user id", ['user_Id' => $user]);
});
