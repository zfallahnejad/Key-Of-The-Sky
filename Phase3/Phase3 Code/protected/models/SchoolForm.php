<?php

class SchoolForm extends CFormModel
{
	public $schoolname;
	public $schoolphone;
	public $schooladdress;
	public $teachername;
	public $teacherfamily;
	public $teacherphone;
	public $email;
	public $password;
	public $confirmPassword;
	public $schoolid;
	
	public function rules()
	{
		return array(
			array('schoolname, schoolphone, schooladdress, teachername, teacherfamily, teacherphone, email, password, confirmPassword, schoolid', 'required'),
			// email has to be a valid email address
			array('email','email','message'=>'فرمت {attribute} معتبر نمی باشد.'),
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
