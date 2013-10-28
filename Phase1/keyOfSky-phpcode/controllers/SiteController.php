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
			{
					
					$this->redirect(Yii::app()->user->returnUrl);
					
			}
			
		}
		// display the login form
		$this->render('login',array('model'=>$model));
		//$this->redirect(Yii::app()->/site/Register.php);
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
				$pasword=sha1($model->pasword);
				$confirmPassword= sha1($model->confirmPassword);
				$tel=($model->tel);
		 		$mobile=($model->mobile);
				$mosqueAddress=($model->mosqueAddress);
				$image='=?UTF-8?B?'.base64_encode($model->image).'?=';
				
				if($pasword == $confirmPassword)
				{
						
					$connection=Yii::app()->db;
					$connection->active=TRUE;
					$sql="INSERT INTO mosqueculturalliablee (name,family,mosqueName, email, pasword, confirmPassword, tel, mobile, mosqueAddress, image) VALUES(:name,:family, :mosqueName, :email, :pasword, :confirmPassword, :tel, :mobile, :mosqueAddress, :image)";
					$command=$connection->createCommand($sql);
					
					$command->bindParam(":name",$name,PDO::PARAM_STR);
					$command->bindParam(":family",$family,PDO::PARAM_STR);
					$command->bindParam(":mosqueName",$mosqueName,PDO::PARAM_STR);
					$command->bindParam(":email",$email,PDO::PARAM_STR);
					$command->bindParam(":pasword",$pasword,PDO::PARAM_STR);
					$command->bindParam(":confirmPassword",$confirmPassword,PDO::PARAM_STR);
					$command->bindParam(":tel",$tel,PDO::PARAM_STR);
					$command->bindParam(":mobile",$mobile,PDO::PARAM_STR);
					$command->bindParam(":mosqueAddress",$mosqueAddress,PDO::PARAM_STR);
					$command->bindParam(":image",$image,PDO::PARAM_STR);
					
					$command->execute();

					
					$connection->active=false;
					Yii::app()->user->setFlash('register','success => Thank you for registering.');
					
				
				}
				else 
				{
						Yii::app()->user->setFlash('register','error => password & confirm Password are not same!');
				}
				
				
				
				$name = ":name";
				$family= ":family";
				$mosqueName = ":mosque";
				$email = ":email";
				$pasword = ":password";
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
	 
	}
 ?>