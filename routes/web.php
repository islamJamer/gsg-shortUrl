<?php

use App\Http\Controllers\ShortUrlController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/shortUrl', function () {
//     return view('index');
// })->name('shortUrl.index');

Route::get('/shortUrl', [ShortUrlController::class, 'index'])
        ->name('shortUrl.index');

Route::post('/shortUrl', [ShortUrlController::class, 'post'])
        ->name('shortUrl.post');

Route::get('/shortUrl/{id}', [ShortUrlController::class, 'redirect'])
        ->name('shortUrl.redirect');