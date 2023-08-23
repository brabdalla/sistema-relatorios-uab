<x-app-layout>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Usuários</h1>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ route('register.admin') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Cadastrar novo Usuário</span>
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th> 
                            <th>CPF</th>   
                            <th>#</th>                         
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->cpf}}</td>
                            <td>
                                <a href="{{ route('user.detalhes.admin', $usuario->id) }}" type="button" class="btn btn-info">Informações</a>
                                <form style="display: inline-block;" action="{{ route('user.excluir', $usuario->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Desativar</button>
                                </form>
                                <a href="{{ route('vinculacoes', $usuario->id) }}" type="button" class="btn btn-dark">Vinculações</a>
                                <a type="button" class="btn btn-link" href="{{ route('user.roles', $usuario->id) }}">Tipo de Acesso</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
