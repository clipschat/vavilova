<?php class ServiceSectionController extends BaseController{    const PAGE_SIZE = 10;    public $layout = '//layouts/column1';    public static function actionsTitles()     {        return array(            "Index"           => "Просмотр списка услуг",            "GetChilds" => "Получить подразделы",            "View" => "",        );    }    public function actionGetChilds($id)     {        if (!$this->request->isAjaxRequest)         {            return;        }                $sections = ServiceSection::model()->findAllByAttributes(            array('parent_id' => $id),            array('order' => 'name')        );                echo CJSON::encode($sections);    }    public function actionIndex()    {        $sections = ServiceSection::model()->active()->with(            array('services'=>array( 'scopes'=>array('active')))        )->root()->ordered()->findAll();        $this->render('index', array(                                    'sections' => $sections,                               ));    }    public function actionView($id)    {        $section = ServiceSection::model()->active()->with(            array('services'=>array( 'scopes'=>array('active')))        )->findByPk($id);        if (!$section)        {            $this->pageNotFound();        }        $this->render('view', array('section' => $section,));    }}