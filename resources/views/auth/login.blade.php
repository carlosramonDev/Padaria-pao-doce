
@extends('layouts.main')

@section('content')
<div class="container1" class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <img src="/img/paoBrand.svg" alt="Padaria pão doce">
            <h1>PADARIA SONHO BOM</h1>
            <div class="card"> 
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="floatingInput">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Senha" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="floatingPassword">Senha</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                    <button type="submit" id="btn-login" class="btn btn-success btn-lg">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        <p>Lembrar senha</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center">
                        @if (Route::has('password.request'))
                            <a class="btn " href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif
        </div>
    </div>
</div>
@endsection
