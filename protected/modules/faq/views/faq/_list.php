<?php
    setlocale( LC_ALL, 'ru_RU.UTF8' );
    $datef = '%e %B %Y';
    if ( strtoupper( substr( PHP_OS, 0, 3 ) ) == 'WIN' )
    {
        $datef = preg_replace( '#(?<!%)((?:%%)*)%e#', '\1%#d', $datef );
    }

?>
<div class="text_faq_question">
    <a href="<?=$this->createUrl( '/faq/faq/view', array( 'id'=> $data->id ) )?>">
        <?= Yii::app()->text->cut( $data->question, 300, ' ,;:\'"', ' ...' ); ?>
    </a>
</div>
<div class="icon_faq"><img src="/images/site/faq_message.gif" border="0"></div>

<div class="text_faq_author"><?= $data->first_name . ' ' . $data->last_name ?></div>

<div class="icon_faq"><img src="/images/site/faq_date.gif" border="0"></div>

<div class="text_faq_date">
    <?= $value = Yii::app()->dateFormatter->format( 'dd MMMM yyyy', $data->date_question ); ?>
</div>
<div class="clear"></div>

<div class="text_faq_answer">
    <?=
    Yii::app()->text->cutLink(
        $data->answer,
        150,
        ' ,;:\'"',
        'Показать целиком',
        $this->createUrl( '/faq/faq/view', array( 'id'=> $data->id ) )
    );
    ?>
</div>

<div class="icon_faq_answer"><img src="/images/site/faq_admin.gif" border="0"></div>

<div class="text_faq_admin"><?php echo $data->authorAnswer; ?></div>

<div class="icon_faq"><img src="/images/site/faq_date.gif" border="0"></div>

<div class="text_faq_date">
    <?= $value = Yii::app()->dateFormatter->format( 'dd MMMM yyyy', $data->date_answer ); ?></div>
<div class="clear"></div>

<div class="hr_faq"><img src="/images/site/spacer.gif" border="0"></div>
