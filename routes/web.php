<?php

// DB::listen(function ($query) { var_dump($query->sql, $query->bindings); });

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




/* limited auth's user can access routes */
Route::middleware('auth')->group(function () {
    Route::get('/tweets', [App\Http\Controllers\TweetsController::class, 'index'])->name('home');
    Route::post('/tweets', [App\Http\Controllers\TweetsController::class, 'store']);

    Route::post('/profiles/{user:username}/follow', [App\Http\Controllers\FollowsController::class, 'store'])->name('follow');
    Route::get('/profiles/{user:username}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->middleware("can:edit,user");
    Route::patch('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'update'])->middleware("can:edit,user");
    Route::get('/explore', [App\Http\Controllers\ExploreController::class, 'index']);

});

Route::get('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile');


Auth::routes();

