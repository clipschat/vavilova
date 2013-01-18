<?php
$this->widget('MailDetailView', array(
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
	),
)); 
?>
