<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\PropertiesController;

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
    return redirect('/properties');
});

Route::get('/properties', [PropertiesController::class, 'index'])->name('properties');

Route::get('/properties/{id}', [PropertiesController::class, 'show'])->name('property');

Route::post('/properties', [PropertiesController::class, 'store']);
