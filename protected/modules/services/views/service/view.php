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
<div class="krohi">
    <a href="">Главная</a> »
    <a href="<?=$this->createUrl('/services/serviceSection/index')?>">Услуги</a>
    <span>» <?=$service->title?></span>
</div>
<div class="orange_line_about"></div>

<h1 style="color:#2c2423"><?=$service->title?></h1>

        <?=$service->text?>
