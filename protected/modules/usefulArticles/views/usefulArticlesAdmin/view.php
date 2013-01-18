<?php
$this->page_title = 'Просмотр статьи';

$this->tabs = array(
    "управление статьями" => $this->createUrl("manage"),
    "редактировать" => $this->createUrl("update", array("id" => $model->id))
);

$this->widget('DetailView', array(
	'data' => $model,
	'attributes'=>array(
		'id',
        'title',
        'text',
        'category'
	),
)); 
?>
