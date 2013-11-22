<?php

class EditschoolForm extends CFormModel
{
	public $schoolName;
	public $schoolPhone;
	public $schoolAddress;
	public $teacherName;
	public $teacherFamily;
	public $teacherPhone;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// verifyCode are required
			array('verifyCode', 'required'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('schoolName, schoolPhone, schoolAddress, teacherName, teacherFamily, teacherPhone','safe'),
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
			'schoolname'=>'نام مدرسه',
			'schoolphone'=>'شماره تلفن مدرسه',
			'schooladdress'=>'آدرس مدرسه',
			'teachername'=>'نام معلم',
			'teacherfamily'=>'نام خانوادگی معلم',
			'teacherphone'=>'شماره تلفن معلم',
			'verifyCode'=>'کد تایید',
		);
	}
	
}