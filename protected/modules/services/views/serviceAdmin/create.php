<?php $this->page_title = 'Добавление услуги'; ?>

<?php
$this->tabs = array(
    "управление услугами" => $this->createUrl("manage"),
    "управление разделами" => $this->createUrl("manage"),
);
?>

<?php echo $form; ?>