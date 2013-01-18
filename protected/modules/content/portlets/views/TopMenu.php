<div class="menu">
    <div class="menu_inner">
        <ul>
            <?php foreach ($sections as $section): $class = $section->active ? 'active_' : '';?>
            <li><a href="<?=$section->href?>"><?php echo $section->title; ?></a></li>
            <?php if(!isset($section->last)):?><img src="/avto/img/menu_sap.png" alt=""/><?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

