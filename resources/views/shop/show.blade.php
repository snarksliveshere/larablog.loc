@extends('layout')
@section('main_slider')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
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
                                    href="{{ $image}}">
                                <img
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
                                    <input type="hidden" id="related_id" name="related_id" value="{{ $related[0]->id }}">
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
            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#contant-wrap" role="tab">Description</a>
                        </li>
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
                        </li>
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="content-wrap" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6" id="content">
                                    {!! $product->content !!}
                                </p>
                            </div>
                        </div>
                        <!-- - -->
                        <div class="tab-pane fade" id="information" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <ul class="p-lr-28 p-lr-15-sm">
                                        <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>
                                            <span class="stext-102 cl6 size-206">
												0.79 kg
											</span>
                                        </li>
                                        <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>
                                            <span class="stext-102 cl6 size-206">
												110 x 33 x 100 cm
											</span>
                                        </li>
                                        <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>
                                            <span class="stext-102 cl6 size-206">
												60% cotton
											</span>
                                        </li>
                                        <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>
                                            <span class="stext-102 cl6 size-206">
												Black, Blue, Grey, Green, Red, White
											</span>
                                        </li>
                                        <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>
                                            <span class="stext-102 cl6 size-206">
												XL, L, M, S
											</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- - -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        <!-- Review -->
                                        <div class="flex-w flex-t p-b-68">
                                            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                <img src="images/avatar-01.jpg" alt="AVATAR">
                                            </div>
                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														Ariana Grande
													</span>
                                                    <span class="fs-18 cl11">
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star-half"></i>
													</span>
                                                </div>
                                                <p class="stext-102 cl6">
                                                    Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Add review -->
                                        <form class="w-full">
                                            <h5 class="mtext-108 cl2 p-b-7">
                                                Add a review
                                            </h5>
                                            <p class="stext-102 cl6">
                                                Your email address will not be published. Required fields are marked *
                                            </p>
                                            <div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>
                                                <span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
                                            </div>
                                            <div class="row p-b-25">
                                                <div class="col-12 p-b-5">
                                                    <label class="stext-102 cl3" for="review">Your review</label>
                                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10"
                                                            id="review"
                                                            name="review"></textarea>
                                                </div>
                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="name">Name</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20"
                                                            id="name"
                                                            type="text"
                                                            name="name">
                                                </div>
                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="email">Email</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20"
                                                            id="email"
                                                            type="text"
                                                            name="email">
                                                </div>
                                            </div>
                                            <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>
            <span class="stext-107 cl6 p-lr-25">
				Categories: Jacket, Men
			</span>
        </div>
    </section>
    <!-- Related Products -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>
            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        @foreach($product->related() as $item)
                            @php
                               $category_slug = \App\ProductCategory::where('id', $item->category_id)->pluck('slug');
                            @endphp
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{ $item->imagePath }}" alt="IMG-PRODUCT">
                                    <a href="{{ route('product.show',
                                    [   'category_slug' => $category_slug[0],
                                        'product_slug' => $item->slug]) }}"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>
                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{ route('product.show',
                                    [   'category_slug' => $category_slug[0],
                                        'product_slug' => $item->slug]) }}"
                                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $item->title }}
                                        </a>
                                        <span class="stext-105 cl3">
                                            {{ $item->price }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection