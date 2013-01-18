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
    <div class="block_page">
        <div class="way_page">
            <a href="/">Главная</a>
            » <a href="/site/allnews/">Новости</a>
            » <?=$model->title?></div>
                <h1><?=$model->title?></h1>
        <div class="text_page">
            <?php echo $model->content; ?>
        </div>
    </div>
    <div class="block_page_right">
        <div class="header_news">Новости компании</div>
        <?php  foreach ($list as $new): ?>
        <div class="text_news_date"><?= date('d.m.Y', strtotime($new->date)); ?></div>
        <div class="text_news">
            <a href="/site/news/?n=<?=$new->code?>"><?=$new->title?></a>
        </div>
        <?php endforeach; ?>
        <a class="text_news" style="color: #C10E1F;" href="/site/allnews/">Все новости</a><br><br>
    </div>
    <div class="clear"></div>