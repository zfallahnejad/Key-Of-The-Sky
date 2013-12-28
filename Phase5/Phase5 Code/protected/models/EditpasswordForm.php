<?php

class EditpasswordForm extends CFormModel
{
	public $currentpassword;
	public $newpassword;
	public $confirmPassword;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// verifyCode are required
			array('currentpassword,newpassword,confirmPassword,verifyCode', 'required'),
			// $newpassword must match confirmPassword
			array('newpassword', 'compare', 'compareAttribute'=>'confirmPassword'),
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
			'currentpassword'=>'رمز عبور فعلی',
			'newpassword'=>'رمز عبور جدید',
			'confirmPassword'=>'تکرار رمز عبور جدید',
			'verifyCode'=>'کد تایید',
		);
	}
	
}