<?php
/**
* ParentForm class definition
*/
class ParentForm extends CFormModel
{
	public $parentcode;/** Parent code Field */
	public $parentname;/** Parent name Field */
	public $parentfamily;/** Parent family Field */
	public $homephone;/** Parent homephone number Field */
	public $mobilenum;/** Parent mobile number Field */
	public $email;/** Parent email Field */
	public $password;/** Parent password Field */
	public $confirmPassword;/** confirm password Field */
	
	/**
	 * Declares the validation rules for Parent Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* parentname and parentfamily and parentcode and homephone and email and password and confirmPassword are required \n 
			* length of parentcode must be 10\n
			* email has to be a valid email address\n
			* in register scenario, password must match confirmPassword
			* not required fields should define as safe attribute\n
			* homephone and mobilenum and parentcode must be integer\n
			*/
			array('parentname, parentfamily, parentcode,homephone, email, password, confirmPassword', 'required'),
			// parentcode must be 10 characters
			array('parentcode', 'length', 'is'=>10,'message'=>'طول کد ملی بایستی 10 باشد.'),
			array('email','email','message'=>'فرمت {attribute} معتبر نمی باشد.'),
			// when in register scenario, password must match confirmPassword
			array('confirmPassword', 'compare', 'compareAttribute'=>'password'),
			array('mobilenum','safe'),
			array('homephone,mobilenum,parentcode','numerical','integerOnly'=>true,'message'=>'{attribute} باید عدد باشد.'),
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
