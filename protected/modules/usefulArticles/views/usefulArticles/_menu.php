<?php
$menuItems = array();

Yii::app()->clientScript->registerCssFile(Yii::app()->getModule('usefulArticles')->assetsUrl() . '/css/treeview.css');

foreach ($categories as $category) {
    $childItems = array();
    foreach ($category->articles as $article) {
        $childItems[] = array(
            "text" => CHtml::link(
                $article->title,
                Yii::app()->createUrl('usefulArticles/usefulArticles/view',array('url_code'=>$article->url_code))
            ),
            "htmlOptions" => array(
                'class' => ($article->url_code === Yii::app()->getRequest()->getQuery('url_code')) ? 'active' : '',
            ),
        );
    }

    $menuItems[] = array(
        "text" => CHtml::link(
            $category->name,
            Yii::app()->createUrl('usefulArticles/usefulArticles/view',array('url_code'=>$category->articles[0]->url_code))
        ),
        "children" => $childItems,
        "htmlOptions" => array(
            'class' => 'button_services'
        )
    );
}
?>
<div class="block_services_page">
    <?php $this->widget('system.web.widgets.CTreeView', array(
    'data' => $menuItems,
    'htmlOptions' => array(
        'class' => 'treeview-useful-articles-categories'
    )
));?>
</div>