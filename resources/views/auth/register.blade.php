@extends('layouts.main')

@section('content')
<div class="container2">
    <img src="/img/paoBrand.svg" alt="Padaria pão doce">
    <h1>PADARIA SONHO BOM</h1>
    <div class= col-md-12>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h1>Crie sua conta:</h1>

                            <div class="form-group row">
                                <label for="name" class="col-md-8 col-form-label text-md-right">
                                <p>Nome:</p>
                                </label>
                                <div class="col-md-12">
                                    <input id="name" placeholder="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-8 col-form-label text-md-right">
                                <p>Endereço de email:</p>
                                </label>

                                <div class="col-md-12">
                                    <input id="email" placeholder="name@example.com" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-8 col-form-label text-md-right">
                                    <P>Senha:</P>
                                </label>

                                <div class="col-md-12">
                                    <input id="password" placeholder="********" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-8 col-form-label text-md-right">
                                <p>Confirmar Senha</p>
                                </label>

                                <div class="col-md-12">
                                    <input id="password-confirm" placeholder="********" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="btn-cadastro" class="btn btn-success">
                                        {{ __('Cadastrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
