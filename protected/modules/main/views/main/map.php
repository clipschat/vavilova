        <div class="way_page">
            <a href="/">Главная</a>
            » Карта сайта</div>
        <div class="header_page">Карта сайта</div>
        <div class="text_page">
            <a href="/site/"><strong>Главная</strong></a><br>
            <a href="/site/page/?p=taksomotornyy_park_12"><strong>О компании</strong></a><br>
            <a href="/site/page/?p=uslugi"><strong>Услуги</strong></a><br>
            <a href="/site/page/?p=avtozapchasti"><strong>Автозапчасти</strong></a><br>
            <a href="/site/page/?p=korporativnym_klientam"><strong>Корпоративныи клиентам</strong></a><br>
            <a href="/site/page/?p=partnery"><strong>Партнёры</strong></a><br>
            <a href="/site/page/?p=kontakty"><strong>Контакты</strong></a><br>

            <a href="/site/allnews/"><strong>Новости</strong></a><br>
            <?php foreach ($news as $new):?>
            &nbsp;&nbsp;•&nbsp;&nbsp;<a href="/site/news/?n=<?=$new->code?>"><?=$new->title?></a><br>
            <?php endforeach; ?>
            
            <?php foreach ($sections as $section):?>
            <a href="/site/page/?p=<?=$section->code?>"><strong><?=$section->name?></strong></a><br>
                <?php foreach ($section->services as $service):?>
                &nbsp;&nbsp;•&nbsp;&nbsp;<a href="/site/page/?p=<?=$service->code?>"><?=$service->title?></a><br>
                <?php endforeach; ?>
            <?php endforeach; ?>

        </div>
