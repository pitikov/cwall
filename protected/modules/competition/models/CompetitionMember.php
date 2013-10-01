<?php

/**
 * This is the model class for table "competition_member".
 *
 * The followings are the available columns in table 'competition_member':
 * @property integer $id
 * @property integer $round
 * @property integer $cid
 * @property integer $startposition
 *
 * The followings are the available model relations:
 * @property LibCompetitor $c
 * @property Round $round0
 */
class CompetitionMember extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompetitionMember the static model class
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
		return 'competition_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('round, cid', 'required'),
			array('round, cid, startposition', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, round, cid, startposition', 'safe', 'on'=>'search'),
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
			'c' => array(self::BELONGS_TO, 'LibCompetitor', 'cid'),
			'round0' => array(self::BELONGS_TO, 'Round', 'round'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'round' => 'Round',
			'cid' => 'Cid',
			'startposition' => 'Startposition',
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
		$criteria->compare('round',$this->round);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('startposition',$this->startposition);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}