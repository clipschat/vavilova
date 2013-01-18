<?php

$title = 'Отзывы';

$this->pageTitle = $title . ' - Автопрофи';

?>

<div class="block_page">
    <div class="way_page"><a href="/">Главная</a> » Отзывы</div>
    <h1>Отзывы о техцентре "Автопрофи"</h1>

    <?
    $this->widget('ListView', array(

        'dataProvider' => $thanks->search(),

        'emptyText' => '<div class="text_faq_question">Оставь свой отзыв в форме ниже.</div>',

        'enablePagination' => true,

        'summaryText' => false,

        'ajaxUpdate' => false,

        'itemView' => '_list',

        'pager' => array(

            'class' => 'LinkPager',

        )

    )); ?>


    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'thanks-form',
        'enableAjaxValidation' => true,
        'action' => array('/thanks/thanks/index', '#' => 'thanks-form')
    )); ?>

    <?php if (Yii::app()->user->hasFlash('feedback_done')): ?>

    <div class="form_msg">
        <?php echo $this->msg(Yii::app()->user->getFlash('feedback_done'), 'ok'); ?>
    </div>
    <?php else: ?>


    <div class="text_faq_question">
        Мы ценим Ваше мнение и поэтому будем рады, если Вы оставите свой отзыв о нашем техническом центре:
    </div>
    <div class="form_field">Имя*</div>

    <div class="form_faq_1">

        <?php echo $form->textField($model, 'first_name', array('size' => 30, 'class' => 'text')); ?>

    </div>

    <div class="clear"></div>

    <div class="form_notification">

        <?php echo $form->error($model, 'first_name'); ?>

    </div>



    <div class="form_field">Фамилия</div>

    <div class="form_faq_1">

        <?php echo $form->textField($model, 'last_name', array('size' => 30, 'class' => 'text')); ?>

    </div>

    <div class="clear"></div>

    <div class="form_notification">

        <?php echo $form->error($model, 'last_name'); ?>

    </div>



    <div class="form_field">E-mail*</div>

    <div class="form_faq_1">

        <?php echo $form->textField($model, 'email', array('size' => 30, 'class' => 'text')); ?>

    </div>

    <div class="clear"></div>

    <div class="form_notification">

        <?php echo $form->error($model, 'email'); ?>

    </div>



    <div class="form_field">Телефон</div>

    <div class="form_faq_1">

        <?php echo $form->textField($model, 'phone', array('size' => 30, 'class' => 'text')); ?>

    </div>

    <div class="clear"></div>

    <div class="form_notification">

        <?php echo $form->error($model, 'phone'); ?>

    </div>



    <div class="form_field">Текст отзыва*</div>

    <div class="form_faq_2">

        <?php echo $form->textArea($model, 'text', array('cols' => 70, 'rows' => 10)); ?>

    </div>

    <div class="clear"></div>

    <div class="form_notification">

        <?php echo $form->error($model, 'text'); ?>

    </div>



    <div class="form_button">

        <input id="send" type="image" src="/images/site/form_button.jpg" name="send" border="0"

               onmouseover="MM_swapImage('send','','/images/site/form_button_active.jpg',1)"
               onmouseout="MM_swapImgRestore()">

    </div>

    <div class="form_star">* отмечены поля, обязательные для заполнения.</div>

    <?php endif; ?>

    <?php $this->endWidget(); ?>

</div>

<div class="block_page_right">

    <div class="header_news">Новости компании</div>

    <?php  foreach ($news as $new): ?>

    <div class="text_news_date"><?= date('d.m.Y', strtotime($new->date)); ?></div>

    <div class="text_news">

        <a href="/site/news/?n=<?=urlencode($new->code)?>"><?=$new->title?></a>

    </div>

    <?php endforeach ?>
    <div class="text_news">
        <a href="/site/allnews">Все новости</a>
    </div>

    <div class="header_news">Полезные статьи</div>
    <?php  foreach ($usefulArticles as $usefulArticle): ?>
    <div class="text_news">
        <a href="/usefulArticles/usefulArticles/view/id/<?=urlencode($usefulArticle->id)?>"><?=$usefulArticle->title?></a>
    </div>
    <?php endforeach ?>
    <div class="text_news">
        <a href="/usefulArticles/usefulArticles">Все полезные статьи</a>
    </div>


    <div class="right-banner">

        <object name="callme" width="200" height="100" align="middle">

            <embed

                src="http://universe.uiscom.ru/media/flash/callme200x100.swf?h=dlgWawvOzPCVLqh_golgyy5ZeVIQ9V1lfghqNNdmCQgmfylvXHMueRttLagT5gek&color=green&prefix=russia&person=man&text=callme"

                width="200" height="100" quality="high" bgcolor="#ffffff" name="callme" align="middle"

                allowScriptAccess="always" type="application/x-shockwave-flash"

                pluginspage="http://www.adobe.com/go/getflashplayer"/>

        </object>

    </div>

</div>

<div class="clear"></div>

    