<?php
$baseUrl = Yii::app()->baseUrl;

$this->pageTitle='Услуги - Автопрофи';
?>
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