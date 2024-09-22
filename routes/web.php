<?php
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::get('/create',[productController::class,'create'])->name('data.create');
Route::post('/store',[productController::class,'store'])->name('data.store');
Route::get('/',[productController::class,'index'])->name('data.index');
Route::get('/product/{id}/edit',[productController::class,'edit'])->name('data.edit');
Route::put('/product/{id}',[productController::class,'update'])->name('data.update');
Route::delete('/product/{id}',[productController::class,'delete'])->name('data.delete');    