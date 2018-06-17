@extends('layout')
@section('title')
    Каталог
@endsection
@section('content')
    @foreach($categories->chunk(3) as $categoryChunk)
        <div class="row">
            @foreach($categoryChunk as $category)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="{{ route('product.index', $category->slug)  }}"><img src="{{ $category->imagePath }}" alt="{{ $category->title }}"
                                                                                    class="img-responsive"></a>
                        <div class="caption">
                            <h3>{{ $category->title }}</h3>
                            <p class="description">{!! $category->description !!}</p>
                            <div class="clearfix">
                                <a href="{{ route('product.index', $category->slug)  }}" class="btn btn-success pull-right">Подробнее</a>

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