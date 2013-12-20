<?php

/**
 * This is the model class for table "point".
 *
 * The followings are the available columns in table 'point':
 * @property integer $actId
 * @property integer $stCode
 * @property string $year
 * @property integer $month
 * @property integer $pcounter
 *
 * The followings are the available model relations:
 * @property Refrencepoint $act
 * @property Student $stCode0
 */
class point extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'point';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('actId, stCode, year, month, pcounter', 'required'),
			array('actId, stCode, month, pcounter', 'numerical', 'integerOnly'=>true),
			array('year', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('actId, stCode, year, month, pcounter', 'safe', 'on'=>'search'),
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
			'act' => array(self::BELONGS_TO, 'Refrencepoint', 'actId'),
			'stCode0' => array(self::BELONGS_TO, 'Student', 'stCode'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'actId' => 'Act',
			'stCode' => 'St Code',
			'year' => 'Year',
			'month' => 'Month',
			'pcounter' => 'Pcounter',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('actId',$this->actId);
		$criteria->compare('stCode',$this->stCode);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('month',$this->month);
		$criteria->compare('pcounter',$this->pcounter);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return point the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
