<?php$baseUrl = Yii::app()->baseUrl;foreach ($sections as $section): ?><div class="block_services_1">	<div class="header_services"><?=$section->name?></div>    <?php if($section->thumb_image): ?>	<div class="img_services">		<a href="<?=$this->createUrl('/content/page/view/', array('p'=>$section->code))?>" class="image">			<img src="<?=$baseUrl?>/upload/service/<?=$section->thumb_image ?>" border="3" style="background-color:#000000">		</a>	</div>	<?php endif; ?>	<div class="text_services">	<?php        $max_services=10;        $i=0;        foreach( $section->services as $article ):            $i++;            if($i>$max_services)                break;	?>	• <a href="<?=$this->createUrl('/content/page/view/', array('p'=>$article->code))?>"><?=$article->title ?></a><br><?php endforeach; ?><?php if( count($section->services)>$max_services ): ?>	<a class="main_all_services" href="<?=$this->createUrl('/content/page/view/', array('p'=>$section->code))?>">Все услуги</a><br><?php endif; ?>    </div></div><?php endforeach ?>