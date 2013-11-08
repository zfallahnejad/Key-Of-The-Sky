<?php

class ParentForm extends CFormModel
{
	public $id;
	public $parentcode;
	public $parentname;
	public $parentfamily;
	public $homephone;
	public $mobilenum;
	public $email;
	public $password;

	public function rules()
	{
		return array(
			array('parentname, parentfamily, parentcode,homephone, email, password', 'required'),
			array('email','email'),
		);
	}
}
