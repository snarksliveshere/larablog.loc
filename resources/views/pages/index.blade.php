@extends('layout')
@section('body_class')
    animsition
@endsection
@section('main_slider')
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(images/tycho_slider.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false"
                                 data-appear="rotateInDownLeft"
                                 data-delay="0">
								<span class="ltext-101 white respon2">
									Men Collection 2018
								</span>
                            </div>
                            <div class="layer-slick1 animated visible-false"
                                 data-appear="rotateInUpRight"
                                 data-delay="800">
                                <h2 class="ltext-201 white p-t-19 p-b-43 respon1">
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
                <div class="item-slick1" style="background-image: url(/images/slide_earth.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 white respon2">
									Men New-Season
								</span>
                            </div>
                            <div class="layer-slick1 animated visible-false"
                                    data-appear="lightSpeedIn"
                                    data-delay="800">
                                <h2 class="ltext-201 white p-t-19 p-b-43 respon1">
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

                <div class="item-slick1" style="background-image: url(/images/slide1.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ttu ltext-101 respon2 white">
									1970 - 2013
								</span>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ttu ltext-201 p-t-19 p-b-43 respon1 white">
                                    История луноходов
                                </h2>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="/posts/post/istoriya-lunohodov"
                                   class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"> Перейти </a>
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
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto main_category">
                        <div class="block1 wrap-pic-w">
                            <img src="{{ $category->getResizeImage('430-340') }}" alt="{{ $category->title }}">
                            <a href="{{ route('product.index', $category->slug)  }}"
                                    class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name txt-shadow  ltext-102 trans-04 p-b-8">
									{{ $category->title }}
								</span>
                                <div class="main_category_desc">{!! $category->description !!}</div>
                                </div>
                                <div class="block1-txt-child2 p-b-4 trans-05">
                                    <div class="block1-link stext-101 cl0 trans-09">
                                       Заходите
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Наша продукция
                </h3>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <a href="{{ route('product.show', [
                                    'category_slug' => $product->category->slug,
                                    'product_slug' => $product->slug
                                    ]) }}">

                                    <img src="{{ $product->getResizeImage('315-315') }}" alt="IMG-PRODUCT">
                                </a>

                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{ route('product.show', [
                                    'category_slug' => $product->category->slug,
                                    'product_slug' => $product->slug
                                    ]) }}" class="fz20 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->title }}</a> <span class="fz20 stext-105 cl3"> Цена: {{ $product->price }} КЦ
								</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Последние новости
                </h3>
            </div>
            <div class="row isotope-grid">
                @foreach($posts as $post)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <a class="d-block"
                                        href="{{ route('post.show', $post->slug) }}">
                                    <img src="{{ $post->getSidebarImage('315-177') }}" class="img-responsive" alt="">
                                </a>

                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <div class="post-content">
                                        <header class="entry-header">
                                            <h5 class="entry-title">
                                                <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                            </h5>
                                        </header>
                                        <div class="entry-content">
                                            <p>{!! $post->description !!}</p>
                                            <div class="btn-continue-reading">
                                                <a href="{{ route('post.show', $post->slug) }}"
                                                        class="more-link">Читать далее...</a>
                                            </div>
                                        </div>
                                        <div class="btn-continue-reading">
                                            @if($post->hasCategory())
                                                <h6> Категория:
                                                    <a href="{{ route('category.show', $post->category->slug) }}">{{ $post->category->title }}</a>
                                                </h6>
                                            @endif
                                        </div>
                                        <div class="social-share">
                                            <span class="social-share-title pull-left text-capitalize">By <a href="#">{{ $post->author->name }}</a><br>On {{ $post->getDate() }}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection