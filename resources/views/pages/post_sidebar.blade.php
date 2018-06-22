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
                        Subscribe
                    </button>
                </div>
            </form>
        </div>
        <div class="p-t-55">
            <h4 class="mtext-112 cl2 p-b-33">
                Categories
            </h4>
            <ul>
                @foreach($categories as $category)
                    <li class="bor18">
                        <aclass="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4"  href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a>
                        <span class="text-right"> ({{ $category->posts()->count() }})</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="p-t-65">
            <h4 class="mtext-112 cl2 p-b-33">
               Популярные посты
            </h4>
            <ul>
                @foreach($popularPosts as $popularPost)
                    <li class="flex-w flex-t p-b-30">
                        <a href="{{ route('post.show', $popularPost->slug) }}" class="wrao-pic-w size-214 hov-ovelay1 m-r-20"> <img
                                    src="{{ $popularPost->getImage() }}" alt="PRODUCT"> </a>
                        <div class="size-215 flex-col-t p-t-8">
                            <a href="{{ route('post.show', $popularPost->slug) }}" class="stext-116 cl8 hov-cl1 trans-04">{{ $popularPost->title }}</a> <span class="stext-116 cl6 p-t-20">
											{{ $popularPost->getDate() }}
										</span>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>

        <div class="p-t-65">
            <h4 class="mtext-112 cl2 p-b-33">
                Последние
            </h4>
            <ul>
                @foreach($recentPosts as $recentPost)
                    <li class="flex-w flex-t p-b-30">
                        <a href="{{ route('post.show', $recentPost->slug) }}" class="wrao-pic-w size-214 hov-ovelay1 m-r-20"> <img
                                    src="{{ $recentPost->getImage() }}" alt="PRODUCT"> </a>
                        <div class="size-215 flex-col-t p-t-8">
                            <a href="{{ route('post.show', $recentPost->slug) }}" class="stext-116 cl8 hov-cl1 trans-04">{{ $recentPost->title }}</a> <span class="stext-116 cl6 p-t-20">
											{{ $recentPost->getDate() }}
										</span>
                        </div>
                    </li>
                @endforeach



            </ul>
        </div>

        <div class="p-t-65">
            <h4 class="mtext-112 cl2 p-b-33">
                feautured посты
            </h4>
            <ul>
                @foreach($featuredPosts as $featuredPost)
                    <li class="flex-w flex-t p-b-30">
                        <a href="{{ route('post.show', $featuredPost->slug) }}" class="wrao-pic-w size-214 hov-ovelay1 m-r-20"> <img
                                    src="{{ $featuredPost->getImage() }}" alt="PRODUCT"> </a>
                        <div class="size-215 flex-col-t p-t-8">
                            <a href="{{ route('post.show', $featuredPost->slug) }}" class="stext-116 cl8 hov-cl1 trans-04">{{ $popularPost->title }}</a> <span class="stext-116 cl6 p-t-20">
											{{ $featuredPost->getDate() }}
										</span>
                        </div>
                    </li>
                @endforeach


            </ul>
        </div>


    </div>
</div>