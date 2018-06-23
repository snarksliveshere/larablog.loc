@extends('layout')
@section('main_slider')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/temp/images/bg-02.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Кт
        </h2>
    </section>
@endsection
@section('content')
    @php
        if(!empty($related[0]) && (null !== $related[0]->imagePath)) {
        $image =  $related[0]->imagePath;
        } else {
        $image = $product->imagePath;
        }
    @endphp
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <!--TODO: Gallery-->
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <a class="fancybox"
                               id="image_path_href"
                               href="{{ $image}}"> <img
                                        data-src="{{ $product->imagePath }}"
                                        class="img-responsive"
                                        id="image_path_src"
                                        src="{{ $image }}"
                                        alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->title }}
                        </h4>
                        <span class="mtext-106 cl2" id="price">
							{{ $product->price }}
						</span>
                        <p class="stext-102 cl3 p-t-23" id="description">
                            {!! $product->description !!}
                        </p>
                        {{ Form::open([
                        'route' => 'related.cart',
                        'method' => 'put'
                        ]) }}
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                @if(!empty($related[0]))
                                    <div class="offers">
                                        <div class="related" data-slug="{{ $product->slug }}">
                                            <ul>
                                                @foreach($related as $ki => $relate)
                                                    <li data-id="{{ $relate->id }}">{{ $relate->title }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="related_offers">
                                            <table>
                                                <tr>
                                                    <th>Название</th>
                                                    <th>Значение</th>
                                                </tr>
                                                <tbody id="related_offers">
                                                @foreach($relatedOffers as $key => $relOffer)
                                                    <tr>
                                                        <td>{{ $key }}</td>
                                                        <td>{{ $relOffer }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <input type="hidden" id="related_id" name="related_id"
                                           value="{{ $related[0]->id }}">
                                @endif
                                <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                            </div>
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <button type="submit"
                                            role="button"
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        В корзину
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="m-t-50 p-b-40">
                <div id="content">
                    {!! $product->content !!}
                </div>
            </div>
        </div>
    </section>
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($product->related() as $item)
                        @php
                            $category_slug = \App\ProductCategory::where('id', $item->category_id)->pluck('slug');
                        @endphp
                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{ $item->imagePath }}" alt="IMG-PRODUCT"> <a href="{{ route('product.show',
                                    [   'category_slug' => $category_slug[0],
                                        'product_slug' => $item->slug]) }}"
                                                                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View </a>
                                </div>
                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{ route('product.show',
                                    [   'category_slug' => $category_slug[0],
                                        'product_slug' => $item->slug]) }}"
                                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $item->title }}
                                        </a> <span class="stext-105 cl3">
                                            {{ $item->price }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection