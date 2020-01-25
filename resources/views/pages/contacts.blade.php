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
                                <a href="{{ asset('/images/resume/Deryugin_Mihail_resume.doc') }}"><i class="fa fa-download"></i> Скачать резюме в формате Word</a>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Контакты</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                Михаил Дерюгин<br>
                                Email: <a href="mailto:snarksliveshere@gmail.com">snarksliveshere@gmail.com</a><br>
                                LinkedIn: <a href="https://www.linkedin.com/in/mihail-deruygin/">linkedin.com/in/mihail-deruygin/</a><br>
                                skype: <span class="fwb">snarksliveshere</span>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Ключевые Навыки</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <span class="fwb">Golang, Symfony, Vuetify, PostgreSQL</span>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Дополнительно</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <span class="fwb">
                                Git, Laravel, JS, HTML5/CSS, Linux, Dart, Flutter
                                    </span>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Обо мне</h5>
                            </div>
                            <div class="col-12 col-md-8">
                               <p class="mb-3">На данный момент работаю над поддержанием и созданием внутренних ERP систем сбора и отображения маркетинговой и финансовой статистики на базе PHP(Symfony) + Golang + Vuetify & PostgreSQL
                               <br> По базам проходил курс (по большей части Postgres), сертификат лежит здесь
                               <a href="https://otus.ru/certificate/c96b2bdc988c49a4838dc7ca351318fa/">Otus.SUBD</a>
                               </p>
                               <p>
                                    <span class="fwb">Golang</span><br>
                                    Основная, и очень радующая меня технология. На данный момент, большую часть времени работаю на ней и постепенно перевожу на работе сервисы с Symfony на Go.
                                    <br> В основном, использую для построения ETL системы API -> Database.
                                    <br>
                               Параллельно хожу на курсы по Go, сертификат будет чуть позже. 
                               <br>
                               Внутренние наработки, к сожалению, показать не могу, но вот тут есть некоторое представление 
                               <a href="https://github.com/snarksliveshere/otus_golang/tree/master/hw_17_monitoring">github.calendar.microservices</a>
                               </p>
                                <p>
                                    <span class="fwb">Symfony</span><br>
                                    Вторая основная технология. Так как пишу ERP, то особо не покажешь ни код, ни интерфейсы, но я наделал скринов с фейковыми данными, чтобы было некоторое представление
                                    <br>
                                    <a class="fancybox" href="{{ asset('/images/resume/erp_dashboard.jpg') }}">
                                        <span class="fwb">Dashboard. Формирование отчета по произвольно выбранным группировкам и метрикам</span>
                                    </a>
                                    <br>
                                    <a class="fancybox" href="{{ asset('/images/resume/erp_data_table_select.jpg') }}">
                                        <span class="fwb">фильтры по столбцам</span>
                                    </a>
                                    <br>
                                    <a class="fancybox" href="{{ asset('/images/resume/erp_date_range_picker.jpg') }}">
                                        <span class="fwb">date range picker с временными паттернами</span>
                                    </a>
                                    <br>
                                    <a class="fancybox" href="{{ asset('/images/resume/erp_several_filters.jpg') }}">
                                        <span class="fwb">выборка по нескольким фильтрам, включая логику && > < =</span>
                                    </a>
                                </p>

                                <p>
                                    <span class="fwb">Laravel</span><br>
                                <a href="http://snarksliveshere.xyz/contacts">http://snarksliveshere.xyz</a>
                                Изначально писал для себя простой блог, но после решил расширить его до легкого интернет-магазина с торговыми предложениями. Так как приложение писалось для практики, заготовки вроде Aimeos или Voyager я в нем не использовал.</p>
                                <p>В последнее время пишу на Symfony, поэтому Laravel подзабыл</p>
                                <p class="mb-3">Исходный код на <a href="https://github.com/snarksliveshere/larablog.loc">https://github.com/snarksliveshere/larablog.loc</a>
                                гостевой доступ в админку<br> login: test pass: test</p>

                                <p><span class="fwb">Vue/Vuetify</span><br>
                                <p>
                                    Разработка ERP сервисов идет на vuetify, и фронтенд SPA реализация в нашем подразделении это также моя область ответственности.
                                    На git лежит другой тестовый проект, написанный давно и больше для практики.
                                    <a href="https://github.com/snarksliveshere/vue.spa">
                                    https://github.com/snarksliveshere/vue.spa
                                    </a>

                                </p>
                                <p class="mt-3"><span class="fwb">Deploy, LAMP / LEMP</span><br>
                                С docker-compose знаком примерно вот на таком уровне 
                                <a href="https://github.com/snarksliveshere/otus_golang/blob/master/hw_17_monitoring/docker-compose.yml">
                                    https://github.com/snarksliveshere/.../docker-compose.yml
                                </a></p>
                                <p class="mb-3">Vagrant когда-то использовал, сейчас его не практикую</p>

                                <p> По знанию Linux, использую Ubuntu, как дома, так и на работе, в принципе, доволен этой ОС крайне.
                                    <br> <br>
                                    Немного писал Bash скрипты, но это больше на любительском уровне, для автоматизации некоторых процессов в целях повышения удобства.
                                    <br> <br>
                                </p>
                                <p class="mt-3"><span class="fwb">Flutter</span><br>
                               
                                    Это больше для души, коммерческого опыта у меня на нем нет, но есть завершенные приложение, которые, впрочем, еще нужно бы поддоработать, 
                                    но чуть позже, когда будет больше времени. Впрочем, если на работе будет возможность прокачаться в этом направлении, 
                                    это было бы отлично.
                                    <br>
                                    <a href="https://github.com/snarksliveshere/temp_time_tracker">
                                    простенький тайм трекер
                                    </a>
                                    <br>
                                    <a href="https://github.com/snarksliveshere/fullapp">
                                    что-то вроде доски объявлений
                                    </a>
                                </p>
                                <p class="mb-3 mt-3">
                                    До того, как перешел на разработку ERP систем,
                                    работал на фирме по созданию и поддержке сайтов.
                                    Там приходилось немало времени уделять верстке и JS, правки по существующим сайтам,
                                    но есть и проекты с чистого листа, такие как
                                    <br>
                                    <a href="http://g-strela.ru/">http://g-strela.ru/</a>
                                    <br>
                                    <a href="http://hummel-russia.ru/">http://hummel-russia.ru/</a>
                                    <br> и другие.
                                    Чуть ниже я приведу все ссылки на них.</p>
                                <p class="mb-3">из CMS наиболее плотно я работал с MODX & Bitrix, правки были и по многим другим (WordPress, opencart etc), когда я работал на фрилансе, активно использовал Joomla. На MODX я создал порядка 25 сайтов (большей частью интернет-магазины) и правил еще немало, Bitrix - больше создание нового функционала и правки интернет-магазинов.</p>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Опыт работы</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row no-gutters">
                                     <div class="col-6">Компания: Mobio<br> <a href="https://mobioinc.com/" rel="nofollow">https://mobioinc.com/</a>

                                    </div>
                                    <div class="col-6">Октябрь 2018 - по настоящее время</div>
                                    <div class="w-100"></div>
                                    <p class="fwb my-2">Middle Full Stack Developer</p>
                                    <ul class="standard">
                                        <li>

                                            Обеспечение работоспособности и создание ERP-систем на базе Symfony & Vuetify</li>
                                    </ul>
                                    <hr style="width: 100%;">
                                    <div class="w-100 my-2"></div>
                                    <div class="col-6">Компания: ARD media<br> <a href="https://ard-media" rel="nofollow">ARD media</a>

                                    </div>
                                    <div class="col-6">Февраль 2017 - Август 2018</div>
                                    <div class="w-100"></div>
                                    <p class="fwb my-2">PHP разработчик</p>
                                    <ul class="standard">
                                        <li>Создание и поддержка существующих сайтов, используя xPDO, MODX, PHP, MySQL, JQuery/JavaScript.</li>
                                        <li>Верстка, адаптив, HTML/HTML5, CSS3, SCSS, Gulp and Photoshop.</li>
                                        <li>Разработка и внедрение нового функционала для повышения конверсии, юзабилити и прочее.</li>
                                    </ul>
                                    <hr style="width: 100%;">
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
                                    <li><a href="http://www.germes-gp.ru">http://www.germes-gp.ru/</a> <p>( + Написан модуль сравнения товаров, стандартный не работал с категориями и с ним тяжело было работать, когда количество опций  около 300)</p></li>
                                    <li><a rel="nofollow" href="http://hummel-russia.ru/">http://hummel-russia.ru</a></li>
                                    <li><a rel="nofollow" href="http://kaskad.ardmedia.ru">http://kaskad.ardmedia.ru</a></li>
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
                                    <li><a href="http://snarksliveshere.xyz">http://snarksliveshere.xyz</a> <p>(Laravel)</p>
                                    </li>
                                    <li><a href="https://github.com/snarksliveshere/symfony_microblog">https://github.com/snarksliveshere/symfony_microblog</a>  <p>простой CRUD</p></li>
                                    <li><a href="https://github.com/snarksliveshere/strela">https://github.com/snarksliveshere/strela</a> <p>(Верстка по новому дизайну, еще не интегрирована)</p></li>
                                    <li><a href="https://github.com/snarksliveshere/vue.spa">https://github.com/snarksliveshere/vue.spa</a> <p>(страничка Vue для практики в этом деле)</p></li>
                                    <li><a href="https://github.com/snarksliveshere/csscleaner">https://github.com/snarksliveshere/csscleaner</a> <p>(for clean unused css styles)</p>
                                    </li>
                                </ul>
                                <p class="fwb my-2">ARD, рабочие сайты</p>
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
                                <a href="{{ asset('/images/Mike_Deryugin_CV_2019.pdf') }}" target="_blank"><i class="fa fa-download"></i> Download CV</a>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Contact</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                Mike Deryugin<br>
                                Email: <a href="mailto:snarksliveshere@gmail.com">snarksliveshere@gmail.com</a><br>
                                LinkedIn: <a href="https://www.linkedin.com/in/mihail-deruygin/">linkedin.com/in/mihail-deruygin/</a><br>
                                skype: <span class="fwb">snarksliveshere</span>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Skills</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <span class="fwb">Golang, Symfony, Vuetify, PostgreSQL, Laravel, JS, HTML5/CSS, Git, Linux</span>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Qualifications</h5>
                            </div>
                            <div class="col-12 col-md-8">
    <p class="mb-3">Now I am working on maintaining and creating internal systems for collecting marketing statistics based on Golang + Symfony + Vuetify & PostgreSQL
    </p>  <br>
    Unfortunately, I can’t show the internal developments, but here there is a personal project
                               <a href="https://github.com/snarksliveshere/otus_golang/tree/master/hw_17_monitoring">github.calendar.microservices</a>
                                        <p>
                                    <span class="fwb">Golang</span><br>
                                    The main, and very pleasing to me technology. At the moment, most of the time I work on it and gradually transfer services from Symfony to Go at work.
                                    </p>
                                <p>
                                    <span class="fwb">Symfony</span><br>
                                    One of the the core technologies. Since I am writing ERP, I cannot show either the code or the interfaces, but I made screenshots with fake data
                                    <br>
                                    <a class="fancybox" href="{{ asset('/images/resume/erp_dashboard.jpg') }}">
                                        <span class="fwb">Dashboard. Report generation for selected groups and metrics</span>
                                    </a>
                                    <br>
                                    <a class="fancybox" href="{{ asset('/images/resume/erp_data_table_select.jpg') }}">
                                        <span class="fwb">column filtering</span>
                                    </a>
                                    <br>
                                    <a class="fancybox" href="{{ asset('/images/resume/erp_date_range_picker.jpg') }}">
                                        <span class="fwb">date range picker with patterns</span>
                                    </a>
                                    <br>
                                    <a class="fancybox" href="{{ asset('/images/resume/erp_several_filters.jpg') }}">
                                        <span class="fwb">selection by several filters, including logic && > < =</span>
                                    </a>
                                </p>
                                <p>




                                    <span class="fwb">Laravel</span><br>
        <a href="http://snarksliveshere.xyz/contacts">http://snarksliveshere.xyz</a>
        Initially I wrote for myself a simple blog,
        but after I decided to expand it to an easy online store with shopping offers.
        Since the application was written for practice,
        I didn`t use it in Aimeos or Voyager.
    <p class="mb-3">Recently, I write in Symfony, so Laravel forgot a little</p>
    <p class="mb-3">Source code at
         <a href="https://github.com/snarksliveshere/larablog.loc">github.com/snarksliveshere/larablog.loc</a> guest access to the admin area
        login: test pass: test</p>

    <p class="mb-3">
        <span class="fwb">Vue/Vuetify</span><br>
        The development of ERP services goes to vuetify, and the front-end SPA implementation in our division is also my area of responsibility.
        On git is another test project, written a long time ago and more for practice.
        <a href="https://github.com/snarksliveshere/vue.spa">github.com/snarksliveshere/vue.spa</a>
    </p>
    <p class="mb-3"><span class="fwb">Deploy, LAMP / LEMP</span><br>
       Docker-compose  <a href="https://github.com/snarksliveshere/otus_golang/blob/master/hw_17_monitoring/docker-compose.yml">
                                    https://github.com/snarksliveshere/.../docker-compose.yml
                                </a>
                                </p>

    <p>
        However, basically, this is the DEV OPS area, I don’t pay much attention to it now, because there are enough other interesting things.
        <br> <br>
        I wrote a little Bash scripts, but this is more at the amateur level, to automate some processes in order to improve convenience.
    </p>
    <p class="mt-3"><span class="fwb">Flutter</span><br>
                               
    This is more for the soul, I do not have commercial experience on it, but there are completed applications, which, however, still need to be finalized, but a little later, when there will be more time. However, if at work there will be an opportunity to pump in this direction, that would be excellent.
                               <br>
                               <a href="https://github.com/snarksliveshere/temp_time_tracker">
                               simple time tracker
                               </a>
                               <br>
                               <a href="https://github.com/snarksliveshere/fullapp">
                               Bulletin board
                               </a>
                           </p>

    <p class="mb-3 mt-3">
        Before switching to the development of ERP systems,
        I worked at a website development and maintenance firm.
        There, I had to spend a lot of time on layout and JS,
        editing existing sites,
        but there are also projects from scratch, such as
        <br>
        <a href="http://g-strela.ru/">http://g-strela.ru/</a>
        <br>
        <a href="http://hummel-russia.ru/">http://hummel-russia.ru/</a>
        <br>
        and another sites.
        Below I give all the links to them.
    </p>
       <p class="mb-3">
           From CMS, I worked most closely with MODX & Bitrix, there were many other edits (WordPress, opencart etc), when I worked on freelancing, I actively used Joomla. On MODX, I created about 25 sites (mostly online stores) and there are still quite a few rules, Bitrix - more creating new features and editing online stores.
    </p>

</div>
                            <div class="w-100 my-2"></div>

                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu">Work Experience</h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row no-gutters">
                                    <div class="col-6">Company: Mobio<br>
                                    	<a href="https://mobioinc.com/" rel="nofollow">https://mobioinc.com/</a>

                                    </div>
                                    <div class="col-6">Oct 2018 - Present day</div>
                                    <div class="w-100"></div>
                                    <p class="fwb my-2"> Middle Full Stack Developer</p>
                                    <ul class="standard">
                                        <li>
                                            Maintaining and creating internal systems for collecting marketing statistics based on Symfony & Vuetify & PostgreSQL
                                            </li>                                    </ul>
                                    <hr style="width:100%;">
                                    <div class="col-6">Company: ARD media<br>
                                    	<a href="https://ard-media.ru" rel="nofollow">https://ard-media.ru</a>

                                    </div>
                                    <div class="col-6">Feb 2017 - Aug 2018</div>
                                    <div class="w-100"></div>
                                    <p class="fwb my-2">PHP Developer</p>
                                    <ul class="standard">
                                        <li>Develop and maintain e-commerce and other responsive websites using xPDO, MODX, PHP, MySQL, JQuery/JavaScript.</li>
                                        <li>Created new websites for individuals and business using HTML/HTML5, CSS3, SCSS, Gulp and Photoshop.</li>
                                        <li>Updated and maintained exististing responsive websites to raise CTR.</li>
                                    </ul>
                                    <hr style="width:100%;">
                                    <div class="col-6">Freelance, self-employment</div>
                                    <div class="col-6">2010 - Oct 2015</div>
                                    <div class="w-100"></div>
                                    <p class="fwb my-2">HTML/CSS Developer</p>
                                    <ul class="standard">
                                        <li>Created and maintained standart based  websites using HTML/CSS, jquery, php, mysql, Joomla, Wordpress</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="w-100 my-2"></div>
                            <div class="col-12 col-md-4">
                                <h5 class="tdu"></h5>
                            </div>
                            <div class="col-12 col-md-8">
                                <p class="fwb my-2">Develop and maintain sites:</p>

                                <ul class="standard">
                                    <li><a rel="nofollow" href="http://www.germes-gp.ru">http://www.germes-gp.ru/ ( + developing compare module)</a></li>
                                    <li><a rel="nofollow" href="http://hummel-russia.ru/">http://hummel-russia.ru</a></li>
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