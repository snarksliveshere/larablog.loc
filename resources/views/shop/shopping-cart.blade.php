@extends('layout')
@section('title')
    Корзина
@endsection
@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{ $product['qty'] }}</span>
                            <strong>{{ $product['item']['title'] }}</strong>
                            <span class="label label-success">{{ $product['price'] }}</span>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sc dropdown-toggle" data-toggle="dropdown">
                                    Действия <span class="caret"></span>
                                </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="">Удалить товар</a></li>
                                        <li><a href="">Удалить все</a></li>
                                    </ul>

                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{ $totalPrice }}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a type="button" class="btn btn-primary" href="{{ route('checkout') }}">Заказать</a>
            </div>
        </div>


    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No items in Cart</h2>
            </div>
        </div>
    @endif
@endsection