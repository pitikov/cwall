<?php

/**
 * This is the model class for table "preaction".
 *
 * The followings are the available columns in table 'preaction':
 * @property integer $id
 * @property integer $competition
 * @property integer $team
 * @property string $published
 * @property string $state
 * @property string $representative
 * @property string $requestaddr
 * @property string $acesscode
 *
 * The followings are the available model relations:
 * @property Competition $competition0
 * @property LibTeam $team0
 * @property PreactionMember[] $preactionMembers
 */
class Preaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Preaction the static model class
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
		return 'preaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('competition, team, requestaddr', 'required'),
			array('competition, team', 'numerical', 'integerOnly'=>true),
			array('state', 'length', 'max'=>25),
			array('representative, acesscode', 'length', 'max'=>32),
			array('requestaddr', 'length', 'max'=>128),
			array('requestaddr','email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, competition, team, published, state, representative, requestaddr, acesscode', 'safe', 'on'=>'search'),
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
			'competition0' => array(self::BELONGS_TO, 'Competition', 'competition'),
			'team0' => array(self::BELONGS_TO, 'LibTeam', 'team'),
			'preactionMembers' => array(self::HAS_MANY, 'PreactionMember', 'preaction'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '№ заявки',
			'competition' => 'Соревнования',
			'team' => 'Комманда',
			'published' => 'Published',
			'state' => 'состояние',
			'representative' => 'представитель',
			'requestaddr' => 'обратный адресс',
			'acesscode' => 'код доступа',
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
		$criteria->compare('competition',$this->competition);
		$criteria->compare('team',$this->team);
		$criteria->compare('published',$this->published,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('representative',$this->representative,true);
		$criteria->compare('requestaddr',$this->requestaddr,true);
		$criteria->compare('acesscode',$this->acesscode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	protected function beforeSave()
	{
	    if ($this->acesscode == '') $this->acesscode=md5($this->competition0->title . $this->team0->title . $this->representative . $this->requestaddr);
	    $ret = parent::beforeSave();
	    return $ret;
	}
	
}