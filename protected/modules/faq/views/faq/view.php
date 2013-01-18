<?php
$title= 'Вопросы и ответы';
$this->pageTitle=$title.' - Автопрофи';
?>
<div class="block_page">
    <div class="way_page">
        <a href="/">Главная</a> »
        <a href="<?=$this->createUrl('/faq/faq/index')?>">Вопросы и ответы</a>
    </div>
    <div class="header_page">Вопросы и ответы</div>

    <?php
    setlocale(LC_ALL, 'ru_RU.UTF8');
    $datef = '%e %B %Y';
    if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
        $datef = preg_replace('#(?<!%)((?:%%)*)%e#', '\1%#d', $datef);
    }

    ?>
    <div class="text_faq_question">
        <?= $faq->question ?>
    </div>
    <div class="icon_faq"><img src="/images/site/faq_message.gif" border="0"></div>
    <div class="text_faq_author"><?= $faq->first_name.' '.$faq->last_name ?></div>
    <div class="icon_faq"><img src="/images/site/faq_date.gif" border="0"></div>
    <div class="text_faq_date"><?= $value = Yii::app()->dateFormatter->format('dd MMMM yyyy', $faq->date_question); ?></div>
    <div class="clear"></div>
    <div class="text_faq_answer"><?= $faq->answer ?></div>
    <div class="icon_faq_answer"><img src="/images/site/faq_admin.gif" border="0"></div>
    <div class="text_faq_admin"><?php echo $faq->authorAnswer; ?></div>
    <div class="icon_faq"><img src="/images/site/faq_date.gif" border="0"></div>
    <div class="text_faq_date"><?= $value = Yii::app()->dateFormatter->format('dd MMMM yyyy', $faq->date_answer); ?></div>
    <div class="clear"></div>
    <div class="hr_faq"><img src="/images/site/spacer.gif" border="0"></div>

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id' => 'faq-form',
    'enableAjaxValidation' => true,
    'action'=>array('/faq/faq/index', '#'=>'faq-form')
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
        <?php echo $form->error($model,'first_name'); ?>
    </div>

    <div class="form_field">Фамилия</div>
    <div class="form_faq_1">
        <?php echo $form->textField($model, 'last_name', array('size' => 30, 'class' => 'text')); ?>
    </div>
    <div class="clear"></div>
    <div class="form_notification">
        <?php echo $form->error($model,'last_name'); ?>
    </div>

    <div class="form_field">E-mail*</div>
    <div class="form_faq_1">
        <?php echo $form->textField($model, 'email', array('size' => 30, 'class' => 'text')); ?>
    </div>
    <div class="clear"></div>
    <div class="form_notification">
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="form_field">Телефон</div>
    <div class="form_faq_1">
        <?php echo $form->textField($model, 'phone', array('size' => 30, 'class' => 'text')); ?>
    </div>
    <div class="clear"></div>
    <div class="form_notification">
        <?php echo $form->error($model,'phone'); ?>
    </div>

    <div class="form_field">Текст вопроса</div>
    <div class="form_faq_2">
        <?php echo $form->textArea($model, 'question', array('cols' => 70, 'rows'=>10)); ?>
    </div>
    <div class="clear"></div>
    <div class="form_notification">
        <?php echo $form->error($model,'question'); ?>
    </div>

    <div class="form_button">
        <input id="send" type="image" src="/images/site/form_button.jpg" name="send" border="0"
               onmouseover="MM_swapImage('send','','/images/site/form_button_active.jpg',1)" onmouseout="MM_swapImgRestore()">
    </div>
    <div class="form_star">*- поле обязательно для заполнения</div>
    <?php endif; ?>
    <?php $this->endWidget(); ?>
</div>
<div class="block_page_right">
    <div class="header_news">Другие вопросы</div>
    <?php  foreach ($faqs as $data): ?>
    <div class="text_news_date"><?= date('d.m.Y', strtotime($data->date_answer)); ?></div>
    <div class="text_news">
        <a href="<?=$this->createurl('/faq/faq/view',array('id'=>$data->id))?>">
            <b><?= Yii::app()->text->cutStrip($data->question,30, ' ,;:\'"',' ...'); ?></b>
        </a>
    </div>
    <?php endforeach ?>

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
    