<?php

class StudentForm extends CFormModel
{
	public $id;
	public $stname;
	public $stfamily;
	public $birthdate;
	public $fathername;
	public $parentcode;
	public $mosque;
	public $school;
	public $schoolid;
	public $stcode;
	public $address;
	public $picture;
	
	public function rules()
	{
		return array(
			array('stname, stfamily, fathername, parentcode, mosque, school, schoolid, stcode, address', 'required'),
			array('email','email'),
		);
	}
}
