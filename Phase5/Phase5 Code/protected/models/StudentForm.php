<?php
/**
* StudentForm class definition
*/
class StudentForm extends CFormModel
{
	public $id;
	public $stname;/** Student name Field */
	public $stfamily;/** Student family Field */
	public $fathername;/** Student father name Field */
	public $parentcode;/** Student address Field */
	public $school;/** School name Field */
	public $schoolid;/** School id Field */
	public $stcode;/** Student code Field */
	public $address;/** Student address Field */
	public $picture;/** Student picture Field */
	public $birthdate;/** Student birthdate Field */
	/**
	 * Declares the validation rules for Student Form.
	 */
	public function rules()
	{
		return array(
			/** 
			* stname are stfamily are fathername are parentcode are school are schoolid are stcode are address are required \n 
			* length of parentcode must be 10\n
			* length of stcode must be 10\n
			* picture type must be jpg ir png\n
			* not required fields should define as safe attribute\n
			* stcode and parentcodea and schoolid must be integer\n
			*/
			array('stname, stfamily, fathername, parentcode, school, schoolid, stcode, address', 'required'),
			// parentcode must be 10 characters
			array('parentcode', 'length', 'is'=>10,'message'=>'طول کد ملی بایستی 10 باشد.'),
			array('stcode', 'length', 'is'=>10,'message'=>'طول کد ملی بایستی 10 باشد.'),
			array('picture,birthdate', 'safe'),
			array('stcode,parentcode,schoolid','numerical','integerOnly'=>true),
			array('picture','file','types'=>array('jpg','png'),'allowEmpty'=>TRUE,'message'=>'فرمت تصویر باید jpg یا png باشد),'),
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
			'stcode'=>'کد ملی دانش آموز',
			'address'=>'آدرس',
			'picture'=>'عکس',
			'birthdate'=>'تاریخ تولد',
		);
	}
}
