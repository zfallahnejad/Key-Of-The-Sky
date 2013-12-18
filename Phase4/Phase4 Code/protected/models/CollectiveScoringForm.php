<?php

class CollectiveScoringForm extends CFormModel
{
	public $results;
	public $actId;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('results', 'safe'),
		);
	}
}