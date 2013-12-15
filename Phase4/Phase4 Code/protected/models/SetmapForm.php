<?php

class SetmapForm extends CFormModel
{
	public $Id;
	public $lat;
	public $lng;
	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('Id', 'numerical', 'integerOnly'=>true),
			array('lat, lng', 'length', 'max'=>33),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, lat, lng', 'safe'),
			
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
			'lat'=>'عرض جغرافیایی',
			'lng'=>'طول جغرافیایی',
		);
	}
}