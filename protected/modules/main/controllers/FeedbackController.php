<?php

class FeedbackController extends BaseController
{   
    public static function actionsTitles() 
    {
        return array(
            "Create" => "Добавление сообщения"
        );
    }
    

    public function actionCreate($p)
    {
        $model = new Feedback;
        $form  = new BaseForm('main.FeedbackForm', $model);

        if(isset($_POST['ajax']) && $_POST['ajax'] == 'feedback-form')
        {
             echo CActiveForm::validate($model);
             Yii::app()->end();
        }

        if (isset($_POST['Feedback']))
        {
            $model->attributes = $_POST['Feedback'];
            if ($model->save())
            {
                Yii::app()->user->setFlash('feedback_done', Yii::t('MainModule.main', 'Сообщение успешно отправлено!'));

                Yii::app()->getModule('mailer')->sendMail(
                    Setting::model()->getValue('notifications_email'),
                    'Новый вопрос на сайте vavilova-13.ru',
                    $this->renderPartial("mail", array('model' => $model), true)
                );
                $this->redirect( '/index.php/page/?p=kontakty#feedback' );
            }
        }
        $news = News::model()->active()->findAll(array('order' => 'date DESC', 'limit' => '5'));
        $page = Page::model()->findByAttributes( array('code'=>$p));
        $usefulArticles = UsefulArticles::model()->findAll(array('limit'=>'5'));
        $this->render("create", array('form' => $form,'news'=>$news, 'page'=>$page, 'usefulArticles' => $usefulArticles));
    }
}
