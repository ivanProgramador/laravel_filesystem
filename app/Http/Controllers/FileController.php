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
        Storage::put('File2.txt','Conteudo do arquivo 1');
        return redirect()->route('home');
    }

    public function storageLocalAppend(){

        Storage::append('File2.txt',Str::random(100));

         return redirect()->route('home');

    }

    public function storageLocalRead(){

        //carrega o conteudo do arquivo para dentro da variavel

        $conteudo = Storage::get('File2.txt');


        echo $conteudo;
    }

    public function storageLocalReadMulti(){
        //pegando o aruivo de texto 
        $lines = Storage::get('File2.txt');

        //usandoa  função explode para separar as linhas nesse caos a cada
        //quabra de linha (PHP_EOL) ele vai contar como uma linha diferente e colocar em uma posição
        //de um array 

        $lines = explode(PHP_EOL,$lines);

        //fazendo um loop para mostrar todas as linhas do arquivo
        //uma a uma 

        foreach($lines as $line){
            echo "<p>.$line.</p>";
        }
    }

    public function storageLocalCheckFile(){
     
        // npprverificara se uma ruivo existe basta usar o metodo exists da classe
        //Storage apos o teste ele retorna uma bolenao que pode ser testado pelo if else

        $exists = Storage::exists('File100.txt');

        if($exists){
            echo'o arquivo existe';
        }else{
             echo'o arquivo não existe';
        }
    }

    public function storeJson(){

        $data = [
          [
            'name'=>'joao',
            'email'=>'joao@mail.com'
          ],
           [
            'name'=>'maria',
            'email'=>'email@mail.com'
          ],
           [
            'name'=>'Camila',
            'email'=>'camila@mail.com'
          ]
        ];

        //transfomando o array em json 

        Storage::put('data.json',json_encode($data));
        echo'ficheiro json criado !';



    }

    public function readJson(){

        //pesauisando pelo json e  mstrando ele na tela 
         $data = Storage::json('data.json');
         echo'<pre>';
         print_r($data);
    }

    public function listFiles(){
        
        $files = Storage::files('');
        echo'<pre>';
        print_r($files);
    }

    
}
