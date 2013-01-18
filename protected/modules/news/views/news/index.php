<?php
$baseUrl = Yii::app()->baseUrl;

$this->pageTitle='Новости - Автопрофи';
?>
<div class="block_page">
    <div class="way_page">
        <a href="/">Главная</a>
        » <a href="/site/allnews/">Новости</a>
    </div>            <h1>Новости компании</h1>
    <?php
    $this->page_title = Yii::t('NewsModule.main', 'Новости');

//$this->renderPartial('_list', array('news_list' => $news_list));
//
//$this->renderPartial('application.views.layouts.pagination', array('pages' => $pages));
    ?>
    <div class="text_page">


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

    </div>
</div>

