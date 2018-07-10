
<ul class="sidebar-menu">
    <li class="header">Навигация</li>
    <li class="treeview">
        <a href="/admin"> <i class="fa fa-dashboard"></i> <span>Админ-панель</span> </a>
    </li>
    <li class="header">Товары</li>
    <li><a href="{{ route('product_categories.index') }}"><i class="fa fa-list-ul"></i><span>Категории товаров</span></a></li>
    <li><a href="{{ route('products.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Товары</span></a></li>
    <li><a href="{{ route('offers.index') }}"><i class="fa fa-list-ul"></i> <span>Торговые предложения</span></a></li>
    <li><a href="{{ route('orders.index') }}"><i class="fa fa-list-ul"></i> <span>Заказы</span></a></li>
    <li class="header">Посты</li>
    <li><a href="{{ route('categories.index') }}"><i class="fa fa-list-ul"></i> <span>Категории</span></a></li>
    <li><a href="{{ route('posts.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Посты</span></a></li>
    <li><a href="{{ route('tags.index') }}"><i class="fa fa-tags"></i> <span>Теги</span></a></li>
    {{--<li>--}}
        {{--<a href="{{ route('comments.index') }}"> <i class="fa fa-commenting"></i> <span>Комментарии</span> <span--}}
                    {{--class="pull-right-container">--}}
              {{--<small class="label pull-right bg-green">{{ $newCommentsCount }}</small>--}}
            {{--</span> </a>--}}
    {{--</li>--}}
    {{--<li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>--}}
    {{--<li><a href="{{ route('subscribers.index') }}"><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li>--}}
{{--</ul>--}}
@if(\Illuminate\Support\Facades\Auth::user()->roles()->firstOrFail()->name == 'admin')
        <li>
            <a href="{{ route('comments.index') }}"> <i class="fa fa-commenting"></i> <span>Комментарии</span> <span
                        class="pull-right-container">
              <small class="label pull-right bg-green">{{ $newCommentsCount }}</small>
            </span> </a>
        </li>
    <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
    <li><a href="{{ route('subscribers.index') }}"><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li>
@else
    <li><a href=""><span style="display: inline-block; width: auto;white-space: normal;">Функционал нижеследующих пунктов только для админа</span></a></li>
    <li>
        <a href="#"> <i class="fa fa-commenting"></i> <span>Комментарии</span> <span
                    class="pull-right-container">
              <small class="label pull-right bg-green">{{ $newCommentsCount }}</small>
            </span> </a>
    </li>
    <li><a href="#"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
    <li><a href="#"><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li>

@endif
    <li><a href="/logout"><span>Выйти</span></a></li>
</ul>


