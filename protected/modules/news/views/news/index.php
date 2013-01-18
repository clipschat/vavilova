<?php
$baseUrl = Yii::app()->baseUrl;

$this->pageTitle='Новости - Автопрофи';
?>
<div class="krohi">
    <a href="/">Главная</a>
    » <a href="/site/allnews/">Новости</a>
</div>
<div class="orange_line_about"></div>

<h1 style="color:#2c2423">Новости компании</h1>

    <?php
    $this->page_title = Yii::t('NewsModule.main', 'Новости');

//$this->renderPartial('_list', array('news_list' => $news_list));
//
//$this->renderPartial('application.views.layouts.pagination', array('pages' => $pages));
    ?>


        <?
        $this->widget('zii.widgets.CListView', array(
                                                    'dataProvider'     => $data_provider,
                                                    'itemView'         => '_view',
                                                    'emptyText'        => $this->msg(Yii::t('main', 'ничего не найдено'), 'info'),
                                                    'enablePagination' => true,
                                                    'summaryText'      => false,
                                                    'ajaxUpdate'       => false,
                                                    'pager' => array(
                                                        'class'   => 'CLinkPager',

                                                    )
                                               ));
        ?>

