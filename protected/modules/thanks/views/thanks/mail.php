<?php
$this->widget('MailDetailView', array(
	'data' => $model,
	'attributes' => array(
        'first_name',
        'last_name',
        'phone',
        'email',
        array('name' => 'text', 'type' => 'raw'),
    ),
)); ?><hr>
Вы можете опубликовать данный отзыв на сайте на сайте через
<a href="<?=$this->createAbsoluteUrl('/thanks/thanksAdmin/update', array('id'=>$model->id))?>">Панель управления</a>
(<?=$this->createAbsoluteUrl('/thanks/thanksAdmin/update', array('id'=>$model->id))?>).
