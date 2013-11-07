<?php

class ParentForm extends CFormModel
{
	public $parentCode;
	public $parentName;
	public $parentFamily;
	public $homePhone;
	public $mobileNum;
	public $email;
	public $password;
	public $confirmPassword;
	public $verifyCode;

	public function rules()
	{
		return array(
			array('parentCode, parentName, parentFamily, homePhone, mobileNum, email, password, confirmPassword, verifyCode', 'required'),
			// parentCode must be 10 characters
			array('parentCode', 'length', 'is'=>10),
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
		    'parentCode'=>'کد ملی والد',
			'parentName'=>'نام والد',
			'parentFamily'=>'نام خانوادگی والد',
			'homePhone'=>'شماره تلفن منزل',
			'mobileNum'=>'شماره همراه',
			'email'=>'ایمیل',
			'password'=>'رمز عبور',
			'confirmPassword'=>'تکرار رمز عبور',
			'verifyCode'=>'کد تایید',
		);
	}
}
