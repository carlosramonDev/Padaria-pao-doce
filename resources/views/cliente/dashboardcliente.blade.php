@extends('layouts.main')

@section('title', 'dashboard')

@section('content')

<div id="search-container" class="col-md-12"></div>
<h1 style="margin: 30px;">Usuários Cadastrados:</h1>
<div class="col-md-12 dashboard-product-container">
    <div class="row">
    <div class="col-md-2 text-center">
            <a href="/register"  class="btn btn-warning" id="cliente-submit">Cadastrar Usuário</a>
        </div>
        <div class="col-md-10">
            @if(count($users)>0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td><a href="/user/{{ $user -> id }}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->Verificador}}</td>
                            <td>
                                
                            
                            <a href="/cliente/editcliente/{{$user->id}}"id="btncrud" class="btn btn-success edit btn">EDITAR</a> 

                                <form action="/cliente/{{$user->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="btncrud" class="btn btn-danger delete-btn"> DELETAR</button>
                                </form>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>Não há clientes cadastrados, <a href="/register">Cadastrar cliente</a></p>
            @endif
        </div>
    </div>
</div>






@endsection
