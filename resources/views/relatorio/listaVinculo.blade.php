<x-app-layout>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bolsistas</h1>
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
            </div>

        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
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
                            <th>Status</th>
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
                            <td>@if ($vinculacao->deleted_at == NULL){{"Ativo"}}@else{{"Encerrado dia: ".date('d/m/Y', strtotime($vinculacao->deleted_at))}}@endif</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('lista.relatorio', $vinculacao->id) }}">Relatórios</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>
