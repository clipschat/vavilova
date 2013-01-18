<?php
$this->page_title = 'Просмотр услуги';

$this->tabs = array(
    "управление услугами" => $this->createUrl('manage'),
    "редактировать"          => $this->createUrl('update', array('id' => $model->id))
);

$this->widget('DetailView', array(
	'data' => $model,
	'attributes' => array(
		array('name' => 'title'),
        array('name' => 'section_id', 'value' => $model->section->name),
		'date_create',
		array(
			'name' => 'text', 
			'type' => 'raw'
		)
	),
)); 
?>
