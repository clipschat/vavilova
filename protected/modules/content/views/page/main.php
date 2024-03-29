
<?php
$title = MetaTag::getTag($page, 'title')->static_value;
$keywords = MetaTag::getTag($page, 'keywords')->static_value;
$description = MetaTag::getTag($page, 'description')->static_value;
$ya = MetaTag::getTag($page, 'yandex-verification')->static_value;

$cs = Yii::app()->getClientScript();
if (!empty($description)) {
    $cs->registerMetaTag($description, 'description');
}
if (!empty($keywords)) {
    $cs->registerMetaTag($keywords, 'keywords');
}
if (!empty($ya)) {
    $cs->registerMetaTag($ya, 'yandex-verification');
}
$this->pageTitle = empty($title) ? $page->title . ' - Автопрофи' : $title;
?>

<div class="banner">
    <div id="wrapper">
        <div id="container">
            <div class="sliderbutton" id="slideleft" onclick="slideshow.move(-1)"></div>
            <div id="slider">
                <ul>
                    <li><img src="/images/site/banner_img.jpg" alt="Image One"/></li>
                    <li><img src="/images/site/banner_img1.jpg" alt="Image Two"/></li>
                    <li><img src="/images/site/banner_img.jpg" alt="Image Three"/></li>
                    <li><img src="/images/site/banner_img1.jpg" alt="Image Four"/></li>
                </ul>
            </div>
            <div class="sliderbutton" id="slideright" onclick="slideshow.move(1)"></div>
            <ul id="pagination" class="pagination">
                <li onclick="slideshow.pos(0)"></li>
                <li onclick="slideshow.pos(1)"></li>
                <li onclick="slideshow.pos(2)"></li>
                <li onclick="slideshow.pos(3)"></li>
            </ul>
        </div>
    </div>
</div>


<div class="content_top"></div>

<div class="content_center">

<div class="sidebar_menu">
    <div class="sidebar_menu_one">
        <a href="/page/?p=shinomontaj">
            <img src="/images/site/sidebar_li_1.png" alt=""/><div class="sidebar_menu_text">Шиномонтаж</div>
        </a>
    </div>
    <div class="clear"></div>
    <div class="sidebar_menu_one">
        <a href="/page/?p=slesarnye_raboty">
            <img src="/images/site/sidebar_li_2.png" alt=""/><div class="sidebar_menu_text_2">Слесарный ремонт</div>
        </a>
    </div>
    <div class="clear"></div>
    <div class="sidebar_menu_one">
        <a href="/page/?p=tehnicheskoe_obsluzhivanie_avtomobilya">
            <img src="/images/site/sidebar_li_3.png" alt=""/><div class="sidebar_menu_text_2">Техническое обслуживание</div>
        </a>
    </div>
    <div class="clear"></div>
    <div class="sidebar_menu_one">
        <a href="">
            <img src="/images/site/sidebar_li_4.png" alt=""/><div class="sidebar_menu_text">Техосмотр</div>
        </a>
    </div>
    <div class="clear"></div>
    <div class="sidebar_menu_one">
        <a href="/page/?p=diagnostika_avtomobilya">
            <img src="/images/site/sidebar_li_5.png" alt=""/><div class="sidebar_menu_text">Диагностика</div>
        </a>
    </div>
    <div class="clear"></div>
    <div class="sidebar_menu_one">
        <a href="">
            <img src="/images/site/sidebar_li_6.png" alt=""/><div class="sidebar_menu_text_2">Нанесение винила</div>
        </a>
    </div>
    <div class="clear"></div>
    <div class="sidebar_menu_one">
        <a href="/page/?p=kuzovnoy_remont">
            <img src="/images/site/sidebar_li_7.png" alt=""/><div class="sidebar_menu_text_2">Кузовной ремонт</div>
        </a>
    </div>
</div>

