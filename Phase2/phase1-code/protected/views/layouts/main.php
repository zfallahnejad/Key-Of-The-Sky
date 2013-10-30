<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">




<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<!--[endif]-->
	
	
	
	<!-- header sabet -->
<div class="navbar navbar-fixed-top"   >
    <div id="topMenu" class="navbar-inner" >
        <div class="container" >
            <a lang="fa" class="brand" href="index.php" style="width: 169px; height: 32px;  "><font size = 5>کلید آسمان</font></a>
			<a lang="fa" class="nav" href="register.php" style="width: 61px; height: 32px; left: 588px; top: 11px;"><font size = 3></font></a>
				<a lang="fa" class="nav" href="login.php" style="width: 61px; height: 32px; left	: 591px; top: 11px;"><font size=3></font></a>
		</div>
    </div>
</div>
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bappify.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	
	 <!-- Script imports-->
    <script type="text/javascript" src="Scripts/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="Scripts/mdd/mdd.message.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap/bootstrap-alert.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap/bootstrap-popover.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap/bootstrap-dropdown.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head> 

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				
				array('label'=>'LiableRegister', 'url'=>array('/site/register')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	
	<!--<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<!--<?php endif?>-->

	<?php echo $content; ?>

	<div class="clear"></div>

	

</div><!-- page -->

</body>
</html>
