<?php

class FaqController extends BaseController
{
    public static function actionsTitles() 
    {
        return array(
            "Index"  => "Просмотр списка вопросов",
            "View" => "Просмотр вопроса",
            "Create" => "Добавление вопроса",
        );
    }

    public function actionView($id)
    {
        Yii::app()->clientScript->
            registerCss('setHeadImage','.main_services {background-image: url(/images/site/main_faq.jpg)}');
        $model = new Faq();
        $faq = Faq::model()->published()->findByPk($id);
        if (!$model)
        {
            $this->redirect('/faq/faq/index');
        }

        $faqs = Faq::model()->last()->published()->notEqual('id',$id)->limit(5)->findAll();

        $this->render('view', array(
            'faqs'    => $faqs,
            'faq'    => $faq,
            'model'    => $model,
        ));
    }

    public function actionIndex()
    {

        Yii::app()->clientScript->
            registerCss('setHeadImage','.main_services {background-image: url(/images/site/main_faq.jpg)}');
        $model = new Faq();

        $this->performAjaxValidation($model);

        if(isset($_POST['Faq']))
        {
            $model->attributes = $_POST['Faq'];
            if($model->save())
            {
                Yii::app()->user->setFlash('feedback_done', 'Вопрос успешно отправлен!');

                Yii::app()->getModule('mailer')->sendMail(
                    Setting::model()->getValue('notifications_email'),
                    'Новый вопрос на сайте vavilova-13.ru',
                    $this->renderPartial("mail", array('model' => $model), true)
                );								                $this->redirect($this->url('faq/index'));
            }
        }

//        $section = FaqSection::model()->findByPk($section_id);
//        if (!$section)
//        {
//            $this->pageNotFound();
//        }

        $faqs = Faq::model()->last()->published();
        $news = News::model()->active()->findAll(array('order' => 'date DESC', 'limit' => '5'));
        $usefulArticles = UsefulArticles::model()->findAll(array('limit' => '5'));
        $this->render('index', array(
//            'section' => $section,
            'faqs'    => $faqs,
            'model'    => $model,
            'news'    => $news,
            'usefulArticles' => $usefulArticles
        ));
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax'] === 'faq-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionCreate()
    {
        $model = new Faq('ClientSide');
        $form  = new BaseForm("faq.FaqForm", $model);

        if (isset($_POST['Faq']))
        {
            $model->attributes = $_POST['Faq'];
            if ($model->save())
            {
                $form->clear();
                $done = true;
            }
        }

        $this->render('create', array(
            'form' => $form,
            'done' => isset($done)
        ));
    }
}
