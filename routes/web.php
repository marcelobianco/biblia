<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\Bibliacontroller;
use App\Http\Controllers\Site\Homecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', Homecontroller::class);

Route::get('/{versao}', [Bibliacontroller::class, 'livros'])->name('biblia');
Route::get('/{versao}/{livro}', [Bibliacontroller::class, 'capitulos'])->name('biblia');
Route::get('/{versao}/{livro}/{capitulo}', [Bibliacontroller::class, 'versiculos'])->name('biblia');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
