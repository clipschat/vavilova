<?php

abstract class BaseController extends CController implements IBaseController
{
    public $layout='//layouts/main';

    public $page_title;

    public $meta_title;

    public $meta_description;

    public $meta_keywords;

    public $crumbs = array();


    public function init()
    {
        parent::init();
        $this->_initLanguage();
    }


    private function _initLanguage()
    {
        if(isset($_GET['lang']))
        {
            Yii::app()->setLanguage($_GET['lang']);
            Yii::app()->session['language'] = $_GET['lang'];
        }

        if (!isset(Yii::app()->session['language']) || Yii::app()->session['language'] != Yii::app()->language)
        {
            Yii::app()->session['language'] = Yii::app()->language;
        }
    }


    public function beforeAction($action)
    {
        $item_name = AuthItem::constructName($action->controller->id, $action->id);
		
        /*if (!$this->checkAccess($item_name))
        {
            $this->forbidden();
        }*/

        $this->_setTitleAndSaveSiteAction($action);
        $this->_setMetaTags($action);

        return true;
    }


    private function _setMetaTags($action)
    {
        if ($action->id != 'view')
        {
            return false;
        }

        $id = $this->request->getParam("id");

        $class = ucfirst(str_replace('Admin', '', $action->controller->id));
        $model = new $class;
        $model = $model->model()->findByPk($id);

        if ($model)
        {
			try {
				Yii::app()->metaTags->set($model);
			}
			catch (Exception $e) {
			}
        }
    }


    private function _setTitleAndSaveSiteAction($action)
    {
        $action_titles = call_user_func(array(get_class($action->controller), 'actionsTitles'));

        if (!isset($action_titles[ucfirst($action->id)]))
        {
            throw new CHttpException('Не найден заголовок для дейсвия ' . ucfirst($action->id));
        }

        $title = $action_titles[ucfirst($action->id)];

        $this->page_title = $title;

        $site_action = new SiteAction();
        $site_action->title      = $title;
        $site_action->module     = $action->controller->module->id;
        $site_action->controller = $action->controller->id;
        $site_action->action     = $action->id;

        if (!Yii::app()->user->isGuest)
        {
            $site_action->user_id = Yii::app()->user->id;
        }

        $object_id = $this->request->getParam('id');
        if ($object_id)
        {
            $site_action->object_id = $object_id;
        }

        $site_action->save();
    }


    public function checkAccess($item_name)
    {
        //Если суперпользователь, то разрешено все
        if (isset(Yii::app()->user->role) && Yii::app()->user->role == AuthItem::ROLE_ROOT)
        {
            return true;
        }

        $auth_item = AuthItem::model()->findByPk($item_name);

        if (!$auth_item)
        {
            Yii::log('Задача $item_name не найдена!');
            return false;
        }

        if ($auth_item->allow_for_all)
        {
            return true;
        }


        if ($auth_item->task)
        {
            if ($auth_item->task->allow_for_all)
            {
                return true;
            }
            elseif (Yii::app()->user->checkAccess($auth_item->task->name))
            {
                return true;
            }
        }
        else
        {
            if (Yii::app()->user->checkAccess($auth_item->name))
            {
                return true;
            }
        }

        return false;
    }


    public function url($route, $params = array(), $ampersand = '&')
    {
        $url_prefix = '';//'/' . Yii::app()->language;

        if (mb_strpos($route, 'Admin') !== false)
        {
            $url_prefix = null;
        }

        $url = $this->createUrl($route, $params, $ampersand);

        if ($url_prefix)
        {
            $url = '/' . $url_prefix . $url;
        }

        $url = str_replace('//', '/', $url);

        return $url;
    }

    /**
     * @throws CHttpException
     */
    protected function pageNotFound()
    {
        throw new CHttpException(404,'Страница не найдена!');
    }

    /**
     * @throws CHttpException
     */
    protected function forbidden()
    {
        throw new CHttpException(403, 'Запрещено!');
    }


    public function getRequest()
    {
        return Yii::app()->request;
    }


    public function msg($msg, $type)
    {
        return "<div class='message {$type}' style='display: block;'>
                    <p>{$msg}</p>
                </div>";
    }

    /**
     * Возвращает модель по атрибуту и удовлетворяющую скоупам,
     * или выбрасывает 404
     *
     * @param string     $class  имя класса модели
     * @param int|string $value  значение атрибута
     * @param array      $scopes массив скоупов
     * @param string     $attribute
     *
     * @return CActiveRecord
     */
    public function loadModel($value, $scopes = array(), $attribute = null)
    {
        $class = ucfirst(str_replace('Admin', '',$this->id));
        $model = new $class;
        $model = $model->model();

        foreach ($scopes as $scope)
        {
            $model->$scope();
        }

        if ($attribute === null)
        {
            $model = $model->findByPk($value);
        }
        else
        {
            $model = $model->findByAttributes(array(
                                                   $attribute => $value
                                              ));
        }

        if ($model === null)
        {
            $this->pageNotFound();
        }

        return $model;
    }

    /**
     * Обертка для Yii::t, выполняет перевод по словарям текущего модуля.
     *
     * @param string $dictionary словарь
     * @param string $alias      фраза для перевода
     *
     * @return string перевод
     */
    public function t($dictionary, $alias)
    {
        return Yii::t(get_class($this->module).'.'.$dictionary, $alias);
    }

}