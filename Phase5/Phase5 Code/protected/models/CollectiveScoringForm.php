<?php
/**
* CollectiveScoringForm class definition
*/
class CollectiveScoringForm extends CFormModel
{
	public $results;/** check box list for each student */
	public $actDate;/** actdate Field */
	/**
	 * Declares the validation rules for CollectiveScoring Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* checkboxs are required
			* not required fields should define as safe attribute
			*/
			array('results', 'safe'),
			array('actDate','required'),
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
			'actDate'=>'تاریخ انجام فعالیت',
		);
	}
}