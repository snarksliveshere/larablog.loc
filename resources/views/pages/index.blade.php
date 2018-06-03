@extends('layout')
@section('content')

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
                            <article class="post col-xs-6">
                                <div class="post-thumb">
                                    <a class="col-xs-12 col-sm-6 col-sm-offset-3" href="{{ route('product.show', $product->slug) }}">
                                        <img src="{{ $product->imagePath }}" class="img-responsive" alt="">
                                    </a>
                                    <a href="{{ route('product.show', $product->slug) }}" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">View Post</div>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <header class="entry-header text-center text-uppercase">
                                        {{--@if($product->hasCategory())--}}
                                            {{--<h6><a href="{{ route('category.show', $post->category->slug) }}">{{ $post->getCategoryTitle() }}</a></h6>--}}
                                        {{--@endif--}}
                                        <h1 class="entry-title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->title }}</a></h1>
                                    </header>
                                    <div class="entry-content">
                                        <p>{!! $product->description !!}</p>
                                        <div class="btn-continue-reading text-center text-uppercase">
                                            <a href="{{ route('product.show', $product->slug) }}" class="more-link">Continue Reading</a>
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