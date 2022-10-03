@extends('frontend.layouts.app')
@section('content')
<section id="breadcrumbs ">
    <ul class="breadcrumb">
        <li><a href="/" data-original-title="" title="">Главная</a></li>
        <li class="active">Виза</li>
    </ul>
</section>

<section id="page-head" class="page-background" style="    height: 247px;background: url('/frontend/images/pomosh-s-vizoy.jpg');background-size:cover;background-position:center center;background-repeat:no-repeat;">
    <div class="container">
        <div class="col-md-12 text-center">
            <h1 class="text42 white-text"><b>Получить визу - это просто</b></h1>
        </div>
    </div>
</section>

<section id="page-heading" class="page-heading">
    <div class="container">
        <div class="col-md-12 padding-clear">
            <h2 class="darkblue text42">Вам необходимо открыть Шенгенскую визу?</h2>
        </div>
    </div>
</section>

<section id="page-body" class="text15">
    <div class="container">
        <p><span style="font-size: 18pt;"><strong>Для самостоятельного оформления шенгенской визы требуется:&nbsp;</strong></span></p>
        <p style="background-color: #27a3bf; color: white; padding: 10px; display: inline-block;"><strong><span style="font-size: 12pt;">Подтверждение бронирования, которое оформляется на бланке, предоставленном санаторием или спа-отелем (ваучер).</span></strong></p>
        <p>&nbsp;</p>
        <p>Для получения подтверждения Вам необходимо выслать письмо на наш электронный адрес visa@mysanatorium.com с указанием номера бронирования, данных загранпаспорта (фамилия, имя, дата рождения) или отсканировать первую страницу загранпаспорта и отправить нам. Далее на Ваш электронный адрес придет подтверждение оформления визы. Документ о подтверждении (ваучер) будет оформлен в течение 3 рабочих дней.</p>
        <p><span style="font-size: 16px;">Дорогие друзья! Ввиду того что для прохождения санаторно-курортного лечения в одном из европейских санаториев может потребоваться предварительное получение визы, в службу поддержки mysanatorium.com поступают обращения от клиентов с просьбой оказать им визовую помощь, вопросами о требуемых для оформления визы документах и сроках оформления визы. Поэтому мы сообщаем о том, какого рода визовую поддержку может оказать своим клиентам компания mysanatorium.com.</span></p>
        <p><span style="font-size: 16px;">Сразу отметим, что наша компания не занимается оформлением виз. Информацию о порядке оформления визы необходимо узнавать самостоятельно в визовом центре своего региона проживания. Визовая поддержка от компании mysanatorium.com состоит только в том, что мы помогаем получить ваучер, который понадобится для оформления шенгенской визы.&nbsp;</span></p>
        <p><span style="font-size: 16px;"><em><strong>Важно знать:</strong> подтверждение бронирования, которое приходит на электронную почту, не является официальным документом и не может быть представлено для получения визы.</em></span></p>
        <p><span style="font-size: 16px;">Предоставленные клиентом данные мы передаем в отель, после чего получаем ваучер, который затем пересылаем клиенту. Оформление ваучера занимает до 3 рабочих дней.&nbsp;</span></p>
        <p><span style="font-size: 16px;"><strong>Внимание:</strong> некоторые спа-отели и санатории требуют внести предоплату, о чем указывается в подтверждении бронирования. Сумма взымается с карты, указанной клиентом при бронировании, либо если банковская карта при бронировании не запрашивалась, отель предоставляет реквизиты для оплаты. Если в течение 3 рабочих дней клиент не получает от нас ваучер, рекомендуем позвонить по нашим бесплатным номерам или по скайпу.</span></p>
        <p><span style="font-size: 16px;">Весь процесс оформления визы занимает около 20 дней. После получения ваучера для визы необходимо записаться на прием в визовый центр. Мы рекомендуем начать готовиться к поездке хотя бы за месяц вперед. В случае отказа в визе можно воспользоваться действующим на сайте mysanatorium.com правилом бесплатной отмены брони, чтобы вернуть уплаченную в качестве предоплаты сумму. Срок бесплатной отмены всегда указан в подтверждении бронирования. Поэтому советуем при бронировании рассчитать всё так, чтобы в случае отказа в визе успеть бесплатно отменить бронь, иначе санаторий будет вправе отказать в возврате предоплаты.&nbsp;</span></p>
        <p><span style="font-size: 16px;">Mysanatorium.com желает Вам приятного отдыха и успешного выздоровления!</span></p>
        <p>&nbsp;</p>
    </div>
</section>

<div id="visit_bottom" >
    <div class="container-fluid" style="margin:40px 0px;    background-color: #e8edf0;">
        <div class="row" style="margin-bottom:15px;">
            <div class="col-md-12 text-center">
                <h2 class="text-uppercase main-color bold"><span>Как мы работаем</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 clear-padding text-center">
                <img style="width: 100%; max-width: 794px;" src="{{ asset('frontend/images/how_works.jpg')}}">
            </div>
        </div>
    </div>
   
</div>
@endsection