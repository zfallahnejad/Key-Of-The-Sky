<?php
/**
* SchoolForm class definition
*/
class SchoolForm extends CFormModel
{
	public $schoolname;/** School name Field */
	public $schoolphone;/** School phone Field */
	public $schooladdress;/** School address Field */
	public $teachername;/** Teacher name Field */
	public $teacherfamily;/** Teacher family Field */
	public $teacherphone;/** Teacher phone Field */
	public $email;/** Teacher email Field */
	public $password;/** Teacher password Field */
	public $confirmPassword;/** confirm password Field */
	public $schoolid;/** School id Field */
	/**
	 * Declares the validation rules for school Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* schoolnamea and schoolphone and schooladdress and teachername and teacherfamily and teacherphone and email and password and confirmPassword and schoolid are required \n
			* email has to be a valid email address\n
			* in register scenario, password must match confirmPassword\n 
			* schoolid and schoolPhone and teacherPhone must be integer\n
			*/
			array('schoolname, schoolphone, schooladdress, teachername, teacherfamily, teacherphone, email, password, confirmPassword, schoolid', 'required'),
			// email has to be a valid email address
			array('email','email','message'=>'فرمت {attribute} معتبر نمی باشد.'),
			// when in register scenario, password must match confirmPassword
			array('confirmPassword', 'compare', 'compareAttribute'=>'password'),
			array('schoolid,schoolphone,teacherphone','numerical','integerOnly'=>true,'message'=>'{attribute} باید عدد باشد.'),
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
			'schoolname'=>'نام مدرسه',
			'schoolphone'=>'شماره تلفن مدرسه',
			'schooladdress'=>'آدرس مدرسه',
			'teachername'=>'نام معلم',
			'teacherfamily'=>'نام خانوادگی معلم',
			'teacherphone'=>'شماره تلفن معلم',
			'email'=>'ایمیل',
			'password'=>'رمز عبور',
			'confirmPassword'=>'تکرار رمز عبور',
			'schoolid'=>'کد مدرسه',
		);
	}

}
