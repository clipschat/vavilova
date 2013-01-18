<?php

class ServiceSectionAdminController extends AdminController
{
    public static function actionsTitles() 
    {
        return array(
            "View" => "Просмотр раздела",
            "Create" => "Добавление раздела",
            "Update" => "Редактирование раздела",
            "Delete" => "Удаление раздела",
            "Manage" => "Управление разделами",
            "GetSectionInSidebar" => "Получить раздел, который в сайдбаре",
        );
    }
    

	public function actionView($id)
	{   
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}


	public function actionCreate()
	{
		$model = new ServiceSection;
		
		$form = new BaseForm('services.ServiceSectionForm', $model);
		
		// $this->performAjaxValidation($model);

		if(isset($_POST['ServiceSection']))
		{
			$model->attributes = $_POST['ServiceSection'];
			if($model->save())
            {
                $this->redirect(array('view', 'id' => $model->id));
            }
		}

		$this->render('create', array(
			'form' => $form,
		));
	}


	public function actionUpdate($id)
	{	
		$model = $this->loadModel($id);

		$form = new BaseForm('services.ServiceSectionForm', $model);

		// $this->performAjaxValidation($model);

		if(isset($_POST['ServiceSection']))
		{
			$model->attributes = $_POST['ServiceSection'];
			if($model->save())
            {
                $this->redirect(array('view', 'id' => $model->id));
            }
		}

		$this->render('update', array(
			'form' => $form,
		));
	}


	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			$this->loadModel($id)->delete();

			if(!isset($_GET['ajax']))
            {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
		}
		else
        {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
	}


	public function actionManage()
	{
		$model=new ServiceSection('search');
		$model->unsetAttributes();
		if(isset($_GET['ServiceSection']))
        {
            $model->attributes = $_GET['ServiceSection'];
        }

		$this->render('manage', array(
			'model' => $model,
		));
	}


	public function loadModel($id)
	{
		$model = ServiceSection::model()->findByPk((int) $id);
		if($model === null)
        {
            $this->pageNotFound();
        }

		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'service-section-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionGetSectionInSidebar() 
	{
	    $section = ServiceSection::model()->findByAttributes(array(
	        'in_sidebar' => 1
	    ));
	    
	    echo CJSON::encode($section);
	}
}
