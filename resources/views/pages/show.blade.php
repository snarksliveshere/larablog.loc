@extends('layout')
@section('main_slider')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/test_bg.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            {{ $post->title }}
        </h2>
    </section>
@endsection
@section('content')
    <section class="bg0 p-t-52 p-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-45 p-r-0-lg">
                        <div class="wrap-pic-w how-pos5-parent">
                            <img src="{{ $post->getImage() }}" alt="IMG-BLOG">
                            <div class="flex-col-c-m p-all-10 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										{{ $post->getDate() }}
									</span>
                            </div>
                        </div>
                        <div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">Автор: </span>
								</span>
                                <img src="{{ $post->author->getAvatar() }}" width="40"
                                     class="pull-left img-circle img-responsive mx-3"
                                     alt="">
<h5>{{ $post->author->name }}</h5>

								<span class="ml-2">
									{{ $post->getDate() }}
								</span>

							</span>
                            <h4 class="ltext-109 cl2 p-b-28">{{ $post->title }}</h4>
                            <div class="stext-117 cl6 p-b-26 content">
                                {!! $post->content !!}
                            </div>
                        </div>
                        <div class="p-t-40">
                            <h6>Категория: {{ $post->getCategoryTitle() }}</h6>
                        </div>
                        <div class="flex-w flex-t p-t-16">
							<span class="size-216 stext-116 cl8 p-t-4">
								Tags
							</span>
                            <div class="flex-w size-217">
                                @foreach($post->tags as $tag) <a href="{{ route('tag.show', $tag->slug) }}"
                                                                 class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">{{
                            $tag->title }}</a> @endforeach
                            </div>
                        </div>
                        <hr class="my-5">
                        <div class="row">
                            <div class="p-t-40 col-6">
                                @if($post->hasPrevious())
                                    <div class="single-blog-box">
                                        <a href="{{ route('post.show', $post->getPrevious()->slug) }}"> <img
                                                    src="{{ $post->getPrevious()->getImage() }}" alt=""
                                                    class="img-responsive">
                                            <div class="overlay">
                                                <div class="promo-text">
                                                    <p><i class=" pull-left fa fa-angle-left fz40"></i></p>
                                                    <h5>{{ $post->getPrevious()->title }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="p-t-40 col-6">
                                @if($post->hasNext())
                                    <div class="single-blog-box">
                                        <a href="{{ route('post.show', $post->getNext()->slug) }}"> <img
                                                    src="{{ $post->getNext()->getImage() }}" alt=""
                                                    class="img-responsive">
                                            <div class="overlay">
                                                <div class="promo-text">
                                                    <p><i class=" pull-left fa fa-angle-left fz40"></i></p>
                                                    <h5>{{ $post->getNext()->title }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="related-post-carousel p-t-40">
                            <div class="related-heading">
                                <h4>Похожие посты</h4>
                            </div>
                            <div class="wrap-slick2">
                                <div class="slick2">
                                    @foreach($post->related() as $item)
                                        @php
                                            $category_slug = \App\ProductCategory::where('id', $item->category_id)->pluck('slug');
                                        @endphp
                                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                            <div class="block2">
                                                <a href="{{ route('post.show', $item->slug) }}"
                                                   class="block2-pic hov-img0"> <img src="{{ $item->getImage() }}"
                                                                                     alt="IMG-PRODUCT"> </a>
                                                <div class="block2-txt flex-w flex-t p-t-14">
                                                    <div class="block2-txt-child1 flex-col-l ">
                                                        <a href="{{ route('post.show', $item->slug) }}"
                                                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                            {{ $item->title }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if(!$post->comments->isEmpty())
                            <div class="p-t-40">
                                <h4 class="m-b-40">Комментарии к посту</h4>
                                @foreach($post->getComments() as $comment)
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

                    <!--  -->

                        @if(Auth::check())
                            <div class="p-t-40">
                                <h5 class="mtext-113 cl2 p-b-12">
                                    Оставить комментарий
                                </h5>
                                <div class="leave-comment"><!--leave comment-->
                                    <form class="form-horizontal contact-form" role="form" method="post"
                                          action="/comment">
                                        {{ csrf_field() }} <input type="hidden" name="post_id" value="{{ $post->id }}">
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
                        @endif
                    </div>
                </div>
                @include('pages.post_sidebar')
            </div>
        </div>
    </section>
@endsection