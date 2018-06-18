@extends('layout')
@section('title')
    Корзина
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Корзина</h1>
            @include('admin.errors')
            <h4>Всего: {{ $total }}</h4>
            -- агрегатор--платежная система--
            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                <div class="col-xs-12">
                    <div class="form-group"><label for="name">Имя</label>
                        <input type="text" id="name"
                                class="form-control" name="name"
                               value="{{ $user->name }}"
                                required></div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group"><label for="email">Email</label><input type="text" id="email" name="email" value="{{ $user->email }}"                                                                                        class="form-control">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group"><label for="phone">Телефон</label><input type="text" id="phone" name="phone"                                                                                       class="form-control"></div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group"><label for="address">Адрес</label><input type="text" id="address" name="address"
                                class="form-control"
                               ></div>
                </div>

               {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Оплатить</button>
            </form>
        </div>
    </div>
@endsection