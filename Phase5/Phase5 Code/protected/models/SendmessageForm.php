<?php
/**
* SendmessageForm class definition
*/
class SendmessageForm extends CFormModel
{
	public $receiver;/** Receiver name Field */
	public $receiverType;/** Receiver type Field(mosqueliabel or parent or school teacher) */
	public $subject;/** Message subject Field */
	public $category;/** Message category Field */
	public $body;/** Message text Field */
	public $verifyCode;/** Verification Code */
	/**
	 * Declares the validation rules for Sendmessage Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* receiverType and receiver and subject and category and body verifyCode are required \n 
			* verifyCode needs to be entered correctly
			*/
			// receiverType,receiver, subject, category, body, verifyCode are required
			array('receiverType,receiver, subject, category, body, verifyCode', 'required'),
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
			'receiverType'=>'گروه فرد دریافت کننده',
			'receiver'=>'دریافت کننده',
			'subject'=>'عنوان',
			'category'=>'دسته',
			'body'=>'متن',
			'verifyCode'=>'کد تایید',
		);
	}
}