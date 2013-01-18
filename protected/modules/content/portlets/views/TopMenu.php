<div class="menu">
    <div class="menu_inner">
        <ul>
            <?php foreach ($sections as $section): $class = $section->active ? 'active_' : '';?>
            <li><a href="<?=$section->href?>"><?php echo $section->title; ?></a></li>
            <?php if(empty($section->last)):?><img src="img/menu_sap.png" alt=""/><?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

