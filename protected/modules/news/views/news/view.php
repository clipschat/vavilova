<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

$keywords=MetaTag::getTag($model,'keywords')->static_value;
if (!empty($keywords)){
    $cs->registerMetaTag($keywords,'keywords');
}
$description=MetaTag::getTag($model,'description')->static_value;
if (!empty($description)){
    $cs->registerMetaTag($description,'description');
}

$title=MetaTag::getTag($model,'title')->static_value;
$this->pageTitle=empty($title)? $model->title.' - Автопрофи':$title;
?>
<div class="content_about">

    <div class="krohi">
        <a href="">Главная</a>
        » <a href="/site/allnews/">Новости</a>
        » <span><?=$model->title?></span>
    </div>
    <div class="orange_line_about"></div>

    <h1 style="color:#2c2423"><?=$model->title?></h1>
    <?php echo $model->content; ?>
</div>