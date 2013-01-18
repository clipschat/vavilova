<?php
$this->widget('MailDetailView', array(
	'data' => $model,
	'attributes' => array(
        'first_name',
        'last_name',
        'phone',
        'email',
        array('name' => 'question', 'type' => 'raw'),
    ),
)); ?><hr>
Вы можете дать ответ на данный вопрос и опубликовать его на сайте через
<a href="<?=$this->createAbsoluteUrl('/faq/faqAdmin/update', array('id'=>$model->id))?>">Панель управления</a>
(<?=$this->createAbsoluteUrl('/faq/faqAdmin/update', array('id'=>$model->id))?>).
