<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermsController;

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

// Delete terms. ONLY ADMIN.
Route::middleware(['auth', 'can:accessAdmin'])->get('/terms/delete/{id}', function (Request $request) {
    $term = new TermsController;
    return $term->destroy($request->route('id'));
});