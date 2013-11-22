<?php

class EditparentForm extends CFormModel
{
	public $parentname;
	public $parentfamily;
	public $homephone;
	public $mobilenum;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// verifyCode are required
			array('verifyCode', 'required'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('parentname,parentfamily,homephone,mobilenum','safe'),
			array('homephone,mobilenum','numerical','integerOnly'=>true),
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
			'parentname'=>'نام والد',
			'parentfamily'=>'نام خانوادگی والد',
			'homephone'=>'شماره تلفن منزل',
			'mobilenum'=>'شماره همراه',
			'verifyCode'=>'کد تایید',
		);
	}
	
}