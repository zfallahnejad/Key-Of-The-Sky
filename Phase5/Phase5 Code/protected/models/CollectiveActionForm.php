<?php

class CollectiveActionForm extends CFormModel
{
	public $actdate;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('actdate', 'required'),
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
			'actdate'=>'تاریخ فعالیت',
		);
	}
}