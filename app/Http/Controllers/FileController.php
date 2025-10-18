<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Psr7\UploadedFile;
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

        //existe a possibilidade de listar arquivos  
        
        $files = Storage::disk()->files();

        //listando pastas
        // $diretorios = Storage::disk()->directories();
        

        echo'<pre>';
        print_r($files);
    }

    public function localDelete(){
         
        //apagando um arquivo   
        Storage::delete(['file1.txt']);

        //apagando todos os arquivos
         Storage::delete(Storage::files());
         
        echo"Arquivo removido com sucesso";
    }

    public function createFolder(){

        //esse comando vai criara uma pasta dentro do do diretorio
        //storage/app/private 

         Storage::makeDirectory('documents');

        //criando uma pasta dentro da pasta de documentos

         Storage::makeDirectory('documents/teste');
         echo'pasta criada';
    }

    public function deleteFolder(){
        //pagando a pasta documents
        //toda vez qu o storage recebe uma ordem de apagar uma pasta
        //qualquer arquivo dentro dela será eliminado tambem 
         
        Storage::deleteDirectory('documents');
        echo'pasta apagada';
    }

    public function listFilesWithMetadata(){



        //o metodo allFiles traz todos os arquivos de todas as pastas
        //dentro do storage/app 
        //ele retorna também os metadados de cada arquivo que seriam 
        //nome, tamanho, data de modificação e tipo mime

        $list_files = Storage::allFiles();

        $files = [];
        
        //ele vai rtronar uma array com esses dados eentão para ler 
        //eu tenho qque usar um foreach para percorrer cada arquivo e pegar
        //os metadados

        foreach($list_files as $file){
           
            $files[]=[
                'name'=>$file,
                'size' => round(Storage::size($file)/1024,2),
                'last_modified'=>Carbon::createFromTimestamp(Storage::lastModified($file))->format('d/m/Y H:i:s'),
                'mime_type'=>Storage::mimeType($file)
            ];
        }

        //aqui estaou mandando esses dados para a view

        return view('list-files-with-metadata',compact('files'));
     }


        public function listFilesForDowload(){

            $list_files = Storage::allFiles();

            $files = [];

             foreach($list_files as $file){
           
                    $files[]=[
                        'name'=>$file,
                        'size' => round(Storage::size($file)/1024,2),
                        'file'=> basename($file)
                    ];
           }

           //
           return view('list-files-for-download',compact('files'));


        }

        public function uploadFile(Request $request){
         
            // aqui eu pego o endereço do aruivo que veio pela url 
            // e uso a função storage pra criara uma pasta e colocar ele dentro 
            // no caso essa pasta esta em storage/app/private/uploads 
            // para evitar a sobreposição de arquivos o aruivo não fica com o nome original
            // ao inves disse ele recebe uma hash unica e aleatoria como nome,
            // oque impede que ele seja sobreposto.

            //mas dependeo da necessidade o aquivo pode ser salvo em outrra pasta 
            //por exemplo: 
            //$request->file('arquivo')->store('public');

            //agora se não queiser que arquivo mude de nome
            //quando ulpload for feito pode fazer da forma abaixo mas não é aconselhavel  
            // $request->file('arquivo')->storeAs('public',$request->file('arquivo')->getClientOriginalName());

            $request->file('arquivo')->store('upload');

            echo'arquivo enviado com sucesso';

        }






     





    

    





    }
