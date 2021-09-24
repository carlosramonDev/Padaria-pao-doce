@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div id="search-container" class="col-md-12">
    
</div>

<div class="containerbtn">
@auth

@if($user->Verificador == 1)
    <div class="text-center">
    <a href="/dashboard"  class="btn btn-warning" id="cadastro-submit">Editar Produto</a>
    <a href="/cliente/dashboardcliente"  class="btn btn-warning" id="cadastro-submit">Editar Usuário</a>
    <a href="/register"  class="btn btn-warning" id="cadastro-submit">Cadastrar Usuário</a>
    <a href="/cadastro/cadastroprodutos"  class="btn btn-warning" id="cadastro-submit">Cadastrar Produtos</a>
    </div>
@endif

@endauth
</div>

<div id="products-container" class="col-md-12">
    <h2>Produtos Disponíveis:</h2>
    <div id="cards-container" class="row">
        @foreach($products as $product)
        <div class="card col-md-3">
            <img src="/img/products/{{$product->image}}" alt="{{$product->title}}">
            <div class="card-body">
                <h5 class="card-title"> {{$product->product}} </h5>
                <a href="/cadastro/{{$product->id}}"  id= "btncomprar" class="btn btn-warning">Comprar</a>
            </div>
        </div>
        @endforeach
        @if (count($products) == 0 && $search)
        <p>Não foi possível encontrar esse produto: {{$search}}! <a href="/">Ver todos</a></p>
        @elseif (count($products)==0)
        <p>Não há produtos disponíveis.</p>
        @endif
    </div>

</div>

@endsection