<x-app-layout>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Relatórios Mensais</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Selecione a data</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="{{ route('mensal.relatorios.busca') }}" id="form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label label-default">Mês:</label>
                            <select class="form-select form-select-lg mb-2" aria-label="Default select example" name="mes">
                                <option selected>Selecione o mês</option>
                                <option value="01">Janeiro</option>
                                <option value="02">Fevereiro</option>
                                <option value="03">Março</option>
                                <option value="04">Abril</option>
                                <option value="05">Maio</option>
                                <option value="06">Junho</option>
                                <option value="07">Julho</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label label-default">Ano:</label>
                            <select class="form-select form-select-lg mb-2" aria-label="Default select example" name="ano">
                                <option selected>Selecione o ano</option>
                                @if($diferencaAnos == 0)
                                   <option value="{{$anoInicial}}">{{$anoInicial}}</option>
                                @else
                                    @for ($ano = $anoInicial; $ano <= $anoAtual; $ano++)
                                        <option value="{{ $ano }}">{{ $ano }}</option>
                                        
                                    @endfor
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" form="form" value="Submit" class="btn btn-primary">Buscar</button> 
                        </div>
                    </div>
                </form>
                </div>
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
                            <th>Nome Bolsista</th>
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
                                <td>{{$relatorio->vinculo->user->name}}</td>
                                <td>@if ($relatorio->hash_validacao_bolsista == NULL){{"Não Assinado"}}@else{{"Assinado"}}@endif</td>
                                <td>@if ($relatorio->hash_validacao_coordenador == NULL){{"Não Assinado"}}@else{{"Assinado"}}@endif</td>
                                <td>
                                    @if ($relatorio->hash_validacao_coordenador == NULL)
                                    <a class="btn btn-success" data-toggle="modal" data-target="#myModal_Assinar">Assinar</a>
                                    @else
                                    <a href="#" class="btn btn-secondary disabled" aria-disabled="true">Assinar</a>
                                    @endif
                                    <a class="btn btn-link" href="{{ route('gerarPdf.relatorio', $relatorio->id) }}">Baixar Relatório em PDF</a>
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
                                        
                                        <form method="POST" action="{{ route('coord.assinar', $relatorio->id) }}">
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
