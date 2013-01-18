<?php
$baseUrl = Yii::app()->baseUrl;

$this->pageTitle = 'Полезные статьи - Автопрофи';
?>
<?php $this->renderPartial('_menu', array('categories' => $categories)) ?>
<div class="block_page">
    <div class="way_page">
        <a href="/">Главная</a> » Полезные статьи
    </div>
    <h1>Полезные статьи</h1>

    <div class="text_page">
        <?php $this->renderPartial('_list', array('articles' => $articles)) ?>
    </div>
    <!--    <div class="text_page">		--><?//=Setting::model()->getValue('service_list')?>
    <!--    </div>-->

    <!--    --><?php //$this->renderPartial('_list', array('sections' => $sections)); ?>
</div>