<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Категории
                </h4>
                <ul>
                    @foreach($categories as $category)
                        <li class="p-b-10">
                            <a href="{{ route('product.index', $category->slug)  }}"
                               class="stext-107 cl7 hov-cl1 trans-04">{{ $category->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Меню
                </h4>
                <ul>
                    <li class="p-b-10"><a class="stext-107 cl7 hov-cl1 trans-04" href="/">Главная</a></li>
                    <li class="p-b-10"><a class="stext-107 cl7 hov-cl1 trans-04" href="{{ route('front.about') }}">О
                            компании</a></li>
                    <li class="p-b-10"><a class="stext-107 cl7 hov-cl1 trans-04" href="{{ route('category_product')}}">Каталог</a>
                    </li>
                    <li class="p-b-10"><a class="stext-107 cl7 hov-cl1 trans-04"
                                          href="{{ route('posts.main') }}">Блог</a></li>
                    <li class="p-b-10"><a class="stext-107 cl7 hov-cl1 trans-04" href="{{ route('front.contacts') }}">Контакты</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Будем на связи
                </h4>
                <p class="stext-107 cl7 size-201">
                    Сайт является тестовой площадкой, подписки уходят в ловушку для почты.
                </p>
                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16"> <i class="fa fa-facebook"></i> </a> <a
                            href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16"> <i class="fa fa-instagram"></i> </a> <a
                            href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16"> <i class="fa fa-pinterest-p"></i> </a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 p-b-50">
                <form action="/subscribe" method="post">
                    {{ csrf_field() }}
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                               placeholder="email@example.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>
                    <div class="p-t-18">
                        <button type="submit"
                                class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            Подписаться
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-up"></i>
		</span>
</div>