<?php

class EditliableForm extends CFormModel
{
	public $name;
	public $family;
	public $tel;
	public $mobile;
	public $mosqueAddress;
	public $image;
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
			array('name,family,tel,mobile,mosqueAddress,image','safe'),
			array('tel,mobile','numerical','integerOnly'=>true),
			array('image','file','types'=>array('jpg','png'),'allowEmpty'=>TRUE,'message'=>'فرمت تصویر باید jpg یا png باشد),'),
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
			'name'=>'نام',
			'family'=>'نام خانوادگی',
			'tel'=>'تلفن',
			'mobile'=>'تلفن همراه',
			'mosqueAddress'=>'آدرس مسجد',
			'image'=>'تصویر',
			'verifyCode'=>'کد تایید',
		);
	}
	
}