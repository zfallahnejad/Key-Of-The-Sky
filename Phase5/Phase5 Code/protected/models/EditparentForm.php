<?php
/**
* EditparentForm class definition
*/
class EditparentForm extends CFormModel
{
	public $parentname;/** Parent name Field */
	public $parentfamily;/** Parent family Field */
	public $homephone;/** Parent homephone Field */
	public $mobilenum;/** Parent mobile Field */
	public $verifyCode;/** Verification Code */

	/**
	 * Declares the validation rules for Editparent Form
	 */
	public function rules()
	{
		return array(
			/** 
			* verifyCode is required \n 
			* homephone and mobilenum must be integer\n
			* not required fields should define as safe attribute\n
			* verifyCode needs to be entered correctly
			*/
			// verifyCode are required
			array('verifyCode', 'required'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('parentname,parentfamily,homephone,mobilenum','safe'),
			array('homephone,mobilenum','numerical','integerOnly'=>true),
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
			'parentname'=>'نام والد',
			'parentfamily'=>'نام خانوادگی والد',
			'homephone'=>'شماره تلفن منزل',
			'mobilenum'=>'شماره همراه',
			'verifyCode'=>'کد تایید',
		);
	}
	
}