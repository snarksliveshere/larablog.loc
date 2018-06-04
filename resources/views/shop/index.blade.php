@extends('layout')
@section('title')
    Каталог
@endsection
@section('content')
    @foreach($products->chunk(3) as $productChunk)
            <div class="row">
                @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="{{ route('product.show', $product->slug)  }}"><img src="/images/{{ $product->imagePath }}" alt="{{ $product->title }}"
                                          class="img-responsive"></a>
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{{ $product->description }}</p>
                            <div class="clearfix">
                                <div class="pull-left price">{{ $product->price }} руб.</div>
                                <a href="{{ route('product.addToCart',['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">В Корзину</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        <div class="row">
            {{ $products->links() }}
        </div>
    @endforeach
@endsection