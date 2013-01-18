<?php

class ThanksAdminController extends AdminController
{
    public static function actionsTitles()
    {
        return array(
            "View" => "Просмотр вопроса",
            "Create" => "Добавление вопроса",
            "Update" => "Редактирование вопроса",
            "Delete" => "Удаление вопроса",
            "Manage" => "Управление вопросами",
            "Notify" => "Почтовое уведомление",
        );
    }

    public function actionNotify($id)
    {
        $model = $this->loadModel($id);
        if (!empty($model)) {

            Yii::app()->getModule('mailer')->sendMail(
                $model->email,
                'Ваш отзыв на сайте vavilova-13.ru был опубликован',
                $this->renderPartial("mail", array('model' => $model), true)
            );

            Yii::app()->user->setFlash('faq_notify_done', 'Уведомление успешно отправлено!');

            $model->date_notify = date('Y-m-d H:i:s');
            $model->save();
        }
        $this->redirect('/faq/faqAdmin/manage');
    }


    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }


    public function actionCreate()
    {
        $model = new Thanks;

        $form = new BaseForm('thanks.ThanksForm', $model);

        $this->performAjaxValidation($model);

        if (isset($_POST['Thanks'])) {
            $model->attributes = $_POST['Thanks'];
            if ($model->save()) {
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

        $form = new BaseForm('thanks.ThanksForm', $model);

        $this->performAjaxValidation($model);

        if (isset($_POST['Thanks'])) {
            if ($model->is_published != $_POST['Thanks']['is_published'] && $_POST['Thanks']['is_published'] == '1') {
                Yii::app()->getModule('mailer')->sendMail(
                    $model->email,
                    'Ваш отзыв на сайте vavilova-13.ru был опубликован',
                    $this->renderPartial("mail", array('model' => $model), true)
                );
                Yii::app()->user->setFlash('faq_notify_done', 'Уведомление успешно отправлено!');
            }
            $model->attributes = $_POST['Thanks'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'form' => $form,
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

    /**
     * Управление отзывами - вывод табличного представления со списком отзывов
     */
    public function actionManage()
    {
        $model = new Thanks('search');
        $model->unsetAttributes();
        if (isset($_GET['Thanks'])) {
            $model->attributes = $_GET['Thanks'];
        }

        $this->render('manage', array(
            'model' => $model,
        ));
    }


    /**
     * @param $id
     * @return Thanks
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Thanks::model()->findByPk((int)$id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }


    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'faq-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
