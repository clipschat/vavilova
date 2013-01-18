<?php
$baseUrl = Yii::app()->baseUrl;

$this->pageTitle = 'Полезные статьи - Автопрофи';
?>
<?php $this->renderPartial('_menu', array('categories' => $categories)) ?>
<div class="block_page">
    <div class="way_page">
        <a href="/">Главная</a> » <a href="<?php Yii::app()->createUrl('usefulArticles/usefulArticles') ?>">Полезные статьи</a> » <?= $category->name ?>
    </div>
    <h1>Статьи в категории "<?= $category->name ?>"</h1>

    <div class="text_page">
        <?php $this->renderPartial('_list', array('articles' => $category->articles))  ?>
    </div>
</div>