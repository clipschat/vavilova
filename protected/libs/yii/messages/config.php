<?php
/**
 * This is the configuration for generating message translations
 * for the Yii framework. It is used by the 'yiic message' command.
 */
return array(
	'sourcePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'messagePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'messages',
	'languages'=>array('zh_cn','zh_tw','de','el','es','sv','he','nl','pt','ru','it','fr','ja','pl','hu','ro','id','vi','bg','lv','sk'),
	'fileTypes'=>array('php'),
	'exclude'=>array(
		'.svn',
		'yiilite.php',
		'yiit.php',
		'/i18n/data',
		'/messages',
		'/vendors',
		'/web/js',
	),
);
