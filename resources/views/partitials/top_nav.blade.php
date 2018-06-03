<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/images/logo.png" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-uppercase">
                    <li><a href="/">Главная</a></li>
                    <li><a href="about-me.html">О компании</a></li>
                    <li><a href="{{ route('product.index')}}">Каталог</a></li>
                    <li><a href="{{ route('posts.main') }}">Посты</a></li>
                    <li><a href="contact.html">Контакты</a></li>
                    <li>
                        <a href="{{ route('product.shoppingCart') }}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                            <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav text-uppercase pull-right">
                    @if(Auth::check())
                        <li><a href="/profile">My profile</a></li>
                        <li><a href="/logout">Logout</a></li>
                    @else
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Login</a></li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <div class="show-search">
                <form role="search" method="get" id="searchform" action="#">
                    <div>
                        <input type="text" placeholder="Search and hit enter..." name="s" id="s">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>