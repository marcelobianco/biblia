<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\Bibliacontroller;
use App\Http\Controllers\Site\Homecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', Homecontroller::class);

Route::get('/{versao}', [Bibliacontroller::class, 'listaLivros'])->name('livros');
Route::get('/{versao}/{livro}', [Bibliacontroller::class, 'listaCapitulos'])->name('capitulos');
Route::get('/{versao}/{livro}/{capitulo}', [Bibliacontroller::class, 'listaVersiculos'])->name('versiculos');
Route::get('/{versao}/{livro}/{capitulo}/{versiculos?}', [Bibliacontroller::class, 'listaVersiculos'])
    ->where('versiculos', '[0-9]+(-[0-9]+)?')
    ->name('filtra_versiculos');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
