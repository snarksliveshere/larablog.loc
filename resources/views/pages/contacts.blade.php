@extends('layout')
@section('main_slider')
@section('main_slider')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/space-bg.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Контакты
        </h2>
    </section>
@endsection
@endsection


@section('content')

<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr row">
            <div class="col-12 col-lg-6 size-210 bor10 flex-w flex-col-m p-tb-30 p-lr-15-lg w-full-md">
                <div class="tabs">
                    <ul class="tabs__caption row no-gutters">
                        <li class="tac col active">Резюме</li>
                        <li class="tac col">CV</li>
                    </ul>
                    <div class="tabs__content active">
                        <div class="row">
                            <div class="col-12 my-2">
                                <a href="{{ asset('/images/resume_deryugin_mihail.doc') }}"><i class="fa fa-download"></i> Скачать резюме в формате Word</a>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Контакты</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                Михаил Дерюгин<br>
                                Email: <a href="mailto:snarksliveshere@gmail.com">snarksliveshere@gmail.com</a><br>
                                skype: <a href="skype:cheshirs?chat">cheshirs</a>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Обо мне</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <p>
                                    Причины, сподвигшие меня сменить место работы, заключаются в том, что исполняемые задачи перестали быть сложными и в конце уже свелись к рутине. В основном, это разработка и поддержка сайтов на MODX, а также Битрикс. Хотя там, в основном, плотная работа с php, но в отсутствии нормальной архитектуры, уже несколько не комфортно. Сейчас я разрабатываю B2B на Laravel, но это редкое исключение, специфика фирмы это Modx & bitrix.
                                   </p><p class="my-2">
                                    Тут необходимая сноска - хотя я немало поработал с функционалом и поддержкой сайтов на битрикс, но не стал их включать в список сайтов, так как у меня очень мало желания совершенствоваться в этой области по, думаю, очевидным причинам. К примеру, по таким  - http://joxi.ru/5mdBKa6ck15GyA. Это достаточно свежая версия, ядро D7 и так далее.
                                </p>
                                <p>
                                    Исходя из этого, я ищу работу, где бы я мог решать более сложные и разнообразные задачи и одновременно осваивать современные технологии (тут я более всего склоняюсь к Laravel & Symfony) не только в свободное, но и в рабочее время.
                                </p>
                                <p>Еще бы очень хотелось на работе иметь дело с Linux, т.к. на работе только windows, дома второй ОС стоит Ubuntu, но в силу отсутствия времени я не так много, как хотелось бы, работаю с этой системой.</p>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Ключевые Навыки</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                PHP, HTML5,Git, Css/Css3, SCSS, Gulp, Compass, JavaScript, JQuery, Vue(начинаю осваивать, есть тестовый проект), Laravel (больше чем Vue, меньше MODX, к сожалению. Этот сайт сделан на Laravel), Blade, PhpStorm, composer, npm, docker,  bootstrap3, bootstrap4, emmet, deploy(больше apache2, могу поставить и на  nginx), Linux(Ubuntu). CMS: MODX, Bitrix(включаю битрикс только для полноты списка). В основном MODX, я создал около 25 сайтов на нем, еще столько же было на поддержке, также создавал модули под эту CMS.
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Опыт работы</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row no-gutters">
                                    <div class="col-6">Компания: ARD media<br> <a href="https://ard-media" rel="nofollow">ARD media</a>

                                    </div>
                                    <div class="col-6">Февраль 2017 - по настоящее время</div>
                                    <div class="w-100"></div>
                                    <p class="fwb my-2">PHP разработчик</p>
                                    <ul class="standard">
                                        <li>Создание и поддержка существующих сайтов, используя xPDO, MODX, PHP, MySQL, JQuery/JavaScript.</li>
                                        <li>Верстка, адаптив, HTML/HTML5, CSS3, SCSS, Gulp and Photoshop.</li>
                                        <li>Разработка и внедрение нового функционала для повышения конверсии, юзабилити и прочее.</li>
                                    </ul>
                                    <div class="w-100 my-2"></div>
                                    <div class="col-6">Сайтострой, фриланс, самозанятость</div>
                                    <div class="col-6">Январь 2010 - Октябрь 2015</div>
                                    <div class="w-100"></div>
                                    <p class="fwb my-2">HTML верстальщик</p>
                                    <ul class="standard">
                                        <li>html/css/jquery верстка. Но тогда я занимался не только версткой все 6 лет, была и другая занятость, но она не относится к сайтостроению, нет смысла ее тут расписывать, в целом, около 3 лет я на фрилансе занимался версткой между 2010 и 2012 годами и 2014-2015<br>
                                            Все, что ранее уже не относится к делу, она есть в приложенном word файле, но, по сути, это не имеет отношения к web разработке
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Сайты</h5>
                            </div>

                            <div class="col-12 col-md-8">
                                <p class="fwb my-2">Разработка и последующая поддержка сайтов:</p>

                                <ul class="standard">
                                    <li><a href="http://www.germes-gp.ru">http://www.germes-gp.ru/ ( + Написан модуль сравнения товаров, стандартный не работал с категориями и с ним тяжело было работать, когда количество опций  около 300)</a></li>
                                    <li><a rel="nofollow" href="http://alvita-a.ru">http://alvita-a.ru</a></li>
                                    <li><a rel="nofollow" href="http://6x9elit.ru">http://6x9elit.ru</a></li>
                                    <li><a rel="nofollow" href="http://allbesttoys.ru">http://allbesttoys.ru</a></li>
                                    <li><a rel="nofollow" href="http://archivespro.ru">http://archivespro.ru</a></li>
                                    <li><a rel="nofollow" href="http://stom-mds.ru">http://stom-mds.ru</a></li>
                                    <li><a rel="nofollow" href="http://elite-book.ru">http://elite-book.ru</a></li>
                                    <li><a rel="nofollow" href="http://foreland.ardmedia.ru">http://foreland.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://twinside.ru">http://twinside.ru</a></li>
                                    <li><a rel="nofollow" href="http://nikolfleur.ru">http://nikolfleur.ru</a></li>
                                    <li><a rel="nofollow" href="http://selena-beauty.ru">http://selena-beauty.ru</a></li>
                                    <li><a rel="nofollow" href="http://tlgcom.ru">http://tlgcom.ru</a></li>
                                    <li><a rel="nofollow" href="http://pppe.ru">http://pppe.ru</a></li>
                                    <li><a rel="nofollow" href="http://tdpromhim.ru">http://tdpromhim.ru</a></li>
                                    <li><a rel="nofollow" href="http://vip-divan.com">http://vip-divan.com</a></li>
                                    <li><a rel="nofollow" href="http://sunshading.ru">http://sunshading.ru</a></li>
                                    <li>...еще много других сайтов на поддержке</li>
                                </ul>
                                <p class="fwb my-2">Github, некоммерческие разработки</p>
                                <ul class="standard mt-2">
                                    <li><a href="http://snarksliveshere.xyz">http://snarksliveshere.xyz (Laravel, гостевой аккаунт: test/test)</a>

                                    </li>
                                    <li><a href="https://github.com/snarksliveshere/strela">https://github.com/snarksliveshere/strela (Верстка по новому дизайну, еще не интегрирована)</a></li>
                                    <li><a href="https://github.com/snarksliveshere/vue.spa">https://github.com/snarksliveshere/vue.spa (страничка Vue для практики в этом деле)</a></li>
                                    <li><a href="https://github.com/snarksliveshere/csscleaner">https://github.com/snarksliveshere/csscleaner (for clean unused css styles)</a><br><p>Принцип действия: Забирает все ссылки с главной страницы (или с той, которую указзать в конфиге), парсит все классы со страниц, сравнивает со скачанными файлами css(чтобы не разбирать bootstrap, к примеру) и js (здесь есть нюансы), и выдает очищенный файл, подробнее - на гите </p>
                                        </li>
                                </ul>
                                <p class="fwb my-2">ARD рабочие сайты</p>
                                <ul class="standard">
                                    <li><a rel="nofollow" href="http://stroy.ardmedia.ru">http://stroy.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://stom1.ardmedia.ru">http://stom1.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://stom2.ardmedia.ru">http://stom2.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://salon1.ardmedia.ru">http://salon1.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://salon2.ardmedia.ru">http://salon2.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo6.ardmedia.ru">http://demo6.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo7.ardmedia.ru">http://demo7.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo8.ardmedia.ru">http://demo8.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo12.ardmedia.ru">http://demo12.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo13.ardmedia.ru">http://demo13.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo14.ardmedia.ru">http://demo14.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo15.ardmedia.ru">http://demo15.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo16.ardmedia.ru">http://demo16.ardmedia.ru</a></li>
                                </ul>
                            </div>

                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Образование</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row no-gutters">
                                    <div class="col-6">Высшее, Психология, 5 лет, очная</div>
                                    <div class="col-6">2000 - 2005</div>
                                    <div class="w-100 my-2"></div>
                                    <p><a href="https://gaugn.ru/ru-ru/">https://gaugn.ru/</a><br>
                                        Государственный Академический Университет Гуманитарных Наук (ГАУГН)</p>
                                    <div class="w-100 my-2"></div>
                                    <div class="col-6">Онлайн курсы</div>
                                    <p class="mt-2">Немало прошел онлайн курсов, но сертификатов по ним у меня нет</p>
                                </div>

                            </div>
                            <div class="w-100 my-2"></div>

                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Гражданство<br>Владение языками</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                Гражданство: Россия<br>
                                Русский родной,<br>
                                На английском достаточно комфортно читаю документацию
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                               ---
                            </div>
                            <div class="col-12 col-md-8">
                                <p>Умение (и желание) быстро обучаться, ответственность, грамотность.</p>
                            </div>



                        </div>
                    </div>
                    <div class="tabs__content">
                        <div class="row">
                            <div class="col-12 my-2">
                                <a href="{{ asset('/images/CV_Mihail_Deryugin.pdf') }}" target="_blank"><i class="fa fa-download"></i> Download CV</a>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Contact</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                Mihail Deryugin<br>
                                Email: <a href="mailto:snarksliveshere@gmail.com">snarksliveshere@gmail.com</a><br>
                                skype: <a href="skype:cheshirs?chat">cheshirs</a>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Objective</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                Motivated PHP Developer seeks employment as part of a dynamic software development team.
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Computer Skills</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                Web developer with experience in PHP, HTML5,Git, Css/Css3, SCSS, Gulp, Compass, JavaScript, JQuery, Vue(a little), Laravel (more than Vue, less than MODX, unfortunately), Blade, PhpStorm, composer, npm, docker, bootstrap3, bootstrap4, emmet, deploy(apache2 || nginx), Linux(Ubuntu). Experience in Content Management System such as MODX, Wordpress, Bitrix(include bitrix only for list). Strong on MODX, i create about 25 sites and several modules on this CMS.
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Work Experience</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row no-gutters">
                                    <div class="col-6">Company: ARD media<br>
                                    https://ard-media.ru
                                    </div>
                                    <div class="col-6">Feb 2017 - preset day</div>
                                    <div class="w-100"></div>
                                    <p class="fwb my-2">PHP Developer</p>
                                    <ul class="standard">
                                        <li>Develop and maintain e-commerce and other responsive websites using xPDO, MODX, PHP, MySQL, JQuery/JavaScript.</li>
                                        <li>Created new websites for individuals and business using HTML/HTML5, CSS3, SCSS, Gulp and Photoshop.</li>
                                        <li>Updated and maintained exististing responsive websites to raise CTR.</li>
                                    </ul>
                                    <div class="col-6">Freelance, self-employment</div>
                                    <div class="col-6">2010 - Feb 2017</div>
                                    <div class="w-100"></div>
                                    <p class="fwb my-2">HTML/CSS Developer</p>
                                    <ul class="standard">
                                        <li>Created and maintained standart based  websites using HTML/CSS, jquery, php, mysql, Joomla, Wordpress</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Qualifications</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <p class="fwb my-2">Develop and maintain sites:</p>

                                <ul class="standard">
                                    <li><a rel="nofollow" href="http://www.germes-gp.ru">http://www.germes-gp.ru/ ( + developing compare module)</a></li>
                                    <li><a rel="nofollow" href="http://alvita-a.ru">http://alvita-a.ru</a></li>
                                    <li><a rel="nofollow" href="http://6x9elit.ru">http://6x9elit.ru</a></li>
                                    <li><a rel="nofollow" href="http://allbesttoys.ru">http://allbesttoys.ru</a></li>
                                    <li><a rel="nofollow" href="http://archivespro.ru">http://archivespro.ru</a></li>
                                    <li><a rel="nofollow" href="http://stom-mds.ru">http://stom-mds.ru</a></li>
                                    <li><a rel="nofollow" href="http://elite-book.ru">http://elite-book.ru</a></li>
                                    <li><a rel="nofollow" href="http://foreland.ardmedia.ru">http://foreland.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://twinside.ru">http://twinside.ru</a></li>
                                    <li><a rel="nofollow" href="http://nikolfleur.ru">http://nikolfleur.ru</a></li>
                                    <li><a rel="nofollow" href="http://selena-beauty.ru">http://selena-beauty.ru</a></li>
                                    <li><a rel="nofollow" href="http://tlgcom.ru">http://tlgcom.ru</a></li>
                                    <li><a rel="nofollow" href="http://pppe.ru">http://pppe.ru</a></li>
                                    <li><a rel="nofollow" href="http://tdpromhim.ru">http://tdpromhim.ru</a></li>
                                    <li><a rel="nofollow" href="http://vip-divan.com">http://vip-divan.com</a></li>
                                    <li><a rel="nofollow" href="http://sunshading.ru">http://sunshading.ru</a></li>
                                    <li>...and maintained many others</li>
                                </ul>
                                <p class="fwb my-2">Github, developing, non-commercial</p>
                                <ul class="standard mt-2">
                                    <li><a href="http://snarksliveshere.xyz">http://snarksliveshere.xyz (Laravel, guest account: test/test)</a></li>
                                    <li><a href="https://github.com/snarksliveshere/strela">https://github.com/snarksliveshere/strela (Converted PSD to HTML/CSS/JS, don`t integration yet)</a></li>
                                    <li><a href="https://github.com/snarksliveshere/vue.spa">https://github.com/snarksliveshere/vue.spa (test Vue page)</a></li>
                                    <li><a href="https://github.com/snarksliveshere/csscleaner">https://github.com/snarksliveshere/csscleaner (for clean unused css styles)</a></li>
                                </ul>
                                <p class="fwb my-2">ARD media websites</p>
                                <ul class="standard">
                                    <li><a rel="nofollow" href="http://stroy.ardmedia.ru">http://stroy.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://stom1.ardmedia.ru">http://stom1.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://stom2.ardmedia.ru">http://stom2.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://salon1.ardmedia.ru">http://salon1.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://salon2.ardmedia.ru">http://salon2.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo6.ardmedia.ru">http://demo6.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo7.ardmedia.ru">http://demo7.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo8.ardmedia.ru">http://demo8.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo12.ardmedia.ru">http://demo12.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo13.ardmedia.ru">http://demo13.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo14.ardmedia.ru">http://demo14.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo15.ardmedia.ru">http://demo15.ardmedia.ru</a></li>
                                    <li><a rel="nofollow" href="http://demo16.ardmedia.ru">http://demo16.ardmedia.ru</a></li>
                                </ul>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Education</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row no-gutters">
                                    <div class="col-6">MS in Psychology</div>
                                    <div class="col-6">Sep 2000 - Aug 2005</div>
                                    <div class="w-100 my-2"></div>
                                    <p><a href="https://gaugn.ru/en-us/">https://gaugn.ru/en-us/</a><br>
                                       State Academic University for the Humanities</p>
                                    <div class="w-100 my-2"></div>
                                    <div class="col-6">Online Classes</div>
                                    <div class="col-6">2015 - present day</div>
                                    <p class="mt-2">I took a many online classes, like pr-of-it.ru, elisdn.ru, cs50 and many others, but they don`t provide special certificates</p>
                                </div>

                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Interests</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                Right now my interests are php & modern frameworns.  At this moment,  I`m starting to learn Symfony
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Languages</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                Russian fluent,<br>
                                English mostly for reading technical documention,  I`m a bit out of speaking practice
                            </div>

                        </div>
                    </div>
                </div>

                {{--<div class="flex-w w-full p-b-42">--}}
						{{--<span class="fs-18 cl5 txt-center size-211">--}}
							{{--<span class="lnr lnr-map-marker"></span>--}}
						{{--</span>--}}

                    {{--<div class="size-212 p-t-2">--}}
							{{--<span class="mtext-110 cl2">--}}
								{{--Address--}}
							{{--</span>--}}

                        {{--<p class="stext-115 cl6 size-213 p-t-18">--}}
                            {{--Some address--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="flex-w w-full p-b-42">--}}
						{{--<span class="fs-18 cl5 txt-center size-211">--}}
							{{--<span class="lnr lnr-phone-handset"></span>--}}
						{{--</span>--}}

                    {{--<div class="size-212 p-t-2">--}}
							{{--<span class="mtext-110 cl2">--}}
								{{--Lets Talk--}}
							{{--</span>--}}

                        {{--<p class="stext-115 cl1 size-213 p-t-18">--}}
                            {{--phone--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="flex-w w-full">--}}
						{{--<span class="fs-18 cl5 txt-center size-211">--}}
							{{--<span class="lnr lnr-envelope"></span>--}}
						{{--</span>--}}

                    {{--<div class="size-212 p-t-2">--}}
							{{--<span class="mtext-110 cl2">--}}
								{{--Sale Support--}}
							{{--</span>--}}

                        {{--<p class="stext-115 cl1 size-213 p-t-18">--}}
                            {{--tycho-development@tycho.space--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="col-12 col-lg-6 size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form action="/send-message" method="post">
                    {{ csrf_field() }}
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Отправить сообщение
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-lr-28" type="text" name="email" placeholder="Ваш Email">
                    </div>

                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="message" placeholder="Сообщение"></textarea>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Отправить
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- Map -->
<div class="map">
    <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
</div>
@endsection