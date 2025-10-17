<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/',[FileController::class,'index'])->name('home');
Route::get('/storage_local_create',[FileController::class,'storageLocalCreate'])->name('storage.local.create');
Route::get('/storage_local_append',[FileController::class,'storageLocalAppend'])->name('storage.local.append');

//lendo arquivos vcom uma linha 
Route::get('/storage_local_read',[FileController::class,'storageLocalRead'])->name('storage.local.read');

//lendo arquivos com multiplas linhas

Route::get('/storage_local_read_multi',[FileController::class,'storageLocalReadMulti'])->name('storage.local.read.multi');

