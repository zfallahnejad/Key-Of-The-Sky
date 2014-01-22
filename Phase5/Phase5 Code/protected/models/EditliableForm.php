<?php
/**
* EditliableForm class definition
*/
class EditliableForm extends CFormModel
{
	public $name;/** Liable name Field */
	public $family;/** Liable family Field */
	public $tel;/** Liable telephone number Field */
	public $mobile;/** Liable mobile number Field */
	public $mosqueAddress;/** Mosque Adress Field */
	public $image;/** Mosque logo Field */
	public $verifyCode;/** Verification Code */

	/**
	 * Declares the validation rules for Editliable Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* verifyCode is required \n 
			* tel,mobile must be integer\n
			* image type must be jpg ir png\n
			* not required fields should define as safe attribute\n
			* verifyCode needs to be entered correctly
			*/
			// verifyCode are required
			array('verifyCode', 'required'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('name,family,tel,mobile,mosqueAddress,image','safe'),
			array('tel,mobile','numerical','integerOnly'=>true),
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
			'tel'=>'تلفن',
			'mobile'=>'تلفن همراه',
			'mosqueAddress'=>'آدرس مسجد',
			'image'=>'تصویر',
			'verifyCode'=>'کد تایید',
		);
	}
	
}