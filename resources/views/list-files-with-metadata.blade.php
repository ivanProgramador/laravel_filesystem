
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
                        <li><strong>Tipo MIME:</strong> {{ $file['mime_type'] }}</li>
                        <li><strong>Ultima alteração:</strong> {{ $file['last_modified'] }}</li>
                        
                     </ul>
                </div>
                  
            @endforeach
     </div>
</div>
</x-main-layout>