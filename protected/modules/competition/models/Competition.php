<?php

/**
 * This is the model class for table "competition".
 *
 * The followings are the available columns in table 'competition':
 * @property integer $cid
 * @property string $title
 * @property string $emblem
 * @property string $localtion
 * @property string $date
 * @property integer $type
 * @property integer $main_referee
 * @property integer $main_secretar
 * @property string $class
 *
 * The followings are the available model relations:
 * @property LibCompetitiontype $type0
 * @property SiteUser $mainReferee
 * @property SiteUser $mainSecretar
 * @property Preaction[] $preactions
 * @property Round[] $rounds
 *
 * The followings are the competition list
 * @property int memberCount
 */
class Competition extends CActiveRecord
{
	public $memberCount=0;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Competition the static model class
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
		return 'competition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, localtion, date, type, main_referee, main_secretar', 'required'),
			array('type, main_referee, main_secretar', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('localtion', 'length', 'max'=>128),
			array('class', 'length', 'max'=>14),
			array('emblem', 'safe'),
			array('title', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, title, emblem, localtion, date, type, main_referee, main_secretar, class', 'safe', 'on'=>'search'),
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
			'type0' => array(self::BELONGS_TO, 'LibCompetitiontype', 'type'),
			'mainReferee' => array(self::BELONGS_TO, 'SiteUser', 'main_referee'),
			'mainSecretar' => array(self::BELONGS_TO, 'SiteUser', 'main_secretar'),
			'preactions' => array(self::HAS_MANY, 'Preaction', 'competition'),
			'rounds' => array(self::HAS_MANY, 'Round', 'competition'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cid' => '№',
			'title' => 'Название',
			'emblem' => 'Эмблема',
			'localtion' => 'место проведения',
			'date' => 'дата',
			'type' => 'вид',
			'main_referee' => 'гл.судья',
			'main_secretar' => 'гл.секретарь',
			'class' => 'класс',
			'memberCount'=>'участников'
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

		$criteria->compare('cid',$this->cid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('emblem',$this->emblem,true);
		$criteria->compare('localtion',$this->localtion,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('main_referee',$this->main_referee);
		$criteria->compare('main_secretar',$this->main_secretar);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('memberCount',$this->memberCount,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function afterFind()
	{
    	    $this->memberCount = count(Yii::app()->db->createCommand()
	    ->select('id')->from('competition_member')
	    ->where('id='.$this->cid)
	    ->queryAll());

	    /// @todo Преобразовывать поле date к виду, ожидаемому виджетом представления

	    parent::afterFind();
	}


	protected function beforeSave()
	{
	    /// @todo Преобразовывать поле date к виду, ожидаемому базой данных

	    $ret = parent::beforeSave();
	    return $ret;
	}


}
