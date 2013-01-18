<?php
$this->page_title = 'Управление разделами';

$this->tabs = array(
    "добавить" => $this->createUrl("create"),
    "управление услугами" => $this->createUrl("serviceAdmin/manage"),
);

$this->widget('GridView', array(
	'id'=>'service-section-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'template' => '{summary}<br/>{pager}<br/>{items}<br/>{pager}',
	'columns'=>array(
		'name',
		'code',
		'date_create',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
