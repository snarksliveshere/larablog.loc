@extends('layout')
@section('content')
    <section class="bg0 p-t-52 p-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-45 p-r-0-lg">
                        <div class="wrap-pic-w how-pos5-parent">
                            <img src="{{ $post->getImage() }}" alt="IMG-BLOG">
                            <div class="flex-col-c-m size-123 bg9 how-pos5">
								<span class="ltext-107 cl2 txt-center">
									{{ $post->getDate() }}
								</span>
                            </div>
                        </div>
                        <div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">Автор:</span> {{ $post->author->name }}
                                    <span class="cl12 m-l-4 m-r-6">|</span>
								</span>
<h4>{{ $post->author->name }}</h4>
				<img src="{{ $post->author->getAvatar() }}" class="pull-left img-circle img-responsive"
                     alt="">
								<span>
									{{ $post->getDate() }}
                                    <span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>

									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									8 Comments
								</span>
							</span>
                            <h4 class="ltext-109 cl2 p-b-28">
                                8 Inspiring Ways to Wear Dresses in the Winter
                            </h4>
                            <p class="stext-117 cl6 p-b-26">
                                {!! $post->content !!}
                            </p>
                        </div>
                        <div class="p-t-40">
                            <h6>{{ $post->getCategoryTitle() }}</h6>
                            <h1 class="entry-title"><a href="blog.html">{{ $post->title }}</a></h1>
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
                        <div class="row"><!--blog next previous-->
                            <div class="p-t-40">
                                @if($post->hasPrevious())
                                    <div class="single-blog-box">
                                        <a href="{{ route('post.show', $post->getPrevious()->slug) }}"> <img
                                                    src="{{ $post->getPrevious()->getImage() }}" alt="">
                                            <div class="overlay">
                                                <div class="promo-text">
                                                    <p><i class=" pull-left fa fa-angle-left"></i></p>
                                                    <h5>{{ $post->getPrevious()->title }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="p-t-40">
                                @if($post->hasNext())
                                    <div class="single-blog-box">
                                        <a href="{{ route('post.show', $post->getNext()->slug) }}"> <img
                                                    src="{{ $post->getNext()->getImage() }}" alt="">
                                            <div class="overlay">
                                                <div class="promo-text">
                                                    <p><i class=" pull-left fa fa-angle-left"></i></p>
                                                    <h5>{{ $post->getNext()->title }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div><!--blog next previous end-->
                        <div class="related-post-carousel p-t-40"><!--related post carousel-->
                            <div class="related-heading">
                                <h4>You might also like</h4>
                            </div>
                            <div class="items">
                                @foreach($post->related() as $item)
                                    <div class="single-item">
                                        <a href="{{ route('post.show', $item->slug) }}"> <img src="{{ $item->getImage() }}"
                                                                                              alt="">
                                            <p>{{ $item->title }}</p>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div><!--related post carousel-->

                            @if(!$post->comments->isEmpty())
                            <div class="p-t-40">
                                <h4>comments</h4>
                                @foreach($post->getComments() as $comment)
                                    <div class="bottom-comment"><!--bottom comment-->
                                        <div class="comment-img">
                                            <img class="img-circle" src="{{ $comment->author->getAvatar() }}" alt="">
                                        </div>
                                        <div class="comment-text">
                                            <h5>{{ $comment->author->name }}</h5>
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
                                    <h4>Leave a reply</h4>
                                    <form class="form-horizontal contact-form" role="form" method="post" action="/comment">
                                        {{ csrf_field() }} <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <div class="bor19 m-b-20">
                                            <div class="col-md-12">
										<textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" rows="6"
                                                  name="message"
                                                  placeholder="Write Massage"></textarea>
                                            </div>
                                        </div>
                                        <button class="btn send-btn">Post Comment</button>
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