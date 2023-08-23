<x-app-layout>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Papel</h1>
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
                @isset($role)
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h5 class="label label-default">Nome:</h5>
                            <input class="form-control" type="text" value="{{$role->name}}" disabled />
                        </div>
                    </div>
                </div>
                
                @endisset
            </div>

        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Permissão</th>
                            <th >#</th>                         
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name }}</td>
                            
                            <td>

                                @if(sizeof($permissionsAtt) == 0)
                                <form method="POST" action="{{ route('add.permissoes', $role->id) }}" onsubmit="return confirm('Tem certeza que deseja adicionar a permissão?')">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" id="permissao" name="permissao" value="{{$permission->id}}">                                        
                                            <button type="submit" class="btn btn-success" value="Submit">Adicionar</button>
                                            
                                </form>                          
                                   

                                @else
                                @php
                                   $criado = 1;
                                @endphp

                                @foreach ($permissionsAtt as $permissionAtt )
                                    
                                    @if( $permissionAtt->pivot->permission_id == $permission->id)
                                    @php
                                        $criado = 0;
                                    @endphp                                    

                                    <form method="POST" action="{{ route('remover.permissoes', $role->id) }}" onsubmit="return confirm('Tem certeza que deseja remover a permissão?')">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" id="permissao" name="permissao" value="{{$permission->id}}">
                                            <button type="submit" class="btn btn-danger" value="Submit">Remover</button>
                                            
                                        </form>

                                        @break
                                    @endif
                                    @endforeach 

                                    @if( $criado)
                                        <form method="POST" action="{{ route('add.permissoes', $role->id) }}" onsubmit="return confirm('Tem certeza que deseja adicionar a permissão?')">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" id="permissao" name="permissao" value="{{$permission->id}}">                                        
                                            <button type="submit" class="btn btn-success" value="Submit">Adicionar</button>
                                            
                                        </form>
                                    @endif
                               
                                @endif
                                                      

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
