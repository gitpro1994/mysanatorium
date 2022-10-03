@extends('frontend.layouts.app')
@section('content')

<section id="breadcrumbs ">

    <ul class="breadcrumb ml-4">
        <li><a href="/">Главная</a></li>
        <li class="active">О компании</li>
    </ul>
</section>

@include('frontend.layouts.partials.navbar-third')

<section id="page-heading" class="page-heading">
    <div class="container">
        <div class="col-md-12 padding-clear">
            <h2 class="darkblue text42">Добро пожаловать в Mysanatorium.com!</h2>
        </div>
    </div>
</section>

<section id="page-body" class="text15">
    <div class="container">
        <p><span style="font-size: 12pt;"><strong><span class="red">Mysanatorium.com</span>&nbsp;</strong>—&nbsp;это одна из крупнейших международных интернет-платформ поиска санаториев и организации санаторно-курортного лечения во многих уголках мира. Мы даем пользователям возможность найти наиболее подходящий санаторий по интересующему профилю заболевания и получить санаторно-курортное лечение на известнейших мировых курортах. Мы работаем с лучшими санаториями и специалистами-бальнеологами в разных странах. Мы помогаем нашим пользователям организовать поездку на любой понравившийся им курорт с целью прохождения санаторно-курортного лечения.</span></p>
        <p style="margin: 0cm 0cm 7.5pt 0cm;">&nbsp;</p>
        <p><span style="font-size: 12pt;"><strong><span class="red">Mysanatorium.com</span></strong> –&nbsp;это сайт мгновенного бронирования с широким выбором санаториев и спа-отелей, отличающихся высокопрофессиональным лечением, новейшей медицинской базой и отличными условиями проживания.</span></p>
        <p>&nbsp;</p>
    </div>
</section>

