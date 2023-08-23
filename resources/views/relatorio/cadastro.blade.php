<x-app-layout>
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cadastrar novo relatório</h1>
    </div>

    <div class="row justify-content-md-center">

        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('salvar.relatorio') }}" id="form">
                    @csrf
                    <input type="hidden" name="usuario" value="{{ $usuario->id }}" />

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="vinculo">Vinculo:</label>
                                <select id="vinculo" name="vinculo" class="form-control">
                                    <option value="" disabled selected></option>
                                    @foreach ($vinculacoes as $key => $vinculacao)
                                        <option value="{{ $vinculacao->id }}" {{ old('vinculacao->id') == $key ? 'selected' : '' }}>
                                            
                                        Edital {{ $vinculacao->edital }} - {{ $vinculacao->funcao->nome_funcao }} - {{$vinculacao->curso->nome_curso }}
                                    
                                    </option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label for="referencia">Data de referência:</label>
                                <x-input id="referencia" class="form-control" type="date" name="referencia" :value="old('referencia')" required autofocus />
                            </div>
                        
                        </div>
                        <div class="form-row">
                            
                           
                            <div class="form-group col-md-12">
                                <label for="descricao">Descrição:</label>
                                <textarea id="descricao" name="descricao" class="form-control">{{ old('descricao') }}</textarea>
                            
                            </div>
                        </div>
                        <hr/>
                        <button type="submit" form="form" value="Submit" class="btn btn-primary">Salvar</button> 
                        <a href="{{ route('cursos') }}" class="btn btn-secondary">voltar</a>
               
                    </form>
                    
                </div>
            </div>

        </div>

    </div>    
</x-app-layout>
