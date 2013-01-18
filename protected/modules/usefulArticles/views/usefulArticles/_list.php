<?php
$baseUrl = Yii::app()->baseUrl;
?>
<?php foreach ($articles as $article): ?>
<a href="<?php Yii::app()->createUrl('usefulArticles/usefulArticles/view',array('url_code'=>$article->url_code)) ?>"><h3><?=$article->title?></h3></a>
<?php endforeach; ?>
