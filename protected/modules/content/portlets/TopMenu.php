<?php

class TopMenu extends Portlet
{	 
	const MENU_NAME = 'Верхнее меню';

	public function renderContent()
	{
//        $sections = Menu::model()->findByAttributes(array('name' => self::MENU_NAME))
//                                 ->getSections();

        $module=Yii::app()->controller->module->id;
        $curUrl=$_SERVER['REQUEST_URI'];
        $sections = array(
            (object)array(
                'active' => ($curUrl == '/'),
                'href' => '/',
                'title' => 'ГЛАВНАЯ',
                'imageId' => '01',
                'childs' => array(),
            ),
            (object)array(
                'active' => ($curUrl ==  '/page/taksomotornyy_park_12/'),
                'href' => '/page/taksomotornyy_park_12/',
                'title' => 'О КОМПАНИИ',
                'imageId' => '03',
                'childs' => array(),
            ),
            (object)array(
                'active' => ($module=='services'),
                'href' => '/site/services/',
                'title' => 'УСЛУГИ',
                'imageId' => '05',
                'childs' => array(),
            ),
            /*(object)array(
                'active' => ($curUrl == '/page/avtozapchasti/'),
                'href' => '/page/avtozapchasti/',
                'title' => 'Автозапчасти', 
                'imageId' => '07',
                'childs' => array(),
            ),    */
            (object)array(
                'active' => ($curUrl=='/site/page/?p=price'),
                'href' => '/site/page/?p=price',
                'title' => 'СТОИМОСТЬ УСЛУГ',
                'imageId' => 'noimage',
                'childs' => array()
            ),
            (object)array(
                'active' => ($module=='faq'),
                'href' => '/faq',
                'title' => 'ВОПРОС-ОТВЕТ', 'imageId' => '09', 'childs' => array(),
            ),
//            (object)array(
//                'active' => ($curUrl == '/page/korporativnym_klientam/'),
//                'href' => '/page/korporativnym_klientam/',
//                'title' => 'Корпоративным клиентам', 'imageId' => '09', 'childs' => array(),
//            ),
            /*(object)array(
                'active' => ($curUrl == '/page/partnery/'),
                'href' => '/page/partnery/',
                'title' => 'Партнеры', 'imageId' => '11', 'childs' => array(),),     */
            (object)array(
                'active' => ($curUrl == '/page/kontakty/'),
                'href' => '/page/kontakty/',
                'title' => 'КОНТАКТЫ', 'imageId' => '13', 'childs' => array(), 'last' => true,
            ),
        );

		$this->render('TopMenu', array('sections' => $sections));
	}
}