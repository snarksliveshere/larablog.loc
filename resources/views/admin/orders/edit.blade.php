@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить товар
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем товар</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    {{ Form::open([
            'route' => ['orders.update', $order->id],
            'method' => 'put'
        ]) }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя</label>
                            <input type="text" name="name" class="form-control"                                                                                    id="exampleInputEmail1"                                                                           placeholder=""                                                                                    value="{{ $order->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" class="form-control"                                                                                    id="exampleInputEmail1"                                                                           placeholder=""                                                                                    value="{{ $order->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Телефон</label>
                            <input type="text" name="phone" class="form-control"                                                                                    id="exampleInputEmail1"                                                                           placeholder=""                                                                                    value="{{ $order->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Адрес</label>
                            <input type="text" name="address" class="form-control"                                                                                    id="exampleInputEmail1"                                                                           placeholder=""                                                                                    value="{{ $order->address }}">
                        </div>



                    </div>

                    <div class="col-xs-12">
                        <h2>Заказы</h2>

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


                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="status" class="minimal">
                            </label>
                            <label>
                                Отметить, если выполнен
                            </label>
                        </div>
                    </div>



                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection
