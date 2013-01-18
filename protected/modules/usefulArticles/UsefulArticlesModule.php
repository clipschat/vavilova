<?php
/**
 * Модуль "полезные статьи"
 * todo: Разобраться с asset'ами
 */
class UsefulArticlesModule extends WebModule
{

    public static $active = true;

    public static function name()
    {
        return "Полезные статьи";
    }

    public static function description()
    {
        return "Полезные статьи";
    }

    public static function version()
    {
        return "1.0";
    }

    public static function adminMenu()
    {
        return array(
            "Категории" => "/usefulArticles/usefulArticlesCategoryAdmin/manage",
            "Статьи" => "/usefulArticles/usefulArticlesAdmin/manage"
        );
    }

}
