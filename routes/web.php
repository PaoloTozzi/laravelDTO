<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::prefix('/article')->group(function (){
    Route::get('/index', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/show/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::delete('/delete/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/update/{article}', [ArticleController::class, 'update'])->name('article.update');
});
