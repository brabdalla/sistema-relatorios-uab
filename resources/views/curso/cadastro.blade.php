<x-app-layout>
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cadastrar novo Curso</h1>
    </div>

    <div class="row justify-content-md-center">

        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form class="user" method="POST" action="{{ route('salvar_cursos') }}" id="form">
                    @csrf

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Nome do curso:</label>
                                <x-input id="nome_curso" class="form-control" type="text" name="nome_curso" :value="old('nome_curso')" required autofocus />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Oferta:</label>
                                <x-input id="oferta" class="form-control" type="text" name="oferta" :value="old('oferta')" required autofocus />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEstado">Início do curso:</label>
                                <x-input id="inicio_curso" class="form-control" type="date" name="inicio_curso" :value="old('inicio_curso')" required autofocus />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCEP">Fim do curso</label>
                                <x-input id="fim_curso" class="form-control" type="date" name="fim_curso" :value="old('fim_curso')" required autofocus />
                            
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Coordenador do curso:</label>
                                <select name="coordenador_curso" id="coordenador_curso" class="form-control">
                                <option></option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                @endforeach
                                </select>
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
