<x-guest-layout>
    <div class="row justify-content-center">    
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">
                                    {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um e-mail com um link de redefinição de senha.') }}
                                    </h1>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
                                </div>
                                <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                    <!-- Email Address -->
                                    <div class="form-group">
                                        <x-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" 
                                        placeholder="Digite o endereço de e-mail..." required autofocus />
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-button class="btn btn-primary btn-user btn-block">
                                            {{ __('Redefinir senha') }}
                                        </x-button>
                                    </div>

                                </form>
                                <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">
                                {{ __('Voltar ') }}
                            </a>
                        </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

