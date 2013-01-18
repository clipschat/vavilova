<?php $this->beginContent('//layouts/main'); ?>
<div class="content">
    <div class="content_inner">
        <?= $content ?>
        <div id="share_block">
            <?= Setting::model()->getValue('share_block_code')?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>