<?php
$this->page_title = 'Управление вопросами';

$this->tabs = array(
    "добавить" => $this->createUrl("create"),
);

if (Yii::app()->user->hasFlash('faq_notify_done')): ?>
<div class="form_msg">
    <?php echo $this->msg(Yii::app()->user->getFlash('faq_notify_done'), 'ok'); ?>
</div>
<?php endif;


$this->widget('GridView', array(
	'id'=>'faq-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'first_name',
        'last_name',
		array('name' => 'question', 'value'=>'Yii::app()->text->cutStrip($data->question,30)'),
		'email',
		array('name' => 'is_published', 'value' => '$data->is_published ? \'Да\' : \'Нет\''),
        array(
            'name' => 'date_notify',
            'type'=>'raw',
            'value'=> '$data->date_notify ? $data->date_notify :
                \'<a href="\'.Yii::app()->createUrl("/faq/faqAdmin/notify", array("id"=>$data->id)).\'">Отправить уведомление</a>\'',
        ),
		array(
			'class' => 'CButtonColumn',
		),
	),
));
?>
