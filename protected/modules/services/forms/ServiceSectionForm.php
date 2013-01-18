<?php

//$sections = ServiceSection::model()->findAllByAttributes(array('parent_id' => null));
//
//if (!$this->model->isNewRecord)
//{
//	foreach ($sections as $i => $section)
//	{
//		if ($section->id == $this->model->id)
//		{
//			unset($sections[$i]);
//			break;
//		}
//	}
//}

return array(
    'activeForm' => array(
        'id' => 'service-form',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    ),
    'elements' => array(    
        'name' => array('type' => 'text'),
        'code' => array('type' => 'text'),
        'meta'  => array('type' => 'widget', 'widget' => 'MetaTagSubForm'),		'text'  => array('type' => 'editor'),		
		'image' => array('type' => 'image', 'attributes'=>array('path'=>$this->model->getImagePath())),
        'thumb_image' => array('type' => 'image', 'attributes'=>array('path'=>$this->model->getThumbImagePath())),
        'state' => array('type' => 'dropdownlist', 'items' => Service::$states),
    ),
    'buttons' => array(
        'submit' => array('type' => 'submit', 'value' => $this->model->isNewRecord ? 'Создать' : 'Сохранить'),
    )
);
