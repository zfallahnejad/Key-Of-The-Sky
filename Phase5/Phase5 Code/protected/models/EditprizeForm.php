<?php
/**
* EditprizeForm class definition
*/
class EditprizeForm extends CFormModel
{
	public $rewardTopic;/** Reward Topic Field */
	public $neededPoint;/** Reward Point Field */
	

	/**
	 * Declares the validation rules for Editprize Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* verifyCode is required \n 
			* neededPoint must be integer\n
			* verifyCode needs to be entered correctly
			*/
			// verifyCode are required
			//array('verifyCode', 'required'),
			// verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('neededPoint','required'),
			array('neededPoint','numerical','integerOnly'=>true),
			
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
			'rewardTopic'=>'عنوان جایزه',
			'neededPoint'=>'امتیاز لازم',
			
		);
	}
	
}