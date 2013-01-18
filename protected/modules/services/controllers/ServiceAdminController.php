<?php

class ServiceAdminController extends AdminController
{   
    public static function actionsTitles() 
    {
        return array(
            "View"   => "Просмотр статьи",
            "Create" => "Добавление статьи",
            "Update" => "Редактирование статьи",
            "Delete" => "Удаление статьи",
            "Manage" => "Управление статьями",
            'MovePosition' => 'Изменение позиции'
        );    
    }

    public function actions()
    {
        return array(
            'movePosition' => array(
                'class' => 'ext.QGridView.MovePositionAction',
                'modelName' => 'Service'
            )
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
		$model = new Service;
		
		$form = new BaseForm('services.ServiceForm', $model);
		
		// $this->performAjaxValidation($model);

		if(isset($_POST['Service']))
		{
			$model->attributes = $_POST['Service'];
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

		$form = new BaseForm('services.ServiceForm', $model);

		// $this->performAjaxValidation($model);

		if(isset($_POST['Service']))
		{
			$model->attributes = $_POST['Service'];
			if($model->save())
            {
                $this->redirect(array('view', 'id'=>$model->id));
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
		$model=new Service('search');
		$model->unsetAttributes();
		if(isset($_GET['Service']))
        {
            $model->attributes = $_GET['Service'];
        }

		$this->render('manage', array(
			'model' => $model,
		));
	}


	public function loadModel($id)
	{
		$model = Service::model()->findByPk((int) $id);
		if($model === null)
        {
            $this->pageNotFound();
        }

		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'service-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
