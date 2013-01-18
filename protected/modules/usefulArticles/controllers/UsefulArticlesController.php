<?php
/**
 * Контроллер для клиентской части модуля "Полезные статьи"
 */
class UsefulArticlesController extends BaseController
{

    public static function actionsTitles()
    {
        return array(
            "Index" => "Полезные статьи",
            "View" => "Просмотр статьи",
            "ByCategory" => "Статьи в категории"
        );
    }

    public function actionIndex()
    {
        //$categories = UsefulArticlesCategory::model()->with("articles")->findAll();
        $articles = UsefulArticles::model()->findAll();

        $this->redirect(Yii::app()->createUrl('usefulArticles/usefulArticles/view',array('url_code'=>$articles[0]->url_code)));
        //$this->render('index', array('categories' => $categories, 'articles' => $articles));
    }

    /**
     * Показывает отдельную полезную статью
     * @param $url_code URL код для этой статьи
     * @throws CHttpException Выбрасывается ошибка 404, если запись не найдена
     */
    public function actionView($url_code)
    {
        $categories = UsefulArticlesCategory::model()->with("articles")->findAll();
        $article = UsefulArticles::model()->findByAttributes(array('url_code' => $url_code));
        if ($article === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $this->render('view', array('article' => $article, 'categories' => $categories));
    }

    public function actionByCategory($id)
    {
        $categories = UsefulArticlesCategory::model()->with('articles')->findAll();
        $category = $this->loadCategoryModel($id);

        $this->render('byCategory', array('category' => $category, 'categories' => $categories));
    }

    public function loadModel($id)
    {
        $model = UsefulArticles::model()->findByPk((int)$id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

    public function loadCategoryModel($id)
    {
        $model = UsefulArticlesCategory::model()->findByPk((int)$id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }
}
