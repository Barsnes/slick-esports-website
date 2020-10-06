<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\SponsorsController;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/news', [PagesController::class, 'news']);
Route::get('/news/{slug}', [PagesController::class, 'getSingleNews'])->name('news.single');
Route::get('/teams', [PagesController::class, 'teams']);

Fortify::loginView(function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->group(function() {

  Route::resource('/dashboard/about', AboutController::class);
  Route::resource('/dashboard/news', NewsController::class);
  Route::resource('/dashboard/teams', TeamsController::class);
  Route::resource('/dashboard/players', PlayersController::class);
  Route::resource('/dashboard/sponsors', SponsorsController::class);
  Route::put('/dashboard/teams/{team}/highlight', [TeamsController::class, 'highlight'])->name('teams.highlight');

});


Route::middleware(['auth:sanctum', 'verified'])->get('/register', function () {
    return redirect('/dashboard');
})->name('register');
