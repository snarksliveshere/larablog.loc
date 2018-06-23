@extends('layout')
@section('title')
    Каталог
@endsection
@section('content')
    @foreach($categories->chunk(3) as $categoryChunk)
        <div class="row">
            @foreach($categoryChunk as $category)
                {{--<div class="col-sm-6 col-md-4">--}}
                    {{--<div class="thumbnail">--}}
                        {{--<div class="hov-img0">--}}
                        {{--<a href="{{ route('product.index', $category->slug)  }}"><img src="{{ $category->imagePath }}" alt="{{ $category->title }}"--}}
                                                                                    {{--class="img-responsive"></a>--}}
                        {{--</div>--}}

                        {{--<div class="caption">--}}
                            {{--<h3>{{ $category->title }}</h3>--}}
                            {{--<p class="description">{!! $category->description !!}</p>--}}
                            {{--<div class="clearfix">--}}
                                {{--<a href="{{ route('product.index', $category->slug)  }}" class="btn btn-success pull-right">Подробнее</a>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <a href="{{ route('product.index', $category->slug)  }}">

                                <img src="{{ $category->imagePath }}" alt="IMG-category">
                            </a>

                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{ route('product.index', $category->slug)  }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $category->title }}</a> <span class="stext-105 cl3">
									{!! $category->description !!}
                                    <a href="{{ route('product.index', $category->slug)  }}" class="btn btn-success pull-right">Подробнее</a>
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
    @endforeach
@endsection