<?php

class ServicesModule extends WebModule
{
    public static $active = true;


    public static function name()
    {
        return 'Услуги';
    }


    public static function description()
    {
        return '';
    }


    public static function version()
    {
        return '1.0';
    }


	public function init()
	{
		$this->setImport(array(
            'services.controllers.*',
			'services.models.*',
            'services.portlets.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			return true;
		}
		else
        {
            return false;
        }
	}


    public static function adminMenu()
    {
        return array(
			'Список услуг'     => '/services/serviceAdmin/manage',
			'Добавить услугу' => '/services/serviceAdmin/create',
			'Список разделов'   => '/services/serviceSectionAdmin/manage',
			'Добавить раздел'   => '/services/serviceSectionAdmin/create'
        );
    }
}
