<?php
$this->page_title = 'Просмотр новости';

$this->tabs = array(
    "управление новостями" => $this->createUrl('manage'),
    "редактировать"        => $this->createUrl('update', array('id' => $model->id))
);

$this->widget('DetailView', array(
	'data' => $model,
	'attributes' => array(
		array('name' => 'first_name'),
		array('name' => 'last_name'),
		array('name' => 'patronymic'),
		array('name' => 'company'),
		array('name' => 'position'),
		array('name' => 'email'),
		array('name' => 'first_name'),

		array('name' => 'comment'),

		array('name' => 'date_create'),
	),
)); 
?>
