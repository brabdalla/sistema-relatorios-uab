<x-app-layout>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Relatório realizados</h1>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
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
                            <h5 class="label label-default">Curso:</h5>
                            <input class="form-control" type="text" value="{{$cursos->nome_curso}}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Função:</h5>
                            <input class="form-control" type="text" value="{{$funcoes->nome_funcao }}" disabled />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h5 class="label label-default">Coordenador:</h5>
                            <input class="form-control" type="text" value="{{$relatorios[0]->coordenador->name}}" disabled />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Edital:</h5>
                            <input class="form-control" type="text" value="{{$relatorios[0]->vinculo->edital}}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Início do Vínculo:</h5>
                            <input class="form-control" type="text" value="{{date('d/m/Y', strtotime($relatorios[0]->vinculo->data_inicio))}}" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <h5 class="label label-default">Fim do Vínculo:</h5>
                            <input class="form-control" type="text" value="{{date('d/m/Y', strtotime($relatorios[0]->vinculo->data_fim))}}" disabled />
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
                            <th>Mês de referência</th>
                            <th>Assinatura Bolsista</th> 
                            <th>Assinatura Coordenador</th>
                            <th>#</th>                         
                        </tr>
                    </thead>
                    <tbody>
                    @isset($relatorios)
                        @foreach ($relatorios as $relatorio)
                            <tr>
                                <td>{{$relatorio->id}}</td>
                                <td>{{date('m/Y', strtotime($relatorio->mes_ano_referencia))}}</td>
                                <td>@if ($relatorio->hash_validacao_bolsista == NULL){{"Não Assinado"}}@else{{"Assinado"}}@endif</td>
                                <td>@if ($relatorio->hash_validacao_coordenador == NULL){{"Não Assinado"}}@else{{"Assinado"}}@endif</td>
                                <td>
                                    @if ($relatorio->hash_validacao_bolsista == NULL)
                                    <a class="btn btn-primary" href="{{ route('editar.relatorio', $relatorio->id) }}">Editar</a>
                                    @else
                                    <a href="#" class="btn btn-secondary disabled" aria-disabled="true">Editar</a>
                                    @endif
                                    @if ($relatorio->hash_validacao_bolsista == NULL)
                                    <a class="btn btn-success" data-toggle="modal" data-target="#myModal_Assinar">Assinar</a>
                                    @else
                                    <a href="#" class="btn btn-secondary disabled" aria-disabled="true">Assinar</a>
                                    @endif
                                    <a class="btn btn-link" href="{{ route('gerarPdf.relatorio', $relatorio->id) }}">Gerar PDF</a>
                                </td>
                            </tr>

                            <!-- Modal -->
                                <div class="modal fade" id="myModal_Assinar" role="dialog">
                                    <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                        </div>
                                        
                                        <form method="POST" action="{{ route('assinar.relatorio', $relatorio->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="senha">Senha</label>
                                                    <input type="password" class="form-control" id="senha" name="senha" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Assinar</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    </div>
                                </div>



                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>
