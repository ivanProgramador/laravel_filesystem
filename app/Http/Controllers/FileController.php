<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        return view('home');
    }

    
    public function storageLocalCreate(){
        Storage::put('File1.txt','Conteudo do arquivo 1');
    }
}
