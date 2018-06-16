@extends('layout')
@section('title')
    Корзина
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
            <h4>Total: {{ $total }}</h4>
            -- агрегатор--платежная система--
            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                <div class="col-xs-12">
                    <div class="form-group"><label for="name">Name</label><input type="text" id="name"
                                class="form-control" name="name"
                                required></div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group"><label for="address">Address</label><input type="text" id="address" name="address"
                                class="form-control"
                                required></div>
                </div>
               {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Оплатить</button>
            </form>
        </div>
    </div>
@endsection