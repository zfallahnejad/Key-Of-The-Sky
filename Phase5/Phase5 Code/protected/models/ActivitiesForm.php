<?php
/**
* ActivitiesForm class definition
*/
class ActivitiesForm extends CFormModel
{
	public $MosqueName;/** List of MosqueNames */
	public $Activities;/** List of Activity names */
	public $startDate; /** StartDate Field */
	public $FinishDate;/** FinishDate Field */
	public $verifyCode;/** Verification Code */
	/**
	 * Declares the validation rules for ActivitiesForm.
	 */
	public function rules()
	{
		return array(
			/** 
			* ReportType, MosqueName,startDate,FinishDate are required\n 
			* verifyCode needs to be entered correctly
			*/
			// ReportType, MosqueName,... are required
			array('MosqueName,Activities,startDate,FinishDate,verifyCode','required'),
			array('startDate', 'DateValidation','FinishDate'=>'FinishDate'), 
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
			'Activities'=>'عنوان فعالیت',
			'startDate'=>'از تاریخ',
			'FinishDate'=>'تا تاریخ',
			'verifyCode'=>'کد تایید',
		);
	}
	/** 
	* Function for comparing StartDate and FinishDate
	*/
	public function DateValidation($attribute,$params)
	{
		if (!($this->$attribute<$this->$params['FinishDate']))
		{
			 $this->addError($attribute, 'محدوده تاریخ مناسب نمی باشد.');
		}
	}
}