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

Route::group([
    'prefix' => '/shortUrl',
    'as' => 'shortUrl.'
], function() {
    Route::get('/', [ShortUrlController::class, 'index'])->name('index');

    Route::post('/', [ShortUrlController::class, 'post'])->name('post');

    Route::get('/{code}', [ShortUrlController::class, 'redirect'])->name('redirect');
});

