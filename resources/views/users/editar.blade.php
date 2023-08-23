<x-app-layout>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detalhers Usuário</h1>
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
                    <form class="user" method="POST" action="{{ route('user.salvar.admin', $user->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <h5 class="label label-default">Nome:</h5>
                                <x-input id="name" class="form-control" type="text" name="name" value="{{$user->name}}"
                                     required autofocus />
                            </div>
                            <div class="form-group col-md-2">
                                <h5 class="label label-default">Sexo:</h5>
                                <select id="sexo" class="form-control" name="sexo"
                                    required autofocus>
                                    <option value="M" @if($user->sexo == 'M') Selected @endif >Masculino</option>
                                    <option value="F" @if($user->sexo == 'F') Selected @endif>Feminino</option>
                                    <option value="NF" @if($user->sexo == 'NF') Selected @endif>Não Informar</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h5 class="label label-default">CPF:</h5>
                                <x-input id="cpf" class="form-control" type="text" name="cpf" value="{{$user->cpf }}"
                                     required autofocus />
                            </div>
                            <div class="form-group col-md-4">
                                <h5 class="label label-default">RG:</h5>
                                <x-input id="rg" class="form-control" type="text" name="rg" value="{{$user->rg }}"
                                     required autofocus />
                            </div>
                            <div class="form-group col-md-4">
                                <h5 class="label label-default">Data de Nascimento:</h5>
                                <x-input id="data_nascimento" class="form-control" type="date" 
                                    name="data_nascimento" required autofocus value="{{$user->data_nascimento }}"/>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <h5 class="label label-default">Curso Superior:</h5>
                                <x-input id="curso_superior" class="form-control" type="text" name="curso_superior" value="{{$user->curso_superior}}"
                                 required autofocus />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h5 class="label label-default">Pós-graduação:</h5>
                                <select id="pos_graduacao" class="form-control" name="pos_graduacao"
                                    required autofocus>
                                    <option value="Não Possui" @if($user->pos_graduacao == 'Não Possui') Selected @endif >Não Possui</option>
                                    <option value="Especialização" @if($user->pos_graduacao == 'Especialização') Selected @endif >Especialização</option>
                                    <option value="Mestrado" @if($user->pos_graduacao == 'Mestrado') Selected @endif >Mestrado</option>
                                    <option value="Doutorado" @if($user->pos_graduacao == 'Doutorado') Selected @endif >Doutorado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <h5 class="label label-default">Área da pós Graduação:</h5>
                                <x-input id="area_pos" class="form-control" type="text" name="area_pos" value="{{$user->area_pos }}"
                                  autofocus />
                            </div>
                        </div>
                        <hr/>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <h5 class="label label-default">E-mail:</h5>
                                <x-input id="email" class="form-control" type="email" name="email" value="{{$user->email }}"
                                 required />
                            </div>
                            <div class="form-group col-md-4">
                                <h5 class="label label-default">Telefone:</h5>
                                <x-input id="telefone" class="form-control" type="text" name="telefone" value="{{$user->telefone }}"
                                     required autofocus />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <h5 class="label label-default">Endereco:</h5>
                                <x-input id="endereco" class="form-control" type="text" name="endereco" value="{{$user->endereco }}"
                                 required autofocus />
                            </div>
                            <div class="form-group col-md-4">
                                <h5 class="label label-default">CEP:</h5>
                                <x-input id="cep" class="form-control" type="text" name="cep" value="{{$user->cep }}"
                                     required autofocus />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h5 class="label label-default">Bairro:</h5>
                                <x-input id="bairro" class="form-control" type="text" name="bairro" value="{{$user->bairro }}"
                                 required autofocus />
                            </div>
                            <div class="form-group col-md-4">
                                <h5 class="label label-default">Cidade:</h5>
                                <x-input id="cidade" class="form-control" type="text" value="{{$user->cidade }}"
                                    name="cidade" value="{{$user->cidade }}" required autofocus />                                
                            </div>
                            <div class="form-group col-md-4">
                                <h5 class="label label-default">Estado:</h5>
                                <select id="estado" class="form-control" name="estado"
                                    required autofocus>
                                        <option value="AC" @if($user->estado == 'AC') Selected @endif >Acre</option>
                                        <option value="AL" @if($user->estado == 'AL') Selected @endif >Alagoas</option>
                                        <option value="AP" @if($user->estado == 'AP') Selected @endif >Amapá</option>
                                        <option value="AM" @if($user->estado == 'AM') Selected @endif >Amazonas</option>
                                        <option value="BA" @if($user->estado == 'BA') Selected @endif >Bahia</option>
                                        <option value="CE" @if($user->estado == 'CE') Selected @endif >Ceará</option>
                                        <option value="DF" @if($user->estado == 'DF') Selected @endif >Distrito Federal</option>
                                        <option value="ES" @if($user->estado == 'ES') Selected @endif >Espírito Santo</option>
                                        <option value="GO" @if($user->estado == 'GO') Selected @endif >Goiás</option>
                                        <option value="MA" @if($user->estado == 'MA') Selected @endif >Maranhão</option>
                                        <option value="MT" @if($user->estado == 'MT') Selected @endif >Mato Grosso</option>
                                        <option value="MS" @if($user->estado == 'MS') Selected @endif >Mato Grosso do Sul</option>
                                        <option value="MG" @if($user->estado == 'MG') Selected @endif >Minas Gerais</option>
                                        <option value="PA" @if($user->estado == 'PA') Selected @endif >Pará</option>
                                        <option value="PB" @if($user->estado == 'PB') Selected @endif >Paraíba</option>
                                        <option value="PR" @if($user->estado == 'PR') Selected @endif >Paraná</option>
                                        <option value="PE" @if($user->estado == 'PE') Selected @endif >Pernambuco</option>
                                        <option value="PI" @if($user->estado == 'PI') Selected @endif >Piauí</option>
                                        <option value="RJ" @if($user->estado == 'RJ') Selected @endif >Rio de Janeiro</option>
                                        <option value="RN" @if($user->estado == 'RN') Selected @endif >Rio Grande do Norte</option>
                                        <option value="RS" @if($user->estado == 'RS') Selected @endif >Rio Grande do Sul</option>
                                        <option value="RO" @if($user->estado == 'RO') Selected @endif >Rondônia</option>
                                        <option value="RR" @if($user->estado == 'RR') Selected @endif >Roraima</option>
                                        <option value="SC" @if($user->estado == 'SC') Selected @endif >Santa Catarina</option>
                                        <option value="SP" @if($user->estado == 'SP') Selected @endif >São Paulo</option>
                                        <option value="SE" @if($user->estado == 'SE') Selected @endif >Sergipe</option>
                                        <option value="TO" @if($user->estado == 'TO') Selected @endif >Tocantins</option>
                                    </select>
                            </div>
                        </div>
                        <div class="card-header py-3">
                        <button class="btn btn-primary" type="submit">Gravar</button>
                        <a type="button" class="btn btn-secondary" href="{{ route('user.detalhes.admin', $user->id) }}">Voltar</a>
                        </div>
                    </form>

                </div>
                
                @endisset
            </div>

        </div>
    </div>

</x-app-layout>
