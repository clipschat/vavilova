<?php

class Faq extends ActiveRecordModel
{
    const PAGE_SIZE = 10;


    public function name()
    {
        return 'Вопросы и ответы';
    }


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function tableName()
	{
		return 'faq';
	}

    public function scopes()
    {
        $alias = $this->getTableAlias();
        return array_merge(
            parent::scopes(),
            array(
                'last'      => array('order' => $alias.'.date_answer DESC')
            )
        );
    }
    public function beforeSave()
    {
        if (!$this->date_question)
        {
            $this->date_question = date("Y-m-d");
        }
        if (!$this->date_answer){
            $this->date_answer = date("Y-m-d H:i:s");
        }
        if (!empty(Yii::app()->user->id)){
            $this->answer_author = Yii::app()->user->id;
        }

        return parent::beforeSave();
    }

    public function getAuthorAnswer() {
        return $this->user ? $this->user->position : '';
    }

	public function rules()
	{
		return array(
		    array('first_name', 'required', 'message'=>'Укажите Ваше имя'),
            array('question', 'required', 'message'=>'Введите Ваш вопрос'),
            array('email', 'required', 'message'=>'Укажите правильный E-mail адрес'),
            array('email', 'email', 'message'=>'Укажите правильный E-mail адрес'),

            array('answer, answer_author', 'safe'),

            array('date_create, date_question, date_answer, date_notify', 'safe'),

            array('first_name, last_name','length', 'max' => 40),
            array('first_name, last_name','ruLatAlpha'),
			array('is_published', 'numerical', 'integerOnly'=>true),
            array('phone', 'phone'),
            array('is_published, answer', 'unsafe', 'on' => 'ClientSide'),
            array(
                'first_name, last_name, email, phone',
                'filter',
                'filter' => 'strip_tags'
            ),
            array('question', 'filter', 'filter' => 'strip_tags', 'on' => 'ClientSide'),
            array(
                'first_name, last_name, email, question, answer, phone',
                'filter',
                'filter' => 'trim'
            ),
			array('first_name, last_name, question, answer, is_published, date_create', 'safe', 'on' => 'search'),
		);
	}
    public function relations()
    {
		return array(
            'user'     => array(self::BELONGS_TO, 'User', 'answer_author'),
        );
    }

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
		$criteria->compare('question',$this->question, true);
		$criteria->compare('answer',$this->answer, true);
		$criteria->compare('is_published',$this->is_published);
		$criteria->compare('date_create',$this->date_create, true);

		return new ActiveDataProvider(get_class($this), array(
			'criteria' => $criteria
		));
	}
}
