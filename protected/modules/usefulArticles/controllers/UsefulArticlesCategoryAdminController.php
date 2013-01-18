<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roman
 * Date: 03.04.12
 * Time: 17:49
 * To change this template use File | Settings | File Templates.
 */
class UsefulArticlesCategoryAdminController extends AdminController
{
    public static function actionsTitles()
    {
        return array(
            "Manage" => "Управление категориями статей",
            "Create" => "Добавление категории статей",
            "View" => "Просмотр категории",
            "Update" => "Редактирование категории",
            "Delete" => "Удаление категории"
        );
    }

    public function actionManage()
    {
        $model = new UsefulArticlesCategory('search');
        $model->unsetAttributes();
        if (isset($_GET['UsefulArticlesCategory'])) {
            $model->attributes = $_GET['UsefulArticlesCategory'];
        }

        $this->render('manage', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        $form = new BaseForm('usefulArticles.UsefulArticlesCategoryForm', $model);

        $this->performAjaxValidation($model);

        if (isset($_POST['UsefulArticlesCategory'])) {
            $model->attributes = $_POST['UsefulArticlesCategory'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'form' => $form,
        ));
    }

    public function actionCreate()
    {
        $model = new UsefulArticlesCategory();

        $form = new BaseForm('usefulArticles.UsefulArticlesCategoryForm', $model);

        $this->performAjaxValidation($model);

        if (isset($_POST['UsefulArticlesCategory'])) {
            $model->attributes = $_POST['UsefulArticlesCategory'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'form' => $form,
        ));
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            $this->loadModel($id)->delete();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        }
        else
        {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'faq-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function loadModel($id)
    {
        $model = UsefulArticlesCategory::model()->findByPk((int)$id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }
}
