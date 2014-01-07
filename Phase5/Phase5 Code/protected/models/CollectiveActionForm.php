<?php

class CollectiveActionForm extends CFormModel
{
	public $actda;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('actda', 'safe'),
		);
	}
}