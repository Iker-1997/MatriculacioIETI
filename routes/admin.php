<php


Route::get('/dashboard', function(){
        return view('dashboard');
    });

Route::resource('users', 'UserController');