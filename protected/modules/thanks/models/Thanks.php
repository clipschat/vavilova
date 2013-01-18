<?php
/**
 * Модель отзывов.
 * @property string $first_name Имя пользователя, оставившего отзыв
 * @property string $last_name Фамилия пользователя, оставившего отзыв
 * @property string $phone Номер телефона пользователя, оставившего отзыв
 * @property string $email Адрес электронной почты автора отзыва
 * @property string $text Текст отзыва
 * @property bool $is_published Состояние публикации отзыва. По умолчанию = false
 * @property date $date Дата публикации отзыва
 */
class Thanks extends ActiveRecordModel
{
    const PAGE_SIZE = 10;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public function tableName()
    {
        return 'thanks';
    }


    public function name()
    {
        return 'Имя модели';
    }


    public function rules()
    {
        return array(
            array('first_name', 'required', 'message' => 'Укажите Ваше имя'),
            array('text', 'required', 'message' => 'Введите Ваш отзыв'),
            array('email', 'required', 'message' => 'Укажите правильный E-mail адрес'),
            array('email', 'email', 'message' => 'Укажите правильный E-mail адрес'),
            array('first_name, last_name', 'length', 'max' => 40),
//            array('first_name, last_name', 'ruLatAlpha'),
            array('is_published', 'numerical', 'integerOnly' => true),
            array('is_published', 'default', 'value' => '0'),
            array('first_name, last_name, email, phone', 'filter', 'filter' => 'strip_tags'),
            array('first_name, last_name, email, text, phone','filter','filter' => 'trim'),
            array('date_create', 'safe'),
            array('first_name, last_name, text, is_published, date_create', 'safe', 'on' => 'search'),
        );
    }


    public function relations()
    {
        return array();
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('is_published', $this->is_published);

        return new ActiveDataProvider(get_class($this), array(

            'criteria' => $criteria

        ));
    }

    public function beforeSave(){
        if(!$this->date_create){
            $this->date_create = date('Y-m-d');
        } else {
            $this->date_create = date('Y-m-d', strtotime($this->date_create));
        }
        return parent::beforeSave();
    }

    public function attributeLabels(){
        return array(
            "first_name" =>"Имя отправителя" ,
            "last_name" => "Фамилия отправителя",
            "email" => "Электронная почта",
            "is_published" => "Опубликовано?",
            "date_create" => "Дата создания",
            "text" => "Текст отзыва"
        );
    }

}