<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	public function actionMosqueHome()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('MosqueHome');
	}
	public function actionParentHome()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('ParentHome');
	}
	public function actionSchoolHome()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('SchoolHome');
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		$refreshCaptcha = true;
		if(isset($_POST['ContactForm']))
		{
			$refreshCaptcha = false;
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model,
		'refreshCaptcha' => $refreshCaptcha));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())	//$this->redirect(Yii::app()->user->returnUrl);
			{
				if (Yii::app()->user->getId()==1)
				{
					$this->redirect(array('/site/MosqueHome'));
				}
				elseif (Yii::app()->user->getId()==2)
				{
					$this->redirect(array('/site/SchoolHome'));
				}
				elseif (Yii::app()->user->getId()==3)
				{
					$this->redirect(array('/site/ParentHome'));
				}
				
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	public function actionRegister()
	{
		$model=new RegisterForm;
		$refreshCaptcha = true;
		if(isset($_POST['RegisterForm']))
		{
			$refreshCaptcha = false;
			$model->attributes=$_POST['RegisterForm'];
			if($model->validate())
			{
				$name=($model->name);
				$family=($model->family);
				$mosqueName =($model->mosqueName);
				$email=($model->email);
				$password=sha1($model->password);
				$confirmPassword= sha1($model->confirmPassword);
				$tel=($model->tel);
		 		$mobile=($model->mobile);
				$mosqueAddress=($model->mosqueAddress);
				$image='=?UTF-8?B?'.base64_encode($model->image).'?=';
				
				$connection=Yii::app()->db;
				$connection->active=TRUE;
				
				$sql0="SELECT Count(*) FROM `mosqueculturalliablee` WHERE `email` ='$email'";
				$dataReader=$connection->createCommand($sql0)->queryScalar();
				if($dataReader !=0){
					Yii::app()->user->setFlash('register','ایمیل وارد شده در پایگاه داده موجود می باشد');
				}
				else{				
					$sql="INSERT INTO mosqueculturalliablee (name,family,mosqueName, email, password, tel, mobile, mosqueAddress, image) VALUES(:name,:family, :mosqueName, :email, :password, :tel, :mobile, :mosqueAddress, :image)";
					$command=$connection->createCommand($sql);
					
					$command->bindParam(":name",$name,PDO::PARAM_STR);
					$command->bindParam(":family",$family,PDO::PARAM_STR);
					$command->bindParam(":mosqueName",$mosqueName,PDO::PARAM_STR);
					$command->bindParam(":email",$email,PDO::PARAM_STR);
					$command->bindParam(":password",$password,PDO::PARAM_STR);
					$command->bindParam(":tel",$tel,PDO::PARAM_STR);
					$command->bindParam(":mobile",$mobile,PDO::PARAM_STR);
					$command->bindParam(":mosqueAddress",$mosqueAddress,PDO::PARAM_STR);
					$command->bindParam(":image",$image,PDO::PARAM_STR);
				
					$command->execute();
				
					Yii::app()->user->setFlash('register','اطلاعات شما با موفقیت ثبت و اکانت شما ایجاد گردید.');
				}	
				$connection->active=false;
				$name = ":name";
				$family= ":family";
				$mosqueName = ":mosque";
				$email = ":email";
				$password = ":password";
				$confirmPassword = ":confirm";
				$tel = ":tel";
				$mobile = ":mobile";
				$mosqueAddress = ":mosque";
				$image = ":image";

				$this->refresh();
			}
		}
		$this->render('register',array('model'=>$model,
		'refreshCaptcha' => $refreshCaptcha));
	}
	public function actionschool()
	{
		$model =new SchoolForm;
		if(isset($_POST['SchoolForm']))
		{
			$model->attributes=$_POST['SchoolForm'];
			if($model->validate())
			{
				$schoolid=($model->schoolid);
				$schoolname=($model->schoolname);
				$schoolphone=($model->schoolphone);
				$schooladdress =($model->schooladdress);
				$teachername=($model->teachername);
				$teacherfamily=($model->teacherfamily);
				$teacherphone=($model->teacherphone);
				$email=($model->email);
				$password=sha1($model->password);
				$password2=($model->password);
						
				$connection=Yii::app()->db;
				$connection->active=TRUE;
				$sql0="SELECT Count(*) FROM `school` WHERE `email` ='$email'";
				$dataReader=$connection->createCommand($sql0)->queryScalar();
				if($dataReader !=0){
					Yii::app()->user->setFlash('school','ایمیل وارد شده در پایگاه داده موجود می باشد');
				}
				else{
					$sql="INSERT INTO school (schoolId,schoolName,schoolPhone,schoolAddress, teacherName, teacherFamily, teacherPhone, email, password) VALUES(:schoolid,:schoolName,:schoolPhone,:schoolAddress, :teacherName, :teacherFamily, :teacherPhone, :email, :password)";
					$command=$connection->createCommand($sql);
				
					$command->bindParam(":schoolid",$schoolid,PDO::PARAM_STR);
					$command->bindParam(":schoolName",$schoolname,PDO::PARAM_STR);
					$command->bindParam(":schoolPhone",$schoolphone,PDO::PARAM_STR);
					$command->bindParam(":schoolAddress",$schooladdress,PDO::PARAM_STR);
					$command->bindParam(":teacherName",$teachername,PDO::PARAM_STR);
					$command->bindParam(":teacherFamily",$teacherfamily,PDO::PARAM_STR);
					$command->bindParam(":teacherPhone",$teacherphone,PDO::PARAM_STR);
					$command->bindParam(":email",$email,PDO::PARAM_STR);
					$command->bindParam(":password",$password,PDO::PARAM_STR);
				
					$command->execute();
				
					$to=$email;
					$subject="Account Information in Key-Of-The-Sky";
					$message="Your User Name is $email \n Your Password is $password2";
					$headers = "From: admin@keyofthesky.ir";
					$result=mail($to,$subject,$message,$headers);
				
					Yii::app()->user->setFlash('school','اطلاعات شما با موفقیت ثبت و اکانت شما ایجاد گردید.');
				}
				$connection->active=false;
				
				$schoolid=":schoolid";
				$schoolname = ":schoolName";
				$schoolphone= ":schoolPhone";
				$schooladdress = ":schoolAddress";
				$teachername = ":teacherName";
				$teacherfamily = ":teacherFamily";
				$teacherphone = ":teacherPhone";
				$email = ":email";
				$password = ":password";

				$this->refresh();
				}
			}
				$this->render('school',array('model'=>$model));
		}
		public function actionparent()
		{
		$model =new ParentForm;
		
		if(isset($_POST['ParentForm']))
		{
			$model->attributes=$_POST['ParentForm'];
			if($model->validate())
			{
				$parentname=($model->parentname);
				$parentfamily=($model->parentfamily);
				$parentcode =($model->parentcode);
				$homephone=($model->homephone);
				$mobilenum=($model->mobilenum);
				$email=($model->email);
				$password=sha1($model->password);
				$password2=($model->password);
						
				$connection=Yii::app()->db;
				$connection->active=TRUE;
				$sql0="SELECT Count(*) FROM `mosqueculturalliablee` WHERE `email` ='$email'";
				$dataReader=$connection->createCommand($sql0)->queryScalar();
				if($dataReader !=0){
					Yii::app()->user->setFlash('register','ایمیل وارد شده در پایگاه داده موجود می باشد');
				}
				else{
					$sql="INSERT INTO parent (parentName,parentFamily,parentCode, homePhone, mobileNum, email, password) VALUES(:parentName,:parentFamily, :parentCode, :homePhone, :mobileNum, :email, :password)";
					$command=$connection->createCommand($sql);
				
					$command->bindParam(":parentName",$parentname,PDO::PARAM_STR);
					$command->bindParam(":parentFamily",$parentfamily,PDO::PARAM_STR);
					$command->bindParam(":parentCode",$parentcode,PDO::PARAM_STR);
					$command->bindParam(":homePhone",$homephone,PDO::PARAM_STR);
					$command->bindParam(":mobileNum",$mobilenum,PDO::PARAM_STR);
					$command->bindParam(":email",$email,PDO::PARAM_STR);
					$command->bindParam(":password",$password,PDO::PARAM_STR);
				
					$command->execute();
				
					$to=$email;
					$subject="Account Information in Key-Of-The-Sky";
					$message="Your User Name is $email \n Your Password is $password2";
					$headers = "From: admin@keyofthesky.ir";
					$result=mail($to,$subject,$message,$headers);
				
					Yii::app()->user->setFlash('parent','اطلاعات شما با موفقیت ثبت و اکانت شما ایجاد گردید.');
				}
				$connection->active=false;
				
				$parentname = ":parentName";
				$parentfamily= ":parentFamily";
				$parentcode = ":parentCode";
				$homephone = ":homePhone";
				$mobilenum = ":mobileNum";
				$email = ":email";
				$password = ":password";

				$this->refresh();
				}			
			}
		$this->render('parent',array('model'=>$model));
	}
	public function actionstudent()
	{
		$model =new StudentForm;
		if(isset($_POST['StudentForm']))
		{
			$model->attributes=$_POST['StudentForm'];
			if($model->validate())
			{
				$stname=($model->stname);
				$stfamily=($model->stfamily);
				$fathername=($model->fathername);
				$parentcode=($model->parentcode);
				$school=($model->school);
				$schoolid=($model->schoolid);
				$stcode=($model->stcode);
				$address=($model->address);
				$picture=($model->picture);
				$birthdate=($model->birthdate);
						
				$connection=Yii::app()->db;
				$connection->active=TRUE;
				
				$sql0="SELECT Count(*) FROM `student` WHERE `stCode` ='stcode'";
				$dataReader=$connection->createCommand($sql0)->queryScalar();
				if($dataReader !=0){
					Yii::app()->user->setFlash('student','کد دانش آموزی وارد شده در پایگاه داده موجود می باشد');
				}
				else{
					$temp=Yii::app()->user->name;
					$sql1="SELECT Id FROM `mosqueculturalliablee` WHERE `email` ='$temp'";
					$Id=$connection->createCommand($sql1)->queryScalar();
					
					$sql="INSERT INTO student (stName, stFamily, fatherName, parentCode, Id, school, schoolId, stCode, address, picture, birthdate) VALUES(:stName, :stFamily, :fatherName, :parentCode, :Id , :school, :schoolId, :stCode, :address, :picture,:birthdate)";
					$command=$connection->createCommand($sql);
				
					$command->bindParam(":stName",$stname,PDO::PARAM_STR);
					$command->bindParam(":stFamily",$stfamily,PDO::PARAM_STR);
					$command->bindParam(":fatherName",$fathername,PDO::PARAM_STR);
					$command->bindParam(":parentCode",$parentcode,PDO::PARAM_STR);
					$command->bindParam(":Id",$Id,PDO::PARAM_STR);
					$command->bindParam(":school",$school,PDO::PARAM_STR);
					$command->bindParam(":schoolId",$schoolid,PDO::PARAM_STR);
					$command->bindParam(":stCode",$stcode,PDO::PARAM_STR);
					$command->bindParam(":address",$address,PDO::PARAM_STR);
					$command->bindParam(":picture",$picture,PDO::PARAM_STR);
					$command->bindParam(":birthdate",$birthdate,PDO::PARAM_STR);
				
					$command->execute();
				
					Yii::app()->user->setFlash('student','اطلاعات با موفقیت ثبت گردید.');
				}
				$connection->active=false;
				
				$stname = ":stName";
				$stfamily= ":stFamily";
				$fathername = ":fatherName";
				$parentcode = ":parentCode";
				$Id = ":Id";
				$school = ":school";
				$schoolid = ":schoolId";
				$stcode = ":stCode";
				$address = ":address";
				$picture = ":picture";
				$birthdate = ":birthdate";
				
				$this->refresh();
			}
		}
		$this->render('student',array('model'=>$model));
	}	
	public function actionEditliable()
	{
		$mail=Yii::app()->user->name;
		$refreshCaptcha = true;
		$model=new EditliableForm;
		$liables = Yii::app()->db->createCommand()->select('name,family,tel,mobile,mosqueAddress,image')->from('mosqueculturalliablee')->where('email=:mail', array(':mail'=>$mail))->queryRow();
		$model->name=$liables['name'];
		$model->family=$liables['family'];
		$model->tel=$liables['tel'];
		$model->mobile=$liables['mobile'];
		$model->mosqueAddress=$liables['mosqueAddress'];
		$model->image=$liables['image'];
		
		if(isset($_POST['EditliableForm']))
		{
			$refreshCaptcha = false;
			$model->attributes=$_POST['EditliableForm'];
			
			$name=($model->name);
			$family=($model->family);
			$tel=($model->tel);
		 	$mobile=($model->mobile);
			$mosqueAddress=($model->mosqueAddress);
			$image='=?UTF-8?B?'.base64_encode($model->image).'?=';
				
			if($model->validate())
			{
				$command = Yii::app()->db->createCommand();
				//build and execute the following SQL:
				//UPDATE `mosqueculturalliablee`
				$command->update('mosqueculturalliablee', array('name'=>$name,'family'=>$family,'tel'=>$tel,'mobile'=>$mobile,'mosqueAddress'=>$mosqueAddress,'image'=>$image,), 'email=:email', array(':email'=>$mail));
				$command->execute();
				
				Yii::app()->user->setFlash('editliable','تغییرات با موفقیت در پایگاه داده ثبت گردید.');
				
				$name = ":name";
				$family= ":family";
				$tel = ":tel";
				$mobile = ":mobile";
				$mosqueAddress = ":mosque";
				$image = ":image";

				$this->refresh();
			}
		}
		$this->render('editliable',array('model'=>$model,
		'refreshCaptcha' => $refreshCaptcha));
	}
	public function actionEditschool()
	{
		$mail=Yii::app()->user->name;
		$refreshCaptcha = true;
		$model=new EditschoolForm;
		$liables = Yii::app()->db->createCommand()->select('schoolName,schoolPhone,schoolAddress,teacherName,teacherFamily,teacherPhone')->from('school')->where('email=:mail', array(':mail'=>$mail))->queryRow();
		$model->schoolName=$liables['schoolName'];
		$model->schoolPhone=$liables['schoolPhone'];
		$model->schoolAddress=$liables['schoolAddress'];
		$model->teacherName=$liables['teacherName'];
		$model->teacherFamily=$liables['teacherFamily'];
		$model->teacherPhone=$liables['teacherPhone'];
		
		if(isset($_POST['EditschoolForm']))
		{
			$refreshCaptcha = false;
			$model->attributes=$_POST['EditschoolForm'];
			
			$schoolName=($model->schoolName);
			$schoolPhone=($model->schoolPhone);
			$schoolAddress =($model->schoolAddress);
			$teacherName=($model->teacherName);
			$teacherFamily=($model->teacherFamily);
			$teacherPhone=($model->teacherPhone);
				
			if($model->validate())
			{
				$command = Yii::app()->db->createCommand();
				$command->update('school', array('schoolName'=>$schoolName,'schoolPhone'=>$schoolPhone,'schoolAddress'=>$schoolAddress,'teacherName'=>$teacherName,'teacherFamily'=>$teacherFamily,'teacherPhone'=>$teacherPhone,), 'email=:email', array(':email'=>$mail));
				$command->execute();
				
				Yii::app()->user->setFlash('editschool','تغییرات با موفقیت در پایگاه داده ثبت گردید.');
				
				$this->refresh();
			}
		}
		$this->render('editschool',array('model'=>$model,'refreshCaptcha' => $refreshCaptcha));
	}
	public function actionEditparent()
	{
		$mail=Yii::app()->user->name;
		$refreshCaptcha = true;
		$model=new EditparentForm;
		$parent = Yii::app()->db->createCommand()->select('parentname,parentfamily,homephone,mobilenum')->from('parent')->where('email=:mail', array(':mail'=>$mail))->queryRow();
		$model->parentname=$parent['parentname'];
		$model->parentfamily=$parent['parentfamily'];
		$model->homephone=$parent['homephone'];
		$model->mobilenum=$parent['mobilenum'];
		
		if(isset($_POST['EditparentForm']))
		{
			$refreshCaptcha = false;
			$model->attributes=$_POST['EditparentForm'];
			
			$parentname=($model->parentname);
			$parentfamily=($model->parentfamily);
			$homephone=($model->homephone);
			$mobilenum=($model->mobilenum);
			
			if($model->validate())
			{				
				$command = Yii::app()->db->createCommand();
				$command->update('parent', array('parentname'=>$parentname,'parentfamily'=>$parentfamily,'homephone'=>$homephone,'mobilenum'=>$mobilenum,), 'email=:email', array(':email'=>$mail));
				$command->execute();
				
				Yii::app()->user->setFlash('editparent','تغییرات با موفقیت در پایگاه داده ثبت گردید.');
				
				$this->refresh();
			}
		}
		$this->render('editparent',array('model'=>$model,'refreshCaptcha' => $refreshCaptcha));
	}
	
		
	
	public function actionEditpassword()
	{
		$mail=Yii::app()->user->name;
		$refreshCaptcha = true;
		$model=new EditpasswordForm;
		if(isset($_POST['EditpasswordForm']))
		{
			$refreshCaptcha = false;
			$model->attributes=$_POST['EditpasswordForm'];
			$currentpassword=($model->currentpassword);
			$newpassword=sha1($model->newpassword);
			
			if($model->validate())
			{				
				if (Yii::app()->user->getId()==1)
				{
					$password = Yii::app()->db->createCommand()->select('password')->from('mosqueculturalliablee')->where('email=:mail', array(':mail'=>$mail))->queryScalar();
					if($password==sha1($currentpassword)){
						$command = Yii::app()->db->createCommand();
						$command->update('mosqueculturalliablee', array('password'=>$newpassword), 'email=:email', array(':email'=>$mail));
						$command->execute();
						Yii::app()->user->setFlash('editpassword','رمز عبور تغییر یافت.');
						$this->refresh();
					}
					else{
						Yii::app()->user->setFlash('editpassword','رمز عبور معتبر نمی باشد');
					}
				}
				elseif (Yii::app()->user->getId()==2)
				{
					$password = Yii::app()->db->createCommand()->select('password')->from('school')->where('email=:mail', array(':mail'=>$mail))->queryScalar();
					if($password==sha1($currentpassword)){
						$command = Yii::app()->db->createCommand();
						$command->update('school', array('password'=>$newpassword), 'email=:email', array(':email'=>$mail));
						$command->execute();
						Yii::app()->user->setFlash('editpassword','رمز عبور تغییر یافت.');
						$this->refresh();
					}
					else{
						Yii::app()->user->setFlash('editpassword','رمز عبور معتبر نمی باشد');
					}
				}
				elseif (Yii::app()->user->getId()==3)
				{
					$password = Yii::app()->db->createCommand()->select('password')->from('parent')->where('email=:mail', array(':mail'=>$mail))->queryScalar();
					if($password==sha1($currentpassword)){
						$command = Yii::app()->db->createCommand();
						$command->update('parent', array('password'=>$newpassword), 'email=:email', array(':email'=>$mail));
						$command->execute();
						Yii::app()->user->setFlash('editpassword','رمز عبور تغییر یافت.');
						$this->refresh();
					}
					else{
						Yii::app()->user->setFlash('editpassword','رمز عبور معتبر نمی باشد');
					}
				}
			}
		}
		$this->render('editpassword',array('model'=>$model,'refreshCaptcha' => $refreshCaptcha));
		
	}
	
	
		public function actionrefrencePoint()
	{		
		$points = Yii::app()->db->createCommand()->select('actTopic,actPoint')->from('refrencepoint')->queryRow();
		$actTopic=$points['actTopic'];
		$actPoint=$points['actPoint'];
						
		$this->render('refrencePoint');
	}
		public function actiongivePoint()
	{		
		$points = Yii::app()->db->createCommand()->select('actTopic,actPoint')->from('refrencepoint')->queryRow();
		$actTopic=$points['actTopic'];
		$actPoint=$points['actPoint'];
						
		$this->render('givePoint');
	}
	public function actionReward()
	{	
		$model=new RewardForm;
		$email=Yii::app()->user->name;
		
		
				
		if(isset($_POST['RewardForm']))
		{
			
			$model->attributes=$_POST['RewardForm'];
			if($model->validate())
			{
				$rewardTopic=($model->rewardTopic);
	        	$neededPoint=($model->neededPoint);
				
				$connection=Yii::app()->db;
				$connection->active=TRUE;
				
				$dataReader =Yii::app()->db->createCommand()
				->select ('count(*)')
				->from('reward')
				->where("rewardTopic=:rewardTopic")
        		->queryScalar(array(':rewardTopic'=>$rewardTopic));
				if($dataReader !=0){
					Yii::app()->user->setFlash('reward','فعالیتی با این عنوان قبلا به ثبت رسیده است.');			
					}	
				else{
					$temp=Yii::app()->user->name;
					$Id =Yii::app()->db->createCommand()
					->select ('Id')
					->from('mosqueculturalliablee')
					->where("email=:email")
        			->queryScalar(array(':email'=>$temp));
					
					
					$sql="INSERT INTO reward (rewardTopic, neededPoint,Id) VALUES(:rewardTopic, :neededPoint, :Id)";
					$command=$connection->createCommand($sql);
				
					$command->bindParam(":rewardTopic",$rewardTopic,PDO::PARAM_STR);
					$command->bindParam(":neededPoint",$neededPoint,PDO::PARAM_STR);
					$command->bindParam(":Id",$Id,PDO::PARAM_STR);
				
					$command->execute();
				
					Yii::app()->user->setFlash('reward','فعالیت جدید با موفقیت ثبت گردید.');
				}
				
				
				
				
				
				

				$this->refresh();
			}
		}
						
		$this->render('reward',array('model'=>$model));
	}
	
	

	
}	 
