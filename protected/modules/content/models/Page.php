<?php

class Page extends ActiveRecordModel
{
    const PAGE_SIZE = 10;
    const HEAD_IMAGE_WIDTH  = "960";
    const HEAD_IMAGE_HEIGHT = "300";
    const HEAD_IMAGES_DIR = 'upload/head_images';



    public function name()
    {
        return 'Страницы';
    }


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function tableName()
	{
		return 'pages';
	}

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['FileManager'] = array(
            'class' => 'application.components.activeRecordBehaviors.FileManagerBehavior'
        );
        $behaviors['MetaTagBehavior'] = array(
            'class' => 'application.components.activeRecordBehaviors.MetaTagBehavior'
        );
        return $behaviors;
    }

	public function rules()
	{
		return array(
            array('meta_tags', 'safe'),
			array('title, lang', 'required'),
			array('is_published', 'numerical', 'integerOnly' => true),
			array('page_settings_id', 'numerical', 'integerOnly' => true),
			array('code', 'length', 'max' => 250),
			array('title', 'length', 'max'=>200),
			array('text', 'safe'),
            array('title, code', 'filter', 'filter' => 'strip_tags'),
            array(
                'image',
                'file',
                'types'      => 'jpg, jpeg, gif, png, tif',
                'allowEmpty' => true,
                'maxSize'    => 1024 * 1024 * 10,
                'tooLarge'   => 'Максимальный размер файла 10 Мб'
            ),
            
			array('id, title, code, text, is_published, date_create', 'safe', 'on'=>'search'),
		);
	}


	public function relations()
	{
		return array(
		    'language' => array(self::BELONGS_TO, 'Language', 'lang'),
		    'page_settings' => array(self::HAS_ONE, 'page_settings_id', 'lang')
		);
	}


	public function search()
	{	
		$criteria = new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('is_published',$this->is_published);
		$criteria->compare('date_create',$this->date_create,true);

		return new ActiveDataProvider(get_class($this), array(
			'criteria' => $criteria
		));
	}


    public function getHref()
    {
        $url = trim($this->code);
        if ($url)
        {
            if ($url[0] != "/")
                $url = "/page/{$url}";

            return $url;
        }
        else
        {
            return "/page/" . $this->id;
        }
    }


    public function beforeSave()
    {
        if (parent::beforeSave())
        {	
        	if ($this->code != '/')
        	{
        		$this->code = trim($this->code, "/");
        	}
            
            return true;
        }
    }
    
    
    public function getContent() 
    {
    	$content = $this->text;

        if (Yii::app()->controller->checkAccess('PageAdmin_Update'))
        {
            $content.= "<br/><a href='/content/pageAdmin/update/id/{$this->id}' class='admin_link'>Редактировать</a>";
        }
    	
    	return $content;
    }
    
    public function getImagePath(){
        return empty($this->image) ? '' : Yii::app()->getRequest()->getBaseUrl(true).'/'.self::HEAD_IMAGES_DIR.'/'.$this->image ;
    }
    public function uploadFiles()
    {
        return array(
            'image' => array('dir' => self::HEAD_IMAGES_DIR),
        );
    }
}
