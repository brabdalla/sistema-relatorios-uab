<x-app-layout>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Acesso</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Usuário</h6>
                </div>
                <div class="card-body">
                @isset($user)
                    <div class="form-row">
                      
                            <div class="form-group col-md-12">
                                <h5 class="label label-default">Nome:</h5>
                                <input class="form-control" type="text" value="{{$user->name}}" disabled />
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5 class="label label-default">E-mail:</h5>
                            <input class="form-control" type="text"  value="{{$user->email}}" disabled />
                        </div>
                        <div class="form-group col-md-6">
                            <h5 class="label label-default">CPF:</h5>
                            <input class="form-control" type="text" value="{{$user->cpf}}" disabled />
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
                    <span class="text">Adicionar Regras</span>
                </button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="40%">Regras</th>
                            <th width="25%">#</th>                         
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($rolesUser as $role)
                        <tr>
                            <td>{{$role}}</td>
                            <td>
                                <form  action="{{ route('role.user.excluir') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta regra?')">
                                    @csrf
                                    <input type="hidden" name="roleDel" value="{{$role}}">
                                    <input type="hidden" name="userId" value="{{$user->id}}"/>
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
                <h4 class="modal-title">Adicionar Regra</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('user.add.novaRegra') }}" id="form">
            @csrf
            <div class="modal-body">
                <!--formulário de cadastro de disciplina -->
                
                <input type="hidden" name="user" value="{{$user->id}}"/>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nome_disciplina">Regra:</label>
                            <select name="role" id="role" class="form-select form-select-lg" aria-label=".form-select-lg">
                                <option></option>
                                @foreach ($roles as $regra)
                                    <option value="{{$regra->name}}">{{$regra->name}}</option>
                                @endforeach
                            </select>
                            
                       
                    
                            
                        </div>
                    </div>
                
                
                <hr/>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button type="submit" form="form" value="Submit" class="btn btn-primary">Adicionar</button> 
            </div>
            </form>
        </div>

    </div>
</div>

</x-app-layout>
