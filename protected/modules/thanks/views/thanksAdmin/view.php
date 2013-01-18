<?php
$this->page_title = 'Просмотр отзыва';

$this->tabs = array(
    "управление отзывами" => $this->createUrl("manage"),
    "редактировать" => $this->createUrl("update", array("id" => $model->id))
);

$this->widget('DetailView', array(
	'data' => $model,
	'attributes'=>array(
		'first_name',
        'last_name',
        'phone',
        'email',
		array('name' => 'is_published', 'value' => ($model->is_published ? "Да" : "Нет")),
		'date_create',        
		array('name' => 'text', 'type' => 'raw'),
	),
)); 
?>
