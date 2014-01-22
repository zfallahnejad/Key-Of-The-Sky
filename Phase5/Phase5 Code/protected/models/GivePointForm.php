<?php
/**
* GivePointForm class definition
*/
class GivePointForm extends CFormModel
{
	public $results; /** check box list for each activity */
	public $date;/** date Field */
	/**
	 * Declares the validation rules for GivePoint Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* date is required
			* not required fields should define as safe attribute
			*/
			array('results', 'safe'),
			array('date','required'),		
		);
	}
	/**
	 * Declares customized attribute labels.\n
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array('date'=>'تاریخ انجام فعالیت');
	}
}