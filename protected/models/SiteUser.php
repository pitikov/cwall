<?php

/**
 * This is the model class for table "site_user".
 *
 * The followings are the available columns in table 'site_user':
 * @property integer $uid
 * @property string $login
 * @property string $pwdhash
 * @property string $name
 * @property string $control_question
 * @property string $control_request
 *
 * The followings are the available model relations:
 * @property Competition[] $competitions
 * @property Competition[] $competitions1
 * @property SiteUserlog[] $siteUserlogs
 */
class SiteUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SiteUser the static model class
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
		return 'site_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, pwdhash, name, control_question, control_request', 'required'),
			array('login', 'length', 'max'=>16),
			array('pwdhash, name', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, login, pwdhash, name, control_question, control_request', 'safe', 'on'=>'search'),
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
			'competitions' => array(self::HAS_MANY, 'Competition', 'main_referee'),
			'competitions1' => array(self::HAS_MANY, 'Competition', 'main_secretar'),
			'siteUserlogs' => array(self::HAS_MANY, 'SiteUserlog', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => '№',
			'login' => 'login',
			'pwdhash' => 'hash',
			'name' => 'Имя',
			'control_question' => 'контрольный вопросс',
			'control_request' => 'ответ',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('pwdhash',$this->pwdhash,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('control_question',$this->control_question,true);
		$criteria->compare('control_request',$this->control_request,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}