<?php

/**
 * This is the model class for table "parent".
 *
 * The followings are the available columns in table 'parent':
 * @property integer $parentCode
 * @property string $parentName
 * @property string $parentFamily
 * @property integer $homePhone
 * @property integer $mobileNum
 * @property string $password
 * @property string $email
 */
class parentclass extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parentCode, parentName, parentFamily, homePhone, password, email', 'required'),
			array('parentCode, homePhone, mobileNum', 'numerical', 'integerOnly'=>true),
			array('parentName, parentFamily, password, email', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('parentCode, parentName, parentFamily, homePhone, mobileNum, password, email', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'parentCode' => 'Parent Code',
			'parentName' => 'Parent Name',
			'parentFamily' => 'Parent Family',
			'homePhone' => 'Home Phone',
			'mobileNum' => 'Mobile Num',
			'password' => 'Password',
			'email' => 'Email',
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

		$criteria->compare('parentCode',$this->parentCode);
		$criteria->compare('parentName',$this->parentName,true);
		$criteria->compare('parentFamily',$this->parentFamily,true);
		$criteria->compare('homePhone',$this->homePhone);
		$criteria->compare('mobileNum',$this->mobileNum);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return parentclass the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
