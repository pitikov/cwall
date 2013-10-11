<?php

/**
 * This is the model class for table "lib_team".
 *
 * The followings are the available columns in table 'lib_team':
 * @property integer $gid
 * @property string $title
 * @property string $region
 *
 * The followings are the available model relations:
 * @property LibCompetitor[] $libCompetitors
 * @property Preaction[] $preactions
 */
class LibTeam extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LibTeam the static model class
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
		return 'lib_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('title, region', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gid, title, region', 'safe', 'on'=>'search'),
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
			'libCompetitors' => array(self::HAS_MANY, 'LibCompetitor', 'team'),
			'preactions' => array(self::HAS_MANY, 'Preaction', 'team'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gid' => 'Gid',
			'title' => 'Title',
			'region' => 'Region',
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

		$criteria->compare('gid',$this->gid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('region',$this->region,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}