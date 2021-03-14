<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ProfilereqController;

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
// ###############################
// -------- TERMS SECTION --------
// ###############################
// Delete terms. ADMIN ONLY (When checking, delete middleware, and leave it like Route::get...)
Route::middleware(['auth', 'can:accessAdmin'])->get('/terms/delete/{id}', function (Request $request) {
    $term = new TermsController;
    return $term->destroy($request->route('id'));
});

// Update terms. ADMIN ONLY (When checking, delete middleware, and leave it like Route::get...)
Route::middleware(['auth', 'can:accessAdmin'])->get('/terms/update/{id}/{start}/{end}/{name}/{desc}', function (Request $request) {
    $term = new TermsController;
    return $term->update(json_encode([  "id" => $request->route('id'),
                                        "start" => rawurldecode($request->route('start')),
                                        "end" => rawurldecode($request->route('end')),
                                        "name" => rawurldecode($request->route('name')),
                                        "desc" => rawurldecode($request->route('desc'))]));
});

// Create new terms. ADMIN ONLY (When checking, delete middleware, and leave it like Route::get...)
Route::/*middleware(['auth', 'can:accessAdmin'])->*/get('/terms/create/{start}/{end}/{name}/{desc}', function (Request $request) {
    $term = new TermsController;
    return $term->store(json_encode([   "start" => $request->route('start'),
                                        "end" => $request->route('end'),
                                        "name" => rawurldecode($request->route('name')),
                                        "desc" => rawurldecode($request->route('desc'))]));
});

// Show all terms. ADMIN ONLY (When checking, delete middleware, and leave it like Route::get...)
Route::/*middleware(['auth', 'can:accessAdmin'])->*/get('/terms/updateTable', function (Request $request) {
    $term = new TermsController;
    return $term->index();
});

// ###############################
// --------- PROFILEREQ ---------
// ###############################

// Delete requirements profile requirements. ADMIN ONLY (When checking, delete middleware, and leave it like Route::get...)
Route::middleware(['auth', 'can:accessAdmin'])->get('/proreq/delete/{id}', function (Request $request) {
    $profile= new ProfilereqController;
    return $profile->destroy($request->route('id'));
});

// Update requirements profile. ADMIN ONLY (When checking, delete middleware, and leave it like Route::get...)
Route::middleware(['auth', 'can:accessAdmin'])->get('/proreq/update/{id}/{name}', function (Request $request) {
    $profile = new ProfilereqController;
    return $profile->update(json_encode(["id" => $request->route('id'),
                                        "name" => rawurldecode($request->route('name'))]));
});

// Create requirements profile. ADMIN ONLY (When checking, delete middleware, and leave it like Route::get...)
Route::middleware(['auth', 'can:accessAdmin'])->get('/proreq/create/{name}', function (Request $request) {
    $profile = new ProfilereqController;
    return $profile->store(json_encode(["name" => rawurldecode($request->route('name'))]));
});