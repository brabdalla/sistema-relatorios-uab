<x-app-layout>
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alterar Curso</h1>
    </div>

    <div class="row justify-content-md-center">

        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form class="user" method="POST" action="{{ route('curso.editar', $curso->id) }}" id="form">
                    @csrf
                    @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Nome do curso:</label>
                                <x-input id="nome_curso" class="form-control" type="text" name="nome_curso" value="{{$curso->nome_curso}}" disable />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Oferta:</label>
                                <x-input id="oferta" class="form-control" type="text" name="oferta" value="{{$curso->oferta}}" required autofocus />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEstado">Início do curso:</label>
                                <x-input id="inicio_curso" class="form-control" type="date" name="inicio_curso" value="{{$curso->inicio_curso}}" required autofocus />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCEP">Fim do curso</label>
                                <x-input id="fim_curso" class="form-control" type="date" name="fim_curso" value="{{$curso->fim_curso}}" required autofocus />
                            
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
