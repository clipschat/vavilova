<?php

class NewsController extends BaseController
{
	public static function actionsTitles() 
	{
	    return array(
	        "View"  => "Просмотр новости",
	        "Index" => "Список новостей"
	    );
	}
	
	
	public function actionView($n=null)
	{
		$model = News::model();
		
		$new = $model->active()->findByAttributes(array(
			'code'    => $n
		));
        if(!$new){
            throw new CHttpException(404, 'Эта новость недоступна');
        }

		$news_list = $model->last()->active()->limit(3)->notEqual("id", $new->id)->findAll();

		$this->render('view', array(
			'list' => $news_list,
			'model'      => $new
		));	
	}	

	
	public function actionIndex() 
	{
        $data_provider = new ActiveDataProvider('News');
        $data_provider->setSort(array('defaultOrder' => 'date desc'));
		$this->render('index', array(
            'data_provider' => $data_provider
		));
	}
}
