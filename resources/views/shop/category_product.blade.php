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
    @foreach($categories->chunk(3) as $categoryChunk)
        <section class="bg0 p-t-75 p-b-120">
            <div class="container">
                <div class="row p-b-148">
                    @foreach($categoryChunk as $category)
                        <div class="col-sm-6 col-md-4 p-b-35">
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <a href="{{ route('product.index', $category->slug)  }}"> <img
                                                src="{{ $category->imagePath }}" alt="IMG-category"> </a>
                                </div>
                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{ route('product.index', $category->slug)  }}"
                                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $category->title }}</a> <span class="stext-105 cl3">
									{!! $category->description !!}
                                            <a href="{{ route('product.index', $category->slug)  }}"
                                               class="btn btn-success pull-right">Подробнее</a>
								</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    {{ $categories->links() }}
                </div>
            </div>
        </section>
    @endforeach
@endsection