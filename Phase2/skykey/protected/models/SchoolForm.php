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
	public $email;
	public $password;
	public $confirmPassword;
	public $verifyCode;

	public function rules()
	{
		return array(
			array('schoolname, schoolphone, schooladdress,teachername, teacherfamily, teacherphone, email, password, confirmPassword', 'required'),
			// email has to be a valid email address
			array('email','email'),
			// when in register scenario, password must match confirmPassword
			array('password', 'compare', 'compareAttribute'=>'confirmPassword'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}
}
