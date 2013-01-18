<?php
$this->page_title = 'Управление статьями';

$this->tabs = array(
    "добавить" => $this->createUrl("create"),
);

//if (Yii::app()->user->hasFlash('faq_notify_done')): ?>
<!--<div class="form_msg">
    <?php /*echo $this->msg(Yii::app()->user->getFlash('faq_notify_done'), 'ok'); */?>
</div>-->
<?php
//endif;
$this->widget('GridView', array(
    'id' => 'usefulArticlesCategory-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'title',
        /*array('name' => 'question', 'value'=>'Yii::app()->text->cutStrip($data->question,30)'),*/
        /*'email',
        array('name' => 'is_published', 'value' => '$data->is_published ? \'Да\' : \'Нет\''),*/
        /*array(
            'name' => 'date_create',
            'type'=>'raw',
            'value'=> '$data->date_create ? $data->date_create :
                \'<a href="\'.Yii::app()->createUrl("/faq/faqAdmin/notify", array("id"=>$data->id)).\'">Отправить уведомление</a>\'',
        ),*/
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
