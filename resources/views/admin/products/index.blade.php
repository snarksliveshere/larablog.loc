@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'products.store',
            'files' => 'true'

            ]) }}
            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                    @include('admin.errors')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('products.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Статус</th>
                            <th>ТП</th>
                            <th>Цена</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                            <th>Редактировать ТП</th>
                            <th>Добавить ТП</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)

                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->getCategoryTitle() }}</td>
                            <td>{{ $product->status }}</td>
                            <td>
                                @if( $product->hasRelated == 1)
                                    есть
                                @endif
                            </td>
                            <td>{{ $product->price }}</td>

                            <td>
                                <img src="{{ $product->imagePath }}" alt="" width="100">
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="fa fa-pencil"></a>
                                {{ Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete' ]) }}
                                <button onclick="return confirm('уверены?')" type="submit" class="delete">
                                    <i class="fa fa-remove"></i>
                                </button>
                            {{ Form::close() }}
                            <td><a href="{{ route('related.editList', $product->id) }}">редактировать ТП</a></td>
                            <td><a href="{{ route('related.create', $product->id) }}">Добавить ТП</a></td>
                        </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection