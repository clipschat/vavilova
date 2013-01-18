<?php

class ServiceSection extends ActiveRecordModel
{
    const PAGE_SIZE = 20;
    const IMAGE_SMALL_WIDTH  = "193";
    const IMAGE_SMALL_HEIGHT = "110";
    const IMAGE_BIG_WIDTH    = "400";
    const IMAGES_DIR = 'upload/service';
    const THUMB_IMAGES_DIR = 'upload/service';

    public static $states = array(
        self::STATE_ACTIVE => 'Активна',
        self::STATE_HIDDEN => 'Скрыта'
    );

    const STATE_ACTIVE = 'active';
    const STATE_HIDDEN = 'hidden';

    public function name()
    {
        return 'Разделы статей';
    }


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function tableName()
	{
		return 'service_sections';
	}


    public function scopes()
    {
        $alias = $this->getTableAlias();
        return array(
            'active' => array('condition' => "{$alias}.state = '" . self::STATE_ACTIVE . "'"),
            'root' => array('condition' => "{$alias}.parent_id IS NULL"),
            'ordered' => array('order' => "{$alias}.id"),
        );
    }

	public function rules()
	{
		return array(
            array('meta_tags', 'safe'),
			array('name, state', 'required'),
            array('code','unique'),
			array('parent_id', 'numerical', 'integerOnly' => true),
			array('name', 'length', 'max' => 150),
            array('text', 'length', 'max' => 10000),
           	array('name', 'unique', 'attributeName' => 'name', 'className' => 'ServiceSection'),
            array('lang', 'safe'),

			array('id, name, date_create', 'safe', 'on' => 'search'),
            array(
                'image',
                'file',
                'types'      => 'jpg, jpeg, gif, png, tif',
                'allowEmpty' => true,
                'maxSize'    => 1024 * 1024 * 10,
                'tooLarge'   => 'Максимальный размер файла 10 Мб'
            ),
            array(
                'thumb_image',
                'file',
                'types'      => 'jpg, jpeg, gif, png, tif',
                'allowEmpty' => true,
                'maxSize'    => 1024 * 1024 * 10,
                'tooLarge'   => 'Максимальный размер файла 10 Мб'
            ),
		);
	}

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        //        $behaviors['FileManager'] = array(
        //            'class' => 'application.components.activeRecordBehaviors.FileManagerBehavior'
        //        );
        $behaviors['MetaTagBehavior'] = array(
            'class' => 'application.components.activeRecordBehaviors.MetaTagBehavior'
        );
        return $behaviors;
    }

	public function relations()
	{
		return array(
			'services' => array(self::HAS_MANY, 'Service', 'section_id'),
			'parent'   => array(self::BELONGS_TO, 'ServiceSection', 'parent_id'),
			'childs'   => array(self::HAS_MANY, 'ServiceSection', 'parent_id'),
		    'language' => array(self::BELONGS_TO, 'Language', 'lang')
		);
	}


	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('date_create', $this->date_create, true);

		return new ActiveDataProvider(get_class($this), array(
			'criteria' => $criteria
		));
	}


    public function delete()
    {
        foreach ($this->services as $service)
        {
            $service->delete();
        }

        parent::delete();
    }



    public function uploadFiles()
    {
        return array(
            'image' => array('dir' => self::IMAGES_DIR),
            'thumb_image' => array('dir' => self::THUMB_IMAGES_DIR),
        );
    }

    public function getImagePath(){
        return empty($this->image) ? '' : Yii::app()->getRequest()->getBaseUrl(true).'/'.self::IMAGES_DIR.'/'.$this->image ;
    }
    public function getThumbImagePath(){
        return empty($this->thumb_image) ? '' : Yii::app()->getRequest()->getBaseUrl(true).'/'.self::THUMB_IMAGES_DIR.'/'.$this->thumb_image ;
    }
}
