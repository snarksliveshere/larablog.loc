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
                                class="form-control"
                                required></div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group"><label for="address">Address</label><input type="text" id="address"
                                class="form-control"
                                required></div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group"><label for="card-name">Card Holder Name</label><input type="text"
                                id="card-name" class="form-control"
                                required></div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group"><label for="card-number">Credit Card Number</label><input
                                        type="text"
                                        id="card-number" class="form-control"
                                        required></div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group"><label for="card-expire-month">Expiration Month</label><input
                                        type="text"
                                        id="card-expire-month" class="form-control"
                                        required></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group"><label for="card-expire-year">Expiration Year</label><input type="text"
                                id="card-expire-year" class="form-control"
                                required></div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group"><label for="card-cvc">CVC</label><input type="text" id="card-cvc"
                                class="form-control"
                                required></div>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Оплатить</button>
            </form>
        </div>
    </div>
@endsection