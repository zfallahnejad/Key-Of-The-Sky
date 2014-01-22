<?php
/**
* topStudentsForm class definition
*/
class topStudentsForm extends CFormModel
{
	public $MosqueName;/** Mosque name Field */
	public $TopNumber;/** Mosque name Field */
	public $verifyCode;/** Verification Code */
	/**
	 * Declares the validation rules for topStudents Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* MosqueName and TopNumber and verifyCodeare required \n 
			* TopNumber must be integer\n
			* Max length TopNumber must be 5\n 
			* Min length TopNumber must be 1\n 
			* verifyCode needs to be entered correctly
			*/
			// ReportType, MosqueName,... are required
			array('MosqueName,TopNumber,verifyCode','required'),
			array('TopNumber','numerical','integerOnly'=>true,'min'=>1,
				    'max'=>5,'tooSmall'=>'حداقل تعداد باید 1 باشد',
					'tooBig'=>'حداکثر تعداد باید 5 باشد'),
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
			'MosqueName'=>'نام مسجد',
			'TopNumber'=>'تعداد دانش آموزان ممتاز',
			'verifyCode'=>'کد تایید',
		);
	}
}