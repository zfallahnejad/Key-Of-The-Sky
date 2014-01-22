<?php
/**
* RegisterForm class definition
*/
class RegisterForm extends CFormModel
{
	public $Id;/** Liable id Field */
	public $name;/** Liable name Field */
	public $family;/** Liable family Field */
	public $mosqueName;/** Mosque name Field */
	public $email;/** Liable email Field */
	public $password;/** Liable password Field */
	public $confirmPassword;/** confirm password Field */
	public $tel;/** Liable telephone number Field */
	public $mobile;/** Liable mobile number Field */
	public $mosqueAddress;/** Mosque Adress Field */
	public $image;/** Mosque logo Field */
	public $verifyCode;/** Verification Code */

	/**
	 * Declares the validation rules for Register Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* name and family and mosqueName and email and password and confirmPassworda and tel and mosqueAddressand verifyCodeare required \n 
			* email has to be a valid email address\n
			* in register scenario, password must match confirmPassword\n
			* tel and mobile must be integer\n
			* image type must be jpg ir png\n
			* not required fields should define as safe attribute\n
			* verifyCode needs to be entered correctly
			*/
			// name, email,... are required
			array('name, family, mosqueName, email, password, confirmPassword, tel, mosqueAddress, verifyCode', 'required'),
			// email has to be a valid email address
			array('email', 'email','message'=>'فرمت {attribute} معتبر نمی باشد.'),
			// when in register scenario, password must match confirmPassword
			array('confirmPassword', 'compare', 'compareAttribute'=>'password'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// not required fields should define as safe attribute
			array('mobile,image', 'safe'), 
			array('tel,mobile','numerical','integerOnly'=>true,'message'=>'{attribute} باید عدد باشد.'),
			array('image','file','types'=>array('jpg','png'),'allowEmpty'=>TRUE,'message'=>'فرمت تصویر باید jpg یا png باشد),'),

		);
	}

	/**
	 * Declares customized attribute labels.\n
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