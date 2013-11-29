<?php

class GivePointForm extends CFormModel
{
	public $actTopic;
	public $actPoint;
	public $actId;
	public $stCode;
	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// verifyCode are required
			//array('verifyCode', 'required'),
			// verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('actTopic','required'),
			
			
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
			'actTopic'=>'',
			
			
		);
	}
	
}