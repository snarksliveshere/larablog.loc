<div class="col-md-4 col-lg-3 p-b-80">
    <div class="side-menu">
        <div class="of-hidden pos-relative">
            <form action="/subscribe" method="post">
                {{ csrf_field() }}
                <div class="wrap-input1 w-full p-b-4">
                    <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                           placeholder="email@example.com">
                    <div class="focus-input1 trans-04"></div>
                </div>
                <div class="p-t-18">
                    <button type="submit" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                        Подписаться
                    </button>
                </div>
            </form>
        </div>
        <div class="p-t-65">
            <h4 class="mtext-112 cl2 p-b-33">
                Популярные посты
            </h4>
            <ul class="sidebar-post">
                @foreach($popularPosts as $popularPost)
                    <li class="flex-w flex-t p-b-30">
                        <a href="{{ route('post.show', $popularPost->slug) }}"
                           class="wrao-pic-w hov-ovelay1 m-r-20 sidebar-post__link">
                            <img
                                    src="{{ $popularPost->getResizeImage('295-165') }}" alt="PRODUCT" class="img-responsive">

                            <span
                                    class="sidebar-post__link-date">{{ $post->author->name }}
                                <br>{{ $popularPost->getDate() }}</span> </a>
                        <div class="size-215 flex-col-t p-t-8">
                            <a href="{{ route('post.show', $popularPost->slug) }}"
                               class="stext-116 cl8 hov-cl1 trans-04">{{ $popularPost->title }}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="p-t-65">
            <h4 class="mtext-112 cl2 p-b-33">
                Последние посты
            </h4>
            <ul class="sidebar-post">
                @foreach($recentPosts as $recentPost)
                    <li class="flex-w flex-t p-b-30">
                        <a href="{{ route('post.show', $recentPost->slug) }}"
                           class="wrao-pic-w hov-ovelay1 m-r-20 sidebar-post__link"> <img
                                    src="{{ $recentPost->getResizeImage('295-165') }}" alt="PRODUCT" class="img-responsive"> <span
                                    class="sidebar-post__link-date">{{ $post->author->name }}
                                <br>{{ $recentPost->getDate() }}</span> </a>
                        <div class="size-215 flex-col-t p-t-8">
                            <a href="{{ route('post.show', $recentPost->slug) }}"
                               class="stext-116 cl8 hov-cl1 trans-04">{{ $recentPost->title }}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>