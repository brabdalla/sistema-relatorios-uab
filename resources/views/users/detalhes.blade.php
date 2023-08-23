<x-app-layout>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detalhers Usuário</h1>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Dados Curso -->
    <div class="row">
    

        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detalhes</h6>
                </div>
                @isset($user)
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <h5 class="label label-default">Nome:</h5>
                            <input class="form-control" type="text" value="{{$user->name}}" disabled />
                        </div>
                        <div class="form-group col-md-2">
                            <h5 class="label label-default">Sexo:</h5>
                            <input class="form-control" type="text" value="@if($user->sexo == 'M') Masculino @else Feminino @endif" disabled />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">CPF:</h5>
                            <input class="form-control" type="text" value="{{$user->cpf }}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">RG:</h5>
                            <input class="form-control" type="text" value="{{$user->rg }}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Data de Nascimento:</h5>
                            <input class="form-control" type="text" value="{{date('d/m/y', strtotime($user->data_nascimento)) }}" disabled />
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <h5 class="label label-default">E-mail:</h5>
                            <input class="form-control" type="text" value="{{$user->email }}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Telefone:</h5>
                            <input class="form-control" type="text" value="{{$user->telefone }}" disabled />
                        </div>
                    </div>
                    <hr/>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h5 class="label label-default">Curso Superior:</h5>
                            <input class="form-control" type="text"  value="{{$user->curso_superior}}" disabled />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Pós-graduação:</h5>
                            <input class="form-control" type="text" value="{{$user->pos_graduacao }}" disabled />
                        </div>
                        <div class="form-group col-md-8">
                            <h5 class="label label-default">Área da pós Graduação:</h5>
                            <input class="form-control" type="text" value="{{$user->area_pos }}" disabled />
                        </div>
                    </div>
                    <hr/>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <h5 class="label label-default">Endereco:</h5>
                            <input class="form-control" type="text" value="{{$user->endereco }}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">CEP:</h5>
                            <input class="form-control" type="text" value="{{$user->cep }}" disabled />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Bairro:</h5>
                            <input class="form-control" type="text" value="{{$user->bairro }}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Cidade:</h5>
                            <input class="form-control" type="text" value="{{$user->cidade }}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Estado:</h5>
                            <input class="form-control" type="text" value="{{$user->estado }}" disabled />
                        </div>
                    </div>

                </div>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                    <a type="button" class="btn btn-secondary btn-icon-split" href="{{ route('user.editar.admin', $user) }}">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Editar Usuário</span>
                    </a>
                    </h6>
                </div>
                @endisset
            </div>

        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#myModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Novo Vínculo</span>
                </button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Função</th>
                            <th>Curso</th> 
                            <th>Início</th>
                            <th>Fim</th>
                            <th >#</th>                         
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($vinculacoes as $vinculacao)
                        <tr>
                            <td>{{$vinculacao->id}}</td>
                            <td>{{$vinculacao->funcao->nome_funcao }}</td>
                            <td>{{$vinculacao->curso->nome_curso }}</td>
                            <td>{{date('d/m/Y', strtotime($vinculacao->data_inicio))}}</td>
                            <td>{{date('d/m/Y', strtotime($vinculacao->data_fim))}}</td>
                            <td>
                                <form id="apagar" action="{{ route('vinculacoes.excluir', $vinculacao->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este vínculo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-open-modal">Desativar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nova Disciplina</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('salvar_disciplina') }}" id="form">
            @csrf
            <div class="modal-body">
                <!--formulário de cadastro de disciplina -->
                
                <input type="hidden" name="curso" value="#"/>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nome_disciplina">Nome da disciplina:</label>
                            <x-input id="nome_disciplina" class="form-control" type="text" name="nome_disciplina" :value="old('nome_disciplina')" required autofocus />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="ch">Carga Horária:</label>
                            <x-input id="ch" class="form-control" pattern="[0-9]+" type="Number" name="ch" :value="old('ch')" required autofocus />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="semestre_modulo">Semestre ou Módulo:</label>
                            <x-input id="semestre_modulo" class="form-control" pattern="[0-9]+" type="Number" name="semestre_modulo" :value="old('semestre_modulo')" required autofocus />
                        </div>
                    </div>
                <hr/>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button type="submit" form="form" value="Submit" class="btn btn-primary">Salvar</button> 
            </div>
            </form>
        </div>

    </div>
</div>

</x-app-layout>
