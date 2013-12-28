<?php

class CollectiveScoringForm extends CFormModel
{
	public $results;
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