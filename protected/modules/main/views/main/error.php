
<?php
$this->pageTitle='Ошибка - Автопрофи';
?>
<div class="block_page">
    <div class="way_page"><a href="/">Главная</a> » Ошибка</div>
    <div class="header_page">Ошибка <?php echo $code; ?></div>
    <div class="text_page">
        <?php echo CHtml::encode($message); ?>
    </div>
</div>
<div class="clear"></div>