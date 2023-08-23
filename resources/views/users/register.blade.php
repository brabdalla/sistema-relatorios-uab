<x-app-layout>
<h1 class="h3 mb-2 text-gray-800">Cadastro do Bolsista</h1>

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                         <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form class="user" method="POST" action="{{ route('register.admin.gravar') }}">
                             @csrf
                             <!-- Name -->
                            <div class="form-group">
                                <label class="small mb-1">Nome Completo</label>
                                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" 
                                required autofocus />       
                            </div>
                            <div class="form-group row">
                                <!-- CPF -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="small mb-1">CPF</label>
                                    <x-input id="cpf" class="form-control" type="text" name="cpf" :value="old('cpf')" 
                                     required autofocus />
                                </div>
                                <!-- RG -->
                                <div class="col-sm-6">
                                    <label class="small mb-1">RG</label>
                                    <x-input id="rg" class="form-control" type="text" name="rg" :value="old('rg')" 
                                     required autofocus />
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <!-- Sexo -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="small mb-1">Sexo</label>
                                    <select id="sexo" class="form-control" name="sexo"
                                    required autofocus>
                                        <option></option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                        <option value="NF">Não Informar</option>
                                    </select>
                                </div>
                                <!-- Data de Nascimento -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="small mb-1">Data de nascimento</label>
                                    <x-input id="data_nascimento" class="form-control" type="date" 
                                    name="data_nascimento" :value="old('data_nascimento')" required autofocus />
                                </div>
                                
                            </div>
                            <!-- Formação superior -->
                            <div class="form-group">
                                <label class="small mb-1">Curso Superior</label>
                                <x-input id="curso_superior" class="form-control" type="text" name="curso_superior" :value="old('curso_superior')" 
                                 required autofocus />       
                            </div>
                            <!-- Pós_graduação -->
                            <div class="form-group">
                                <label class="small mb-1">Pós-Graduação</label>
                                <select id="pos_graduacao" class="form-control" name="pos_graduacao"
                                    required autofocus>
                                    <option value="Não Possui">Não Possui</option>
                                    <option value="Especialização">Especialização</option>
                                    <option value="Mestrado">Mestrado</option>
                                    <option value="Doutorado">Doutorado</option>
                                </select>    
                            </div>
                            <!-- Área Pós-graduação -->
                            <div class="form-group">
                                <label class="small mb-1">Área Pós-graduação</label>
                                <x-input id="area_pos" class="form-control" type="text" name="area_pos" :value="old('area_pos')" 
                                  autofocus />       
                            </div>
                            <hr>
                             <!-- Email Address -->
                             <div class="form-group row">
                                <div class="col-sm-8">
                                    <label class="small mb-1">E-mail</label>
                                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" 
                                    required />
                                </div>

                                 <!-- telefone -->
                                <div class="col-sm-4">
                                    <label class="small mb-1">Telefone</label>
                                    <x-input id="telefone" class="form-control" type="text" name="telefone" :value="old('telefone')" 
                                     required autofocus />
                                </div>



                            </div>
                            <!-- Endereço -->
                            <div class="form-group">
                                <label class="small mb-1">Endereço</label>
                                <x-input id="endereco" class="form-control" type="text" name="endereco" :value="old('endereco')" 
                                 required autofocus />       
                            </div>
                            <!-- Bairro -->
                            <div class="form-group">
                                <label class="small mb-1">Bairro</label>
                                <x-input id="bairro" class="form-control" type="text" name="bairro" :value="old('bairro')" 
                                 required autofocus />       
                            </div>
                            <div class="form-group row">
                                <!-- CEP -->
                                <div class="col-sm-4">
                                    <label class="small mb-1">CEP</label>
                                    <x-input id="cep" class="form-control" type="text" name="cep" :value="old('cep')" 
                                     required autofocus />
                                </div>
                                <!-- Cidade -->
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label class="small mb-1">Cidade</label>
                                    <x-input id="cidade" class="form-control" type="text" 
                                    name="cidade" :value="old('cidade')" required autofocus />
                                </div>
                                <!-- Estado -->
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label class="small mb-1">Estado</label>
                                    <select id="estado" class="form-control" name="estado"
                                    required autofocus>
                                        <option></option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                                
                            </div>
                            <hr>
                            
                            <button class="btn btn-primary" type="submit">Gravar</button>
                            <a href="{{ route('usuarios') }}" type="button" class="btn btn-secondary">Voltar</a>
                    
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>