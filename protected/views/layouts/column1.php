<?php $this->beginContent('//layouts/main'); ?>
<div class="content_top"></div>
<div class="content_center">
        <?= $content ?>
        <!--div id="share_block">
            <?= Setting::model()->getValue('share_block_code')?>
        </div-->
</div>
<?php $this->endContent(); ?>