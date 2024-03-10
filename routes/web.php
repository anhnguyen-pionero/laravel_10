<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::prefix('ideas/')->group(function () {
    Route::post('', [IdeaController::class, 'store'])->name('ideas.create');
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
    Route::middleware(['auth'])->group(function () {
        Route::get('{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');

        Route::put('{idea}', [IdeaController::class, 'update'])->name('ideas.update');

        Route::delete('{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

        Route::post('{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store');
    });
});

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

