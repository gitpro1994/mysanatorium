@extends('frontend.layouts.app')
@section('content')

<section id="breadcrumbs ">
    <ul class="breadcrumb ml-4">
        <li><a href="/">Главная</a></li>
        <li class="active">Договор</li>
    </ul>
</section>

@include('frontend.layouts.partials.navbar-third')

<section id="page-heading" class="page-heading">
    <div class="container">
        <div class="col-md-12 padding-clear">
            <h2 class="darkblue text42">Условия предоставления услуг</h2>
        </div>
    </div>
</section>

<section id="page-body" class="text15">
    <div class="container"><img id="treaty-image" src="{{asset('frontend/images/dogovor.jpg')}}">
        <p>Добро пожаловать на сайт Mysanatorium.com, и спасибо за то, что пользуетесь нашими услугами!</p>
        <p>Пожалуйста, прочтите эти условия предоставления услуг внимательно, поскольку они содержат важную информацию о ваших юридических правах, средствах защиты и ваших обязанностях. Посещая, просматривая или используя наш веб-сайт и/или совершая бронирование, вы признаете, что прочитали, поняли и согласились с нижеописанными правилами и условиями.</p>
        <p>При совершении бронирования через сайт Mysanatorium.com, вы вступаете в прямые договорные отношения с объектом размещения — санаторием/спа-отелем, в котором вы бронируете путевку. С момента совершения Вами бронирования на сайте www.mysanatorium.com , компания Mysanatorium.com действует исключительно как посредник между вами и объектом размещения, передавая детали вашего заказа в санаторий/спа-отель, и отправляя вам электронное подтверждение бронирования от имени объекта бронирования.</p>
        <p>При оказании наших услуг предлагаемая информация основана на сведениях, предоставленных нам объектами размещения. Они имеют доступ к сети Экстранет и несут полную ответственность за обновление информации о ценах, о наличии путевок и других данных, отражаемых на нашем веб-сайте. Каждый объект размещения всегда несет ответственность за точность, полноту и правильность информации, отображаемой на нашем веб-сайте.</p>
    </div>
    <div style="background-color: #fff;">
        <div class="container">
            <h4 style="color: #fe3c21;">• Оформление и отмена бронирования</h4>
            <p>Пользователь подтверждает достоверность вводимых им своих личных данных при работе на сайте компании, а также данных третьих лиц, для которых пользователь осуществляет бронирование и принимает на себя всю ответственность за их точность, полноту и достоверность.</p>
            <p>Сразу же после оформления бронирования пользователю направляется на электронный адрес подтверждение, содержащее статус бронирования.</p>
            <p>Пожалуйста, имейте в виду, что в случае отмены бронирования санаторий/спа-отель имеет право (если это предусмотрено правилами санатория/спа-отеля) взимать штрафы, и вы не можете быть вправе претендовать на возврат оплаченной суммы. С правилами взимания штрафа можно ознакомиться после того, как вы выберете даты пребывания в санатории/спа-отеле. Там вы увидите перечень свободных путевок и ссылку на условия аннулирования. Информация о размерах штрафов также продублирована на странице последнего шага бронирования и здесь.</p>
            <p>Если вам необходимо отменить бронирование, используйте ссылку в своем электронном подтверждении. При этом компания не гарантирует такую же цену, наличие мест в санатории/спа-отеле, тип номера для проживания и иные условия отмененного бронирования.</p>
            <p>В случае отмены пользователем оплаченного бронирования, стоимость отмененного бронирования (если отмена предусмотрена правилами санатория/спа-отеля), за вычетом фактических расходов компании, перечисляется пользователю на счет, с которого была произведена оплата бронирования.</p>
            <p>Денежные средства возвращаются в течение 20 (двадцати) рабочих дней с даты получения уведомления от пользователя об аннулировании бронирования. Время между операцией возврата и реальным зачислением денег на счет клиента зависит от внутренних банковских процедур.</p>
        </div>
    </div>
    <div class="container">
        <h4 style="color: #fe3c21;">• Цены на сайте www.mysanatorium.com</h4>
        <p>При бронировании путевки с лечением, итоговая цена на сайте mysanatorium.com указана за номер на весь период проживания с курсом санаторно-курортного лечения, осмотрами врача, питанием, а также НДС.</p>
    </div>
    <div style="background-color: #fff;">
        <div class="container">
            <h4 style="color: #fe3c21;">• Стоимость бронирования</h4>
            <p>Мы предоставляем свои услуги совершенно бесплатно, так как в отличие от многих других компаний, мы не взимаем плату за нашу работу (вы платите напрямую санаторию/спа-отелю).</p>
        </div>
    </div>
    <div class="container">
        <h4 style="color: #fe3c21;">• Цены на нашем сайте очень конкурентоспособные.</h4>
        <p>Мы хотим, чтобы вы платили максимально низкую цену при бронировании в санатории или спа-отеле. Если после совершения бронирования на нашем сайте вы найдете на других веб-ресурсах аналогичное предложение с идентичными условиями бронирования по более низкой цене, мы готовы предложить вам такую же цену (при обязательном указании вами веб-ресурса с ценой ниже, чем у нас).</p>
    </div>
    <div style="background-color: #fff;">
        <div class="container">
            <h4 style="color: #fe3c21;">• Дальнейшая корреспонденция</h4>
            <p>Завершая бронирование, вы соглашаетесь на получение электронного письма, которое мы можем послать вам непосредственно перед датой прибытия с информацией о соответствующем направлении с определенными данными и специальными предложениями, относящимися к вашему бронированию и направлению, а также электронного письма, которое мы можем послать вам сразу после вашего пребывания в санатории или спа-отеле с предложением заполнить форму отзыва о санатории/спа-отеле.</p>
        </div>
    </div>
    <div class="container">
        <h4 style="color: #fe3c21;">• Рейтинг и отзывы пользователей</h4>
        <p>По умолчанию в рейтинге объектов размещения на нашем сайте указано «Рекомендованные» (может использоваться любая похожая формулировка) — («Рейтинг по умолчанию»).</p>
        <p>Заполненный отзыв может быть размещен на соответствующей странице санатория/спа-отеля нашего сайта с единственной целью — сообщить будущим клиентам ваше мнение об уровне услуг и качестве санатория/спа-отеля. Также ваш отзыв может использоваться компанией Mysanatorium.com по ее собственному усмотрению (например, в маркетинговых и рекламных целях или для улучшения предоставляемых компанией услуг) на ее веб-сайте или в других похожих социальных медиа-платформах, рассылках новостей, в специальных рекламных акциях, приложениях или при использовании любых других продуктов, принадлежащих Mysanatorium.com. Компания оставляет за собой право изменять, отклонять или изымать отзывы по собственному усмотрению. Формы для оставления отзывов гостей рассылаются только с целью проведения опроса и не содержат никаких дальнейших коммерческих предложений, приглашений или поощрений.</p>
    </div>
    <div style="background-color: #fff;">
        <div class="container">
            <h4 style="color: #fe3c21;">• Ограничение ответственности</h4>
            <p>Mysanatorium.com не несет ответственности за возможные неточности и ошибки в описании санаториев/спа-отелей и их цен на сайте, либо возникающие у пользователя при использовании системы.</p>
            <p>Mysanatorium.com несет ответственность только за прямой ущерб, причиненный или вызванный невыполнением наших обязательств при предоставлении услуг, но только в пределах совокупной стоимости вашего бронирования, которая указана в подтверждении бронирования.</p>
        </div>
    </div>
    <div class="container">
        <h4 style="color: #fe3c21;">• Интеллектуальная собственность</h4>
        <p>Любая информация, графические изображения и файлы мультимедиа, содержащиеся на сайте, являются собственностью компании и/или ее партнеров.</p>
        <p>Все исключительные права на всё программное обеспечение, используемое на сайте, принадлежат компании и/или ее партнерам.</p>
        <p>Любые материалы, расположенные на сайте, не должны изменяться каким-либо способом и использоваться отдельно от сопровождающего их текста, графического изображения или файлов мультимедиа.</p>
        <p>Любое использование материалов с сайта возможно только с письменного разрешения компании с обязательной последующей ссылкой на источник публикации, либо с ссылкой на сайт для публикации в сети Интернет.</p>
        <p>Компания и ее партнеры предоставляют пользователю возможность использовать сайт и информацию, предоставленную на сайте, только для личного некоммерческого использования.</p>
        <p>Пользователь обязуется не использовать никакого программного обеспечения, посредством которого может быть нанесен какой-либо вред сайту.</p>
    </div>
    <div style="background-color: #fff;">
        <div class="container">
            <h4 style="color: #fe3c21;">• О компании&nbsp;</h4>
            <p>Сайт Mysanatorium.com является частной компанией с ограниченной ответственностью. Услуги по онлайн-бронированию санаториев и спа-отелей предоставляются в соответствии с действующим законодательством Республики Грузия. Юридический адрес: Грузия, район Адижни, поселок Унца, «Вагеби»</p>
            <p>Компания действует на основании идентификационного номера, выданного Агентством Гражданского Реестра под номерами 422722389 и 306291615.</p>
        </div>
    </div>
</section>

@endsection