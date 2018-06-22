@extends('layout')
@section('title')
    Корзина
@endsection
@section('content')
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <h1>Корзина</h1>
                        @include('admin.errors')
                        <h4>Всего: {{ $total }}</h4>
                        <form action="{{ route('checkout') }}" class="form-horizontal contact-form" method="post" id="checkout-form">
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <label for="name">Имя</label>
                        <input type="text" id="name"
                                class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="name"
                                value="{{ $user->name }}"
                                required>
                    </div>



                    <div class="bor8 m-b-20 how-pos4-parent"><label for="email">Email</label>
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent"><label for="phone">Телефон</label><input type="text" id="phone" name="phone" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"></div>
                    <div class="bor8 m-b-20 how-pos4-parent"><label for="address">Адрес</label><input type="text" id="address" name="address"
                                class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"
                        ></div>

                    {{ csrf_field() }}
                    <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Оплатить</button>
                </form>
                 </div>
             </div>
        </div>
    </section>
@endsection