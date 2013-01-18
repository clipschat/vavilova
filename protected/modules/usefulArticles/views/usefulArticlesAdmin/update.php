<?php
$this->page_title = 'Редактирование статьи';

$this->tabs = array(
    "управление статьями" => $this->createUrl("manage"),
);

echo $form;
?>