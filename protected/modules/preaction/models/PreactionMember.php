<?php

/**
 * This is the model class for table "preaction_member".
 *
 * The followings are the available columns in table 'preaction_member':
 * @property integer $id
 * @property integer $preaction
 * @property integer $round
 * @property integer $uid
 * @property string $cpecialnote
 *
 * The followings are the available model relations:
 * @property Preaction $preaction0
 * @property Round $round0
 * @property LibCompetitor $u
 */
class PreactionMember extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PreactionMember the static model class
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
		return 'preaction_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('preaction, round, uid', 'required'),
			array('preaction, round, uid', 'numerical', 'integerOnly'=>true),
			array('cpecialnote', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, preaction, round, uid, cpecialnote', 'safe', 'on'=>'search'),
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
			'preaction0' => array(self::BELONGS_TO, 'Preaction', 'preaction'),
			'round0' => array(self::BELONGS_TO, 'Round', 'round'),
			'u' => array(self::BELONGS_TO, 'LibCompetitor', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '№',
			'preaction' => 'Заявка',
			'round' => 'Тур',
			'uid' => 'участник',
			'cpecialnote' => 'доп.инфо',
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
		$criteria->compare('preaction',$this->preaction);
		$criteria->compare('round',$this->round);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('cpecialnote',$this->cpecialnote,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}