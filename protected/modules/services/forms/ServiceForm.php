<?php

return array(
	'activeForm' => array(
		'id'         => 'service-form',
		'class'      => 'CActiveForm',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	),
	'elements' => array(
        'section_id' => array(
            'type'  => 'dropdownlist',
            'items' => CHtml::listData(ServiceSection::model()->findAll(), 'id', 'name')
        ),
		'title' => array('type' => 'text'),
		'code' => array('type' => 'text'),
		'text'  => array('type' => 'editor'),        'meta'  => array('type' => 'widget', 'widget' => 'MetaTagSubForm'),
        'state' => array('type' => 'dropdownlist', 'items' => Service::$states),
	),
	'buttons' => array(
		'submit' => array('type' => 'submit', 'value' => $this->model->isNewRecord ? 'Создать' : 'Сохранить'),
	)
);
