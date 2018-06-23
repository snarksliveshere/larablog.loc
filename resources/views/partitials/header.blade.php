<header>
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <a href="/" class="logo"> <img src="/images/lunar_lander_logo.png" alt="IMG-LOGO"
                                               class="img-responsive"> </a>
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li><a href="/">Главная</a></li>
                        <li><a href="{{ route('front.about') }}">О компании</a></li>
                        <li><a href="{{ route('category_product')}}">Каталог</a></li>
                        <li><a href="{{ route('posts.main') }}">Блог</a></li>
                        <li><a href="{{ route('front.contacts') }}">Контакты</a></li>
                    </ul>
                </div>
                <div class="wrap-icon-header flex-w flex-r-m">
                    <a href="{{ route('product.shoppingCart') }}" class="d-inline-block"> <i
                                class="zmdi zmdi-shopping-cart fz25"></i> <span
                                class="badge badge_header_cart">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
                    <div>
                        <ul class="main-menu">
                            @if(Auth::check())
                                <li><a href="/profile">My profile</a></li>
                                <li><a href="/logout">Logout</a></li>
                            @else
                                <li><a href="/register">Register</a></li>
                                <li><a href="/login">Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="wrap-header-mobile">
        <div class="logo-mobile">
            <a href="/"><img src="/images/lunar_lander_logo.png" alt="IMG-LOGO"></a>
        </div>
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10"
            >
                <a href="{{ route('product.shoppingCart') }}" class="d-inline-block"> <i
                            class="zmdi zmdi-shopping-cart fz25"></i> <span
                            class="badge badge_header_cart">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                </a>
            </div>
        </div>
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li><a href="/">Главная</a></li>
            <li><a href="{{ route('front.about') }}">О компании</a></li>
            <li><a href="{{ route('category_product')}}">Каталог</a></li>
            <li><a href="{{ route('posts.main') }}">Блог</a></li>
            <li><a href="{{ route('front.contacts') }}">Контакты</a></li>
            @if(Auth::check())
                <li><a href="/profile">My profile</a></li>
                <li><a href="/logout">Logout</a></li>
            @else
                <li><a href="/register">Register</a></li>
                <li><a href="/login">Login</a></li>
            @endif
        </ul>
    </div>
</header>