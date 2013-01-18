<?php
$elements = array(
    'name'  => array('type' => 'text'),
);

return array(
	'activeForm' => array(
		'id'    => 'useful-articles-category-form',
		'class' => 'CActiveForm',
	),
	'elements' => $elements,
	'buttons'  => array(
		'submit' => array('type' => 'submit', 'value' => 'Отправить'),
	)
);
