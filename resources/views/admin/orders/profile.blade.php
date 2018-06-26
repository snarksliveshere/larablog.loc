@extends('layout')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="leave-comment mr0"><!--leave comment-->
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3 class="text-uppercase">My profile</h3>
                        @include('admin.errors')
                        <br> <img src="{{ $user->getAvatar() }}" alt="" class="profile-image">
                        <form class="form-horizontal contact-form" role="form" method="post" action="/profile"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="file" class="form-control" id="image" name="avatar">
                                </div>
                            </div>
                            <button type="submit" class="btn send-btn">Update</button>
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
                    </div>
                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>
@endsection