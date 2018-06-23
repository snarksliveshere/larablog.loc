@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить категорию
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем категорию</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    {{ Form::open([
            'route' => ['product_categories.update', $category->id],
            'files' => 'true',
            'method' => 'put'
        ]) }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                                <input type="text" name="title" class="form-control"                                                                                    id="exampleInputEmail1"                                                                           placeholder=""                                                                                    value="{{ $category->title }}">
                        </div>

                        <div class="form-group">
                            <img src="{{ $category->imagePath }}" alt="" class="img-responsive" width="200"> <label
                                    for="exampleInputFile">Лицевая картинка</label> <input type="file" name="image"
                                                                                           id="exampleInputFile">
                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">описание</label> <textarea name="description" id=""
                                                                                       cols="30" rows="10"
                                                                                       class="form-control">{{ $category->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label> <textarea name="content" id=""
                                                                                           cols="30" rows="10"
                                                                                           class="form-control">{{ $category->content }}
              </textarea>
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
