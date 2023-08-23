<x-app-layout>
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cadastrar nova função</h1>
    </div>

    <div class="row justify-content-md-center">

        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form class="user" method="POST" action="{{ route('salvar_funcao') }}" id="form">
                    @csrf
                        <div class="form-group row">
                            <div class="col-sm-2 mb-1 mb-sm-0">
                                <label class="medim mb-1">Nome da função:</label>
                            </div>
                            <div class="col-sm-8">
                                <x-input id="nome_funcao" class="form-control" type="text" name="nome_funcao" :value="old('nome_funcao')" required autofocus />
                            </div>
                        </div>
                        <hr/>
                        <button type="submit" form="form" value="Submit" class="btn btn-primary btn-user">Salvar</button> 
                        <a href="{{ route('funcoes') }}" class="btn btn-secondary btn-user">voltar</a>                 
                    </form>
                    
                </div>
            </div>

        </div>

    </div>    
</x-app-layout>
