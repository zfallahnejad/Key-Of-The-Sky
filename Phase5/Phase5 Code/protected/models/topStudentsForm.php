<?php
class topStudentsForm extends CFormModel
{
	public $MosqueName;
	public $TopNumber;
	public $verifyCode;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// ReportType, MosqueName,... are required
			array('MosqueName,TopNumber,verifyCode','required'),
			//array('TopNumber','max','is'=>5),
			//array('TopNumber','min','is'=>1),
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
			'MosqueName'=>'نام مسجد',
			'TopNumber'=>'تعداد دانش آموزان ممتاز',
			'verifyCode'=>'کد تایید',
		);
	}
}