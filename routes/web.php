<?php

use App\Http\Controllers\ComicController;
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
    $data =
    [
        'headerLinks' => config('db.headerLinks'),
        'dcComics' => config('db.dcComics'),
        'shop' => config('db.shop'),
        'dc' => config('db.dc'),
        'sites' => config('db.sites'),
        'comics' => config('db.comics')
    ];
    return view('home', $data);
})->name('home');

Route::resource('comics', ComicController::class);


