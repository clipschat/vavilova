<?php
$elements = array(
    'title'  => array('type' => 'text'),
    'meta'  => array('type' => 'widget', 'widget' => 'MetaTagSubForm'),
    'url_code' => array('type' => 'text'),
    'text' => array('type' => 'editor'),
    'category_id' => array(
        'type' => 'dropdownlist',
        'items' => CHtml::listData(UsefulArticlesCategory::model()->findAll(), 'id', 'name')
    )
);

return array(
	'activeForm' => array(
		'id'    => 'useful-articles-form',
		'class' => 'CActiveForm',
	),
	'elements' => $elements,
	'buttons'  => array(
		'submit' => array('type' => 'submit', 'value' => 'Отправить'),
	)
);
