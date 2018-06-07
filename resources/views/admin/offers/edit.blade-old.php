@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить категорию
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Меняем категорию</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    {{ Form::open(['route' => ['offers.update', $offerName->id], 'method' => 'put']) }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="name" class="form-control offer_edit_name" id="exampleInputEmail1" placeholder="" name="name" value="{{ $offerName->name }}">
                            <input type="text" name="slug" class="form-control offer_edit_slug" id="exampleInputEmail1" placeholder="" value="{{ $offerName->slug }}">
                            <input type="hidden" name="id" value="{{ $offerName->id }}">
                            <div class="offer_values_wrapper">
                            @foreach($offers as $offer)
                                <input type="text" name="values[]" class="offer_edit_values" value="{{ $offer->value }}">
                            @endforeach

                            </div>
                            <div class="offer_values_edit_add">Добавить еще</div>
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
