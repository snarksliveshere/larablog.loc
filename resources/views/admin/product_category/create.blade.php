@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить товар
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            {{ Form::open([
                'route' => 'product_categories.store',
                'files' => 'true'
            ]) }}

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем Категорию товаров</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" name="image" id="exampleInputFile">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>


                                         <!-- checkbox -->

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">описание</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection
