<x-app-layout>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Permissões</h1>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- DataTales Example -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#myModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Nova permissão</span>
                </button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Permissão</th>  
                            <th>#</th>                         
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permissao)
                        <tr>
                            <td>{{$permissao->id}}</td>
                            <td>{{$permissao->name}}</td>
                            <td></td>
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
                <h4 class="modal-title">Permissão</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('salvar.permissoes') }}" id="form">
            @csrf
            <div class="modal-body">
                <!--formulário de cadastro de disciplina -->
            

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nome">Nome da permissão:</label>
                            <x-input id="nome" class="form-control" type="text" name="nome" :value="old('nome')" required autofocus />
                        </div>
                    </div>
                
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
