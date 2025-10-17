<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index(){
        return view('home');
    }

    
    public function storageLocalCreate(){
        Storage::put('File1.txt','Conteudo do arquivo 1');
        return redirect()->route('home');
    }

    public function storageLocalAppend(){

        Storage::append('File2.txt',Str::random(100));

         return redirect()->route('home');

    }
}
