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
                    <ul>
                        @foreach($related as $slug => $title)
                            <li><a href="/admin/products/edit-offer/{{ $slug }}">{{ $title }}</a></li>
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
