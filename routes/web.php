<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('landpage');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
    Route::put('trashed/{id}/restore', [PostController::class, 'restore'])->name('posts.restore')->middleware('auth');
    Route::delete('/trashed/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.force-delete')->middleware('auth');
    Route::delete('/destroy-all', [PostController::class, 'destroyAll'])->name('posts.destroy-all')->middleware('auth');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::post('posts/upload/image',[PostController::class,'UploadImage']);
