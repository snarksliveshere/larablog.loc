@extends('layout')
@section('main_slider')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/space-bg.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            {{ $product->title }}
        </h2>
    </section>
@endsection
@section('content')
    @php
        $image = $product->imagePath;
        $price = $product->price;
        $description = $product->description;
        $content = $product->content;
        if(!empty($related[0])) {

            if(null !== $related[0]->imagePath) {
                $image = $related[0]->imagePath;
            }
            if(null !== $related[0]->description) {
                $description = $related[0]->description;
            }
            if(null !== $related[0]->content) {
                $content = $related[0]->content;
            }
            if(null !== $related[0]->price) {
                $price = $related[0]->price;
            }
        }
    // надо это в контроллер засунуть
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
                               href="{{ $image }}"> <img
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
                        <span class="mtext-106 cl2">Цена: </span>
                        <span class="mtext-106 cl2" id="price">{{ $price }}</span>
                        <span class="mtext-106 cl2"> КЦ</span>
                        <div class="stext-102 cl3 p-t-23" id="description">
                            {!! $description !!}
                        </div>
                        <div class="original_data d-none dn">
                            <!--noindex-->
                            <div class="original_content">{!! $product->content !!}</div>
                            <div class="original_description">{!! $product->description !!}</div>

                            <!--/noindex-->
                        </div>

                        {{ Form::open([
                        'route' => 'related.cart',
                        'method' => 'put'
                        ]) }}
                        <div class="p-t-33">
                            <div class="p-b-10">
                                @if(!empty($related[0]))
                                    <div class="offers">
                                        <div class="related" data-slug="{{ $product->slug }}">
                                            <div class="toggle_li cur"></div>
                                            <ul>
                                                @foreach($related as $ki => $relate)
                                                    <li data-id="{{ $relate->id }}">{{ $relate->title }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="related_offers">
                                            <table class="w100p m-t-40 m-b-40 related-table">
                                                <tr class="table_head">
                                                    <th>Название</th>
                                                    <th>Значение</th>
                                                </tr>
                                                <tbody id="related_offers">
                                                @foreach($relatedOffers as $key => $relOffer)
                                                    <tr class="table_row">
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
                            <div class="flex-w p-b-10">
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
                    {!! $content !!}
                </div>
                <div class="coments_block">
                    @if(!$product->comments->isEmpty())
                        <div class="p-t-40">
                            <h4 class="m-b-40">Отзывы о продукте</h4>
                            <p class="my-5">чтобы оставить отзыв, вы должны зарегистрироваться</p>
                            @foreach($product->getComments() as $comment)
                                <div class="bottom-comment">
                                    <div class="comment-img">
                                        <img class="img-circle img-responsive" width="40"
                                             src="{{ $comment->author->getAvatar() }}" alt="">
                                        <h5>{{ $comment->author->name }}</h5>
                                    </div>
                                    <div class="comment-text">
                                        <p class="comment-date">{{ $comment->created_at->diffForHumans() }}</p>
                                        <p class="para">{{ $comment->text }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @auth
                    <div class="p-t-40">
                        <h5 class="mtext-113 cl2 p-b-12">
                            Оставьте отзыв
                        </h5>
                        <div class="leave-comment"><!--leave comment-->
                            <form class="form-horizontal contact-form" role="form" method="post"
                                  action="/comment-product">
                                {{ csrf_field() }} <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="bor19 m-b-20">
                                    <div class="col-md-12">
										<textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" rows="6"
                                                  name="message"
                                                  placeholder="Write Massage"></textarea>
                                    </div>
                                </div>
                                <button class="btn send-btn btn-primary">Оставить комментарий</button>
                            </form>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Вам также могут понадобиться:
                </h3>
            </div>
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($product->related() as $item)
                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                            <div class="block2">
                                <a href="{{ route('product.show',
                                    [   'category_slug' => $item->category->slug,
                                        'product_slug' => $item->slug]) }}" class="block2-pic hov-img0">
                                    <img src="{{ $item->imagePath }}" alt="IMG-PRODUCT">
                                </a>
                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{ route('product.show',
                                    [   'category_slug' => $item->category->slug,
                                        'product_slug' => $item->slug]) }}"
                                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $item->title }}
                                        </a> <span class="stext-105 cl3 fz20">
                                            Цена: {{ $item->price }} КЦ
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
@section('scripts-inc')
    <script>
        var liRelatedFirst = $('.related li').eq(0);
        liRelatedFirst.show();
        $('.toggle_li').click(function () {
            liRelatedFirst.siblings().slideToggle();
        });
    </script>
@endsection