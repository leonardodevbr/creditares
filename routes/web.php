<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function (){
    return view('home');
})->name('home');

Route::get('/producers', [\App\Http\Controllers\ProducerController::class, 'index'])->name('producers.index');
Route::get('/producers/show/{id}', [\App\Http\Controllers\ProducerController::class, 'show'])->name('producers.show');
Route::post('/producers/log', [\App\Http\Controllers\ProducerController::class, 'log'])->name('producers.log');
