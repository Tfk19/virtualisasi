<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DimensiBukuController;


Route::get('/', [DimensiBukuController::class, 'index']);
Route::get('/dimensibuku', [DimensiBukuController::class, 'index'])->name('dimensibuku.index');
Route::get('/dimensibuku/create', [DimensiBukuController::class, 'create'])->name('dimensibuku.create');
Route::post('/dimensibuku', [DimensiBukuController::class, 'store'])->name('dimensibuku.store');
Route::get('/dimensibuku/{id}/edit', [DimensiBukuController::class, 'edit'])->name('dimensibuku.edit');
Route::put('/dimensibuku/{id}', [DimensiBukuController::class, 'update'])->name('dimensibuku.update');
Route::delete('/dimensibuku/{id}', [DimensiBukuController::class, 'destroy'])->name('dimensibuku.destroy');
Route::get('/dimensi_buku', [DimensiBukuController::class, 'index'])->name('dimensibuku.index');
Route::post('/dimensibuku/update/{id}', [DimensiBukuController::class, 'updateInline'])->name('dimensibuku.updateInline');
