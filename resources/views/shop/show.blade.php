@extends('layout')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    {{--@if(session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                        {{ Form::open([
                            'route' => 'related.cart',
                            'method' => 'put'

                            ]) }}


                        <article class="post">
                        <div class="post-thumb col-xs-12 col-sm-6 col-sm-offset-3">
                            <a class="fancybox" id="image_path_href" href="{{ $product->imagePath }}">
                                <img data-src="{{ $product->imagePath }}" class="img-responsive" id="image_path_src"                                                                                         src="{{ $product->imagePath }}"
                                                                                              alt=""></a>
                        </div>
                        <div class="post-content col-xs-12">
                            <header class="entry-header text-center text-uppercase">
                                {{--<h6><a href="#">{{ $post->getCategoryTitle() }}</a></h6>--}}
                                <h1 class="entry-title"><a href="blog.html">{{ $product->title }}</a></h1>
                            </header>
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

                            <div class="price" style="font-weight: bold; font-size: 20px;">
                                Цена : <span id="price">{{ $product->price }}</span>
                            </div>
                            <div id="description">
                                {!! $product->description !!}
                            </div>
                            <hr>
                            <div id="content">
                                {!! $product->content !!}
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success pull-right" role="button" value="В корзину">
                    </article>

                        {{ Form::close() }}


                        <div class="row"><!--blog next previous-->
                        <div class="col-md-6">
                            @if($product->hasPrevious())
                                <div class="single-blog-box">
                                    <a href="{{ route('product.show', $product->getPrevious()->slug) }}"> <img
                                                src="{{ $product->getPrevious()->imagePath }}" alt="">
                                        <div class="overlay">
                                            <div class="promo-text">
                                                <p><i class=" pull-left fa fa-angle-left"></i></p>
                                                <h5>{{ $product->getPrevious()->title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if($product->hasNext())
                                <div class="single-blog-box">
                                    <a href="{{ route('product.show', $product->getNext()->slug) }}"> <img
                                                src="{{ $product->getNext()->imagePath }}" alt="">
                                        <div class="overlay">
                                            <div class="promo-text">
                                                <p><i class=" pull-left fa fa-angle-left"></i></p>
                                                <h5>{{ $product->getNext()->title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div><!--blog next previous end-->
                    <div class="related-post-carousel"><!--related post carousel-->
                        <div class="related-heading">
                            <h4>You might also like</h4>
                        </div>
                        <div class="items">
                            @foreach($product->related() as $item)

                                <div class="single-item">
                                    <a href="{{ route('post.show', $item->slug) }}"> <img
                                                src="{{ $item->imagePath }}" alt="">
                                        <p>{{ $item->title }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div><!--related post carousel-->
                    {{--@if(!$post->comments->isEmpty())--}}
                    {{--<h4>comments</h4>--}}
                    {{--@foreach($post->getComments() as $comment)--}}
                    {{--<div class="bottom-comment"><!--bottom comment-->--}}

                    {{--<div class="comment-img">--}}
                    {{--<img class="img-circle" src="{{ $comment->author->getAvatar() }}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="comment-text">--}}

                    {{--<h5>{{ $comment->author->name }}</h5>--}}
                    {{--<p class="comment-date">{{ $comment->created_at->diffForHumans() }}</p>--}}
                    {{--<p class="para">{{ $comment->text }}</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                <!-- end bottom comment-->
                    @if(Auth::check())
                        <div class="leave-comment"><!--leave comment-->
                            <h4>Leave a reply</h4>
                            <form class="form-horizontal contact-form" role="form" method="post" action="/comment">
                                {{ csrf_field()  }}
                                <input type="hidden" name="post_id" value="{{ $product->id }}">
                                <div class="form-group">
                                    <div class="col-md-12">
										<textarea class="form-control" rows="6" name="message"
                                                  placeholder="Write Massage"></textarea>
                                    </div>
                                </div>
                                <button class="btn send-btn">Post Comment</button>
                            </form>
                        </div><!--end leave comment-->
                    @endif
                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection