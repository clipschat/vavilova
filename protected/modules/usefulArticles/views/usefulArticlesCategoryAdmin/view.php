<?php
$this->page_title = 'Просмотр категории';

$this->tabs = array(
    "управление категориями" => $this->createUrl("manage"),
    "редактировать" => $this->createUrl("update", array("id" => $model->id))
);

$this->widget('DetailView', array(
	'data' => $model,
	'attributes'=>array(
		'id',
        'name'
	),
)); 
?>
