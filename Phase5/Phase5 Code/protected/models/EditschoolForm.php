<?php
/**
* EditschoolForm class definition
*/
class EditschoolForm extends CFormModel
{
	public $schoolName;/** School name Field */
	public $schoolPhone;/** School phone Field */
	public $schoolAddress;/** School address Field */
	public $teacherName;/** Teacher name Field */
	public $teacherFamily;/** Teacher family Field */
	public $teacherPhone;/** Teacher phone Field */
	public $verifyCode;/** Verification Code */

	/**
	 * Declares the validation rules for Editschool Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* verifyCode is required \n 
			* schoolPhone and teacherPhone must be integer\n
			* not required fields should define as safe attribute\n
			* verifyCode needs to be entered correctly\n
			*/
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