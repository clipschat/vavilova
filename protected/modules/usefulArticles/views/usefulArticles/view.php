<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

$keywords=MetaTag::getTag($article,'keywords')->static_value;
if (!empty($keywords)){
    $cs->registerMetaTag($keywords,'keywords');
}
$description=MetaTag::getTag($article,'description')->static_value;
if (!empty($description)){
    $cs->registerMetaTag($description,'description');
}

$title=MetaTag::getTag($article,'title')->static_value;
$this->pageTitle=empty($title)? $article->title.' - Автопрофи':$title;
?>
<?php $this->renderPartial('_menu', array('categories' => $categories)) ?>
<div class="block_page">
    <div class="way_page">
        <a href="/">Главная</a> » <a href="<?php Yii::app()->createUrl('usefulArticles/usefulArticles') ?>">Полезные статьи</a> » <?= $article->title ?>
    </div>
    <h1><?= $article->title ?></h1>

    <div class="text_page">
        <?= $article->text ?>
    </div>
</div>