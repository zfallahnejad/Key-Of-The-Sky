<?php

class GivePointForm extends CFormModel
{
	public $actTopic;
	public $results; 
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			//array('actTopic','required'),
			//array('results', 'boolean'),
			array('results', 'safe'),
			
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
			'actTopic'=>'عنوان فعالیت',
		);
	 }
}