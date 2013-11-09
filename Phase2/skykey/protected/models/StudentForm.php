<?php

class StudentForm extends CFormModel
{
	public $id;
	public $stname;
	public $stfamily;
	public $birthdate;
	public $fathername;
	public $parentcode;
	public $mosque;
	public $school;
	public $schoolid;
	public $stcode;
	public $address;
	public $picture;
	
	public function rules()
	{
		return array(
			array('stname, stfamily, fathername, parentcode, mosque, school, schoolid, stcode, address', 'required'),
			// parentcode must be 10 characters
			array('parentcode', 'length', 'is'=>10),
			array('email','email'),
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
		    'stname'=>'نام دانش آموز',
			'stfamily'=>'نام خانوادگی دانش آموز',
			'birthdate'=>'تاریخ تولد',
			'fathername'=>'نام پدر',
			'parentcode'=>'کد ملی والد',
			'mosque'=>'نام مسجد',
			'school'=>'نام مدرسه',
			'schoolid'=>'شماره مدرسه',
			'stcode'=>'کد دانش آموزی',
			'address'=>'آدرس',
			'picture'=>'عکس',
		);
	}
}
