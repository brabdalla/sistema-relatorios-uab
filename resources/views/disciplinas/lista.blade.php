<x-app-layout>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Disciplinas</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Dados do Curso</h6>
                </div>
                <div class="card-body">
                @isset($curso)
                    <div class="form-row">
                      
                            <div class="form-group col-md-12">
                                <h5 class="label label-default">Curso:</h5>
                                <input class="form-control" type="text" value="{{$curso->nome_curso}}" disabled />
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Oferta:</h5>
                            <input class="form-control" type="text"  value="{{$curso->oferta}}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Início do curso:</h5>
                            <input class="form-control" type="text" value="{{date('d/m/Y', strtotime($curso->inicio_curso))}}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Fim do curso:</h5>
                            <input class="form-control" type="text" value="{{date('d/m/Y', strtotime($curso->fim_curso))}}" disabled />
                        
                        </div>
                    </div>
                @endisset
                </div>
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
                    <span class="text">Cadastrar nova Disciplina</span>
                </button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="40%">Nome</th>
                            <th width="10%">C.H.</th> 
                            <th width="25%">Semestre</th>
                            <th width="25%">#</th>                         
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($disciplinas as $disciplina)
                        <tr>
                            <td>{{$disciplina->id}}</td>
                            <td>{{$disciplina->nome_disciplina}}</td>
                            <td>{{$disciplina->ch}}</td>
                            <td>{{$disciplina->semestre_modulo}}</td>
                            <td>
                                <form id="apagar" action="{{ route('disciplina.excluir', $disciplina->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta disciplina?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-open-modal">Excluir</button>
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
                
                <input type="hidden" name="curso" value="{{$curso->id}}"/>

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
