<?php

/**
 * This is the model class for table "mosqueculturalliablee".
 *
 * The followings are the available columns in table 'mosqueculturalliablee':
 * @property integer $Id
 * @property string $name
 * @property string $family
 * @property string $mosqueName
 * @property string $email
 * @property string $password
 * @property integer $tel
 * @property integer $mobile
 * @property string $mosqueAddress
 * @property string $image
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Googlemap $googlemap
 * @property Participantcounter[] $participantcounters
 * @property Reward[] $rewards
 * @property Student[] $students
 */
class mosqueculturalliablee extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mosqueculturalliablee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, family, mosqueName, email, password, tel, mosqueAddress', 'required'),
			array('tel, mobile, status', 'numerical', 'integerOnly'=>true),
			array('name, family, mosqueName, email, password', 'length', 'max'=>255),
			array('image', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, name, family, mosqueName, email, password, tel, mobile, mosqueAddress, image, status', 'safe', 'on'=>'search'),
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
			'googlemap' => array(self::HAS_ONE, 'Googlemap', 'Id'),
			'participantcounters' => array(self::HAS_MANY, 'Participantcounter', 'Id'),
			'rewards' => array(self::HAS_MANY, 'Reward', 'Id'),
			'students' => array(self::HAS_MANY, 'Student', 'Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'name' => 'Name',
			'family' => 'Family',
			'mosqueName' => 'Mosque Name',
			'email' => 'Email',
			'password' => 'Password',
			'tel' => 'Tel',
			'mobile' => 'Mobile',
			'mosqueAddress' => 'Mosque Address',
			'image' => 'Image',
			'status' => 'Status',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('family',$this->family,true);
		$criteria->compare('mosqueName',$this->mosqueName,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('tel',$this->tel);
		$criteria->compare('mobile',$this->mobile);
		$criteria->compare('mosqueAddress',$this->mosqueAddress,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return mosqueculturalliablee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
