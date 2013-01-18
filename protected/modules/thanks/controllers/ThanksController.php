<?php
class ThanksController extends BaseController

{

    public static function actionsTitles()
    {
        return array(
            "Index" => "Просмотр списка отзывов",
            "View" => "Просмотр отзывы",
        );
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'thanks-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionView($id)
    {
        Yii::app()->clientScript->registerCss('setHeadImage', '.main_services {background-image: url(/images/site/main_faq.jpg)}');
        $model = Thanks::model();
        if (!$model) {
            $this->redirect('/faq/faq/index');
        }

        $this->render('view', array(
            'thanks' => $model,
            'thank' => $model->published()->findByPk($id),
        ));
    }

    public function actionIndex()
    {

        Yii::app()->clientScript->registerCss('setHeadImage', '.main_services {background-image: url(/images/site/main_faq.jpg)}');
        $thanksModel = Thanks::model();

        $this->performAjaxValidation($thanksModel);
        if (isset($_POST['Thanks'])) {
            $thanksModel->attributes = $_POST['Thanks'];
            $thanksModel->isNewRecord = true;
            //			$thanksModel->is_published = 0;
            if ($thanksModel->save()) {
                Yii::app()->getModule('mailer')->sendMail(
                    Setting::model()->getValue('notifications_email'),
                    'Новый отзыв на сайте vavilova-13.ru',
                    $this->renderPartial("mail", array('model' => $thanksModel), true)
                );
                Yii::app()->user->setFlash('feedback_done', 'Спасибо за оставленный отзыв! После проверки администратора, он будет опубликован на сайте.');
                $this->redirect($this->url('index'));
            }
        }

        $news = News::model()->active()->findAll(array('order' => 'date DESC', 'limit' => '5'));
        $usefulArticles = UsefulArticles::model()->findAll(array('limit'=>'5'));
        $this->render('index', array(
//            'section' => $section,
            'model' => $thanksModel,
            'thanks' => $thanksModel->last()->published(),
            'news' => $news,
            'usefulArticles' => $usefulArticles
        ));

    }


    // Uncomment the following methods and override them if needed

    /*

     public function filters()

     {

         // return the filter configuration for this controller, e.g.:

         return array(

             'inlineFilterName',

             array(

                 'class'=>'path.to.FilterClass',

                 'propertyName'=>'propertyValue',

             ),

         );

     }



     public function actions()

     {

         // return external action classes, e.g.:

         return array(

             'action1'=>'path.to.ActionClass',

             'action2'=>array(

                 'class'=>'path.to.AnotherActionClass',

                 'propertyName'=>'propertyValue',

             ),

         );

     }

     */

}