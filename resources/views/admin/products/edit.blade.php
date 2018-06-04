@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить статью
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            {{ Form::open([
                'route' => ['products.update', $product->id],
                'files' => 'true',
                'method' => 'put'
            ]) }}

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем товар</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $product->title }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $product->price }}">
                        </div>

                        <div class="form-group">
                            <img src="{{ $product->imagePath }}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" name="image" id="exampleInputFile">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>




                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                {{ Form::checkbox('status','1',$product->status,['class' => 'minimal']) }}
                            </label>
                            <label>
                                Опубликовать
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">описание</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ $product->content }}
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
