@extends('layout')
@section('body_class')
    animsition
@endsection
@section('main_slider')
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(images/slide-01.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2018
								</span>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    NEW SEASON
                                </h2>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="product.html"
                                   class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"> Shop Now </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-slick1" style="background-image: url(images/slide-02.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season
								</span>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    Jackets & Coats
                                </h2>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="product.html"
                                   class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"> Shop Now </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-slick1" style="background-image: url(images/slide-03.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2018
								</span>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    New arrivals
                                </h2>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                                <a href="product.html"
                                   class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"> Shop Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('content')
{{--TODO: можно еще всплывающую форму типа заказать звонок сделать--}}
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach($posts as $post)
                            <article class="post col-xs-6">
                                <div class="post-thumb">
                                    <a class="col-xs-12 col-sm-6 col-sm-offset-3" href="{{ route('post.show', $post->slug) }}">
                                        <img src="{{ $post->getImage() }}" class="img-responsive" alt="">
                                    </a>
                                    <a href="{{ route('post.show', $post->slug) }}" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">View Post</div>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <header class="entry-header text-center text-uppercase">
                                        @if($post->hasCategory())
                                            <h6><a href="{{ route('category.show', $post->category->slug) }}">{{ $post->getCategoryTitle() }}</a></h6>
                                        @endif
                                        <h1 class="entry-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h1>
                                    </header>
                                    <div class="entry-content">
                                        <p>{!! $post->description !!}</p>
                                        <div class="btn-continue-reading text-center text-uppercase">
                                            <a href="{{ route('post.show', $post->slug) }}" class="more-link">Continue Reading</a>
                                        </div>
                                    </div>
                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize">By <a href="#">{{ $post->author->name }}</a> On {{ $post->getDate() }}6</span>
                                        <ul class="text-center pull-right">
                                            <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach($products as $product)

                            @php( $category_slug = \App\ProductCategory::find($product->category_id)->slug)

                            <article class="post col-xs-6">
                                <div class="post-thumb">
                                    <a class="col-xs-12 col-sm-6 col-sm-offset-3" href="{{ route('product.show', [
                                    'category_slug' => $category_slug,
                                    'product_slug' => $product->slug
                                    ]) }}">
                                        <img src="{{ $product->imagePath }}" class="img-responsive" alt="">
                                    </a>
                                    <a href="{{ route('product.show', [
                                    'category_slug' => $category_slug,
                                    'product_slug' => $product->slug
                                    ]) }}" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">View Post</div>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <header class="entry-header text-center text-uppercase">
                                        {{--@if($product->hasCategory())--}}
                                            {{--<h6><a href="{{ route('category.show', $post->category->slug) }}">{{ $post->getCategoryTitle() }}</a></h6>--}}
                                        {{--@endif--}}
                                        <h1 class="entry-title"><a href="{{ route('product.show', [
                                    'category_slug' => $category_slug,
                                    'product_slug' => $product->slug
                                    ]) }}">{{ $product->title }}</a></h1>
                                    </header>
                                    <div class="entry-content">
                                        <p>{!! $product->description !!}</p>
                                        <div class="btn-continue-reading text-center text-uppercase">
                                            <a href="{{ route('product.show', [
                                    'category_slug' => $category_slug,
                                    'product_slug' => $product->slug
                                    ]) }}" class="more-link">Continue Reading</a>
                                        </div>
                                    </div>
                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize">By <a href="#">{{ $post->author->name }}</a> On {{ $post->getDate() }}6</span>
                                        <ul class="text-center pull-right">
                                            <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>
@endsection