<?php

class EditstudentForm extends CFormModel
{
	public $stname;
	public $stfamily;
	public $address;
	public $picture;
	public $birthdate;
	public $verifyCode;
	
	public function rules()
	{
		return array(
			array('verifyCode', 'required'),
			// parentcode must be 10 characters
			array('stname, stfamily, address, picture,birthdate', 'safe'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('picture','file','types'=>array('jpg','png'),'allowEmpty'=>TRUE,'message'=>'فرمت تصویر باید jpg یا png باشد),'),
		);
	}
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	 public function attributeLabels()
	 {
		return array(
		    'stname'=>'نام دانش آموز',
			'stfamily'=>'نام خانوادگی دانش آموز',
			'address'=>'آدرس',
			'picture'=>'عکس',
			'birthdate'=>'تاریخ تولد',
			'verifyCode'=>'کد تایید',
		);
	}
}
