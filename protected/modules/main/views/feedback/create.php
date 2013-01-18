<?php
$this->pageTitle = 'Контакты - Автопрофи';
?>
<div class="block_page">
    <div class="way_page"><a href="/">Главная</a> » Контакты</div>
    <h1><?=$page->title?></h1>

    <div class="text_page">

        <?= $page->text ?>
        <div id="feedback">
            <?php if (Yii::app()->user->hasFlash('feedback_done')): ?>
            <?php echo $this->msg(Yii::app()->user->getFlash('feedback_done'), 'ok'); ?>
            <?php else: ?>
            <strong>Форма обратной связи:</strong><br>
            Поля, отмеченные символом * , являются обязательными для заполнения
            <?php echo $form; ?>
            <?php endif ?>
        </div>
        </p>
    </div>
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
</div>
<div class="clear"></div>






