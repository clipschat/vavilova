<div class="date_orange"><?= date('d.m.Y', strtotime($data->date)); ?></div>
<a class="news_a"><?php echo $data->title; ?></a>
<p>
    <?php //echo $data->text; todo Разобраться с выводом краткого содержания ?>
</p>