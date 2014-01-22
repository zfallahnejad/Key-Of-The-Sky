<?php
/**
* SetposForm class definition
*/
class SetposForm extends CFormModel
{
	public $Id;/** Mosque Id Field */
	public $lat;/** Mosque lat Field */
	public $lng;/** Mosque lng Field */

	/**
	 * Declares the validation rules for Setpos Form.
	 */
	public function rules()
	{
		return array(
		/** 
			* max length of lata nd lng must be 33\n
			* not required fields should define as safe attribute\n
			* Id must be integer
			*/
			array('Id', 'numerical', 'integerOnly'=>true),
			array('lat, lng', 'length', 'max'=>33),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, lat, lng', 'safe'),
			
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
			'lat'=>'عرض جغرافیایی',
			'lng'=>'طول جغرافیایی',
		);
	}
	
}