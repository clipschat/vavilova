<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

$keywords=MetaTag::getTag($service,'keywords')->static_value;
if (!empty($keywords)){
    $cs->registerMetaTag($keywords,'keywords');
}
$description=MetaTag::getTag($service,'description')->static_value;
if (!empty($description)){
    $cs->registerMetaTag($description,'description');
}

$title=MetaTag::getTag($service,'title')->static_value;
$this->pageTitle=empty($title)? $service->title.' - Автопрофи':$title;
?>
<?php $baseUrl = Yii::app()->baseUrl; ?>
<div class="block_page">
    <div class="way_page"><a href="">Главная</a> »
        <a href="<?=$this->createUrl('/services/serviceSection/index')?>">Услуги</a>
        » <a href="<?=$this->createUrl('/content/page/view/')?>/?p=<?=$service->section->code?>"><?=$service->section->name?></a>
        » <?=$service->title?>
    </div>            <h1><?=$service->title?></h1>
    <div class="text_page">
        <?=$service->text?>
    </div>
</div>
<div class="clear"></div>
