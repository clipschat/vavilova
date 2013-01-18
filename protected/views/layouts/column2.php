<?php $this->beginContent('//layouts/main'); ?>

<div class="content_top"></div>

<div class="content_center">

    <div class="sidebar_menu">
        <?php $url = Yii::app()->request->getRequestUri(); ?>
        <div class="sidebar_menu_one<?php echo $url=='/page/?p=shinomontaj' ? ' active' : ''; ?>">
            <a href="/page/?p=shinomontaj">
                <img src="/images/site/sidebar_li_1.png" alt=""/><div class="sidebar_menu_text">Шиномонтаж</div>
            </a>
        </div>
        <div class="clear"></div>
        <div class="sidebar_menu_one<?php echo $url=='/page/?p=slesarnye_raboty' ? ' active' : ''; ?>">
            <a href="/page/?p=slesarnye_raboty">
                <img src="/images/site/sidebar_li_2.png" alt=""/><div class="sidebar_menu_text_2">Слесарный ремонт</div>
            </a>
        </div>
        <div class="clear"></div>
        <div class="sidebar_menu_one<?php echo $url=='/page/?p=tehnicheskoe_obsluzhivanie_avtomobilya' ? ' active' : ''; ?>">
            <a href="/page/?p=tehnicheskoe_obsluzhivanie_avtomobilya">
                <img src="/images/site/sidebar_li_3.png" alt=""/><div class="sidebar_menu_text_2">Техническое обслуживание</div>
            </a>
        </div>
        <div class="clear"></div>
        <div class="sidebar_menu_one<?php echo $url=='/page/?p=tehosmotr' ? ' active' : ''; ?>">
            <a href="">
                <img src="/images/site/sidebar_li_4.png" alt=""/><div class="sidebar_menu_text">Техосмотр</div>
            </a>
        </div>
        <div class="clear"></div>
        <div class="sidebar_menu_one<?php echo $url=='/page/?p=diagnostika_avtomobilya' ? ' active' : ''; ?>">
            <a href="/page/?p=diagnostika_avtomobilya">
                <img src="/images/site/sidebar_li_5.png" alt=""/><div class="sidebar_menu_text">Диагностика</div>
            </a>
        </div>
        <div class="clear"></div>
        <div class="sidebar_menu_one<?php echo $url=='/page/?p=vinil' ? ' active' : ''; ?>">
            <a href="">
                <img src="/images/site/sidebar_li_6.png" alt=""/><div class="sidebar_menu_text_2">Нанесение винила</div>
            </a>
        </div>
        <div class="clear"></div>
        <div class="sidebar_menu_one<?php echo $url=='/page/?p=kuzovnoy_remont' ? ' active' : ''; ?>">
            <a href="/page/?p=kuzovnoy_remont">
                <img src="/images/site/sidebar_li_7.png" alt=""/><div class="sidebar_menu_text_2">Кузовной ремонт</div>
            </a>
        </div>
    </div>
    <div class="content_about news">
    <?= $content ?>
    </div>


    <div class="clear"></div>

    <div class="we_work">С КЕМ МЫ РАБОТАЕМ</div>

    <div class="slider-wrap">
        <div id="slider1" class="csw">
            <div class="panelContainer">
                <div class="panel" >
                    <div class="wrapper">
                        <img src="/images/site/slider_img_1.jpg" width="54" height="54" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_2.jpg" width="61" height="48" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_3.jpg" width="62" height="51" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_4.jpg" width="60" height="54" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_5.jpg" width="85" height="58" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_6.jpg" width="65" height="64" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_7.jpg" width="72" height="68" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_8.jpg" width="66" height="65" alt="" />
                    </div>
                </div>
                <div class="panel" >
                    <div class="wrapper">
                        <img src="/images/site/slider_img_1.jpg" width="54" height="54" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_2.jpg" width="61" height="48" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_3.jpg" width="62" height="51" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_4.jpg" width="60" height="54" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_5.jpg" width="85" height="58" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_6.jpg" width="65" height="64" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_7.jpg" width="72" height="68" alt="" />
                    </div>
                    <div class="wrapper">
                        <img src="/images/site/slider_img_8.jpg" width="66" height="65" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<div class="content_bottom"></div>


</div>
</div>
<?php $this->endContent(); ?>