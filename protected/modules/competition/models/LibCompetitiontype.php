<?php

/**
 * This is the model class for table "lib_competitiontype".
 *
 * The followings are the available columns in table 'lib_competitiontype':
 * @property integer $id
 * @property string $prefix
 * @property string $title
 * @property string $vrvscode
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Competition[] $competitions
 * @property Round[] $rounds
 */
class LibCompetitiontype extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LibCompetitiontype the static model class
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
		return 'lib_competitiontype';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prefix, title, description', 'required'),
			array('prefix', 'length', 'max'=>15),
			array('title', 'length', 'max'=>50),
			array('vrvscode', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, prefix, title, vrvscode, description', 'safe', 'on'=>'search'),
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
			'competitions' => array(self::HAS_MANY, 'Competition', 'type'),
			'rounds' => array(self::HAS_MANY, 'Round', 'type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'prefix' => 'Prefix',
			'title' => 'Title',
			'vrvscode' => 'Vrvscode',
			'description' => 'Description',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('prefix',$this->prefix,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('vrvscode',$this->vrvscode,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}