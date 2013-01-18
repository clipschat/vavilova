<?php
 
class PageController extends BaseController
{
    
    public static function actionsTitles() 
    {
        return array(
            "View" => "Просмотр страницы",
            "Main" => "Главная страница",
            "Page" => "Страница"
        );
    }    
    

    public function actionMain()
    {
        $page = Page::model()->published()->findByAttributes(array('code' => '/'));

        //todo: получение $news & $thanks можно отрефакторить
        $news = News::model()->active()->findAll(array('order' => 'date DESC', 'limit' => '5'));

        $usefulArticles = UsefulArticles::model()->findAll(array('limit' => '5'));

        $sections = ServiceSection::model()->active()->with(
            array('services'=>array('scopes'=>'active'))
        )->findAllByAttributes(
            array('parent_id' => null),
            array('order' => 't.id', 'limit' => '4')
        );

        if (!$page)
        {
            throw new CHttpException('404', 'Страница не найдена');
        }

        if($page->image)
        {
            $cs = Yii::app()->clientScript;
            $cs->registerCss('setHeadImage','.main_services {background-image: url('.$page->imagePath.')}');
        }

        $this->render('main', array(
            'page' => $page,
            'sections' => $sections,
            'news'=> $news,
            'usefulArticles' => $usefulArticles
        ));
    }


    public function actionView($p){
        if (strtolower($p)=='to_texnicheskoe_obslyjivanie_avtomobilja') {
            $this->redirect('/');
            Yii::app()->end();
        }

        if ($p=='kontakty') {
            $this->forward('/main/feedback/create');
            Yii::app()->end();
        }

        $page = Page::model()->findByAttributes( array('code'=>$p));
        if ( !empty($page) ) {
            if($page->image)
            {
                $cs = Yii::app()->clientScript;
                $cs->registerCss('setHeadImage','.main_services {background-image: url('.$page->imagePath.')}');
            }
            $news = News::model()->active()->findAll(array('order' => 'date DESC', 'limit' => '5'));
            $usefulArticles = UsefulArticles::model()->findAll(array('limit' => 5));
            $this->render("view", array("page" => $page, 'news'=> $news, 'usefulArticles' => $usefulArticles));
            Yii::app()->end();
        }

        $sectionA = ServiceSection::model()->findByAttributes( array('code'=>$p));
        if ( !empty($sectionA) ) {
            $_GET['id']=$sectionA->id;
            $this->forward('/services/ServiceSection/view');
            Yii::app()->end();
        }

        $article = Service::model()->findByAttributes( array('code'=>$p));
        if ( !empty($article) ) {
            $_GET['id']=$article->id;
            $this->forward('/services/Service/view');
            Yii::app()->end();
        }

        throw new CHttpException('404', 'Страница не найдена');
    }
}
