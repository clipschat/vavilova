<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

$keywords=MetaTag::getTag($section,'keywords')->static_value;
if (!empty($keywords)){
    $cs->registerMetaTag($keywords,'keywords');
}
$description=MetaTag::getTag($section,'description')->static_value;
if (!empty($description)){
    $cs->registerMetaTag($description,'description');
}

$title=MetaTag::getTag($section,'title')->static_value;
$this->pageTitle=empty($title)? $section->name.' - Автопрофи':$title;
?>
<div class="block_services_page">
    <?php foreach ($section->services as $service): ?>
    <div class="button_services"><a href="<?=$this->createUrl('/content/page/view/')?>/?p=<?=$service->code?>" class="serviceslink"><span class="char_services_list"><img
            src="<?=$baseUrl?>/images/site/services_list_icon.gif" align="absmiddle" border="0"></span><?=$service->title?></a></div>
    <?php endforeach ?>
</div>
<div class="block_page">
    <div class="way_page"><a href="">Главная</a> »
        <a href="<?=$this->createUrl('/services/serviceSection/index')?>">Услуги</a>
        » <?=$section->name?>
    </div>            <h1><?=$section->name?></h1>
    <div class="text_page">
        <?=$section->text?>
    </div>
</div>
<div class="clear"></div>
