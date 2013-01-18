<?php

class CertificateType extends ActiveRecordModel
{
    const PAGE_SIZE = 10;


    public function name()
    {
        return 'Типы сертификатов';
    }


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function tableName()
	{
		return 'certificates_types';
	}


	public function rules()
	{
		return array(
			array('name', 'length', 'max' => 50),
            array('name', 'unique', 'className' => get_class($this), 'attributeName' => 'name'),
			array('name, date_create', 'safe', 'on' => 'search'),
		);
	}


	public function relations()
	{
		return array(
		);
	}


	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('name', $this->name, true);

		return new ActiveDataProvider(get_class($this), array(
			'criteria' => $criteria
		));
	}
}