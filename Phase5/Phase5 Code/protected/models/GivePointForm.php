<?php
class GivePointForm extends CFormModel
{
	public $results; 
	public $date;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('results', 'safe'),
			array('date','required'),		
		);
	}
	public function attributeLabels()
	{
		return array('date'=>'تاریخ انجام فعالیت');
	}
}