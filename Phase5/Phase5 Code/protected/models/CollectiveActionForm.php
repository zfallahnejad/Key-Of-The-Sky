<?php
/**
* CollectiveActionForm class definition
*/
class CollectiveActionForm extends CFormModel
{
	public $actdate;/** actdate Field */
	/**
	 * Declares the validation rules for CollectiveActionForm.
	 */
	public function rules()
	{
		return array(
			/** 
			* actdate are required
			*/
			array('actdate', 'required'),
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
			'actdate'=>'تاریخ فعالیت',
		);
	}
}