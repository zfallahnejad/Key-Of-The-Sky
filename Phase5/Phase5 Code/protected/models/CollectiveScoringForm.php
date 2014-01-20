<?php

class CollectiveScoringForm extends CFormModel
{
	public $results;
	public $actDate;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('results', 'safe'),
			array('actDate','required'),
		);
	}
	 public function attributeLabels()
	 {
		return array(
			'actDate'=>'تاریخ انجام فعالیت',
		);
	}
}