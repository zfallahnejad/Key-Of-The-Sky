<?php

class RegisterForm extends CFormModel
{
	public $Id;
	public $name;
	public $family;
	public $mosqueName;
	public $email;
	public $password;
	public $confirmPassword;
	public $tel;
	public $mobile;
	public $mosqueAddress;
	public $image;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email,... are required
			array('name, family, mosqueName, email, password, confirmPassword, tel, mosqueAddress, verifyCode', 'required','message'=>'فیلد {attribute} نمی تواند خالی باشد.'),
			// email has to be a valid email address
			array('email', 'email','message'=>'فرمت {attribute} معتبر نمی باشد.'),
			// when in register scenario, password must match confirmPassword
			array('password', 'compare', 'compareAttribute'=>'confirmPassword','message'=>'کلمه عبور وارد شده و تکرار آن مطابقت ندارند'),
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
			'name'=>'نام',
			'family'=>'نام خانوادگی',
			'mosqueName'=>'نام مسجد',
			'email'=>'ایمیل',
			'password'=>'رمز عبور',
			'confirmPassword'=>'تکرار رمز عبور',
			'tel'=>'تلفن',
			'mobile'=>'تلفن همراه',
			'mosqueAddress'=>'آدرس مسجد',
			'image'=>'تصویر',
			'verifyCode'=>'کد تایید',
		);
	}
	
}