
<x-main-layout>
<div class="container">
     <p class="display-6 mt-5">Ficheiros / arquivos com metadados</p>
     <hr>
     <div class="row">
            @foreach ($files as $file)
                <div class="col-12 card-p-2">
                     <ul>
                        <li><strong>Nome do ficheiro / arquivo:</strong> {{ $file['name'] }}</li>
                        <li><strong>Tamanho do ficheiro / arquivo:</strong> {{ $file['size'] }} bytes</li>
                        <li>Download: <a href="{{ route('download',['file'=>$file['file']] ) }}">Download</a> </li>
                        
                     </ul>
                </div>
                  
            @endforeach
     </div>
</div>
</x-main-layout>