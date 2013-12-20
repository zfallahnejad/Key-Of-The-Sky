<?php

/**
 * This is the model class for table "reward".
 *
 * The followings are the available columns in table 'reward':
 * @property string $rewardTopic
 * @property integer $neededPoint
 * @property integer $Id
 *
 * The followings are the available model relations:
 * @property Mosqueculturalliablee $id
 */
class reward extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reward';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rewardTopic, neededPoint, Id', 'required'),
			array('neededPoint, Id', 'numerical', 'integerOnly'=>true),
			array('rewardTopic', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rewardTopic, neededPoint, Id', 'safe', 'on'=>'search'),
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
			'id' => array(self::BELONGS_TO, 'Mosqueculturalliablee', 'Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rewardTopic' => 'Reward Topic',
			'neededPoint' => 'Needed Point',
			'Id' => 'ID',
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

		$criteria->compare('rewardTopic',$this->rewardTopic,true);
		$criteria->compare('neededPoint',$this->neededPoint);
		$criteria->compare('Id',$this->Id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return reward the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
