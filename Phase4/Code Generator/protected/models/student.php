<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property string $stName
 * @property string $stFamily
 * @property string $fatherName
 * @property integer $stCode
 * @property string $school
 * @property string $address
 * @property string $birthdate
 * @property string $picture
 * @property integer $parentCode
 * @property integer $Id
 * @property integer $schoolId
 *
 * The followings are the available model relations:
 * @property Point[] $points
 * @property Mosqueculturalliablee $id
 */
class student extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stName, stFamily, fatherName, stCode, school, address, parentCode, Id', 'required'),
			array('stCode, parentCode, Id, schoolId', 'numerical', 'integerOnly'=>true),
			array('stName, stFamily, fatherName, school, address', 'length', 'max'=>255),
			array('birthdate, picture', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('stName, stFamily, fatherName, stCode, school, address, birthdate, picture, parentCode, Id, schoolId', 'safe', 'on'=>'search'),
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
			'points' => array(self::HAS_MANY, 'Point', 'stCode'),
			'id' => array(self::BELONGS_TO, 'Mosqueculturalliablee', 'Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'stName' => 'St Name',
			'stFamily' => 'St Family',
			'fatherName' => 'Father Name',
			'stCode' => 'St Code',
			'school' => 'School',
			'address' => 'Address',
			'birthdate' => 'Birthdate',
			'picture' => 'Picture',
			'parentCode' => 'Parent Code',
			'Id' => 'ID',
			'schoolId' => 'School',
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

		$criteria->compare('stName',$this->stName,true);
		$criteria->compare('stFamily',$this->stFamily,true);
		$criteria->compare('fatherName',$this->fatherName,true);
		$criteria->compare('stCode',$this->stCode);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('parentCode',$this->parentCode);
		$criteria->compare('Id',$this->Id);
		$criteria->compare('schoolId',$this->schoolId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
