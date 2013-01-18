<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roman
 * Date: 03.04.12
 * Time: 17:44
 * To change this template use File | Settings | File Templates.
 */
class UsefulArticlesAdminController extends AdminController
{

    /**
     * @static
     * @return array Заголовки действий
     */
    public static function actionsTitles()
    {
        return array(
            "Manage" => "Управление статьями",
            "Create" => "Добавление статьи",
            "Update" => "Редактирование статьи",
            "View" => "Просмотр статьи",
            "Delete" => "Удаление статьи"
        );
    }

    public function actionManage()
    {
        $model = new UsefulArticles('search');
        $model->unsetAttributes();
        if (isset($_GET['UsefulArticles'])) {
            $model->attributes = $_GET['UsefulArticles'];
        }

        $this->render('manage', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        $form = new BaseForm('usefulArticles.UsefulArticlesForm', $model);

        $this->performAjaxValidation($model);

        if (isset($_POST['UsefulArticles'])) {
            $model->attributes = $_POST['UsefulArticles'];
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
        $model = new UsefulArticles();

        $form = new BaseForm('usefulArticles.UsefulArticlesForm', $model);

        $this->performAjaxValidation($model);

        if (isset($_POST['UsefulArticles'])) {
            $model->attributes = $_POST['UsefulArticles'];
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

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'useful-articles-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function loadModel($id)
    {
        $model = UsefulArticles::model()->findByPk((int)$id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
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
}