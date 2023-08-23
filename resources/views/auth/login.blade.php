<x-guest-layout>
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 col-lg-6 d-flex justify-content-center align-items-center">
                            <figure class="figure">
                                <img src="{{ asset('img/setec.png')}}" alt="SETEC Logo" class="figure-img img-fluid rounded">
                            </figure>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Sistema de relatório UAB</h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <!-- Email Address -->
                                    <div class="form-group">
                                        <x-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" 
                                        placeholder="Insira o endereço de e-mail..." required autofocus />
                                        
                                    </div>
                                    <!-- Password -->
                                    <div class="form-group">

                                    <x-input id="password" class="form-control form-control-user"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" 
                                            placeholder="Senha" />
                                        
                                    </div>
                                    <div class="form-group">
                                        <!-- Remember Me -->
                                        <div class="custom-control custom-checkbox small">
                                            <input id="remember_me" type="checkbox"  class="custom-control-input" name="remember">
                                            <label class="custom-control-label" for="customCheck">{{ __('Lembre de mim') }}</label>
                                        </div>
                                    </div>
                                    <x-button class="btn btn-primary btn-user btn-block">
                                        {{ __('Entrar') }}
                                    </x-button>
                                    
                                </form>
                                <hr>
                                @if (Route::has('password.request'))
                                    <a class="small" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a>
                                @endif
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-guest-layout>