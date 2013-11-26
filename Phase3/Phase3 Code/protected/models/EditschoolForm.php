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
			array('schoolPhone,teacherPhone','numerical','integerOnly'=>true),
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
			'schoolName'=>'نام مدرسه',
			'schoolPhone'=>'شماره تلفن مدرسه',
			'schoolAddress'=>'آدرس مدرسه',
			'teacherName'=>'نام معلم',
			'teacherFamily'=>'نام خانوادگی معلم',
			'teacherPhone'=>'شماره تلفن معلم',
			'verifyCode'=>'کد تایید',
		);
	}
	
}