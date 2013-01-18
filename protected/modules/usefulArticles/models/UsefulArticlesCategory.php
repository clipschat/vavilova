<?php
/**
 * Модель для таблицы useful_articles_categories
 * @property int id Идентификатор категории
 * @property string name Название категории
 */
class UsefulArticlesCategory extends ActiveRecordModel
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function name()
    {
        return "Категории полезных статей";
    }

    public function attributeLabels()
    {
        return array(
            "id" => "Идентификатор категории",
            "name" => "Название категории"
        );
    }

    public function tableName()
    {
        return "useful_articles_categories";
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);

        return new ActiveDataProvider(get_class($this), array(
            'criteria' => $criteria
        ));
    }

    public function rules()
    {
        return array(
            array("name", "required", "message" => "Укажите название категории")
        );
    }

    public function relations()
    {
        return array(
            'articles' => array(CActiveRecord::HAS_MANY, 'UsefulArticles', 'category_id')
        );
    }
}
