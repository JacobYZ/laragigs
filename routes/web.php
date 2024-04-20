<?php

use App\Http\Controllers\ProductsController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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

Route::get('/hello', function () {
    return response('<h1>Hello World!</h1>')->header('Content-Type', 'text/plain')->header('X-Header-One', 'Header ValueX');
});
Route::get('/posts/{id}', function ($id) {
    return response("You are viewing post " . $id);
})->where('id', '[0-9]+');
Route::get('/search', function (Request $request) {
    return ($request->name . ' ' . $request->city);
});
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/{id}', [ProductsController::class, 'show']);

// Common Resource Routes
// index - show all listings
// create - show create form
// store - store listing data
// show - show single listing
// edit - show edit form
// update - update listing data
// destroy - delete listing

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);