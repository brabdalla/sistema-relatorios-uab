<x-app-layout>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Relatório de bolsistas</h1>
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Função</th> 
                            <th>Curso</th>   
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach ($bolsistas as $bolsista)
                        <tr>
                            <td>{{$bolsista->user_id}}</td>
                            <td>{{$bolsista->user->name}}</td>
                            <td>{{$bolsista->funcao->nome_funcao}}</td>
                            <td>{{$bolsista->curso->nome_curso}} - {{$bolsista->curso->oferta}}</td>
                            <td>
                                <a href="#" type="button" class="btn btn-info">Relatórios</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
