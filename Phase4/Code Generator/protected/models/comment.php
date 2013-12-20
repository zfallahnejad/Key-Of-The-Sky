<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $commentId
 * @property string $SenderName
 * @property string $SenderMail
 * @property string $ReceiverMail
 * @property string $Category
 * @property string $Subject
 * @property string $Body
 * @property integer $Status
 * @property string $SendDate
 * @property string $SendTime
 */
class comment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SenderMail, ReceiverMail, Category, Subject, Body, Status, SendDate, SendTime', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('SenderName, SenderMail, ReceiverMail, Category, Subject', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('commentId, SenderName, SenderMail, ReceiverMail, Category, Subject, Body, Status, SendDate, SendTime', 'safe', 'on'=>'search'),
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
			'commentId' => 'Comment',
			'SenderName' => 'Sender Name',
			'SenderMail' => 'Sender Mail',
			'ReceiverMail' => 'Receiver Mail',
			'Category' => 'Category',
			'Subject' => 'Subject',
			'Body' => 'Body',
			'Status' => 'Status',
			'SendDate' => 'Send Date',
			'SendTime' => 'Send Time',
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

		$criteria->compare('commentId',$this->commentId);
		$criteria->compare('SenderName',$this->SenderName,true);
		$criteria->compare('SenderMail',$this->SenderMail,true);
		$criteria->compare('ReceiverMail',$this->ReceiverMail,true);
		$criteria->compare('Category',$this->Category,true);
		$criteria->compare('Subject',$this->Subject,true);
		$criteria->compare('Body',$this->Body,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('SendDate',$this->SendDate,true);
		$criteria->compare('SendTime',$this->SendTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
