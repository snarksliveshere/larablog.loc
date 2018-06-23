@extends('layout')
@section('main_slider')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
           Блог
        </h2>
    </section>
@endsection

@section('content')
<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    @foreach($posts as $post)
                    <div class="p-b-63">
                        <a href="{{ route('post.show', $post->slug) }}" class="hov-img0 how-pos5-parent"> <img src="{{ $post->getImage() }}"
                                                                                          alt="IMG-BLOG">
                            <div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										{{ $post->getDate() }}
									</span>
                            </div>
                        </a>
                        <div class="p-t-32">
                            <h4 class="p-b-15">
                                <a href="{{ route('post.show', $post->slug) }}" class="ltext-108 cl2 hov-cl1 trans-04"> {{ $post->title }}</a>
                            </h4>
                            <p class="stext-117 cl6">
                                {!! $post->description !!}
                            </p>
                            <div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">Автор: </span> {{ $post->author->name }}
											<span class="cl12 m-l-4 m-r-6">|</span>

										</span>

										<span>

											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											@if($post->hasCategory())
                                                <h6><a href="{{ route('category.show', $post->category->slug) }}">{{ $post->getCategoryTitle() }}</a></h6>
                                            @endif
										</span>
									</span> <a href="{{ route('post.show', $post->slug) }}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                    Читать далее <i class="fa fa-long-arrow-right m-l-9"></i> </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
            @include('pages.post_sidebar')
        </div>
    </div>
</section>

@endsection