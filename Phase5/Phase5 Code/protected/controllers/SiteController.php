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
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId()==1))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			// renders the view file 'protected/views/site/index.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('MosqueHome');
		}
	}
	public function actionParentHome()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId()==3))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			// renders the view file 'protected/views/site/index.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('ParentHome');
		}
	}
	public function actionSchoolHome()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId()==2))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			// renders the view file 'protected/views/site/index.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('SchoolHome');
		}
	}
	public function actionAdminHome()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId()==9))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			// renders the view file 'protected/views/site/index.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('AdminHome');
		}
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
		if ((Yii::app()->user->getId()==9))
		{
			$this->redirect(array('/site/index'));
		}
		$mail=Yii::app()->user->name;
		$model=new ContactForm;
		if(!Yii::app()->user->isGuest){
			$model->email=$mail;
			if($UserID=Yii::app()->user->getId()==1){
				$user =Yii::app()->db->createCommand()
		    			->select ('name,family')
		    			->from('mosqueculturalliablee')
		    			->where('email=:email',array(':email'=>$mail))
            			->queryRow(); 
				$model->name=$user['name'].' '.$user['family'];
			}
			elseif($UserID=Yii::app()->user->getId()==2){
				$user =Yii::app()->db->createCommand()
		    				->select ('teacherName,teacherFamily')
		    				->from('school')
		    				->where('email=:email',array(':email'=>$mail))
            				->queryRow();	
				$model->name=$user['teacherName'].' '.$user['teacherFamily'];
			}
			elseif($UserID=Yii::app()->user->getId()==3){
				$user =Yii::app()->db->createCommand()
		    				->select ('parentName,parentFamily')
		    				->from('parent')
		    				->where('email=:email',array(':email'=>$mail))
            				->queryRow();	
				$model->name=$user['parentName'].' '.$user['parentFamily'];
			}	
		}
		$refreshCaptcha = true;
		$timezone = "Asia/Tehran";
		date_default_timezone_set($timezone);

		if(isset($_POST['ContactForm']))
		{
			$refreshCaptcha = false;
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$SenderName=($model->name);
				$SenderMail=($model->email);
				$ReceiverMail=Yii::app()->params['adminEmail'];
				$category=($model->category);
				$Subject=($model->subject);
				$Body=($model->body);
				$Status=0;	//0 means unread
				if($category==0){
					$Category="پیام";
				}
				elseif($category==1){
					$Category="انتقاد";
				}
				elseif($category==2){
					$Category="پیشنهاد";
				}
				elseif($category==3){
					$Category="سایر";
				}
				$SendDate=date("Y-m-d");
				$SendTime=date("H:i:s");
				$connection=Yii::app()->db;
				$connection->active=TRUE;
				$sql="INSERT INTO comment (SenderName,SenderMail,ReceiverMail, Category, Subject,Body,Status,SendDate,SendTime) VALUES(:SenderName,:SenderMail, :ReceiverMail, :Category, :Subject, :Body,:Status,:SendDate,:SendTime)";
				$command=$connection->createCommand($sql);
						
				$command->bindParam(":SenderName",$SenderName,PDO::PARAM_STR);
				$command->bindParam(":SenderMail",$SenderMail,PDO::PARAM_STR);
				$command->bindParam(":ReceiverMail",$ReceiverMail,PDO::PARAM_STR);
				$command->bindParam(":Category",$Category,PDO::PARAM_STR);
				$command->bindParam(":Subject",$Subject,PDO::PARAM_STR);
				$command->bindParam(":Body",$Body,PDO::PARAM_STR);
				$command->bindParam(":Status",$Status,PDO::PARAM_STR);
				$command->bindParam(":SendDate",$SendDate,PDO::PARAM_STR);
				$command->bindParam(":SendTime",$SendTime,PDO::PARAM_STR);
					
				$command->execute();
					
				/*$message = Yii::app()->mailgun->newMessage();
				$message->setFrom('Admin@keyofthesky.mailgun.org', 'KeyOfTheSky');
				$message->addTo($ReceiverMail, 'Admin');
				$message->setSubject('پیام دریافتی - ارتباط با ما');
				$body = 'شما یک پیام از '.$SenderName.' با ایمیل '.$SenderMail.'دریافت نموده اید'."\r\n".'عنوان پیام:'.$Subject."\r\n".'متن پیام:'.$Body."\r\n".'با تشکر'."\r\n".'آدرس سایت : https://keyofthesky-se2.rhcloud.com';
				$message->setText($body);
				$message->send();*/
						
				Yii::app()->user->setFlash('contact','با تشکر، پیام شما ارسال گردید.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model,'refreshCaptcha' => $refreshCaptcha));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
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
		elseif (Yii::app()->user->getId()==9)
		{
			$this->redirect(array('/site/AdminHome'));
		}
		else
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
					elseif (Yii::app()->user->getId()==9)
					{
						$this->redirect(array('/site/AdminHome'));
					}
					
				}
			}
			// display the login form
			$this->render('login',array('model'=>$model));	
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		if (Yii::app()->user->isGuest)
		{
			//redirect to same url before click
			$this->redirect(Yii::app()->baseUrl);
		}
		else
		{
			Yii::app()->user->logout();
			$this->redirect(Yii::app()->homeUrl);
		}
		
	}
	public function actionRegister()
	{
		if (!(Yii::app()->user->isGuest))
		{
			$this->redirect(array('/site/index'));
		}
		else
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
					$passwordsend = ($model->password);
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
						
						/*$connection=Yii::app()->db;
						$connection->active=TRUE;
						$sql="INSERT INTO googlemap (Id) VALUES(:Id)";
						$command=$connection->createCommand($sql);
						$mosqueId = Yii::app()->db->createCommand()->select('Id')->from('mosqueculturalliablee')->where('email=:mail', array(':mail'=>$email))->queryScalar();
						$command->bindParam(":Id",$mosqueId,PDO::PARAM_STR);
						$command->execute();
						$connection->active=FALSE;*/	
						
						
					
						Yii::app()->user->setFlash('register','اطلاعات شما با موفقیت ثبت و اکانت شما ایجاد گردید.');
						
						/*$message = Yii::app()->mailgun->newMessage();
						$message->setFrom('Admin@keyofthesky.mailgun.org', 'KeyOfTheSky');
						$message->addTo($email, 'My dear user');
						$message->setSubject('اطلاعات حساب کاربری شما در کلید آسمان');
						$body = 'نام کاربری شما :'.$email."\r\n".'رمز عبور شما :'.$passwordsend."\r\n".'آدرس سایت : https://keyofthesky-se2.rhcloud.com ';
						$message->setText($body);
						$message->send();*/
						
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
	}
	public function actionschool()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1))
		{
			$this->redirect(array('/site/index'));
		}
		else
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
					$sql1="SELECT Count(*) FROM `school` WHERE `schoolId` ='$schoolid'";
					$dataReader1=$connection->createCommand($sql1)->queryScalar();
					if($dataReader !=0){
						Yii::app()->user->setFlash('school','ایمیل وارد شده در پایگاه داده موجود می باشد');
					}
					elseif($dataReader1 !=0){
						Yii::app()->user->setFlash('school','مدرسه ای با این آی دی در پایگاه داده موجود می باشد.');	
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
	}
	public function actionparent()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1))
		{
			$this->redirect(array('/site/index'));
		}
		else
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
					$sql0="SELECT Count(*) FROM `parent` WHERE `email` ='$email'";
					$dataReader=$connection->createCommand($sql0)->queryScalar();
					$sql1="SELECT Count(*) FROM `parent` WHERE `parentCode` ='$parentcode'";
					$dataReader1=$connection->createCommand($sql1)->queryScalar();
					if($dataReader !=0){
						Yii::app()->user->setFlash('parent','ایمیل وارد شده در پایگاه داده موجود می باشد');
					}
					elseif($dataReader1 !=0){
						Yii::app()->user->setFlash('parent','کد ملی موردنظر در پایگاه داده موجود می باشد.');
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
	}
	public function actionstudent()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1))
		{
			$this->redirect(array('/site/index'));
		}
		else
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
					$regda=(Yii::app()->jdate->date("Y/m/d",time()));

							
					$connection=Yii::app()->db;
					$connection->active=TRUE;
					
					$sql0="SELECT Count(*) FROM `student` WHERE `stCode` ='$stcode'";
					$dataReader=$connection->createCommand($sql0)->queryScalar();
					if($dataReader !=0){
						Yii::app()->user->setFlash('student','کد ملی دانش آموزی وارد شده در پایگاه داده موجود می باشد.');
					}
					else{
						$temp=Yii::app()->user->name;
						$sql1="SELECT Id FROM `mosqueculturalliablee` WHERE `email` ='$temp'";
						$Id=$connection->createCommand($sql1)->queryScalar();
						
						$sql="INSERT INTO student (stName, stFamily, fatherName, parentCode, Id, school, schoolId, stCode, address, picture, birthdate, regda) VALUES(:stName, :stFamily, :fatherName, :parentCode, :Id , :school, :schoolId, :stCode, :address, :picture,:birthdate, :regda)";
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
						$command->bindParam(":regda",$regda,PDO::PARAM_STR);
					
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
					$regda = ":regda";
					
					$this->refresh();
				}
			}
			$this->render('student',array('model'=>$model));	
		}
	}	
	public function actionEditliable()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1))
		{
			$this->redirect(array('/site/index'));
		}
		else
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
	}
	public function actionEditschool()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 2))
		{
			$this->redirect(array('/site/index'));
		}
		else
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
	}
	public function actionEditparent()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 3))
		{
			$this->redirect(array('/site/index'));
		}
		else
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
	}
	public function actionEditpassword()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (Yii::app()->user->getId() == 9)
		{
			$this->redirect(array('/site/AdminHome'));
		}
		else
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
		
	}
	public function actionEditChildrenInf()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1 || Yii::app()->user->getId() == 3))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			// renders the view file 'protected/views/site/index.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('editChildrenInf');
		}
	}
	public function actionEditstudent()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1 || Yii::app()->user->getId() == 3))
		{
			$this->redirect(array('/site/index'));
		}
		elseif(! isset($_GET['stCode'])){
			$this->redirect(array('/site/MosqueHome'));
		}
		else
		{
			$stCode = $_GET['stCode'];
			$refreshCaptcha = true;
			$model=new EditstudentForm;
			$student = Yii::app()->db->createCommand()->select('stname, stfamily, address, picture,birthdate')->from('student')->where('stCode=:stCode', array(':stCode'=>$stCode))->queryRow();
			$model->stname=$student['stname'];
			$model->stfamily=$student['stfamily'];
			$model->address=$student['address'];
			$model->picture=$student['picture'];
			$model->birthdate=$student['birthdate'];
			
			if(isset($_POST['EditstudentForm']))
			{
				$refreshCaptcha = false;
				$model->attributes=$_POST['EditstudentForm'];
				
				$stname=($model->stname);
				$stfamily=($model->stfamily);
				$address=($model->address);
				$picture=($model->picture);
				$birthdate=$model->birthdate;
				
				if($model->validate())
				{				
					$command = Yii::app()->db->createCommand();
					$command->update('student', array('stname'=>$stname,'stfamily'=>$stfamily,'address'=>$address,'picture'=>$picture,'birthdate'=>$birthdate), 'stCode=:stCode', array(':stCode'=>$stCode));
					$command->execute();
					
					Yii::app()->user->setFlash('editstudent','تغییرات با موفقیت در پایگاه داده ثبت گردید.');
					
					$this->refresh();
				}
			}
			$this->render('editstudent',array('model'=>$model,'refreshCaptcha' => $refreshCaptcha));	
		}
	}
	public function actionrefrencePoint()
	{		
		$this->render('refrencePoint');
	}
	public function actiongivePoint()
	{		
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		
		elseif(! isset($_GET['stCode'])){
			$this->redirect(array('/site/MosqueHome'));
		}
		else
		{	
			$model=new GivePointForm;
			$stCode = $_GET['stCode'];
			$userId = Yii::app()->user->getId();
			$numOfActs = Yii::app()->db->createCommand()
				->select('count(*)')
				->from('refrencepoint')
				->where('userId=:userId',array(':userId'=>$userId))
				->order('actId')
				->queryScalar();
			$act = Yii::app()->db->createCommand()
				->select('actId,actTopic,actPoint')
				->from('refrencepoint')
				->where('userId=:userId',array(':userId'=>$userId))
				->order('actId')
				->queryAll();
			$numOfInsert=0; 
			$connection=Yii::app()->db;
			$connection->active=TRUE;
				
			if(isset($_POST['GivePointForm']))
			{
				$model->attributes=$_POST['GivePointForm'];
				if($model->validate())
				{
					$da = $model->date;
					for ($x=0; $x<$numOfActs; $x++)
  					{
						if($model->results[$x]==1)
						{
							$actId=$act[$x]['actId'];
							$actPoint=$act[$x]['actPoint'];
							$search = Yii::app()->db->createCommand()
									->select('count(*)')
									->from('point')
									->where('actId=:actId and stCode=:stCode and da=:da',array(':actId'=>$actId,':stCode'=>$stCode,':da'=>$da))
									->queryScalar();
							if($search ==0)
							{
								$pcounter=1;
								$sql="INSERT INTO point (actId,stCode, pcounter,da) VALUES(:actId,:stCode, :pcounter, :da)";
								$command=$connection->createCommand($sql);
								
								$command->bindParam(":actId",$actId,PDO::PARAM_STR);
								$command->bindParam(":stCode",$stCode,PDO::PARAM_STR);
								$command->bindParam(":pcounter",$pcounter,PDO::PARAM_STR);
								$command->bindParam(":da",$da,PDO::PARAM_STR);
						
								$command->execute();
								$numOfInsert++;
							}
							else
							{
								$pcounter = Yii::app()->db->createCommand()
									->select('pcounter')
									->from('point')
									->where('actId=:actId and stCode=:stCode and da=:da',array(':actId'=>$actId,':stCode'=>$stCode,':da'=>$da))
									->queryScalar();
								$pcounter=$pcounter+1;
								$command = Yii::app()->db->createCommand();
								$command->update('point', array('pcounter'=>$pcounter), 'actId=:actId and stCode=:stCode and da=:da',array(':actId'=>$actId,':stCode'=>$stCode,':da'=>$da));
								$command->execute();
								$numOfInsert++;
							}
							$studentPoint = Yii::app()->db->createCommand()
									->select('total,current')
									->from('student')
									->where('stCode=:stCode',array(':stCode'=>$stCode))
									->queryRow();
							$totalPoint=$studentPoint['total']+$actPoint;
							$currentPoint=$studentPoint['current']+$actPoint;
							
							$command = Yii::app()->db->createCommand();
							$command->update('student', array('total'=>$totalPoint,'current'=>$currentPoint), 'stCode=:stCode',array(':stCode'=>$stCode));
							$command->execute();							
  						}
					}
					if ($numOfInsert!=0)
					{
						Yii::app()->user->setFlash('givePoint','امتیازدهی با موفقیت انجام گرفت.');
					}
					$this->refresh();
				}
			}						
			$this->render('givePoint',array('model'=>$model));
		}
	}
	public function actionReward()
	{	
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			$model=new RewardForm;
			$mail=Yii::app()->user->name;
			$mosqueId = Yii::app()->db->createCommand()->select('Id')->from('mosqueculturalliablee')->where('email=:mail', array(':mail'=>$mail))->queryScalar();
		
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
						->where("rewardTopic=:rewardTopic and Id=:id")
        				->queryScalar(array(':rewardTopic'=>$rewardTopic , ':id'=>$mosqueId ));
					if($dataReader !=0){
						Yii::app()->user->setFlash('reward','جایزه ای با این عنوان قبلا به ثبت رسیده است.');					}	
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
				
						Yii::app()->user->setFlash('reward','جایزه جدید با موفقیت ثبت گردید.');
					}
					$this->refresh();
				}
			}
			$this->render('reward',array('model'=>$model));
		}
	}
	public function actionmosqueReward()
	{	if(! isset($_GET['Id'])){
			$this->redirect(array('/site'));
		}
		
			$points = Yii::app()->db->createCommand()->select('neededPoint,rewardTopic,Id')->from('reward')->queryRow();
			$actTopic=$points['neededPoint'];
			$actPoint=$points['rewardTopic'];
			$points = Yii::app()->db->createCommand()->select('stName,stFamily')->from('student')->queryRow();
			$this->render('mosqueReward');	
			
		
	}
	public function actiongooglemap()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('googlemap');
	}
	public function actionmosquemap()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('mosquemap');
	}
	public function actionsetpos()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1))
		{
			$this->redirect(array('/site/index'));
		}
			else
		{
			$mail=Yii::app()->user->name;
			$model=new SetposForm;
			$mosqueId = Yii::app()->db->createCommand()->select('Id')->from('mosqueculturalliablee')->where('email=:mail', array(':mail'=>$mail))->queryScalar();
			$Pos = Yii::app()->db->createCommand()->select('lat,lng')->from('googlemap')->where('id=:id', array(':id'=>$mosqueId))->queryRow();

			$model->lat=$Pos['lat'];
			$model->lng=$Pos['lng'];
			
			if(isset($_POST['SetposForm']))
			{
				$model->attributes=$_POST['SetposForm'];
				$lat = ($model->lat);
				$lng = ($model->lng);
					
				if($model->validate())
				{
					$command = Yii::app()->db->createCommand();
					$command->update('googlemap', array('lat'=>$lat,'lng'=>$lng), 'id=:id', array(':id'=>$mosqueId));
					$command->execute();
					
					Yii::app()->user->setFlash('setpos','مختصات با موفقیت در پایگاه داده ثبت گردید');
					
					$Id = ":id";
					$lat= ":lat";
					$lng = ":lng";
					$this->refresh();
				}
			}
			$this->render('setpos',array('model'=>$model));
		}
	}
	public function actioneditreward()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			$this->render('editreward');	
		}
		
	}
	public function actioneditprize()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1))
		{
			$this->redirect(array('/site/index'));
		}
		elseif(! isset($_GET['rewardTopic'])){
			$this->redirect(array('/site/MosqueHome'));
		}
		else
		{
			$mail=Yii::app()->user->name;
			$mosqueId = Yii::app()->db->createCommand()->select('Id')->from('mosqueculturalliablee')->where('email=:mail', array(':mail'=>$mail))->queryScalar();
			$rewardTopic = (string) $_GET['rewardTopic'];
			$refreshCaptcha = true;
			$model=new EditprizeForm;
			$prize = Yii::app()->db->createCommand()->select('Id,rewardTopic,neededPoint')->from('reward')->where('rewardTopic=:rewardTopic and Id=:Id', array(':rewardTopic'=>$rewardTopic , ':Id'=>$mosqueId))->queryRow();
			$model->rewardTopic=$prize['rewardTopic'];
			$model->neededPoint=$prize['neededPoint'];
			
			if(isset($_POST['EditprizeForm']))
			{
				$model->attributes=$_POST['EditprizeForm'];
				$model->rewardTopic=$prize['rewardTopic'];
				$model->neededPoint=$prize['neededPoint'];
				
				if($model->validate())
				{	
					$neededPoint = $model->neededPoint;			
					$rewardTopic = $model->rewardTopic;
					$command = Yii::app()->db->createCommand();
					$command->update('reward', array('neededPoint'=>$neededPoint), 'rewardTopic=:rewardTopic and Id=:id', array(':rewardTopic'=>$rewardTopic,':id'=>$mosqueId));
					
					$command->execute();
					
					Yii::app()->user->setFlash('editprize','تغییرات با موفقیت در پایگاه داده ثبت گردید.');
					
					$this->refresh();
				}
			}
			$this->render('editprize',array('model'=>$model));
		}
		
	}
	public function actionsetmap()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			$model=new SetmapForm;
			$mail=Yii::app()->user->name;
			$mosque=Yii::app()->db->createCommand()
					->select('Id,mosqueName,mosqueAddress')
					->from('mosqueculturalliablee')
					->where('email=:mail', array(':mail'=>$mail))
					->queryRow();
			$model->mosqueId = $mosque['Id'];
			$model->mosqueName = $mosque['mosqueName'];
			$model->mosqueAddress = $mosque['mosqueAddress'];

			$Pos = Yii::app()->db->createCommand()
 					->select('Id,lat,lng')
					->from('googlemap')
					->where('Id=:id', array(':id'=>$model->mosqueId))
					->queryRow();

			$model->lat = $Pos['lat'];
			$model->lng = $Pos['lng'];
			
			$this->render('setmap',array('model'=>$model));
		}
	}
	public function actionacceptmosque()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId()==9))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			$this->render('acceptmosque');	
		}
		
	}
	public function actionrejectmosque()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId()==9))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			$this->render('rejectmosque');	
		}
	}
	public function actionSendMessage()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (Yii::app()->user->getId()==9)
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			$model=new SendmessageForm;
			$refreshCaptcha = true;
			$mail=Yii::app()->user->name;
			if(isset($_POST['SendmessageForm']))
			{
				$refreshCaptcha = false;
				$model->attributes=$_POST['SendmessageForm'];
				if($model->validate())
				{
					$receiverType = $model->receiverType;
					$receiver = $model->receiver;
					$Subject=($model->subject);
					$category=($model->category);
					if($category==0){
						$Category="پیام";
					}
					elseif($category==1){
						$Category="انتقاد";
					}
					elseif($category==2){
						$Category="پیشنهاد";
					}
					elseif($category==3){
						$Category="سایر";
					}
					$Body=($model->body);
					$Status=0;	//0 means unread
					$SenderMail=$mail;
					if(Yii::app()->user->getId()==1){
						$user =Yii::app()->db->createCommand()
		    					->select ('name,family')
		    					->from('mosqueculturalliablee')
		    					->where('email=:email',array(':email'=>$mail))
            					->queryRow(); 
						$SenderName = $user['name'].' '.$user['family'];
						if($receiverType==1){
							$ReceiverMail=Yii::app()->db->createCommand()
									->select('email')
									->from('school')
									->where('schoolId=:schoolId', array(':schoolId'=>$receiver))
									->queryScalar();
						}
						elseif($receiverType==2){
							$ReceiverMail=Yii::app()->db->createCommand()
										->select('email')
										->from('parent')
										->where('parentCode=:parentCode', array(':parentCode'=>$receiver))
										->queryScalar();
						}
					}
					elseif(Yii::app()->user->getId()==2){
						$user =Yii::app()->db->createCommand()
		    				->select ('teacherName,teacherFamily')
		    				->from('school')
		    				->where('email=:email',array(':email'=>$mail))
            				->queryRow();	
						$SenderName = $user['teacherName'].' '.$user['teacherFamily'];
						if($receiverType==1){
							$ReceiverMail=Yii::app()->db->createCommand()
										->select('email')
										->from('mosqueculturalliablee')
										->where('id=:id', array(':id'=>$receiver))
										->queryScalar();	
						}
						elseif($receiverType==2){
							$ReceiverMail=Yii::app()->db->createCommand()
										->select('email')
										->from('parent')
										->where('parentCode=:parentCode', array(':parentCode'=>$receiver))
										->queryScalar();
						}
					}
					elseif(Yii::app()->user->getId()==3){
						$user =Yii::app()->db->createCommand()
		    					->select ('parentName,parentFamily')
		    					->from('parent')
		    					->where('email=:email',array(':email'=>$mail))
            					->queryRow();	
						$SenderName = $user['parentName'].' '.$user['parentFamily'];
						if($receiverType==1){
							$ReceiverMail=Yii::app()->db->createCommand()
										->select('email')
										->from('mosqueculturalliablee')
										->where('id=:id', array(':id'=>$receiver))
										->queryScalar();	
						}
						elseif($receiverType==2){
							$ReceiverMail=Yii::app()->db->createCommand()
										->select('email')
										->from('school')
										->where('schoolId=:schoolId', array(':schoolId'=>$receiver))
										->queryScalar();
						}
					}
					$timezone = "Asia/Tehran";
					date_default_timezone_set($timezone);
					$SendDate=date("Y-m-d");
					$SendTime=date("H:i:s");
				
					$connection=Yii::app()->db;
					$connection->active=TRUE;
					$sql="INSERT INTO comment (SenderName,SenderMail,ReceiverMail, Category, Subject,Body,Status,SendDate,SendTime) VALUES(:SenderName,:SenderMail, :ReceiverMail, :Category, :Subject, :Body,:Status,:SendDate,:SendTime)";

					$command=$connection->createCommand($sql);
						
					$command->bindParam(":SenderName",$SenderName,PDO::PARAM_STR);
					$command->bindParam(":SenderMail",$SenderMail,PDO::PARAM_STR);
					$command->bindParam(":ReceiverMail",$ReceiverMail,PDO::PARAM_STR);
					$command->bindParam(":Category",$Category,PDO::PARAM_STR);
					$command->bindParam(":Subject",$Subject,PDO::PARAM_STR);
					$command->bindParam(":Body",$Body,PDO::PARAM_STR);
					$command->bindParam(":Status",$Status,PDO::PARAM_STR);
					$command->bindParam(":SendDate",$SendDate,PDO::PARAM_STR);
					$command->bindParam(":SendTime",$SendTime,PDO::PARAM_STR);
					
					$command->execute();
					
					/*$message = Yii::app()->mailgun->newMessage();
					$message->setFrom('Admin@keyofthesky.mailgun.org', 'KeyOfTheSky');
					$message->addTo($ReceiverMail, 'Admin');
					$message->setSubject('پیام دریافتی - ارتباط با ما');
					$body = 'شما یک پیام از '.$SenderName.' با ایمیل '.$SenderMail.'دریافت نموده اید'."\r\n".'عنوان پیام:'.$Subject."\r\n".'متن پیام:'.$Body."\r\n".'با تشکر'."\r\n".'آدرس سایت : https://keyofthesky-se2.rhcloud.com';
					$message->setText($body);
					$message->send();*/
				
					Yii::app()->user->setFlash('sendMessage','با تشکر، پیام شما ارسال گردید.');
					$this->refresh();
				}
			}
			$this->render('sendMessage',array('model'=>$model,'refreshCaptcha' => $refreshCaptcha));
		}
	}
	public function actionType()
	{
		$Type=$_POST["type"];
		$mail=Yii::app()->user->name;
		if(Yii::app()->user->getId()==1){
			if($Type==1){
				$contact=Yii::app()->db->createCommand()
					->select('school.schoolId,school.email')
					->from('school,student,mosqueculturalliablee')
					->where('mosqueculturalliablee.email=:mail AND school.schoolId=student.schoolId AND mosqueculturalliablee.Id=student.Id', array(':mail'=>$mail))
					->order('school.email')
					->queryAll();
				$data=CHtml::listData($contact,'schoolId','email');
				if (!empty($data)) { echo '<option value="">ایمیل مسئول مورد نظر را انتخاب نمایید</option>'; }
			}
			elseif($Type==2){
				$contact=Yii::app()->db->createCommand()
					->select('parent.parentCode,parent.email')
					->from('parent,student,mosqueculturalliablee')
					->where('mosqueculturalliablee.email=:mail AND parent.parentCode=student.parentCode AND mosqueculturalliablee.Id=student.Id', array(':mail'=>$mail))
					->order('parent.email')
					->queryAll();
				$data=CHtml::listData($contact,'parentCode','email');
				if (!empty($data)) { echo '<option value="">ایمیل والد مورد نظر را انتخاب نمایید</option>'; }
			}
			foreach($data as $value=>$name) {
        	echo CHtml::tag('option',
            		array('value'=>$value),CHtml::encode($name),true);
    		}
		}
		elseif(Yii::app()->user->getId()==2){
			if($Type==1){
				$contact=Yii::app()->db->createCommand()
					->select('mosqueculturalliablee.id,mosqueculturalliablee.email')
					->from('school,student,mosqueculturalliablee')
					->where('school.email=:mail AND school.schoolId=student.schoolId AND mosqueculturalliablee.Id=student.Id', array(':mail'=>$mail))
					->order('mosqueculturalliablee.email')
					->queryAll();	
				$data=CHtml::listData($contact,'id','email');
				if (!empty($data)) { echo '<option value="">ایمیل مسئول مورد نظر را انتخاب نمایید</option>'; }
			}
			elseif($Type==2){
				$contact=Yii::app()->db->createCommand()
					->select('parent.parentCode,parent.email')
					->from('school,student,parent')
					->where('school.email=:mail AND parent.parentCode=student.parentCode AND school.schoolId=student.schoolId', array(':mail'=>$mail))
					->order('parent.email')
					->queryAll();
				$data=CHtml::listData($contact,'parentCode','email');
				if (!empty($data)) { echo '<option value="">ایمیل والد مورد نظر را انتخاب نمایید</option>'; }
			}
			foreach($data as $value=>$name) {
        	echo CHtml::tag('option',
            		array('value'=>$value),CHtml::encode($name),true);
    		}
		}
		elseif(Yii::app()->user->getId()==3){
			if($Type==1){
				$contact=Yii::app()->db->createCommand()
					->select('mosqueculturalliablee.id,mosqueculturalliablee.email')
					->from('parent,student,mosqueculturalliablee')
					->where('parent.email=:mail AND parent.parentCode=student.parentCode AND mosqueculturalliablee.Id=student.Id', array(':mail'=>$mail))
					->order('mosqueculturalliablee.email')
					->queryAll();	
				$data=CHtml::listData($contact,'id','email');
				if (!empty($data)) { echo '<option value="">ایمیل مسئول مورد نظر را انتخاب نمایید</option>'; }
			}
			elseif($Type==2){
				$contact=Yii::app()->db->createCommand()
					->select('school.schoolId,school.email')
					->from('school,student,parent')
					->where('parent.email=:mail AND parent.parentCode=student.parentCode AND school.schoolId=student.schoolId', array(':mail'=>$mail))
					->order('school.email')
					->queryAll();
				$data=CHtml::listData($contact,'schoolId','email');
				if (!empty($data)) { echo '<option value="">ایمیل مسئول مورد نظر را انتخاب نمایید</option>'; }
			}
			foreach($data as $value=>$name) {
        	echo CHtml::tag('option',
            		array('value'=>$value),CHtml::encode($name),true);
    		}
		}
	}
	public function actionSaveCoords()
	{
		//$model=$this->loadModel($mosqueId);
		//$this->performAjaxValidation($model);
		
		if(isset ($_GET['lat']) and isset ($_GET['lng']))
		{
			$lat = $_GET['lat'];
			$lng = $_GET['lng'];	
			$mosqueId = $_GET['id'];
			$command = Yii::app()->db->createCommand();
			$command->update('googlemap', array('lat'=>$lat,'lng'=>$lng), 'Id=:id', array(':id'=>$mosqueId));
			$command->execute();
			Yii::app()->user->setFlash('setmap','Thank you for registring your place with ');
			 
		}	
        $this->redirect('site/setmap');
	}
	public function actioncollectiveScoring()
	{		
		if ((Yii::app()->user->isGuest  || Yii::app()->user->getId()==3 || Yii::app()->user->getId()==9)  == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		else
		{	
			$model=new CollectiveScoringForm;
			if(! isset($_GET['actId'])){
			$this->redirect(array('/site/MosqueHome'));
			}
			$actId = (int) $_GET['actId'];
			$actPoint = Yii::app()->db->createCommand()
					->select('actPoint')
					->from('refrencepoint')
					->where('actId=:actId',array(':actId'=>$actId))
					->queryScalar();
			$userId = Yii::app()->user->getId();
			$mail=Yii::app()->user->name;
			if ($userId==1){
				$Id =Yii::app()->db->createCommand()
		  			  ->select ('id')
		  			  ->from('mosqueculturalliablee')
		  			  ->where('email=:mail', array(':mail'=>$mail))
       				  ->queryScalar();
				$students = Yii::app()->db->createCommand()
						->select('stName,stFamily,stCode')
						->from('student')
						->where('Id=:Id', array(':Id'=>$Id))
						->order('stFamily')
						->queryAll();
				$numOfStus = Yii::app()->db->createCommand()
						->select('count(*)')
						->from('student')
						->where('Id=:Id', array(':Id'=>$Id))
						->queryScalar();
			}
			elseif($userId==2){
				$schoolId =Yii::app()->db->createCommand()
		 				   ->select ('schoolId')
						   ->from('school')
		   				   ->where('email=:mail', array(':mail'=>$mail))
         				   ->queryScalar();
				$students = Yii::app()->db->createCommand()
							->select('stName,stFamily,stCode')
							->from('student')
							->where('schoolId=:schoolId', array(':schoolId'=>$schoolId))
							->order('stFamily')
							->queryAll();
				$numOfStus = Yii::app()->db->createCommand()
							->select('count(*)')
							->from('student')
							->where('schoolId=:schoolId', array(':schoolId'=>$schoolId))
							->queryScalar();
			}
			$numOfInsert=0;
			
			$connection=Yii::app()->db;
			$connection->active=TRUE;
			if(isset($_POST['CollectiveScoringForm']))
			{
				$model->attributes=$_POST['CollectiveScoringForm'];
				if($model->validate())
				{
				$da=$model->actDate;
					for ($x=0; $x<$numOfStus; $x++)
  					{
						if($model->results[$x]==1)
						{
							$stCode=$students[$x]['stCode'];
							$search = Yii::app()->db->createCommand()
									->select('count(*)')
									->from('point')
									->where('actId=:actId and stCode=:stCode and da=:da',array(':actId'=>$actId,':stCode'=>$stCode,':da'=>$da))
									->queryScalar();
							if($search ==0)
							{
								$pcounter=1;
								$sql="INSERT INTO point (actId,stCode,da,pcounter) VALUES(:actId,:stCode, :da, :pcounter)";
								$command=$connection->createCommand($sql);
								
								$command->bindParam(":actId",$actId,PDO::PARAM_STR);
								$command->bindParam(":stCode",$stCode,PDO::PARAM_STR);
								$command->bindParam(":da",$da,PDO::PARAM_STR);
								$command->bindParam(":pcounter",$pcounter,PDO::PARAM_STR);
						
								$command->execute();
								$numOfInsert++;
							}
							else{
								$pcounter = Yii::app()->db->createCommand()
									->select('pcounter')
									->from('point')
									->where('actId=:actId and stCode=:stCode and da=:da',array(':actId'=>$actId,':stCode'=>$stCode,':da'=>$da))
									->queryScalar();
								$pcounter=$pcounter+1;
								$command = Yii::app()->db->createCommand();
								$command->update('point', array('pcounter'=>$pcounter), 'actId=:actId and stCode=:stCode and da=:da',array(':actId'=>$actId,':stCode'=>$stCode,':da'=>$da));
								$command->execute();
								$numOfInsert++;
							}
							$studentPoint = Yii::app()->db->createCommand()
									->select('total,current')
									->from('student')
									->where('stCode=:stCode',array(':stCode'=>$stCode))
									->queryRow();
							$totalPoint=$studentPoint['total']+(int)$actPoint;
							$currentPoint=$studentPoint['current']+$actPoint;
							
							$command = Yii::app()->db->createCommand();
							$command->update('student', array('total'=>$totalPoint,'current'=>$currentPoint), 'stCode=:stCode',array(':stCode'=>$stCode));
							$command->execute();
  						}
					}
					if ($numOfInsert!=0)
					{
						Yii::app()->user->setFlash('CollectiveScoring','امتیازدهی با موفقیت انجام گرفت.');
					}
					$this->refresh();
				}
			}					
			$this->render('CollectiveScoring',array('model'=>$model));
		}
	}
	public function actioncollectiveAction()
	{		
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif (!(Yii::app()->user->getId() == 1 || Yii::app()->user->getId() == 2 ))
		{
			$this->redirect(array('/site/index'));
		}
		else
		{
			$model=new CollectiveActionForm;
			$mail=Yii::app()->user->name;
			if(! isset($_GET['actId'])){
			$this->redirect(array('/site/MosqueHome'));
			}
			$actId = (int) $_GET['actId'];
			if(isset($_POST['CollectiveActionForm']))
			{
				$model->attributes=$_POST['CollectiveActionForm'];
				if($model->validate())
				{
					$actda=($model->actdate);
					$connection=Yii::app()->db;
					$connection->active=TRUE;
					if(Yii::app()->user->getId() == 1)
					{
						$mosqueId = Yii::app()->db->createCommand()
									->select('Id')
									->from('mosqueculturalliablee')
									->where('email=:mail', array(':mail'=>$mail))
									->queryScalar();
						$dataReader =Yii::app()->db->createCommand()
									->select ('count(*)')
									->from('moscolact')
									->where("mosqueId=:mosqueId and actId=:actId and actda=:actda")
        							->queryScalar(array(':mosqueId'=>$mosqueId , ':actId'=>$actId , ':actda'=>$actda ));
						if($dataReader ==0)
						{
							$actcount=1;
							$sql="INSERT INTO moscolact (mosqueId,actId,actda,actcount) VALUES(:mosqueId,:actId, :actda, :actcount)";
							$command=$connection->createCommand($sql);
								
							$command->bindParam(":mosqueId",$mosqueId,PDO::PARAM_STR);
							$command->bindParam(":actId",$actId,PDO::PARAM_STR);
							$command->bindParam(":actda",$actda,PDO::PARAM_STR);
							$command->bindParam(":actcount",$actcount,PDO::PARAM_STR);
							$command->execute();
							Yii::app()->user->setFlash('CollectiveAction','فعالیت جدید با موفقیت ثبت گردید');
						}
						else
						{
							$actcount = Yii::app()->db->createCommand()
									->select('actcount')
									->from('moscolact')
									->where('mosqueId=:mosqueId and actId=:actId and actda=:actda',array(':mosqueId'=>$mosqueId , ':actId'=>$actId , ':actda'=>$actda))
									->queryScalar();
							$actcount=$actcount+1;
							$command = Yii::app()->db->createCommand();
							$command->update('moscolact', array('actcount'=>$actcount), 'mosqueId=:mosqueId and actId=:actId and actda=:actda',array(':mosqueId'=>$mosqueId , ':actId'=>$actId , ':actda'=>$actda));
							$command->execute();
				
							Yii::app()->user->setFlash('CollectiveAction','فعالیت جدید با موفقیت ثبت گردید');
						}
					}
					if(Yii::app()->user->getId() == 2)
					{
						$schoolId =Yii::app()->db->createCommand()
		 				   ->select ('schoolId')
						   ->from('school')
		   				   ->where('email=:mail', array(':mail'=>$mail))
         				   ->queryScalar();
						$dataReader =Yii::app()->db->createCommand()
							->select ('count(*)')
							->from('schcolact')
							->where("schoolId=:schoolId and actId=:actId and actda=:actda")
        					->queryScalar(array(':schoolId'=>$schoolId , ':actId'=>$actId , ':actda'=>$actda ));
						if($dataReader ==0)
						{
							$actcount=1;
							$sql="INSERT INTO schcolact (schoolId,actId,actda,actcount) VALUES(:schoolId,:actId, :actda, :actcount)";
							$command=$connection->createCommand($sql);
							
							$command->bindParam(":schoolId",$schoolId,PDO::PARAM_STR);
							$command->bindParam(":actId",$actId,PDO::PARAM_STR);
							$command->bindParam(":actda",$actda,PDO::PARAM_STR);
							$command->bindParam(":actcount",$actcount,PDO::PARAM_STR);
							$command->execute();
							Yii::app()->user->setFlash('CollectiveAction','فعالیت جدید با موفقیت ثبت گردید');
						}
						else
						{
							$actcount = Yii::app()->db->createCommand()
									->select('actcount')
									->from('schcolact')
									->where('schoolId=:schoolId and actId=:actId and actda=:actda',array(':schoolId'=>$schoolId , ':actId'=>$actId , ':actda'=>$actda))
									->queryScalar();
							$actcount=$actcount+1;
							$command = Yii::app()->db->createCommand();
							$command->update('schcolact', array('actcount'=>$actcount), 'schoolId=:schoolId and actId=:actId and actda=:actda',array(':schoolId'=>$schoolId , ':actId'=>$actId , ':actda'=>$actda));
							$command->execute();
			
							Yii::app()->user->setFlash('CollectiveAction','فعالیت جدید با موفقیت ثبت گردید');
						}
					}
					$this->refresh();
				}
			}
			$this->render('CollectiveAction',array('model'=>$model));
		}
	}	
	public function actionInbox()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		else
		{
			// renders the view file 'protected/views/site/inbox.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('inbox');
		}
	}
	public function actionOutbox()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		else
		{
			// renders the view file 'protected/views/site/outbox.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('outbox');
		}
	}
	
	public function actionShowMessage()
	{
		if (Yii::app()->user->isGuest == TRUE)
		{
			$this->redirect(array('/site/login'));
		}
		elseif(! isset($_GET['commentId'])){
			$this->redirect(array('/site'));
		}
		else
		{
			$userMail=Yii::app()->user->name;
			$commentId=(int) $_GET['commentId'];
			$status = Yii::app()->db->createCommand()
				->select('Status')
				->from('comment')
				->where('commentId=:commentId', array(':commentId'=>$commentId))
				->queryAll();
			$Receivermail = Yii::app()->db->createCommand()
				->select('ReceiverMail')
				->from('comment')
				->where('commentId=:commentId', array(':commentId'=>$commentId))
				->queryAll();
			if ($userMail = $Receivermail)
			{
				$command=Yii::app()->db->createCommand()
				 ->update('comment', array('Status'=>1), 'commentId=:commentId', array(':commentId'=>$commentId));				}
			else{}
			// renders the view file 'protected/views/site/showMessage.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('showMessage');
		}	
	}
	public function actionschoolPage()
	{
		if(! isset($_GET['schoolId'])){
			$this->redirect(array('/site'));
		}
		
			// renders the view file 'protected/views/site/schoolPage.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('schoolPage');	
	}
	public function actionstudentPage()
	{
		if(! isset($_GET['stCode'])){
			$this->redirect(array('/site'));
		}
		else{
			// renders the view file 'protected/views/site/studentPage.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('studentPage');
		}	
	}
	public function actionmosqueReport()
	{
		$model=new mosqueReportForm;
		$refreshCaptcha = true;
		/*if (array_key_exists('ajax', $_POST) && $_POST['ajax'] === 'mosqueReport-form') {
        	echo CActiveForm::validate($model);
        	Yii::app()->end();
		}*/
		$mosquesName = Yii::app()->db->createCommand()
				->select('id,mosqueName')
				->from('mosqueculturalliablee')
				->order('mosqueName')
				->query();
		$data=CHtml::listData($mosquesName,'id','mosqueName');
				
		if(isset($_POST['mosqueReportForm']))
		{
			$refreshCaptcha = false;
			$model->attributes=$_POST['mosqueReportForm'];
			if($model->validate())
			{
				$ReportType=($model->ReportType);
				$MosqueId=($model->MosqueName);
				$startDate=($model->startDate);
				$FinishDate=($model->FinishDate);
				if($ReportType==1){
					Yii::app()->session['StartDate'] = $startDate;
					Yii::app()->session['FinishDate'] = $FinishDate;
					$this->redirect(array('/site/registerationProgress','MosqueId'=>$MosqueId));
				}
				elseif($ReportType==2){
					Yii::app()->session['StartDate'] = $startDate;
					Yii::app()->session['FinishDate'] = $FinishDate;
					$this->redirect(array('/site/CollectiveActionsReport','MosqueId'=>$MosqueId));
				}
				elseif($ReportType==3){
					Yii::app()->session['StartDate'] = $startDate;
					Yii::app()->session['FinishDate'] = $FinishDate;
					$this->redirect(array('/site/ActivitiesReport','MosqueId'=>$MosqueId));
				}
				//Yii::app()->user->setFlash('mosqueReport','');
				$this->refresh();		
			}
		}			
		// renders the view file 'protected/views/site/mosqueReport.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('mosqueReport',array('model'=>$model,'refreshCaptcha' => $refreshCaptcha,'mosquesName'=>$data));	
	}
	public function actionregisterationProgress()
	{
		if(!isset($_GET['MosqueId'])){
			$this->redirect(array('/site'));
		}
		else{
			$mosqueId=$_GET['MosqueId'];
			$this->render('registerationProgress',array('MosqueId'=>$mosqueId));
		}	
		
	}
	public function actionCollectiveActionsReport()
	{
		if(!isset($_GET['MosqueId'])){
			$this->redirect(array('/site'));
		}
		else{
			$mosqueId=$_GET['MosqueId'];
			$this->render('CollectiveActionsReport',array('MosqueId'=>$mosqueId));
		}	
		
	}
	public function actionActivitiesReport()
	{
		if(!isset($_GET['MosqueId'])){
			$this->redirect(array('/site'));
		}
		else{
			$mosqueId=$_GET['MosqueId'];
			$this->render('ActivitiesReport',array('MosqueId'=>$mosqueId));
		}		
	}
	public function actiontopStudents()
	{
		$model=new topStudentsForm;
		$refreshCaptcha = true;
		$mosquesName = Yii::app()->db->createCommand()
				->select('id,mosqueName')
				->from('mosqueculturalliablee')
				->order('mosqueName')
				->query();
		$data=CHtml::listData($mosquesName,'id','mosqueName');
				
		if(isset($_POST['topStudentsForm']))
		{
			$refreshCaptcha = false;
			$model->attributes=$_POST['topStudentsForm'];
			if($model->validate())
			{
				$MosqueId=($model->MosqueName);
				$TopNumber=($model->TopNumber);
				$this->redirect(array('/site/topResult','MosqueId'=>$MosqueId,'TopNumber'=>$TopNumber));
				//$this->refresh();		
			}
		}			
		$this->render('topStudents',array('model'=>$model,'refreshCaptcha' => $refreshCaptcha,'mosquesName'=>$data));	
	}
	public function actionguide()
	{		
		$this->render('guide');
	}
	public function actiontopResult()
	{
		if(!(isset($_GET['MosqueId']) and isset($_GET['TopNumber']))){
			$this->redirect(array('/site'));
		}
		else{
			$mosqueId=$_GET['MosqueId'];
			$TopNumber=$_GET['TopNumber'];
			$this->render('topResult',array('MosqueId'=>$mosqueId,'TopNumber'=>$TopNumber));
		}	
	}
	public function actionActivities()
	{
		$model=new ActivitiesForm;
		$refreshCaptcha = true;
		$actTopic=Yii::app()->db->createCommand()
				->select('actId,actTopic')
				->from('refrencepoint')
				->order('actId')
				->query();
		$mosquesName = Yii::app()->db->createCommand()
				->select('id,mosqueName')
				->from('mosqueculturalliablee')
				->order('mosqueName')
				->query();
		$acts=CHtml::listData($actTopic,'actId','actTopic');
		$data=CHtml::listData($mosquesName,'id','mosqueName');
				
		if(isset($_POST['ActivitiesForm']))
		{
			$refreshCaptcha = false;
			$model->attributes=$_POST['ActivitiesForm'];
			if($model->validate())
			{
				$MosqueId=($model->MosqueName);
				$Activities=($model->Activities);
				$startDate=($model->startDate);
				$FinishDate=($model->FinishDate);
				Yii::app()->session['StartDate'] = $startDate;
				Yii::app()->session['FinishDate'] = $FinishDate;
				$this->redirect(array('/site/ActivitiesResult','MosqueId'=>$MosqueId,'actId'=>$Activities));
				//Yii::app()->user->setFlash('Activities',$Activities.'->'.$MosqueId.'['.$startDate.'->'.$FinishDate.']');
				//$this->refresh();		
			}
		}			
		$this->render('Activities',array('model'=>$model,'refreshCaptcha' => $refreshCaptcha,'mosquesName'=>$data,'acts'=>$acts));	
	}
	public function actionActivitiesResult()
	{
		if(!(isset($_GET['MosqueId']) and isset($_GET['actId']))){
			$this->redirect(array('/site'));
		}
		else{
			$mosqueId=$_GET['MosqueId'];
			$actId=$_GET['actId'];
			$this->render('ActivitiesResult',array('MosqueId'=>$mosqueId,'actId'=>$actId));
		}	
	}
}	 	 