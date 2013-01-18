<h3><?php echo $service->title; ?></h3>

<?php
Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl() . '/js/filesManage.js', CClientScript::POS_END);

$this->page_title = "Файлы материала";

$this->tabs = array(
    "услуги" => $this->createUrl('serviceAdmin/manage'),
    "добавить"  => $this->createUrl('create', array('service_id' => $service->id)),
);

$this->widget('GridView', array(
	'id'=>'service-file-grid',
	'dataProvider'=>$model->search($service->id),
	'filter'=>$model,
	'template' => '{summary}<br/>{pager}<br/>{items}<br/>{pager}',
	'columns'=>array(
		'created_at',
		array(
			'class'=>'CButtonColumn',
            'template' => '{update} {delete}'
		),
	),
));

$this->widget('application.extensions.Plupload.Plupload', array(
    'url' => '/services/serviceFileAdmin/create/service_id/' . $service->id
));
?>
