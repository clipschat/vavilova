

<div class="text_news_date"><?= date('d.m.Y', strtotime($data->date)); ?></div>
<div class="text_news">
    <a href="/site/news/?n=<?=$data->code?>">
        <?php echo $data->title; ?>
    </a>
</div>