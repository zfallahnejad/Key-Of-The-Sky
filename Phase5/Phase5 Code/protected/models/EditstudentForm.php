<?php
/**
* EditstudentForm class definition
*/
class EditstudentForm extends CFormModel
{
	public $stname;/** Student name Field */
	public $stfamily;/** Student family Field */
	public $address;/** Student address Field */
	public $picture;/** Student picture Field */
	public $birthdate;/** Student birthdate Field */
	public $verifyCode;/** Verification Code */
	
	/**
	 * Declares the validation rules for Editstudent Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* verifyCode is required \n 
			* picture type must be jpg ir png\n
			* not required fields should define as safe attribute\n
			* verifyCode needs to be entered correctly\n
			*/
			array('verifyCode', 'required'),
			// parentcode must be 10 characters
			array('stname, stfamily, address, picture,birthdate', 'safe'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('picture','file','types'=>array('jpg','png'),'allowEmpty'=>TRUE,'message'=>'فرمت تصویر باید jpg یا png باشد),'),
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
		    'stname'=>'نام دانش آموز',
			'stfamily'=>'نام خانوادگی دانش آموز',
			'address'=>'آدرس',
			'picture'=>'عکس',
			'birthdate'=>'تاریخ تولد',
			'verifyCode'=>'کد تایید',
		);
	}
}
