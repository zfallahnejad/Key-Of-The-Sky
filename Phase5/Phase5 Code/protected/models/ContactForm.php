<?php
/**
 * ContactForm class.
 * ContactForm is the data structure for keeping\n
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;/** Sender name Field */
	public $email;/** Sender email Field */
	public $subject;/** Message subject Field */
	public $category;/** Message category Field */
	public $body;/** Message text Field */
	public $verifyCode;/** Verification Code */

	/**
	 * Declares the validation rules for Contact Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* name, email, subject,category, body and verifyCode are required \n 
			* email has to be a valid email address\n
			* verifyCode needs to be entered correctly
			*/
			// name, email, subject,category, body and verifyCode are required
			array('name, email, subject,category, body,verifyCode', 'required'),
			// email has to be a valid email address
			array('email', 'email','message'=>'فرمت {attribute} معتبر نمی باشد.'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.\n
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'نام',
			'email'=>'ایمیل',
			'subject'=>'عنوان',
			'category'=>'دسته',
			'body'=>'متن',
			'verifyCode'=>'کد تایید',
		);
	}
}