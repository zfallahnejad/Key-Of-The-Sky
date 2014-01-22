<?php
class ActivitiesForm extends CFormModel
{
	public $MosqueName;
	public $Activities;
	public $startDate;
	public $FinishDate;
	public $verifyCode;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// ReportType, MosqueName,... are required
			array('MosqueName,Activities,startDate,FinishDate,verifyCode','required'),
			array('startDate', 'DateValidation','FinishDate'=>'FinishDate'), 
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
			'Activities'=>'عنوان فعالیت',
			'startDate'=>'از تاریخ',
			'FinishDate'=>'تا تاریخ',
			'verifyCode'=>'کد تایید',
		);
	}
	public function DateValidation($attribute,$params)
	{
		if (!($this->$attribute<$this->$params['FinishDate']))
		{
			 $this->addError($attribute, 'محدوده تاریخ مناسب نمی باشد.');
		}
	}
}