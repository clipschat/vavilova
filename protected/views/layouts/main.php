<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <meta name="robots" content="all">
    <?php
    $baseUrl = Yii::app()->request->baseUrl;
    $cs = Yii::app()->clientScript;
    $cs->registerCssFile($baseUrl . '/avto/style.css');
    $cs->registerCssFile($baseUrl . '/avto/js/mini-slider.css');
    $cs->registerCssFile($baseUrl . '/avto/js/tinyslider.css');
    $cs->registerCssFile($baseUrl . '/avto/js/coin-slider-styles.css');
    $cs->registerCoreScript('jquery');
    ?>
    <?= "<!-- $baseUrl -->" ?>
    <LINK type=text/css charset=utf-8 rel=stylesheet>


    <script type="text/javascript" src="/avto/js/tinyslider.js"></script>

    <script src="/avto/js/jquery-easing.1.2.pack.js" type="text/javascript"></script>
    <script src="/avto/js/jquery-easing-compatibility.1.2.pack.js" type="text/javascript"></script>
    <script src="/avto/js/coda-slider.1.1.1.pack.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(window).bind("load", function () {
            jQuery("div#slider1").codaSlider()

        });
    </script>

    <!--[if IE]>
    <script type="text/javascript" src="/avto/Font/cufon-yui.js"></script>
    <script src="/avto/Font/PFD_500-PFD_500.font.js" type="text/javascript"></script>
    <script type="text/javascript">
        Cufon.set("fontSize", "14px");
        Cufon.replace('.logo', { fontFamily:'PFD' });
        Cufon.set("fontSize", "20px");
        Cufon.set("letterSpacing", "-1px");
        Cufon.replace('.menu_inner ul li a', { fontFamily:'PFD' });
        Cufon.set("fontSize", "30px");
        Cufon.replace('.plus_title', { fontFamily:'PFD' });
        Cufon.set("fontSize", "24px");
        Cufon.replace('.index_news_title', { fontFamily:'PFD' });
        Cufon.set("fontSize", "20px");
        Cufon.replace('.we_work', { fontFamily:'PFD' });
    </script>
    <![endif]-->

    <!--[if IE 8]>
    <link rel="stylesheet" href="/avto/ie/ie8.css" type="text/css"/>
    <![endif]-->
    <!--[if IE 9]>
    <link rel="stylesheet" href="/avto/ie/ie9.css" type="text/css"/>
    <![endif]-->


    <!-- Google Analytic -->
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-23692780-1']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>
    <!-- Google Analytic -->

</head>
<body>

<div class="header_bg">
    <div class="header">
        <div class="header_inner">
            <div class="logo">
                <a href=""><img src="img/logo.png" alt=""/></a><br/>
                <span><?=Setting::model()->getValue('toptext')?></span>
            </div>

            <?php //todo Слоган echo Setting::model()->getValue('slogan'); ?>

            <a href="">
                <div class="phone">
                    Заказать
                    обратный звонок
                </div>
            </a>

            <div class="tel">
                <div class="phone-us">ПОЗВОНИТЕ НАМ:</div>
                <div class="number"><?=Setting::model()->getValue('phone')?></div>
                <div class="time"><?=Setting::model()->getValue('worktime'); //todo Не влазит, нужно в админке редактировать ?></div>
            </div>

        </div>
    </div>
</div>
<div class="clear"></div>

<?php $this->widget('TopMenu'); ?>

<div class="main_block_header_bg">
    <div class="main_block_header">
        <a href="/site/page/?p=price" class="yellowlink"><span class="icon_price">
            <span></span><img src="<?=$baseUrl?>/images/site/arrow_yeloow.gif" align="absmiddle" border="0"></span>
            Прайс-лист на все виды работ
        </a>
        <a href="/thanks" class="yellowlink"><span class="icon_price">
            <span></span><img src="<?=$baseUrl?>/images/site/arrow_yeloow.gif" align="absmiddle" border="0"></span>
            Отзывы о техцентре "Автопрофи"
        </a>
    </div>
    <div class="main_block_header" align="right">

    </div>
    <div class="clear"></div>
</div>
<div class="main_block">
    <?= $content ?>
    <div id="share_block">
        <?= Setting::model()->getValue('share_block_code')?>
    </div>
</div>
<div class="clear"></div>
<div id="footer">
    <div class="text_footer1">
        © 2004 &ndash; <?= date('Y'); ?> «Автопрофи»<br>
        OAO «Таксомоторный парк-12»<br>
        <a href="/site/sitemap/">Карта сайта</a>
    </div>
    <div class="text_footer2">
        Телефон: 8 (495) 225-90-30<br>
        <?=Setting::model()->getValue('real_address')?><br>
        <a href="/site/page/?p=kontakty">Схема проезда</a>
    </div>
    <div class="text_footer3">
    </div>
    <div class="text_copyright" align="right">
        Сделано в ООО "Арт Проект"<br>
        <a href="http://www.kupitsite.ru" target="_blank">Разработка автоматизированных систем управления</div>
</div>
<div class="clear"></div>
</div>
</body>
</html>

