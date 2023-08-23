<x-app-layout>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cursos</h1>
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
                <a href="{{ route('novo_cursos') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Cadastrar novo Curso</span>
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="40%">Curos</th>
                            <th width="10%">Oferta</th> 
                            <th width="15%">Data de Início</th> 
                            <th width="15%">Date de Fim</th>   
                            <th width="25%">#</th>                         
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{$curso->id}}</td>
                            <td>{{$curso->nome_curso}}</td>
                            <td>{{$curso->oferta}}</td>
                            <td>{{date('d/m/Y', strtotime($curso->inicio_curso))}}</td>
                            <td>{{date('d/m/Y', strtotime($curso->fim_curso))}}</td>
                            <td>
                            <a href="{{ route('disciplinas', ['curso' => $curso->id]) }}" class="btn btn-primary">Disciplinas</a>
                            <button type="button" class="btn btn-secondary">Editar</button>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
