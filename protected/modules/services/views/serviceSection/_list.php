<?php
$baseUrl = Yii::app()->baseUrl;

foreach ($sections as $section): ?>
<div class="text_page_services">
    <a href="<?=$this->createUrl('/content/page/view/')?>/?p=<?=$section->code?>"><strong><?=$section->name?>:</strong></a><br>
    <?php foreach( $section->services as $service ): ?>
    • <a href="<?=$this->createUrl('/content/page/view/')?>/?p=<?=$service->code?>"><?=$service->title ?></a><br>
    <?php endforeach; ?>
</div>
<?php if($section->image): ?>
<div class="img_page_services"><img src="<?=$baseUrl?>/upload/service/<?=$section->image ?>" border="5"
                                    style="border-color:#787878"></div>
<?php endif; ?>
<div class="clear"></div>
<?php endforeach ?>
