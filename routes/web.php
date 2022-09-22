<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    //  return view('welcome');
    return Inertia::render('Welcome');
});
Route::get('/about', function () {
    return Inertia::render('About');
});
Route::get('/users', function () {
    return Inertia::render('User/Role');
});
Route::get('/api', function () {
   return Inertia::render('About');
})->middleware('cors');
Route::get('/user-api', function () {
    return Inertia::render('Users');
});

Route::post('/check-user', function () {
    $response = \Illuminate\Support\Facades\Http::post(
        config('app.api_endpoints.check_user'),
        ['employeeID' => request()->input('id')]
    );

    return $response->json();
})->name('check-user');
