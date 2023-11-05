<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Tek sayfa olacak.
Route::get('/', [Welcome::class, 'main']);


