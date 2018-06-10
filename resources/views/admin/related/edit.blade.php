@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактировать Торговое предложение

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактируем ТП</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    {{ Form::open(['route' => ['offers.update', $offer->id], 'method' => 'put']) }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="name" class="form-control offer_edit_name" id="exampleInputEmail1" placeholder="" name="name" value="{{ $offer->name }}">
                            <input type="text" name="slug" class="form-control offer_edit_slug" id="exampleInputEmail1" placeholder="" value="{{ $offer->slug }}">
                            <input type="hidden" name="id" value="{{ $offer->id }}">
                            <div class="offer_values_wrapper">
                                @foreach($values as $value)
                                    <input type="text" name="values[]" class="offer_edit_values" value="{{ $value->value }}">
                                @endforeach

                            </div>
                            <div class="offer_values_edit_add">Добавить поля ТП</div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
                {{ Form::close() }}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
