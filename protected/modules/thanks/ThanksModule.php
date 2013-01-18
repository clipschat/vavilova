<?php

/**
 * Модуль отзывов для приложения
 */
class ThanksModule extends WebModule
{
    /**
     * @var bool Состояние модуля, если true - то модуль доступен в интерфейсе администратора
     */
	public static $active = true;


    /**
     * Имя модуля
     * @static
     * @return string Имя текущего модуля
     */
    public static function name()
    {
        return 'Отзывы';
    }


    /**
     * @static
     * @return string Описание текущего модуля
     */
    public static function description()
    {
        return 'Thanks Module';
    }

    /**
     * @static
     * @return string Версия текущего модуля
     */
    public static function version()
    {
        return '1.0';
    }


	public function init()
	{
		$this->setImport(array(
			'thanks.models.*',
			'thanks.components.*',
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
            "Все отзывы" => "/thanks/thanksAdmin/manage"
        );
    }
}