<div class="plus">
    <div class="plus_title">ПРЕИМУЩЕСТВА</div>
    <div class="ul">
        <div class="li">
            <div class="plus_marker">1</div>
            <div class="plus_li_title">Удобная приемка автомобилей</div>
            <div class="plus_li_text">Вам достаточно рассказать приемщику о неисправности и отдать ему ключи –
                все остальное он сделает сам.
            </div>
        </div>

        <div class="li">
            <div class="plus_marker">2</div>
            <div class="plus_li_title">Возможность присутствовать при ремонте</div>
            <div class="plus_li_text">Вы всегда сможете проследить ход ремонта Вашего автомобиля и получить
                консультацию профессионала при ремонте.
            </div>
        </div>

        <div class="li">
            <div class="plus_marker">3</div>
            <div class="plus_li_title">Качественное оборудование</div>
            <div class="plus_li_text"><a href="">Hunter,</a> <a href="">Nussbaum, </a><a href="">Car-o-liner, </a><a
                    href="">Saiko, </a><a href="">Sivik, </a><a href="">Launch, </a><a href="">Metron</a> – только
                качественное оборудование позволяет осуществлять качественный ремонт.
            </div>
        </div>

        <div class="li">
            <div class="plus_marker">4</div>
            <div class="plus_li_title">Сложившийся коллектив профессионалов</div>
            <div class="plus_li_text">Коллектив нашего техцентра сложился более 5 лет назад. Это проверенные
                люди, отвечающие за качество выполненных работ.
            </div>
        </div>

        <div class="li">
            <div class="plus_marker">5</div>
            <div class="plus_li_title">Большая площадь</div>
            <div class="plus_li_text">Большое количество постов ремонта и обширная площадь позволяют нам
                принимать автомобили в qремонт практически в момент обращения.
            </div>
        </div>

    </div>
</div>
<div class="clear"></div>


<div class="grey_text_first">
    <span class="red_l">В</span>семи известная немецкая марка
    Merсedes уже давно стала классикой и эталоном того, какой должна быть настоящая машина. Презентабельность,
    надежность, комфорт – все это органично сочетается в автомобилях Мерседес.
</div>

<div class="grey_text">
    <span class="red_l">П</span>ожалуй, нет такого автолюбителя, который бы не восхищался этим совершенством
    автомобильной техники.
    Однако, как и любая другая техника, автомобили Мерседес имеют свойство ломаться.
</div>

<div class="grey_text">
    <span class="red_l">Н</span>о просто ремонта для автомобилей Мерседес мало. Ремонт Мерседес должен соответствовать
    тем высоким стандартам качества, который предъявляет компания Merсedes Benz ко всем своим автомобилям в мире.
</div>

<div class="clear"></div>


<div class="we_work">С КЕМ МЫ РАБОТАЕМ</div>


<div class="slider-wrap">
    <div id="slider1" class="csw">
        <div class="panelContainer">
            <div class="panel">
                <div class="wrapper">
                    <img src="/images/site/slider_img_1.jpg" width="54" height="54" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_2.jpg" width="61" height="48" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_3.jpg" width="62" height="51" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_4.jpg" width="60" height="54" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_5.jpg" width="85" height="58" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_6.jpg" width="65" height="64" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_7.jpg" width="72" height="68" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_8.jpg" width="66" height="65" alt=""/>
                </div>
            </div>

            <div class="panel">
                <div class="wrapper">
                    <img src="/images/site/slider_img_1.jpg" width="54" height="54" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_2.jpg" width="61" height="48" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_3.jpg" width="62" height="51" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_4.jpg" width="60" height="54" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_5.jpg" width="85" height="58" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_6.jpg" width="65" height="64" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_7.jpg" width="72" height="68" alt=""/>
                </div>
                <div class="wrapper">
                    <img src="/images/site/slider_img_8.jpg" width="66" height="65" alt=""/>
                </div>
            </div>


        </div>
    </div>
</div>


<div class="clear"></div>


<div class="index_news">
    <div class="index_news_title">НОВОСТИ</div>
    <div class="index_news_all"><a href="/site/allnews">Все новости</a></div>
    <img src="/images/site/index_news_line.png" alt=""/>

    <?php  foreach ($news as $new): ?>
    <div class="date_orange"><?= date('d.m.Y', strtotime($new->date)); ?></div>
    <a href="/site/news/?n=<?=urlencode($new->code)?>" class="news_a">
        <?=$new->title?>
    </a>
    <?php endforeach ?>
</div>

<div class="index_state">
    <div class="index_news_title articleIE">СТАТЬИ</div>

    <img src="/images/site/index_state_line.png" alt=""/>

    <div class="clear"></div>
    <ul class="state">
        <?php  foreach ($usefulArticles as $usefulArticle): ?>
        <li><a class="state_a" href="/soveti_avtolubiteljam/<?=urlencode($usefulArticle->url_code)?>"><?=$usefulArticle->title?></a></li>
        <?php endforeach ?>
    </ul>
