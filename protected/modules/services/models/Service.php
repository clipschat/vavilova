<?php

class Service extends ActiveRecordModel
{
    const PAGE_SIZE = 10;

    public static $states = array(
        self::STATE_ACTIVE => 'Активна',
        self::STATE_HIDDEN => 'Скрыта'
    );

    const STATE_ACTIVE = 'active';
    const STATE_HIDDEN = 'hidden';

    public function name()
    {
        return 'Статьи';
    }


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['MetaTagBehavior'] = array(
            'class' => 'application.components.activeRecordBehaviors.MetaTagBehavior'
        );
//        $behaviors['FileManager'] = array(
//            'class' => 'application.components.activeRecordBehaviors.FileManagerBehavior'
//        );

        return $behaviors;
    }


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function tableName()
	{
		return 'service';
	}
	
	
	public function scopes() 
	{
        $alias = $this->getTableAlias();
		return array(
            'active' => array('condition' => "{$alias}.state = '" . self::STATE_ACTIVE . "'"),
            'ordered' => "priority ASC"
		);
	}

    public function defaultScope()
    {
        return array(
            'order' => "priority ASC"
        );
    }

	public function rules()
	{
		return array(
            array('meta_tags, priority', 'safe'),
			array('title, text, section_id, state', 'required'),
            array('code','unique'),
			array('title', 'length', 'max' => 400),
            array('priority, lang', 'safe'),
			array('title, text, date_create', 'safe', 'on' => 'search'),
		);
	}


	public function relations()
	{
		return array(
            'section'  => array(self::BELONGS_TO, 'ServiceSection', 'section_id'),
			'language' => array(self::BELONGS_TO, 'Language', 'lang')
		);
	}


	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('title', $this->title, true);
		$criteria->compare('code', $this->code, true);
		$criteria->compare('text', $this->text, true);
		$criteria->compare('date_create', $this->date_create, true);
		$criteria->compare('section_id', $this->section_id, true);

		return new ActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
            'sort'=>array('defaultOrder'=>'priority')
		));
	}
	
	


    public function getContent()
    {
        if (Yii::app()->controller->checkAccess('ServiceAdmin_Update'))
        {
            $this->text.= "<br/> <a href='/services/serviceAdmin/update/id/{$this->id}' class='admin_link'>Редактировать</a>";
        }

        return $this->text;
    }


    public function updateUrl()
    {
        return "/services/serviceAdmin/update/id/{$this->id}";
    }
}
