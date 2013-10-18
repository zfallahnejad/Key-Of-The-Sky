<?php

/**
 * Contact class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	//
	public $Id;
	public $name;
	public $family;
	public $mosqueName;
	public $email;
	public $pasword;
	public $confirmPassword;
	public $tel;
	public $mobile;
	public $mosqueAddress;
	public $image;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, family, mosqueName, email, pasword, confirmPassword, tel, mosqueAddress', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	
}