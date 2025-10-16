<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::view('/','home');

Route::get('/file',function(){
   
    $content = Storage::disk('public')->get('teste.txt');
    echo $content;
});
