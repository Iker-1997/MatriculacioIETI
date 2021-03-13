<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Delete terms. ADMIN ONLY (When checking, delete middleware, and leave it like Route::get...
Route::middleware(['auth', 'can:accessAdmin'])->get('/terms/delete/{id}', function (Request $request) {
    $term = new TermsController;
    return $term->destroy($request->route('id'));
});

// Update terms. ADMIN ONLY (When checking, delete middleware, and leave it like Route::get...
Route::middleware(['auth', 'can:accessAdmin'])->get('/terms/update/{id}/{start}/{end}/{name}/{desc}', function (Request $request) {
    $term = new TermsController;
    return $term->update(json_encode([  "id" => $request->route('id'),
                                        "start" => $request->route('start'),
                                        "end" => $request->route('end'),
                                        "name" => $request->route('name'),
                                        "desc" => $request->route('desc')]));
});

// Create new terms. ADMIN ONLY (When checking, delete middleware, and leave it like Route::get...
Route::middleware(['auth', 'can:accessAdmin'])->get('/terms/create/{start}/{end}/{name}/{desc}', function (Request $request) {
    $term = new TermsController;
    return $term->store(json_encode([   "start" => $request->route('start'),
                                        "end" => $request->route('end'),
                                        "name" => $request->route('name'),
                                        "desc" => $request->route('desc')]));
});