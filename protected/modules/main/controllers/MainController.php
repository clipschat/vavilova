<?php

class MainController extends BaseController
{   
    public static function actionsTitles() 
    {
        return array(
            "Error"  => "Ошибка на странице",
            "Search" => "Поиск по сайту",
            "Map" => "Карта сайта",
        );
    }
    

	public function actionSearch($query) 
	{
	    $models = array(
            "News" => array(
                'attributes' => array("title", "text"),
                'view_path' => 'application.modules.news.views.news._view'
            ),
            "Page" => array(
                'attributes' => array("title", "text"),
                'view_path'  => 'application.modules.content.views.page._view'
            ),
        );
        
        $query = addslashes(strip_tags($query));
        	
	    $result = array();

	    foreach ($models as $class => $data) 
	    {
	        $criteria = new CDbCriteria;
	        
	        foreach ($data['attributes'] as $attribute) 
	        {   
	            $criteria->compare($attribute, $query, true, 'OR');
	        }
	        
	        $model = new $class; 
	        
	        $items = $model->findAll($criteria);
	        if ($items) 
	        {
	            $result[$data['view_path']] = $items;
	        } 
	    }

	    $this->render('search', array(
	        'result' => $result,
	        'query'  => $query
	    ));
	}

    
    
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    	{
	    		echo $error['message'];
	    	}
	    	else
	    	{
	        	$this->render('error', $error);
	        }	
	    }
	}

    public function actionMap(){
        $sections = ServiceSection::model()->findAllByAttributes(
            array('parent_id' => null),
            array('order' => 'name')
        );

        $news = News::model()->active()->findAll(array('order' => 'date DESC', 'limit' => '5'));

        $this->render('map', array( 'sections'=> $sections, 'news'=>$news  ));
    }
}
