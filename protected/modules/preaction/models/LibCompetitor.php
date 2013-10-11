<?php

/**
 * This is the model class for table "lib_competitor".
 *
 * The followings are the available columns in table 'lib_competitor':
 * @property integer $uid
 * @property string $name
 * @property string $dob
 * @property string $gender
 * @property integer $range
 * @property integer $team
 *
 * The followings are the available model relations:
 * @property CompetitionMember[] $competitionMembers
 * @property LibSportrange $range0
 * @property LibTeam $team0
 * @property PreactionMember[] $preactionMembers
 */
class LibCompetitor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LibCompetitor the static model class
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
		return 'lib_competitor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, dob, gender', 'required'),
			array('range, team', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('dob', 'length', 'max'=>4),
			array('gender', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, name, dob, gender, range, team', 'safe', 'on'=>'search'),
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
			'competitionMembers' => array(self::HAS_MANY, 'CompetitionMember', 'cid'),
			'range0' => array(self::BELONGS_TO, 'LibSportrange', 'range'),
			'team0' => array(self::BELONGS_TO, 'LibTeam', 'team'),
			'preactionMembers' => array(self::HAS_MANY, 'PreactionMember', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'name' => 'Name',
			'dob' => 'Dob',
			'gender' => 'Gender',
			'range' => 'Range',
			'team' => 'Team',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('range',$this->range);
		$criteria->compare('team',$this->team);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}