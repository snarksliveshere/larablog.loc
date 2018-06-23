@extends('layout')
@section('title')
    Корзина
@endsection
@section('main_slider')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/test_bg.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Кт
        </h2>
    </section>
@endsection
@section('content')
    <div class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-12 m-b-50">
                    @if(Session::has('cart'))
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tr class="table_head">
                                        <th class="column-1">Изображение</th>
                                        <th class="column-2">Наименование</th>
                                        <th class="column-3">Цена</th>
                                        <th class="column-4">Количество</th>
                                        <th class="column-5">Общее</th>
                                        <th class="column-6">Действия</th>
                                    </tr>
                                    @foreach($products as $product)
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="images/item-cart-04.jpg" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2">@if(isset($product['parent_title']))
                                                    <div class="h2">{{ $product['parent_title'] }}</div>
                                                @endif
                                                <strong>{{ $product['item']['title'] }}</strong>
                                            </td>
                                            <td class="column-3">Цена за штуку</td>
                                            <td class="column-4">{{ $product['qty'] }}</td>
                                            <td class="column-5">{{ $product['price'] }}</td>
                                            <td class="column-6">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary btn-sc dropdown-toggle"
                                                            data-toggle="dropdown">
                                                        Действия <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{ route('product.reduceByOne',
                                        ['id' => $product['item']['id']]) }}">Удалить 1 шт. товар</a>
                                                        </li>
                                                        <li><a href="{{ route('product.remove',
                                        ['id' => $product['item']['id']]) }}">Удалить товар полностью</a>
                                                        </li>
                                                        {{--TODO: можно еще сделать кнопку Полностью очистить корзину--}}
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="row">
                                <div class="flex-w flex-t p-t-27 p-b-33">
                                    <div class="size-208">
                                        <span class="mtext-101 cl2">
                                            Total:
                                        </span>
                                    </div>
                                    <div class="size-209 p-t-1">
                                        <span class="mtext-110 cl2">
                                            {{ $totalPrice }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <a type="button"
                                   class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                                   href="{{ route('checkout') }}">Заказать</a>
                            </div>
                        </div>
                    @else

                        <div class="bg0 p-t-75 p-b-85">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 col-xl-12 m-b-50">
                                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                                            <h2>В корзине нет товаров</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection