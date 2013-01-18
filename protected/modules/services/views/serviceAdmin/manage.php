<?php
$this->page_title = 'Управление услугами';

$this->tabs = array(
    "добавить" => $this->createUrl("create"),
    "управление разделами" => $this->createUrl("serviceSectionAdmin/manage"),
);

$this->widget('AdminGrid', array(
	'id'=>'services-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'sortable'=>true,
	'template' => '{summary}<br/>{pager}<br/>{items}<br/>{pager}',
	'columns'=>array(
		'title',
        'code',
        array(
            'name'  => 'section_id',
            'value' => '$data->section->name'
        ),
        array('name' => 'state', 'value' => 'News::$states[$data->state]'),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
