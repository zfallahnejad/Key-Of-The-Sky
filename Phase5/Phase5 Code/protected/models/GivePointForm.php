<?php

class GivePointForm extends CFormModel
{
	public $results; 
	public $da;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('results', 'safe'),
			array('da','required'),	
			
		);
	}
	public function attributeLabels()
	{
		return array(
				'da'=>'تاریخ',
				);
	}
}