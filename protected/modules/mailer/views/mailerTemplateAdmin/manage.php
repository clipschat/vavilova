<?php

$this->tabs = array(
    'добавить' => $this->createUrl('create')
);

$this->widget('GridView', array(
	'id' => 'mailer-template-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'template' => '{summary}<br/>{pager}<br/>{items}<br/>{pager}',
	'columns' => array(
		'name',
		'subject',
		array('name' => 'is_basic', 'value' => '$data->is_basic ? "Да" : "Нет"'),
		'date_create',
		array(
			'class'   => 'CButtonColumn',
			'buttons' => array(
                'update' => array(
                    'visible' => '!$data->is_basic'
                ),
                'delete' => array(
                    'visible' => '!$data->is_basic'
                )
            )
		),
	),
)); 

