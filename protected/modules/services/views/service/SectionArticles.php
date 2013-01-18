<?php 
if (!$services)
{
    echo $this->msg(Yii::t('ServicesModule.main', 'Не найдены материалы данного раздела'), 'info');
}

if (!$this->crumbs) 
{
    $this->crumbs = array(
            "/"         => Yii::t('ServicesModule.main', 'Главная'),
            "/services" => Yii::t('ServicesModule.main', 'База знаний')
    );
    
    if ($section->parent) 
    {
        $this->crumbs["/services/section/{$section->parent->id}"] = $section->parent->name;
    }
    
    $this->crumbs[""] = $section->name;
}

$this->page_title = Yii::t('ServicesModule.main', 'База знаний');
?>


<?php $this->renderPartial('services.views.service._list', array('services' => $services)); ?>
    
<?php $this->renderPartial('application.views.layouts.pagination', array('pages' => $pages)); ?>
