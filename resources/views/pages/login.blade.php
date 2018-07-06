@extends('layout')
@section('main_slider')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/test_bg.jpg');">
        <h2 class="ltext-105 cl0 txt-center">Войти</h2>
    </section>
@endsection

@section('content')
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <div class="row p-b-148">
                @include('admin.errors')
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form class="form-horizontal contact-form" role="form" method="post" action="/login">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Войти
                        </h4>
                        {{ csrf_field() }}
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input type="text"
                                   class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="login">
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input type="password"
                                    class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"
                                    id="password"
                                    name="password"
                                    placeholder="password">
                        </div>
                        <button type="submit"
                                class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Войти
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection