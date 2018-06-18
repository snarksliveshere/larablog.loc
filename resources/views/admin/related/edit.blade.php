@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактируем Торговое предложение
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => ['related.update', $related->id],
            'files' => 'true',
            'method' => 'put'
        ]) }}

            {{--TODO: у меня может записаться в базу как вместе с тегами так и без--}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактируем ТП к товару</h3>
                    <h3>{{ $product->title }}</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название ТП</label>
                            <input type="text" name="title" value="{{ $related->title }}" class="form-control" id="exampleInputEmail1" placeholder="Введите название ТП">
                        </div>

                        @foreach($offers as $name => $offer)
                            <div class="related_product_offer">
                                <div class="col-xs-10">
                                    <div class="form-group related_product_name">
                                        <label for="exampleInputEmail1">Название ТП</label>
                                        <input type="text" name="offer_name[]" disabled value="{{ \App\Offer::find($name)->name }}" class="form-control " id="exampleInputEmail1" placeholder="">
                                    </div>
                                    <input type="hidden"
                                           name="name[]"
                                           @if( !isset($productOffers[$name]))
                                            disabled
                                           @endif
                                           class="related_product_name-value"
                                           value="{{ $name }}">
                                    {{--{{ Form::select('value_id[]',--}}
                                    {{--$offer,--}}
                                    {{--null,--}}
                                    {{--['class' => 'form-control select2']) }}--}}
                                    <div class="form-group related_product_values">
                                        <div class="col-xs-10">
                                            <select name="value_id[]"
                                                    @if( !isset($productOffers[$name]))
                                                        disabled
                                                    @endif
                                                    id=""
                                                    class="form-control related_product_values-value">
                                                @foreach($offer as $ki => $val)
                                                    <option
                                                            value="{{ $ki }}"
                                                            @if( isset($productOffers[$name])
                                                                    && $productOffers[$name] == $val
                                                            )
                                                                selected
                                                            @endif
                                                    >
                                                        {{ $val }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 btn btn-primary killing_button kill_select">
                                    вкл / выкл ТП
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>

                        <div class="form-group">
                            <input type="hidden" name="parent_id" value="{{ $product->id }}" class="form-control" id="exampleInputEmail1" placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Основная Цена</label>
                            <input type="text" name="old_price" disabled="" value="{{ $product->price }}" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Цена ТП</label>
                            <input type="text" name="price" value="{{ $related->price }}" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <img src="{{ $related->imagePath }}" alt="" class="img-responsive" width="200">
                            <input type="file" name="image" id="exampleInputFile">
                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>


                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" checked name="set_status" class="minimal">
                            </label>
                            <label>
                                Опубликовать
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3>Если описание или контент пустой - они наследуются от родительского продукта</h3>
                        <div class="form-group">
                            <label for="exampleInputEmail1">описание</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $related->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ $related->content }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Сохранить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection
