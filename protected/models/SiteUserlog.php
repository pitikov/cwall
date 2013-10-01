<?php

/**
 * This is the model class for table "site_userlog".
 *
 * The followings are the available columns in table 'site_userlog':
 * @property string $id
 * @property integer $uid
 * @property string $actiontime
 * @property string $actiontype
 * @property integer $table
 * @property integer $record
 *
 * The followings are the available model relations:
 * @property SiteTable $table0
 * @property SiteUser $u
 */
class SiteUserlog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SiteUserlog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'site_userlog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, uid, actiontime, actiontype, table', 'required'),
			array('uid, table, record', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>64),
			array('actiontype', 'length', 'max'=>26),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, actiontime, actiontype, table, record', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'table0' => array(self::BELONGS_TO, 'SiteTable', 'table'),
			'u' => array(self::BELONGS_TO, 'SiteUser', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '#',
			'uid' => 'Uid',
			'actiontime' => 'время',
			'actiontype' => 'действие',
			'table' => 'таблица БД',
			'record' => 'Запись',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('actiontime',$this->actiontime,true);
		$criteria->compare('actiontype',$this->actiontype,true);
		$criteria->compare('table',$this->table);
		$criteria->compare('record',$this->record);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
