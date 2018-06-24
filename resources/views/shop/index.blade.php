@extends('layout')
@section('title')
    Каталог
@endsection
@section('main_slider')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/test_bg.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Кт
        </h2>
    </section>
@endsection
@section('content')
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            @foreach($products->chunk(3) as $productChunk)
                <div class="row p-b-148">
                    @foreach($productChunk as $product)
                        <div class="col-sm-6 col-md-4 p-b-35">
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <a href="{{ route('product.show', [
                                'category_slug' => $category->slug,
                                'product_slug' => $product->slug
                                ])  }}"> <img
                                                src="{{ $product->imagePath }}" alt="IMG-category"> </a>
                                </div>
                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{ route('product.show', [
                                'category_slug' => $category->slug,
                                'product_slug' => $product->slug
                                ])  }}" class="cl4 hov-cl1">
                                            <h2>{{ $product->title }}</h2>
                                        </a> <span class="stext-105 cl3">
									{!! $product->description !!}
                                            <a href="{{ route('product.show', [
                                'category_slug' => $category->slug,
                                'product_slug' => $product->slug
                                ])  }}"
                                               class="btn btn-success mt-3">Подробнее</a>
								</span>
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
        </div>
    </section>
@endsection