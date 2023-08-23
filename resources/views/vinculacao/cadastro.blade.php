<x-app-layout>
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Novo Vínculo</h1>
    </div>

    <div class="row justify-content-md-center">

        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">

                @isset($user)
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <h5 class="label label-default">Nome:</h5>
                            <input class="form-control" type="text" value="{{$user->name}}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">CPF:</h5>
                            <input class="form-control" type="text" value="{{$user->cpf }}" disabled />
                        </div>
                    </div>
                </div>
                @endisset
                <hr/>



                <div class="card-body">
                    <form class="user" method="POST" action="{{ route('salvar_vinculo') }}" id="form">
                    @csrf
                        <input type="hidden" id="user" name="user" value="{{$user->id }}">

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Edital:</label>
                                <x-input id="edital" class="form-control" type="text" name="edital" :value="old('edital')" required autofocus />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Função:</label>
                                <select name="funcao_uab" id="funcao_uab" class="form-control">
                                <option></option>
                                @foreach ($funcoes as $funcao)
                                    <option value="{{ $funcao->id }}">{{ $funcao->nome_funcao }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCEP">Curso</label>
                                <select name="curso" id="curso" class="form-control">
                                <option></option>
                                @foreach ($cursos as $curso)
                                    <option value="{{ $curso->id }}">{{ $curso->nome_curso }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEstado">Início do vínculo:</label>
                                <x-input id="data_inicio" class="form-control" type="date" name="data_inicio" :value="old('data_inicio')" required autofocus />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCEP">Fim do vínculo</label>
                                <x-input id="data_fim" class="form-control" type="date" name="data_fim" :value="old('data_fim')" required autofocus />
                            
                            </div>
                        </div>
                        <hr/>
                        <button type="submit" form="form" value="Submit" class="btn btn-primary">Salvar</button> 
                        <a href="{{ route('vinculacoes', $user->id) }}" class="btn btn-secondary">voltar</a>
               
                    </form>
                    
                </div>
            </div>

        </div>

    </div>    
</x-app-layout>
