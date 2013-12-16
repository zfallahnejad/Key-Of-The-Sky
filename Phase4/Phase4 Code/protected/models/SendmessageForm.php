<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SendmessageForm extends CFormModel
{
	public $receiver;
	public $receiverType;
	public $subject;
	public $category;
	public $body;
	public $verifyCode;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('receiverType,receiver, subject, category, body, verifyCode', 'required'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
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
			'receiverType'=>'گروه فرد دریافت کننده',
			'receiver'=>'دریافت کننده',
			'subject'=>'عنوان',
			'category'=>'دسته',
			'body'=>'متن',
			'verifyCode'=>'کد تایید',
		);
	}
}