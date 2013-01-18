<?php
$elements = array(
    'first_name' => array('type' => 'text'),
    'last_name'  => array('type' => 'text'),
    'phone'      => array('type' => 'text'),
    'email'      => array('type' => 'text'),
    'question'   => array('type' => $this->model->scenario == 'ClientSide' ? 'textarea' : 'editor')
);

if ($this->model->scenario != 'ClientSide')
{   
    $elements['answer']       = array('type' => 'editor');
    $elements['date_question'] = array('type' => 'date');
    $elements['date_answer'] = array('type' => 'date');
    $elements['is_published'] = array('type' => 'checkbox');

    unset($elements["phone"]);
}

return array(
	'activeForm' => array(
		'id'    => 'faq-form',
		'class' => 'CActiveForm',
	),
	'elements' => $elements,
	'buttons'  => array(
		'submit' => array('type' => 'submit', 'value' => 'Отправить'),
	)
);
