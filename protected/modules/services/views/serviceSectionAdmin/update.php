<?php
$this->page_title = 'Редактирование раздела';

$this->tabs = array(
    "управление разделами" => $this->createUrl("manage"),
);

echo $form;

$this->renderPartial('application.modules.services.views.serviceSectionAdmin._dialog');
?>