<div class="container advantage not-property-advantage">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-lightblue" id="text_about_mysan"><span class="darkblue">ДЕВЯТЬ ПРЕИМУЩЕСТВ</span> MYSANATORİUM</h2>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <div><img src="{{ asset('frontend/images/icons/onas-1.png')}}" alt=""></div>
                <h5 class="darkblue bold-text"> ВЫГОДНО</h5>
                <div class="advantage-content">
                    <i onclick="show_advantage(this)" class="arrow fa fa-angle-down"></i>
                    <div class="advantage-content-box">
                        <p>Стоимость путевок на Mysanatorium ниже, чем на официальных сайтах санаториев. Мы зарабатываем только за счет комиссии, которую платят нам санатории, а мы делимся ею с вами, предоставляя скидки от 5% до 25%, чтобы вы бронировали путевки по выгодным ценам. Благодаря тому, что мы предоставляем санаториям большее число клиентов, они предлагают нам более выгодные тарифы.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div><img src="{{ asset('frontend/images/icons/onas-2.png')}}" alt=""></div>
                <h5 class="darkblue bold-text">КРУГЛОСУТОЧНАЯ ПЕРСОНАЛЬНАЯ ПОМОЩЬ</h5>
                <div class="advantage-content">
                    <i onclick="show_advantage(this)" class="arrow fa fa-angle-down"></i>
                    <div class="advantage-content-box">
                        <p>Главное для сотрудников Mysonatorium — ваше здоровье. Мы знаем, что оздоровительные процедуры могут вызвать волнение, поэтому, пожалуйста, обращайтесь к нам каждый раз, когда у вас возникает какой-либо вопрос. Мы с радостью вам поможем. Хотим отметить, что Mysanatorium предоставляет бесплатные консультации курортолога и помощь в выборе курортного города. Мы работаем 24 часа в сутки, 7 дней в неделю.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div><img src="{{ asset('frontend/images/icons/onas-3.png')}}" alt=""></div>
                <h5 class="darkblue bold-text">БЕСПЛАТНО ДЛЯ КЛИЕНТОВ</h5>
                <div class="advantage-content">
                    <i onclick="show_advantage(this)" class="arrow fa fa-angle-down"></i>
                    <div class="advantage-content-box">
                        <p>За использование Mysonatorium клиенты ничего не платят. Мы поддерживаем сайт за счет того, что взимаем с санаториев небольшую плату за каждого клиента, забронировавшего санаторий через Mysonatorium. В свою очередь санатории выразили согласие с тем, что публикуемые на нашем сервисе цены будут соответствовать ценам, предлагаемым клиентам через другие каналы.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <div><img src="{{ asset('frontend/images/icons/onas-4.png')}}" alt=""></div>
                <h5 class="darkblue bold-text">БРОНИРУЙТЕ СЕЙЧАС, ОПЛАЧИВАЙТЕ ПОТОМ</h5>
                <div class="advantage-content">
                    <i onclick="show_advantage(this)" class="arrow fa fa-angle-down"></i>
                    <div class="advantage-content-box">
                        <p>При бронировании большинства санаториев предоплата не взимается. Вы платите непосредственно при заселении в выбранный санаторий.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div><img src="{{ asset('frontend/images/icons/onas-5.png')}}" alt=""></div>
                <h5 class="darkblue bold-text">УДОБНЫЙ ПОИСК</h5>
                <div class="advantage-content">
                    <i onclick="show_advantage(this)" class="arrow fa fa-angle-down"></i>
                    <div class="advantage-content-box">
                        <p>Поиск на Mysonatorium работает так, чтобы вам было максимально просто найти необходимый санаторий. Санатории можно просматривать по процедурам и странам, фильтровать их по типу учреждения, цене или рейтингу, а также сохранять их в папке «Избранное» для последующего просмотра.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div><img src="{{ asset('frontend/images/icons/onas-6.png')}}" alt=""></div>
                <h5 class="darkblue bold-text">МГНОВЕННОЕ БРОНИРОВАНИЕ</h5>
                <div class="advantage-content">
                    <i onclick="show_advantage(this)" class="arrow fa fa-angle-down"></i>
                    <div class="advantage-content-box">
                        <p>Все бронирования в нашей системе делаются в реальном времени и подтверждаются моментально — никакого дополнительного ожидания, обмена письмами и беспокойства.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <div><img src="{{ asset('frontend/images/icons/onas-7.png')}}" alt=""></div>
                <h5 class="darkblue bold-text">ЛЕГКИЙ ВЫБОР САНАТОРИЕВ/ И СПА-ОТЕЛЕЙ</h5>
                <div class="advantage-content">
                    <i onclick="show_advantage(this)" class="arrow fa fa-angle-down"></i>
                    <div class="advantage-content-box">
                        <p>Мы предоставляем подробное описание санаториев, персонала и процедур, а также подобранные к ним фото- и видеоматериалы, чтобы вам было легко сравнить варианты и принять оптимальное решение по поводу своего лечения.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div><img src="{{ asset('frontend/images/icons/onas-8.png')}}" alt=""></div>
                <h5 class="darkblue bold-text">ДОСТОВЕРНО</h5>
                <div class="advantage-content">
                    <i onclick="show_advantage(this)" class="arrow fa fa-angle-down"></i>
                    <div class="advantage-content-box">
                        <p>Мы понимаем, что бывает трудно выбрать санаторий, не находясь на месте лично. По этой причине мы придаем особое значение изображениям и видеоматериалам высокого качества, подробной информации об услугах, а также отзывам предыдущих клиентов. Все санатории проходят тщательную проверку операторами нашего сайта. Наши сотрудники лично обходят все санатории и спа-отели, принимают непосредственное участие во всех видео- и фотосъемках, убеждаясь в полной ее достоверности, и только после всех проверок мы публикуем информацию на нашем сайте. Также обязательной верификации подлежат и те фотографии, которые предоставляют нам санатории.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div><img src="{{ asset('frontend/images/icons/onas-9.png')}}" alt=""></div>
                <h5 class="darkblue bold-text">МЫ СЛУШАЕМ ВАС</h5>
                <div class="advantage-content">
                    <i onclick="show_advantage(this)" class="arrow fa fa-angle-down"></i>
                    <div class="advantage-content-box">
                        <p>Мы прислушиваемся к пожеланиям наших клиентов и расширяем свои услуги для удовлетворения ваших потребностей.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection