@extends('layout')
@section('main_slider')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            <img src="{{ $user->getAvatar() }}" alt="" class="profile-image">
            Profile
        </h2>
    </section>
@endsection
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="leave-comment mr0"><!--leave comment-->
                        <h3 class="text-uppercase">My profile</h3>
                        @include('admin.errors')
                        <form class="form-horizontal contact-form" role="form" method="post" action="/profile"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="name" name="name"
                                        placeholder="Name" value="{{ $user->name }}">
                                <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
                            </div>
                            <div class="bor8 m-b-20 how-pos4-parent">
                                    <input type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="email" name="email"
                                           placeholder="Email" value="{{ $user->email }}">
                            </div>
                            <div class="bor8 m-b-20 how-pos4-parent">
                                    <input type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password" name="password"
                                           placeholder="password">
                            </div>
                            <div class="bor8 m-b-20 how-pos4-parent">
                                    <input type="file" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="image" name="avatar">
                            </div>
                            <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Update</button>
                        </form>
                        <div class="clearfix"></div>
                        <div class="col-xs-12">
                            <h2>Заказы</h2>
                            @foreach($orders as $order)
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <ul class="list-group">
                                            @foreach($order->cart->items as $item)
                                                <li class="list-group-item">
                                                    @if(isset($item['parent_title']))
                                                        <div class="h2">{{ $item['parent_title'] }}</div>
                                                    @endif
                                                    <span class="badge">{{ $item['price'] }}</span>
                                                    {{ $item['item']['title'] }} | {{ $item['qty'] }} шт.
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="panel-footer">
                                        <strong>Итого: {{ $order->cart->totalPrice }} КЦ</strong>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{--TODO: стоит добавить еще время заказа и перевести его в нормальный вид--}}
                    </div>
                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>
@endsection