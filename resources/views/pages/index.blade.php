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
                            <div class="layer-slick1 animated visible-false"
                                    data-appear="lightSpeedIn"
                                    data-delay="800">
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
                            <div class="layer-slick1 animated visible-false"
                                    data-appear="rotateInDownLeft"
                                    data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2018
								</span>
                            </div>
                            <div class="layer-slick1 animated visible-false"
                                    data-appear="rotateInUpRight"
                                    data-delay="800">
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
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                        <div class="block1 wrap-pic-w">
                            <img src="{{ $category->imagePath }}" alt="{{ $category->title }}">
                            <a href="{{ route('product.index', $category->slug)  }}"
                                    class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									{{ $category->title }}
								</span>
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
            <div class="row isotope-grid">
                @foreach($products as $product)

                    @php( $category_slug = \App\ProductCategory::find($product->category_id)->slug)

                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ $product->imagePath }}" alt="IMG-PRODUCT"> <a href="{{ route('product.show', [
                                    'category_slug' => $category_slug,
                                    'product_slug' => $product->slug
                                    ]) }}"
                                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View </a>
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{ route('product.show', [
                                    'category_slug' => $category_slug,
                                    'product_slug' => $product->slug
                                    ]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->title }}</a> <span class="stext-105 cl3">
									{{ $product->price }}
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
                                <a class="col-xs-12 col-sm-6 col-sm-offset-3"
                                        href="{{ route('post.show', $post->slug) }}">
                                    <img src="{{ $post->getImage() }}" class="img-responsive" alt="">
                                </a>
                                <a href="{{ route('post.show', $post->slug) }}" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <div class="post-content">
                                        <header class="entry-header text-center text-uppercase">
                                            @if($post->hasCategory())
                                                <h6>
                                                    <a href="{{ route('category.show', $post->category->slug) }}">{{ $post->getCategoryTitle() }}</a>
                                                </h6>
                                            @endif
                                            <h1 class="entry-title">
                                                <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                            </h1>
                                        </header>
                                        <div class="entry-content">
                                            <p>{!! $post->description !!}</p>
                                            <div class="btn-continue-reading text-center text-uppercase">
                                                <a href="{{ route('post.show', $post->slug) }}"
                                                        class="more-link">Continue Reading</a>
                                            </div>
                                        </div>
                                        <div class="social-share">
                                            <span class="social-share-title pull-left text-capitalize">By <a href="#">{{ $post->author->name }}</a> On {{ $post->getDate() }}6</span>
                                            <ul class="text-center pull-right">
                                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a>
                                                </li>
                                            </ul>
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