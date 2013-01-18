<?php
$this->page_title = 'Просмотр раздела';

$this->tabs = array(
    "управление разделами"  => $this->createUrl('manage'),
    "редактировать" => $this->createUrl('update', array('id' => $model->id))
);

$this->widget('DetailView', array(
	'data' => $model,
	'attributes' => array(
		'name',		array('name' => 'text', 'value' => $model->text),		
		'date_create',
	),
)); 
?>

