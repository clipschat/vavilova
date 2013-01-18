<?php

class CertificatesModule extends WebModule
{	
	public static $active = false;


    public static function name()
    {
        return 'Сертификаты';
    }


    public static function description()
    {
        return 'Сертификаты, тыпы, группы';
    }


    public static function version()
    {
        return '1.0';
    }


	public function init()
	{
		$this->setImport(array(
			'certificates.models.*',
			'certificates.components.*',
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
            'Управление группами' => '/certificates/certificateGroupAdmin/manage',
            'Добавить группу'     => '/certificates/certificateGroupAdmin/create',
            'Управление типами'   => '/certificates/certificateTypeAdmin/manage',
            'Добавить тип'        => '/certificates/certificateTypeAdmin/create',
        );
    }
}
