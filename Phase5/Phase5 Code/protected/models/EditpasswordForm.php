<?php
/**
* EditpasswordForm class definition
*/
class EditpasswordForm extends CFormModel
{
	public $currentpassword;/** Current password Field */
	public $newpassword;/** New password Field */
	public $confirmPassword;/** Confirm password Field */
	public $verifyCode;/** Verification Code */

	/**
	 * Declares the validation rules for Editpassword Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* currentpassword and newpassword and confirmPassword and verifyCode are required \n 
			* newpassword must match confirmPassword\n
			* verifyCode needs to be entered correctly
			*/
			// verifyCode are required
			array('currentpassword,newpassword,confirmPassword,verifyCode', 'required'),
			// newpassword must match confirmPassword
			array('confirmPassword', 'compare', 'compareAttribute'=>'newpassword'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
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
			'currentpassword'=>'رمز عبور فعلی',
			'newpassword'=>'رمز عبور جدید',
			'confirmPassword'=>'تکرار رمز عبور جدید',
			'verifyCode'=>'کد تایید',
		);
	}
	
}