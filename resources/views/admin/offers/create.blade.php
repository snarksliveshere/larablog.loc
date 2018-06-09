@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добавить торговое предложение
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            {!! Form::open(['route' => 'offers.store']) !!}
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем ТП</h3>
              @include('admin.errors')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group offer_values_wrapper">
                        <input type="text" name="values[]" class="offer_edit_values" value="{{ old('values') }}">
                    </div>
                </div>
            </div>
            <div class="offer_values_edit_add">Добавить поля ТП</div>
            <div class="box-footer">

                <button class="btn btn-warning pull-right">Изменить</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection
