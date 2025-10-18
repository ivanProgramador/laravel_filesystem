<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/',[FileController::class,'index'])->name('home');

//criar um arquivo 
Route::get('/storage_local_create',[FileController::class,'storageLocalCreate'])->name('storage.local.create');

//adicionar dados no arquivo 
Route::get('/storage_local_append',[FileController::class,'storageLocalAppend'])->name('storage.local.append');

//lendo arquivos vcom uma linha 
Route::get('/storage_local_read',[FileController::class,'storageLocalRead'])->name('storage.local.read');

//lendo arquivos com multiplas linhas

Route::get('/storage_local_read_multi',[FileController::class,'storageLocalReadMulti'])->name('storage.local.read.multi');

//verificar se um arquivo existe 

Route::get('/storage_local_check_file',[FileController::class,'storageLocalCheckFile'])->name('storage.local.check.file');

//guardar um arquivo json 

Route::get('/storage_local_store_json',[FileController::class,'storeJson'])->name('storage.local.store.json');

//ler um arquivo json 

Route::get('/storage_local_read_json',[FileController::class,'readJson'])->name('storage.local.read.json');

//listar arquivos

Route::get('/storage_list',[FileController::class,'listFiles'])->name('storage.local.list');

//deletar aquivos

Route::get('/storage_local_delete',[FileController::class,'localDelete'])->name('storage.local.delete');

//rotas para operações com pastas 

Route::get('/storage_create_folder',[FileController::class,'createFolder'])->name('storage.local.create.folder');
Route::get('/storage_delete_folder',[FileController::class,'deleteFolder'])->name('storage.local.delete.folder');

//arquivos ccom metadata
Route::get('/storage_local_list_files_metadata',[FileController::class,'listFilesWithMetadata'])->name('storage.local.list.files.metadata');

//listando aruivos para download 
Route::get('/storage_local_list_files_for_download',[FileController::class,'listFilesForDowload'])->name('storage.local.list.for.download');












