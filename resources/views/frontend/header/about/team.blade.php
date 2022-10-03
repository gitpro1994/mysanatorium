@extends('frontend.layouts.app')
@section('content')

<section id="breadcrumbs ">
    <ul class="breadcrumb ml-4">
        <li><a href="/">Главная</a></li>
        <li class="active">Наша команда</li>
    </ul>
</section>

@include('frontend.layouts.partials.navbar-third')

<section id="page-heading" class="page-heading">
    <div class="container">
        <div class="col-md-12 padding-clear">
            <h2 class="darkblue text42">Наша команда</h2>
        </div>
    </div>
</section>

<section id="page-body" class="text15">
    <div class="container">
        <p>Мы, сотрудники Mysanatorium, считаем, что поиск санаториев/спа-отелей должен быть простым и удобным.</p>
        <p>Нашей главной целью является сделать mysanatorium.com максимально удобным, полезным и предоставить Вам актуальную и достоверную информацию о лечении в санаториях и спа-отелях.</p>
    </div>
</section>

<section id="ourteam">
    <div class="container">
        <div class="row  margin-clear">
            <div class="col-md-12 padding-clear" style="margin:15px 0 25px 0">
                <h2 class="text-lightblue"><span class="darkblue">Познакомьтесь с командой </span>Mysanatorium</h2>
            </div>
            <div class="row  margin-clear" style="margin-bottom:20px;">
                <div class="col-md-6" style="margin-bottom:20px;  padding: 0px 25px;">
                    <div class="row margin-clear">
                        <div class="col-xs-12">
                            <div class="col-xs-offset-4 col-md-offset-3 col-xs-8 mysan_team_name">
                                <div class="fio">Фархад Алиев</div>
                            </div>
                        </div>
                    </div>
                    <div class="row  margin-clear worker-bg">
                        <div class="col-xs-4 padding-clear worker-img team_pp_img">
                            <img src="{{ asset('frontend/upload/manual/outteam/5735e1265de26.jpg')}}" alt="">
                            <div class="red_text">Генеральный директор</div>
                        </div>
                        <div class=" col-xs-offset-4 col-md-offset-3 col-xs-8">
                            <p><span style="font-size: 13.3333px;"><em>Фархад является бесспорным лидером во всех делах нашей компании. Он разрабатывает общее стратегическое видение сайта и контролирует все аспекты деятельности компании. Его опыт в маркетинге, создании брендов и бизнес-стратегии, приобретенный ранее в рекламной сфере, помог ему в развитии сайта Mysanatorium.com. Его главной задачей в работе Mysanatorium является предоставление выбора услуг и всех необходимых гарантий по санаторно-курортному лечению.</em></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-bottom:20px;  padding: 0px 25px;">
                    <div class="row margin-clear">
                        <div class="col-xs-12">
                            <div class="col-xs-offset-4 col-md-offset-3 col-xs-8 mysan_team_name">
                                <div class="fio">Наталья Силкова</div>
                            </div>
                        </div>
                    </div>
                    <div class="row  margin-clear worker-bg">
                        <div class="col-xs-4 padding-clear worker-img team_pp_img">
                            <img src="{{ asset('frontend/upload/manual/outteam/59df32788f622.png')}}" alt="">
                            <div class="red_text">Консультант</div>
                        </div>
                        <div class=" col-xs-offset-4 col-md-offset-3 col-xs-8">
                            <p><span style="font-size: 10pt;"><em>Подскажет, расскажет, объяснит, подберет и зарядит хорошим настроением в дорогу….Это всё про Наталью Силкову - нашего персонального консультанта и путеводителя по санаториям. Она внимательно выслушает, ответит на любые интересующие вопросы, поможет определиться с выбором или посоветует лучший санаторий, исходя из всех пожеланий и требований. С высоким профессионализмом она спланирует лечебно-оздоровительную поездку, организует программу досуга, подскажет приятные бонусы и&nbsp; расскажет, как меньше потратить и больше получить. Словом, наш персональный консультант сохранит Ваше время, деньги, подарит много ценной информации и хорошего настроения!&nbsp;</em></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row   margin-clear" style="margin-bottom:20px;">
                <div class="col-md-6" style="margin-bottom:20px;  padding: 0px 25px;">
                    <div class="row margin-clear">
                        <div class="col-xs-12">
                            <div class="col-xs-offset-4 col-md-offset-3 col-xs-8 mysan_team_name">
                                <div class="fio">Богдан Недашковский</div>
                            </div>
                        </div>
                    </div>
                    <div class="row  margin-clear worker-bg">
                        <div class="col-xs-4 padding-clear worker-img team_pp_img">
                            <img src="{{ asset('frontend/upload/manual/outteam/57ebe5ac7f787.jpg')}}" alt="">
                            <div class="red_text">Руководитель технического отдела</div>
                        </div>
                        <div class=" col-xs-offset-4 col-md-offset-3 col-xs-8">
                            <p><span style="font-size: 10pt;"><em>Богдан — главный программист в организации работы сайта Mysanatorium.com. Он отвечает за техническую реализацию проекта. За плечами у Богдана десятки сложных тематических онлайн-проектов. Его отличает пунктуальность, чувство долга и сдержанность, он старается постоянно совершенствовать свои профессиональные навыки.</em></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-bottom:20px;  padding: 0px 25px;">
                    <div class="row margin-clear">
                        <div class="col-xs-12">
                            <div class="col-xs-offset-4 col-md-offset-3 col-xs-8 mysan_team_name">
                                <div class="fio">Юлия Кравченко</div>
                            </div>
                        </div>
                    </div>
                    <div class="row  margin-clear worker-bg">
                        <div class="col-xs-4 padding-clear worker-img team_pp_img">
                            <img src="{{ asset('frontend/upload/manual/outteam/57ebe65757547.jpg')}}" alt="">
                            <div class="red_text">Персональный ассистент по выбору санатория</div>
                        </div>
                        <div class=" col-xs-offset-4 col-md-offset-3 col-xs-8">
                            <p><span style="font-size: 10pt;"><em>Юлия предоставляет полную информацию о том или ином санатории: как он выглядит, как будет проходить Ваше лечение. При помощи небольших видеороликов Вы сможете получить полезную информацию, которая поможет Вам с выбором санатория.&nbsp;</em></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row   margin-clear" style="margin-bottom:20px;">
                <div class="col-md-6" style="margin-bottom:20px;  padding: 0px 25px;">
                    <div class="row margin-clear">
                        <div class="col-xs-12">
                            <div class="col-xs-offset-4 col-md-offset-3 col-xs-8 mysan_team_name">
                                <div class="fio">Руслан Теймурфулатов</div>
                            </div>
                        </div>
                    </div>
                    <div class="row  margin-clear worker-bg">
                        <div class="col-xs-4 padding-clear worker-img team_pp_img">
                            <img src="{{ asset('frontend/upload/manual/outteam/57ebe61ed73fa.png')}}" alt="">
                            <div class="red_text">Видеооператор</div>
                        </div>
                        <div class=" col-xs-offset-4 col-md-offset-3 col-xs-8">
                            <p><span style="font-size: 10pt;"><em>Руслан&nbsp;— глаза нашей команды, наш любимый оператор и видеомонтажер. Он лично ездит в разные страны и снимает сюжеты о каждом санатории. От него ничего не скроешь, ведь это очень ответственное дело — снять сюжет и предоставить Вам возможность заранее посмотреть видео о расположении и обстановке в санатории. Он обожает свою работу и полностью отдается ей.</em></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-bottom:20px;  padding: 0px 25px;">
                    <div class="row margin-clear">
                        <div class="col-xs-12">
                            <div class="col-xs-offset-4 col-md-offset-3 col-xs-8 mysan_team_name">
                                <div class="fio">Матанат Кулиева </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  margin-clear worker-bg">
                        <div class="col-xs-4 padding-clear worker-img team_pp_img">
                            <img src="{{ asset('frontend/upload/manual/outteam/57ebe60cbf2cb.jpg')}}" alt="">
                            <div class="red_text">Главный курортолог </div>
                        </div>
                        <div class=" col-xs-offset-4 col-md-offset-3 col-xs-8">
                            <p><em><span style="font-size: 10pt;">Матанат поможет вам с выбором курорта и санатория, где будет проходить ваше лечение. Матанат является дипломированным медицинским работником. Последние 10 лет работала непосредственно в области курортологии. Она очень любит путешествовать, с чем и связан интерес к данной области, ведь курортология объединяет в себе медицину и туризм. Матанат считает, что главное в работе — это здоровый дух коллектива и повышенный интерес к своему делу.</span></em></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row   margin-clear" style="margin-bottom:20px;">
                <div class="col-md-6" style="margin-bottom:20px;  padding: 0px 25px;">
                    <div class="row margin-clear">
                        <div class="col-xs-12">
                            <div class="col-xs-offset-4 col-md-offset-3 col-xs-8 mysan_team_name">
                                <div class="fio">Андрей Савоник</div>
                            </div>
                        </div>
                    </div>
                    <div class="row  margin-clear worker-bg">
                        <div class="col-xs-4 padding-clear worker-img team_pp_img">
                            <img src="{{ asset('frontend/upload/manual/outteam/57ebe59587da1.jpg')}}" alt="">
                            <div class="red_text">Разработчик интерфейса</div>
                        </div>
                        <div class=" col-xs-offset-4 col-md-offset-3 col-xs-8">
                            <p><span style="font-size: 10pt;"><em>Андрей — один из главных&nbsp; организаторов сайта Mуsanatorium.cоm. Также он &nbsp;отвечает за разработку дизайна. Имея большой опыт в разработке сложнейших интернет-порталов, Андрей постоянно приобретает новые знания в области управления.</em></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-bottom:20px;  padding: 0px 25px;">
                    <div class="row margin-clear">
                        <div class="col-xs-12">
                            <div class="col-xs-offset-4 col-md-offset-3 col-xs-8 mysan_team_name">
                                <div class="fio">Дарья Черная</div>
                            </div>
                        </div>
                    </div>
                    <div class="row  margin-clear worker-bg">
                        <div class="col-xs-4 padding-clear worker-img team_pp_img">
                            <img src="{{ asset('frontend/upload/manual/outteam/57ebe5c0d4dff.png')}}" alt="">
                            <div class="red_text">Маркетинг-менеджер</div>
                        </div>
                        <div class=" col-xs-offset-4 col-md-offset-3 col-xs-8">
                            <p class="MsoNormal" style="margin-bottom: 7.5pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span style="font-size: 10pt;"><em>Дарья уже пять лет занимается маркетингом и продвижением в социальных сетях, и недавно она сказала нам (по секрету), что не собирается бросать любимое занятие. До знакомства с нами Дарья работала в нескольких рекламных агентствах, вела более 30 проектов — и это только за последний год! Когда Дарья пришла к нам в команду, не было сомнений, что мы вместе надолго. У Дарьи, как и у всей команды Mysanatorium, горят глаза, и она очень хочет быть полезной для Вас!</em></span></p>
                            <p><em>
                                    <!-- [if !supportAnnotations]-->
                                </em></p>
                            <div>&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row   margin-clear" style="margin-bottom:20px;">
                <div class="col-md-6" style="margin-bottom:20px;  padding: 0px 25px;">
                    <div class="row margin-clear">
                        <div class="col-xs-12">
                            <div class="col-xs-offset-4 col-md-offset-3 col-xs-8 mysan_team_name">
                                <div class="fio">Кира Литвинова </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  margin-clear worker-bg">
                        <div class="col-xs-4 padding-clear worker-img team_pp_img">
                            <img src="{{ asset('frontend/upload/manual/outteam/57f2358f784f8.png')}}" alt="">
                            <div class="red_text">SMM-менеджер</div>
                        </div>
                        <div class=" col-xs-offset-4 col-md-offset-3 col-xs-8">
                            <p><span style="font-size: 10pt;"><em>Кира — уникальный самостоятельный работник. Никто из команды не знает, как она все успевает — это просто волшебство! Кира является незаменимым сотрудником, она — супер-специалист в сфере SMM. Кира пишет при любых обстоятельствах, невзирая на погоду и время суток. Она освещает информацию, которая будет полезна Вам. Мы буквально носим на руках нашего мастера слова. По словам Киры, она с удовольствием переписала бы несколько романов, не убив при этом ни одного героя. Из нее получился бы неплохой писатель, но мы вовремя перехватили и направили ее пыл в нужное русло.</em></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection