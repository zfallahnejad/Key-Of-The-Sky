<?php

class ParticipantForm extends CFormModel
{
	public $stName;
	public $stFamily;
	public $fatherName;
	public $stCode;
	public $school;
	public $mosque;
	public $address;
	public $birthdate;
	public $picture;
	public $parentCode;
	public $Id;
	public $schoolId;
	public $verifyCode;

	public function rules()
	{
		return array(
			array('stName, stFamily, fatherName, stCode, mosque, birthdate, $parentCode, Id, verifyCode', 'required'),
			// email has to be a valid email address
			array('email','email'),
			// when in register scenario, password must match confirmPassword
			array('password', 'compare', 'compareAttribute'=>'confirmPassword'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
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
			'schoolname'=>'نام شرکت کننده',
			'schoolphone'=>'شماره تلفن مدرسه',
			'schooladdress'=>'آدرس مدرسه',
			'teachername'=>'نام معلم',
			'teacherfamily'=>'نام خانوادگی معلم',
			'teacherphone'=>'شماره تلفن معلم',
			'email'=>'ایمیل',
			'password'=>'رمز عبور',
			'confirmPassword'=>'تکرار رمز عبور',
			'verifyCode'=>'کد تایید',
		);
	}
}
