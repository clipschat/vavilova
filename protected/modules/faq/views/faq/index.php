<?php
$title = 'Вопросы и ответы';
$this->pageTitle = $title . ' - Автопрофи';
?>
<div class="block_page">
    <div class="way_page"><a href="/">Главная</a> » Вопросы и ответы</div>
    <div class="header_page">Вопросы и ответы</div>

    <?
    $this->widget('ListView', array(
        'dataProvider' => $faqs->search(),
        'emptyText' => 'В данном разделе вопросы отсутствуют!',
        'enablePagination' => true,
        'summaryText' => false,
        'ajaxUpdate' => false,
        'itemView' => '_list',
        'pager' => array(
            'class' => 'LinkPager',
        )
    )); ?>


    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'faq-form',
    'enableAjaxValidation' => true,
    'action' => array('/faq/faq/index', '#' => 'faq-form')
)); ?>
    <?php if (Yii::app()->user->hasFlash('feedback_done')): ?>
    <div class="form_msg">
        <?php echo $this->msg(Yii::app()->user->getFlash('feedback_done'), 'ok'); ?>
    </div>
    <?php else: ?>

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

    <div class="form_field">Текст вопроса</div>
    <div class="form_faq_2">
        <?php echo $form->textArea($model, 'question', array('cols' => 70, 'rows' => 10)); ?>
    </div>
    <div class="clear"></div>
    <div class="form_notification">
        <?php echo $form->error($model, 'question'); ?>
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
        <a href="/soveti_avtolubiteljam/<?=urlencode($usefulArticle->url_code)?>"><?=$usefulArticle->title?></a>
    </div>
    <?php endforeach ?>
    <div class="text_news">
        <a href="/soveti_avtolubiteljam/">Все полезные статьи</a>
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
    