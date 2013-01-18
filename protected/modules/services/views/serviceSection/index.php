<?php
$baseUrl = Yii::app()->baseUrl;

$this->pageTitle='Услуги - Автопрофи';
?>

<div class="krohi">
    <a href="">Главная</a><span> » Услуги</span>
</div>
<div class="orange_line"></div>
<div class="uslugi_menu">
    <ul>

        <div class="uslugi">
            <a href="/page/?p=shinomontaj" class="one"><img src="/images/site/sidebar_li_1.png" alt="" /><li>Шиномонтаж</li></a>
            <div class="uslugi_text">"Переобуем" автомобиль, сделаем
                балансировку, заклеим прокол</div>
            <a href="/page/?p=shinomontaj"><div class="uslugi_price">Цена</div></a>
        </div>
        <div class="margin"></div>
        <div class="uslugi">
            <a href="/page/?p=diagnostika_avtomobilya" class="one"><img src="/images/site/sidebar_li_5.png" alt="" /><li>Диагностика</li></a>
            <div class="uslugi_text">"Переобуем" автомобиль, сделаем
                балансировку, заклеим прокол</div>
            <a href="/page/?p=diagnostika_avtomobilya"><div class="uslugi_price">Цена</div></a>
        </div>
        <div class="margin"></div>
        <div class="uslugi">
            <?php //todo перенести из Sections в Pages; ?>
            <a href="/page/?p=slesarnye_raboty"><img src="/images/site/sidebar_li_2.png" alt="" /><li>Слесарный ремонт</li></a>
            <div class="uslugi_text">"Переобуем" автомобиль, сделаем
                балансировку, заклеим прокол</div>
            <a href="/page/?p=slesarnye_raboty"><div class="uslugi_price">Цена</div></a>
        </div>


        <div class="uslugi">
            <a href="" class="one"><img src="/images/site/sidebar_li_4.png" alt="" /><li>Техосмотр</li></a>
            <div class="uslugi_text">"Переобуем" автомобиль, сделаем
                балансировку, заклеим прокол</div>
            <a href=""><div class="uslugi_price">Цена</div></a>
        </div>
        <div class="margin"></div>
        <div class="uslugi">
            <a href=""><img src="/images/site/sidebar_li_6.png" alt="" /><li>Нанесение винила</li></a>
            <div class="uslugi_text">"Переобуем" автомобиль, сделаем
                балансировку, заклеим прокол</div>
            <a href=""><div class="uslugi_price">Цена</div></a>
        </div>
        <div class="margin"></div>
        <div class="uslugi">
            <a href="/page/?p=tehnicheskoe_obsluzhivanie_avtomobilya"><img src="/images/site/sidebar_li_3.png" alt="" /><li>Техническое обслуживание</li></a>
            <div class="uslugi_text">"Переобуем" автомобиль, сделаем
                балансировку, заклеим прокол</div>
            <a href="/page/?p=tehnicheskoe_obsluzhivanie_avtomobilya"><div class="uslugi_price">Цена</div></a>
        </div>
        <div class="uslugi">
            <a href="/page/?p=kuzovnoy_remont"><img src="/images/site/sidebar_li_7.png" alt="" /><li>Кузовной ремонт</li></a>
            <div class="uslugi_text">"Переобуем" автомобиль, сделаем
                балансировку, заклеим прокол</div>
            <a href="/page/?p=kuzovnoy_remont"><div class="uslugi_price">Цена</div></a>
        </div>
        <div class="margin"></div>
        <div class="uslugi">
            <a href="" class="one"><img src="/images/site/sidebar_li_8.png" alt="" /><li>Хранение шин</li></a>
            <div class="uslugi_text">"Переобуем" автомобиль, сделаем
                балансировку, заклеим прокол</div>
            <a href=""><div class="uslugi_price">Цена</div></a>
        </div>


    </ul>
</div>


<div class="clear"></div>


<div class="block_services_page">
    <?foreach ($sections as $section): ?>
    <div class="button_services">
        <a href="<?=$this->createUrl('/content/page/view/')?>/?p=<?=$section->code?>"><span class="char_services_list"><img src="<?=$baseUrl?>/images/site/services_list_icon.gif" align="absmiddle" border="0"></span></a>
        <a href="<?=$this->createUrl('/content/page/view/')?>/?p=<?=$section->code?>"><?=$section->name?></a>
    </div>
    <?php endforeach ?>
</div>
<div class="block_page">
    <div class="way_page"><a href="/">Главная</a> » Услуги</div>	<h1>Наши услуги</h1>
    <div class="text_page">		<?=Setting::model()->getValue('service_list')?>
    </div>

    <?php $this->renderPartial('_list', array('sections' => $sections)); ?>
</div>