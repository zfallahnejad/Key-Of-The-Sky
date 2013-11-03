<?php

class SchoolForm extends CFormModel
{
	//public $id;
	public $schoolname;
	public $schoolphone;
	public $schooladdress;
	public $teachername;
	public $teacherfamily;
	public $teacherphone;
	public $username;
	public $password;
	public $email;

	public function rules()
	{
		return array(
			array('schoolname, schoolphone, schooladdress,teachername, teacherfamily, teacherphone, username, password, email', 'required'),
			array('email','email'),
		);
	}
}
