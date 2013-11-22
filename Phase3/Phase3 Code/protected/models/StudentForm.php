<?php

class StudentForm extends CFormModel
{
	public $id;
	public $stname;
	public $stfamily;
	public $fathername;
	public $parentcode;
	public $school;
	public $schoolid;
	public $stcode;
	public $address;
	public $picture;
	public $birthdate;
	
	public function rules()
	{
		return array(
			array('stname, stfamily, fathername, parentcode, school, schoolid, stcode, address', 'required'),
			// parentcode must be 10 characters
			array('parentcode', 'length', 'is'=>10,'message'=>'طول کد ملی بایستی 10 باشد.'),
			array('picture,birthdate', 'safe'),
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
			'fathername'=>'نام پدر',
			'parentcode'=>'کد ملی والد',
			'school'=>'نام مدرسه',
			'schoolid'=>'شماره مدرسه',
			'stcode'=>'کد دانش آموزی',
			'address'=>'آدرس',
			'picture'=>'عکس',
			'birthdate'=>'تاریخ تولد',
		);
	}
}
