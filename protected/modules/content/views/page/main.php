<?php
$title = MetaTag::getTag($page, 'title')->static_value;
$keywords = MetaTag::getTag($page, 'keywords')->static_value;
$description = MetaTag::getTag($page, 'description')->static_value;
$ya = MetaTag::getTag($page, 'yandex-verification')->static_value;

$cs = Yii::app()->getClientScript();
if (!empty($description)) {
    $cs->registerMetaTag($description, 'description');
}
if (!empty($keywords)) {
    $cs->registerMetaTag($keywords, 'keywords');
}
if (!empty($ya)) {
    $cs->registerMetaTag($ya, 'yandex-verification');
}
$this->pageTitle = empty($title) ? $page->title . ' - Автопрофи' : $title;
?>
<?php $this->renderPartial('_listSections', array('sections' => $sections)); ?>
<div class="clear"></div>

    <div class="main_block">
        <div class="block_left">
            <h1><?=$page->title?></h1>

            <div class="text_main">
                <?=$page->text?>

                <?php
                $this->widget(
                    'FileList',
                    array(
                        'model' => $page,
                        'tag' => 'files',
                    )
                );
                ?>
            </div>
        </div>
        <div class="block_right">
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
            <!--<div class="text_news_date"><?/*= date('d.m.Y', strtotime($new->date)); */?></div>-->
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

