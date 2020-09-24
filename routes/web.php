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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addsong/{id}', [App\Http\Controllers\PlaylistController::class, 'addSong'])->name('song.addsong');
Route::put('/addinlist/{id}/add', [App\Http\Controllers\PlaylistController::class, 'addInList'])->name('song.addInList');
Route::get('/getSongList/{id}', [App\Http\Controllers\PlaylistController::class, 'getList'])->name('song.getSongList');
Route::delete('/removeInList/{id}', [App\Http\Controllers\PlaylistController::class, 'removeInPlaylist'])->name('song.removeInList');
Route::get('/change-password', [App\Http\Controllers\UserController::class, 'changeIndex'])->name('change.index');
Route::post('/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change.password');
Route::resources([
    'user' => App\Http\Controllers\UserController::class,
    'playlist' => App\Http\Controllers\PlaylistController::class,
    'song' => App\Http\Controllers\SongController::class,
]);
