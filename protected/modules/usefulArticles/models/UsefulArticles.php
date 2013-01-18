<?php
/**
 * Модель полезных статей(работает с таблицей useful_articles)
 * @property int $id Идентификатор записи в таблице
 * @property string $title Заголовок статьи
 * @property string $text Текст статьи
 * @property int $category_id Идентификатор связанной категории
 * @property UsefulArticlesCategory $category Категория, которой принадлежит статья
 */
class UsefulArticles extends ActiveRecordModel
{

    public static function model($classname = __CLASS__)
    {
        return parent::model($classname);
    }

    public function name()
    {
        return "Полезные статьи";
    }

    public function tableName()
    {
        return "useful_articles";
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);

        return new ActiveDataProvider(get_class($this), array(
            'criteria' => $criteria
        ));
    }

    public function rules()
    {
        return array(
            array('meta_tags', 'safe'),
            array('title, text, category_id, url_code', 'required')
        );
    }

    public function attributeLabels()
    {
        return array(
            "id" => "Идентификатор статьи",
            "title" => "Заголовок статьи",
            "text" => "Текст статьи",
            "category_id" => "Категория",
            "category" => "Категория",
            "url_code" => "URL код"
        );
    }

    public function relations()
    {
        return array(
            'category' => array(self::BELONGS_TO, 'UsefulArticlesCategory', 'category_id'),
        );
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['MetaTagBehavior'] = array(
            'class' => 'application.components.activeRecordBehaviors.MetaTagBehavior'
        );
        return $behaviors;
    }
}
