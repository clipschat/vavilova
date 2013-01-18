<?php


abstract class WebModule extends CWebModule implements IWebModule
{
    public static $active = true;

    public static $base_module = false;


    protected $_assetsUrl;


    public function assetsUrl()
    {

        if ($this->_assetsUrl === null)
        {
            $class = str_replace('Module', '', get_class($this));
            $class = lcfirst($class);

            $path = Yii::getPathOfAlias($class . '.assets');

            if ($path)
            {
                $this->_assetsUrl = Yii::app()->getAssetManager()->publish($path);
            }
        }

        return $this->_assetsUrl;
    }


    public static function getShortId()
    {
        return strtolower(str_replace('Module', '', get_called_class()));
    }
}
