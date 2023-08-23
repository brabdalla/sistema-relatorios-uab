<x-app-layout>
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar relatório</h1>
    </div>

    <div class="row justify-content-md-center">

        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('editar.salvar.relatorio', $relatorios[0]->id) }}" id="form">
                    @csrf
                    @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Vinculo:</label>
                                <input disabled class="form-control" type="text" value="{{'Edital '.$vinculacao[0]->edital.' - '.$vinculacao[0]->funcao->nome_funcao.' - '.$vinculacao[0]->curso->nome_curso}}"  />
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label>Data de referência:</label>
                                <input disabled class="form-control" type="text" value="{{$relatorios[0]->mes_ano_referencia}}"/>
                            </div>
                        
                        </div>
                        <div class="form-row">
                            
                           
                            <div class="form-group col-md-12">
                                <label for="descricao">Descrição:</label>
                                <textarea id="descricao" name="descricao" class="form-control">{{$relatorios[0]->descrição_atividades}}</textarea>
                            
                            </div>
                        </div>
                        <hr/>
                        <button type="submit" form="form" value="Submit" class="btn btn-primary">Salvar</button> 
                        <a href="{{ route('relatorio.vinculo') }}" class="btn btn-secondary">voltar</a>
               
                    </form>
                    
                </div>
            </div>

        </div>

    </div>    
</x-app-layout>
