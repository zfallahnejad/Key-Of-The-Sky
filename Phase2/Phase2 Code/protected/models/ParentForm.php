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
	public $confirmPassword;
	
	public function rules()
	{
		return array(
			array('parentname, parentfamily, parentcode,homephone, email, password, confirmPassword', 'required'),
			// parentcode must be 10 characters
			array('parentcode', 'length', 'is'=>10),
			array('email','email'),
			// when in register scenario, password must match confirmPassword
			array('password', 'compare', 'compareAttribute'=>'confirmPassword'),
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
		    'parentcode'=>'کد ملی والد',
			'parentname'=>'نام والد',
			'parentfamily'=>'نام خانوادگی والد',
			'homephone'=>'شماره تلفن منزل',
			'mobilenum'=>'شماره همراه',
			'email'=>'ایمیل',
			'password'=>'رمز عبور',
			'confirmPassword'=>'تکرار رمز عبور',
		);
	}
}