</div>

<div class="index_state">
    <div class="red_pop_all"><a href="/soveti_avtolubiteljam/">Все статьи</a></div>
    <img src="/images/site/index_state_line2.png" alt=""/>

    <ul class="state">
        <?php  foreach ($usefulArticles2 as $usefulArticle2): ?>
        <li><a class="state_a" href="/soveti_avtolubiteljam/<?=urlencode($usefulArticle2->url_code)?>"><?=$usefulArticle2->title?></a></li>
        <?php endforeach ?>
    </ul>
</div>

<div class="clear"></div>

<div class="beline_line"></div>


<div class="remont">
    <img src="/images/site/remont_img1.jpg" alt=""/>

    <!--h1>Интересует ремонт автомобиля?</h1>

    <p>Сегодня очень актуален вопрос увеличения срока работы масла. Самыми неподходящими для этого условиями являются
        условия <a href="">дорожного цикла</a>. В то время, когда автомобиль регулярно останавливается и начинает
        движения опять на всю систему приходиться </p>

    <div class="clear"></div>
    <img src="/images/site/remont_img2.jpg" alt=""/>

    <p class="border_none">
        В то время, когда автомобиль регулярно останавливается и начинает движения опять на всю систему приходиться
        максимальная нагрузка, масло, в том числе, портится значительно быстрее. Негативно влияет на срок работы масла и
        редкая эксплуатация авто с его долгими простоями в гараже. Если запустить ситуации с маслом, то в случае проблем
        может потребоваться восстановление автомобиля после ДТП.
    </p>

    <p class="border_orange">
        Вы можете значительно дольше ездить на одном и том же масле, если не будете давать авто сильные нагрузки, будете
        использовать качественные масла. Но и тут необходимо быть крайне осторожным и всегда чувствовать меру. Ведь езда
        на некачественном масле может вылиться в серьезные поломки и тогда вы не только не сэкономите, но и переплатите
        вдвойне, как в случае со скупым из известной поговорки.
    </p>

    <div class="clear"></div>
    <p>
        В то время, когда автомобиль регулярно останавливается и начинает движения опять на всю систему приходиться
        максимальная нагрузка, масло, в том числе, портится значительно быстрее. Негативно влияет на срок работы масла и
        редкая эксплуатация авто с его долгими простоями в гараже. Если запустить ситуации с маслом, то в случае проблем
        может потребоваться восстановление автомобиля после ДТП.
    </p>

    <h2>Мы вам поможем</h2>

    <p>
        Техцентр «Автопрофи» с 2004 года производит ремонт Merсedes Benz любых моделей. Ремонт Мерседес предоставляемый
        нашим техническим центром соответствует всем требованиям компании производителя. Семилетний опыт работы на
        московском рынке, позволяет нам производить ремонт Merсedes Benz любой сложности.
    </p>

    <p class="ul_title">
        Основные виды работ, которые выполняет наш технический центр и которые наиболее востребованы при ремонте
        Мерседес следующие:
    <ul class="ul_remont">

        <li><a href="">ремонт электрического оборудования;</a></li>
        <li><a href="">ремонт автоматической коробки передач;</a></li>
        <li><a href="">ремонт тормозной системы;</a></li>
        <li><a href="">ремонт трансмиссии;</a></li>
        <li><a href="">ремонт климатического оборудования.</a></li>
    </ul-->
    <h1><?=$page->title?></h1>
    <?=$page->text?>

    <?php
    $this->widget(
        'FileList',
        array(
            'model' => $page,
            'tag' => 'files',
        )
    );
    ?>

    <img class="wheel" src="/images/site/wheel.jpg" alt=""/>

    <div class="wheel_text">
        Позвоните нам, чтобы узнать поподробнее об этой услуги по телефону <b>+7 495 225-90-30</b>
    </div>


</div>

<div class="clear"></div>
</div>

<div class="content_bottom"></div>



<script type="text/javascript">
    var slideshow = new TINY.slider.slide('slideshow', {
        id:'slider',
        auto:3,
        resume:false,
        vertical:false,
        navid:'pagination',
        activeclass:'current',
        position:0,
        rewind:false,
        elastic:false,
        left:'slideleft',
        right:'slideright'
    });
</script>