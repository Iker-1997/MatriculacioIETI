<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/dashboard', function(){
    return view('dashboard');
});

Route::resource('users', 'UserController');