@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Список Торговых предложений
            </h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактируем ТП</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <ul class="col-xs-12">
                        @foreach($related as $slug => $title)
                            <li>
                                <a class="col-xs-3" href="/admin/products/edit-offer/{{ $slug }}">{{ $title }}</a>
                                <div class="col-xs-3">
                                    {{ Form::open(['route' => ['related.deleteList', $slug], 'method' => 'delete' ]) }}
                                    <button onclick="return confirm('уверены?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    {{ Form::close() }}
                                </div>


                                {{--<a class="col-xs-3" href="/admin/products/delete-offer/{{ $slug }}">Удалить </a>--}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
            </div>
        </section>
    </div>
@endsection
