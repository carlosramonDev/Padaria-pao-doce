@extends('layouts.main')

@section('title', $product->product)

@section('content')



<div class="col-md-10 offset-md-1">
  <div class="row">
    <div id="image-container" class="container col-md-6">
      <img src="/img/products/{{$product->image}}" class="img-fluid" alt="{{$product->product}}">
    </div>
    <div id="info-container" class="col-md-6">
      <h1>{{$product->product}}</h1>
      <p class="product-valor">Valor: R$ {{$product->valor}}</p>

        <form action="/cadastro/carrinho/{{$product->id}}" method="POST">
        @csrf
        @method('POST')
        <a href="/cadastro/carrinho/{{$product->id}}" 
          class="btn btn-warning" 
          id="product-compra"
          onclick="product.preventDefault();
          this.closest('form').submit();">
          Comprar
        </a>
        </form>
        <div class="col-md-12" id="description-container">
      <h3>Sobre o produto:</h3>
      <p class="product-description">{{$product->description}}</p>
    </div>

    </div>
  </div>
</div>
</div>

@endsection