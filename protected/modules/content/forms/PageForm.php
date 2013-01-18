<?php

return array(
    'activeForm'=>array(
        'id' => 'page-form',
        'class' => 'CActiveForm',
        'enableAjaxValidation' => false,
        'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => true),
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    ),
    'elements' => array(
        'title'        => array('type' => 'text'),
        'code'          => array('type' => 'text'),
        'meta'  => array('type' => 'widget', 'widget' => 'MetaTagSubForm'),
        'text'         => array('type' => 'editor'),
        'image' => array('type' => 'image', 'attributes'=>array('path'=>$this->model->getImagePath())),
        'is_published' => array('type' => 'checkbox'),
        'files' => array('type' => 'file_manager', 'params' => array(
            'data_type' => 'any',
            'title' => 'Файлы'
        ))
    ),
    'buttons' => array(
        'submit' => array('type' => 'submit', 'value' => 'сохранить')
    )
);

