<?php

class CollectiveScoringForm extends CFormModel
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
}