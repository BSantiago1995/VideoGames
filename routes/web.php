<?php

use App\Http\Controllers\VideoGamesController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/VideoGames',[VideoGamesController::class, 'index'])->name('VideoGames.Index');
Route::get('/VideoGames/CreatePlay',[VideoGamesController::class, 'create'])->name('VideoGames.CreatePlay');
Route::post('/VideoGames/store', [VideoGamesController::class, 'store'])->name('VideoGames.store');
Route::get('/VideoGames/{videogames}',[VideoGamesController::class, 'show'])->name('VideoGames.Show');
Route::get('/VideoGames/{videogames}/edit',[VideoGamesController::class, 'edit'])->name('VideoGames.Edit');
Route::put('/VideoGames/{videogames}', [VideoGamesController::class, 'update'])->name('VideoGames.update');
Auth::routes();

