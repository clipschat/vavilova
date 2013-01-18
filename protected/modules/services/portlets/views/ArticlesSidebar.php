<div class="gray_block">
    <div class="gray_block_title">
        <a href="<?php echo $this->url("/services"); ?>" class="more right"><?php echo Yii::t("ServicesModule.main", "Все услуги"); ?></a>
        <?php echo $section->name; ?>
    </div>

    <?php foreach ($services as $service):?>
        <div class="item_list">
            <a href="<?php echo $this->url("/services/{$service->id}"); ?>" class="link_14">
                <?php echo $service->title; ?>
            </a>

            <div>
                <?php echo Yii::t("ServicesModule.main", "Дата создания"); ?>:
                <span class="create_date">
                    <?php echo Yii::app()->dateformatter->format('dd MMMM yyyy', $service->date); ?>
                </span>
            </div>
            <br clear="all"/>
        </div>
    <?php endforeach ?>

</div>

<div class="gray_block_bottom"></div>

