<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		$session = Yii::app()->session;
        $prefixLen = strlen(CCaptchaAction::SESSION_VAR_PREFIX);
        foreach($session->keys as $key)
        {
			if(strncmp(CCaptchaAction::SESSION_VAR_PREFIX, $key, $prefixLen) == 1)
				$session->remove($key);
        }
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
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
		if(isset($_POST['ContactForm']))
		{
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
		$this->render('contact',array('model'=>$model));
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
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
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
		
		if(isset($_POST['RegisterForm']))
		{
			$model->attributes=$_POST['RegisterForm'];
			if($model->validate())
			{
				$name=($model->name);
				$family=($model->family);
				$mosqueName =($model->mosqueName);
				$email=($model->email);
				$password=sha1($model->password);
				$tel=($model->tel);
		 		$mobile=($model->mobile);
				$mosqueAddress=($model->mosqueAddress);
				$image='=?UTF-8?B?'.base64_encode($model->image).'?=';
				
					
				$connection=Yii::app()->db;
				$connection->active=TRUE;
				$connect = mysql_connect("localhost","root","") or die("not connecting");
				mysql_select_db("skykeey",$connect) or die("no db :'(");
				$find1 =mysql_query("SELECT Count(*) FROM `mosqueculturalliablee` WHERE `email` ='$email'",$connect);
				$count1=mysql_fetch_row($find1);
				
				if($count1[0]!=0){
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

					$connection->active=false;
					Yii::app()->user->setFlash('register','ثبت نام با موفقیت انجام شد');
				}
								
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
		$this->render('register',array('model'=>$model));
	}
	public function actionschool()
	{
		$model =new SchoolForm;
		if(isset($_POST['SchoolForm']))
		{
			$model->attributes=$_POST['SchoolForm'];
			if($model->validate())
			{
				$schoolname=($model->schoolname);
				$schoolphone=($model->schoolphone);
				$schooladdress =($model->schooladdress);
				$teachername=($model->teachername);
				$teacherfamily=($model->teacherfamily);
				$teacherphone=($model->teacherphone);
				$email=($model->email);
				$password=sha1($model->password);
				$confirmPassword= sha1($model->confirmPassword);
				
				$connection=Yii::app()->db;
				$connection->active=TRUE;
				$connect = mysql_connect("localhost","root","") or die("not connecting");
				mysql_select_db("skykeey",$connect) or die("no db :'(");
				$find1 =mysql_query("SELECT Count(*) FROM `school` WHERE `email` ='$email'",$connect);
				$count1=mysql_fetch_row($find1);
				
				if($count1[0]!=0){
					Yii::app()->user->setFlash('school','ایمیل وارد شده در پایگاه داده موجود می باشد');
				}
				else{
					$sql="INSERT INTO school (schoolName,schoolPhone,schoolAddress, teacherName, teacherFamily, teacherPhone, email, password) VALUES(:schoolName,:schoolPhone,:schoolAddress, :teacherName, :teacherFamily, :teacherPhone, :email, :password)";
					$command=$connection->createCommand($sql);
				
					$command->bindParam(":schoolName",$schoolname,PDO::PARAM_STR);
					$command->bindParam(":schoolPhone",$schoolphone,PDO::PARAM_STR);
					$command->bindParam(":schoolAddress",$schooladdress,PDO::PARAM_STR);
					$command->bindParam(":teacherName",$teachername,PDO::PARAM_STR);
					$command->bindParam(":teacherFamily",$teacherfamily,PDO::PARAM_STR);
					$command->bindParam(":teacherPhone",$teacherphone,PDO::PARAM_STR);
					$command->bindParam(":email",$email,PDO::PARAM_STR);
					$command->bindParam(":password",$password,PDO::PARAM_STR);
				
					$command->execute();

					$connection->active=false;
					Yii::app()->user->setFlash('school','ثبت نام با موفقیت انجام شد.');
				}
				
				$schoolname = ":schoolName";
				$schoolphone= ":schoolPhone";
				$schooladdress = ":schoolAddress";
				$teachername = ":teacherName";
				$teacherfamily = ":teacherFamily";
				$teacherphone = ":teacherPhone";
				$email = ":email";
				$password = ":password";
				$confirmPassword = ":confirm";
				
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
				$parentCode=($model->parentCode);
				$parentName=($model->parentName);
				$parentFamily=($model->parentFamily);
				$homePhone=($model->homePhone);
				$mobileNum=($model->mobileNum);
				$email=($model->email);
				$password=sha1($model->password);
				$confirmPassword= sha1($model->confirmPassword);
				
				$connection=Yii::app()->db;
				$connection->active=TRUE;
				$connect = mysql_connect("localhost","root","") or die("not connecting");
				mysql_select_db("skykeey",$connect) or die("no db :'(");
				$find1 =mysql_query("SELECT Count(*) FROM `parent` WHERE `email` ='$email'",$connect);
				$count1=mysql_fetch_row($find1);
				
				if($count1[0]!=0){
					Yii::app()->user->setFlash('parent','ایمیل وارد شده در پایگاه داده موجود می باشد');
				}
				else{
					$sql="INSERT INTO parent (parentCode,parentName,parentFamily, homePhone, mobileNum, email, password) VALUES(:parentCode,:parentName,:parentFamily, :homePhone, :mobileNum, :email, :password)";
					$command=$connection->createCommand($sql);
				
					$command->bindParam(":parentCode",$parentCode,PDO::PARAM_STR);
					$command->bindParam(":parentName",$parentName,PDO::PARAM_STR);
					$command->bindParam(":parentFamily",$parentFamily,PDO::PARAM_STR);
					$command->bindParam(":homePhone",$homePhone,PDO::PARAM_STR);
					$command->bindParam(":mobileNum",$mobileNum,PDO::PARAM_STR);
					$command->bindParam(":email",$email,PDO::PARAM_STR);
					$command->bindParam(":password",$password,PDO::PARAM_STR);
				
					$command->execute();

					$connection->active=false;
					Yii::app()->user->setFlash('parent','ثبت نام با موفقیت انجام شد.');
				}
				$parentCode=":parentCode";
				$parentName=":parentName";
				$parentFamily=":parentFamily";
				$homePhone=":homePhone";
				$mobileNum=":mobileNum";
				$email = ":email";
				$password = ":password";
				$confirmPassword = ":confirm";
				
				$this->refresh();
			}
		}
		$this->render('parent',array('model'=>$model));
	}	
}	 
