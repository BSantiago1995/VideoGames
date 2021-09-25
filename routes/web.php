<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\VideoGamesController;

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



Route::get('/VideoGames',[VideoGamesController::class, 'index'])->name('VideoGames.Index');
Route::get('/VideoGames/CreatePlay',[VideoGamesController::class, 'create'])->name('VideoGames.CreatePlay');
Route::post('/VideoGames/store', [VideoGamesController::class, 'store'])->name('VideoGames.store');
Route::get('/VideoGames/{videogames}',[VideoGamesController::class, 'show'])->name('VideoGames.Show');
Route::get('/VideoGames/{videogames}/edit',[VideoGamesController::class, 'edit'])->name('VideoGames.Edit');
Route::put('/VideoGames/{videogames}', [VideoGamesController::class, 'update'])->name('VideoGames.update');
Route::delete('/VideoGames/{videogames}', [VideoGamesController::class, 'destroy'])->name('VideoGames.destroy');
//Perfiles
Route::get('/perfiles/{perfil}', [PerfilController::class, 'show'])->name('perfiles.show');
Route::get('/perfiles/{perfil}/edit', [PerfilController::class, 'edit'])->name('perfiles.edit');
Route::put('/perfiles/{perfil}', [PerfilController::class, 'update'])->name('perfiles.update');

//likes
Route::post('/VideoGames/{videogames}', [LikeController::class,'update'])->name('likes.update');
Route::get('/home',[HomeController::class, 'index'])->name('home.index');
Auth::routes();

