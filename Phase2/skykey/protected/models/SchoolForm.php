<?php

class SchoolForm extends CFormModel
{
	public $id;
	public $schoolname;
	public $schoolphone;
	public $schooladdress;
	public $teachername;
	public $teacherfamily;
	public $teacherphone;
	public $email;
	public $password;
	

	public function rules()
	{
		return array(
			array('schoolname, schoolphone, schooladdress,teachername, teacherfamily, teacherphone, email, password', 'required'),
			array('email','email'),
		);
	}
}
