<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <title>Welcome!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">	

	<?php
		$baseUrl = Yii::app()->request->baseUrl;
		Yii::app()->clientScript->registerCoreScript('jquery');
	?>
	<!-- the styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/bootstrap-responsive.min.css">
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Pontano+Sans'>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/js/nivo-slider/themes/default/default.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/js/nivo-slider/nivo-slider.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/js/lightbox/css/lightbox.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/template.css">   
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/style1.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style2" href="<?php echo $baseUrl;?>/css/style2.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style3" href="<?php echo $baseUrl;?>/css/style3.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style4" href="<?php echo $baseUrl;?>/css/style4.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style5" href="<?php echo $baseUrl;?>/css/style5.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style6" href="<?php echo $baseUrl;?>/css/style6.css" />
    
	<script type="text/javascript" src="<?php echo $baseUrl;?>/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl;?>/js/swfobject/swfobject.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl;?>/js/lightbox/js/lightbox.js"></script>
    <!-- style switcher -->
    <script type="text/javascript" src="<?php echo $baseUrl;?>/js/styleswitcher.js"></script>
	
	<script type="text/javascript" src="<?php echo $baseUrl;?>/js/searchmosque.js"></script>
    
	<!--<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/bappify.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/main.css" />-->
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/form.css" />
	
    <!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo $baseUrl;?>/img/ico/favicon.ico">
</head>

<body style="direction:rtl;">
<section id="header">
<!-- Include the header bar -->
<?php include_once('header.php');?>
<!-- /.container -->  



<!-- Alert -->
	<?php
		$userMail=Yii::app()->user->name;
		$count =Yii::app()->db->createCommand()
				->select ('count(*)')
				->from('comment')
				->where('ReceiverMail=:userMail and Status=0', array(':userMail'=>$userMail))
				->queryScalar();
		if ($count != 0):
			?>
			 <div class="row-fluid" align="right">
          		 <div class="span6">
				 	<div class="alert alert-info" >
                  		<button type="button" class="close" data-dismiss="alert">×</button>
                 		<strong>توجه!</strong> شما تعدادی پیغام خوانده نشده دارید.
                	</div>
				</div>
			</div>
	    <?php else:?>
	
	<?php endif;?>
<!-- End Alert -->




</section><!-- /#header -->




<!-- Require the navigation -->
<section id="navigation-main">  	
<div class="navbar" >
	<div class="navbar-inner" >
		<div class="container">
			<!-- NOTE: Do not remove this. It is the navigation dropdown for mobile devices. It only shows on small screens-->
			<a class="btn btn-navbar " data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a><!--/.btn-navbar -->




		<div class="nav-collapse pull-right " >
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
					'items'=>array(
					
						array('label'=>'<b>پیام ها</b> <span class="caret"></span>'.'<p class="text-error" >'.$count.'</p>', 'url'=>'#','visible'=>!(Yii::app()->user->isGuest),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""), 
                        'items'=>array(
                            array('label'=>'<b>صندوق ورودی</b>', 'url'=>array('/site/inbox'),'linkOptions'=>array("data-description"=>""),),
							array('label'=>'<b>صندوق خروجی</b>', 'url'=>array('/site/outbox'),'linkOptions'=>array("data-description"=>""),),
						)),
						
						array('label'=>'<b>نقشه گوگل</b>', 'url'=>array('/site/googlemap'), 'visible','linkOptions'=>array("data-description"=>"")),
                    	array('label'=>'<b>امتیازات</b>', 'url'=>array('/site/refrencePoint'), 'visible','linkOptions'=>array("data-description"=>"")),
						array('label'=>'<b>ارتباط با ما</b>', 'url'=>array('/site/contact'),'linkOptions'=>array("data-description"=>""),),
						array('label'=>'<b>درباره ما</b>', 'url'=>array('/site/page', 'view'=>'about'),'linkOptions'=>array("data-description"=>"درباره ما بدانيد"),),
                        array('label'=>'<b>سبک ها</b> <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""), 
                        'items'=>array(
                            array('label'=>'<span class="style" style="background-color:#0088CC;"></span> سبک 1', 'url'=>"javascript:chooseStyle('none', 60)"),
							array('label'=>'<span class="style" style="background-color:#e42e5d;"></span> سبک 2', 'url'=>"javascript:chooseStyle('style2', 60)"),
							array('label'=>'<span class="style" style="background-color:#c80681;"></span> سبک 3', 'url'=>"javascript:chooseStyle('style3', 60)"),
							array('label'=>'<span class="style" style="background-color:#51a351;"></span> سبک 4', 'url'=>"javascript:chooseStyle('style4', 60)"),
							array('label'=>'<span class="style" style="background-color:#b88006;"></span> سبک 5', 'url'=>"javascript:chooseStyle('style5', 60)"),
							array('label'=>'<span class="style" style="background-color:#f9630f;"></span> سبک 6', 'url'=>"javascript:chooseStyle('style6', 60)"),
                        )),	
						array('label'=>'<b>خانه</b>', 'url'=>array('/site/index'),'linkOptions'=>array("data-description"=>"صفحه اصلي سايت"),),	
   					),
                )); 
			?>
    	</div>
	</div>	
    </div>
	</div>
</section><!-- /#navigation-main -->

<section id="navigation-main">  	
<div class="navbar" >
	<div class="navbar-inner" >
		<div class="container">
			<!-- NOTE: Do not remove this. It is the navigation dropdown for mobile devices. It only shows on small screens-->
			<a class="btn btn-navbar " data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a><!--/.btn-navbar -->

		<div class="nav-collapse pull-right " >
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
					'items'=>array(	
					array('label'=>'<b>ثبت نام مسئول مسجد</b>', 'url'=>array('/site/register'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>""),),
						array('label'=>'<b>خروج</b> ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"")),
						array('label'=>'<b>ورود</b>', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"")),
						array('label'=>'<b>جوایز</b> <span class="caret"></span>', 'url'=>'#','visible'=>(Yii::app()->user->getId()==1),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""), 
                        'items'=>array(
                            array('label'=>'<b>تعیین جوایز</b>', 'url'=>array('/site/reward'), 'visible'=>(Yii::app()->user->getId()==1),'linkOptions'=>array("data-description"=>"")),
							array('label'=>'<b>حذف و تغییر جوایز</b>', 'url'=>array('/site/editreward'), 'visible'=>(Yii::app()->user->getId()==1),'linkOptions'=>array("data-description"=>"")),
                        )),
						array('label'=>'<b>مختصات مسجد</b> <span class="caret"></span>', 'url'=>'#','visible'=>(Yii::app()->user->getId()==1),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""), 
                        'items'=>array(
                            array('label'=>'<b>تعیین بر روی نقشه</b>', 'url'=>array('/site/setmap'), 'visible'=>(Yii::app()->user->getId()==1),'linkOptions'=>array("data-description"=>"")),
							array('label'=>'<b>تعیین توسط مختصات</b>', 'url'=>array('/site/setpos'), 'visible'=>(Yii::app()->user->getId()==1),'linkOptions'=>array("data-description"=>"")),
                        )),
						array('label'=>'<b>ویرایش مشخصات فرزندان</b>', 'url'=>array('/site/editChildrenInf'),'visible'=>(Yii::app()->user->getId()==3),'linkOptions'=>array("data-description"=>"والد"),),	
						array('label'=>'<b>ویرایش مشخصات دانش آموزان</b>', 'url'=>array('/site/editChildrenInf'),'visible'=>(Yii::app()->user->getId()==1),'linkOptions'=>array("data-description"=>"مسئول مسجد"),),	
						array('label'=>'<b>درج مشخصات</b> <span class="caret"></span>', 'url'=>'#','visible'=>(Yii::app()->user->getId()==1),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""), 
                        'items'=>array(
                            array('label'=>'<b>مشخصات والدین</b>', 'url'=>array('/site/parent'),'linkOptions'=>array("data-description"=>""),),
							array('label'=>'<b>مشخصات دانش آموز</b>', 'url'=>array('/site/student'),'linkOptions'=>array("data-description"=>""),),
							array('label'=>'<b>مشخصات مسئول مدرسه</b>', 'url'=>array('/site/school'),'linkOptions'=>array("data-description"=>""),),
                        )),
						array('label'=>'<b>ارسال پیام</b>', 'url'=>array('/site/sendMessage'), 'visible'=>!(Yii::app()->user->isGuest || Yii::app()->user->getId()==9) ,'linkOptions'=>array("data-description"=>"")),
                        array('label'=>'<b>ویرایش تنظیمات</b> <span class="caret"></span>', 'url'=>'#','visible'=>!(Yii::app()->user->isGuest || Yii::app()->user->getId()==9) ,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""), 
                        'items'=>array(
                            array('label'=>'<b>ویرایش مشخصات</b>', 'url'=>array('/site/editliable'),'visible'=>(Yii::app()->user->getId()==1),'linkOptions'=>array("data-description"=>""),),
							array('label'=>'<b>ویرایش مشخصات</b>', 'url'=>array('/site/editschool'),'visible'=>(Yii::app()->user->getId()==2),'linkOptions'=>array("data-description"=>""),),
							array('label'=>'<b>ویرایش مشخصات</b>', 'url'=>array('/site/editparent'),'visible'=>(Yii::app()->user->getId()==3),'linkOptions'=>array("data-description"=>""),),
							array('label'=>'<b>ویرایش کلمه عبور</b>', 'url'=>array('/site/editpassword'),'linkOptions'=>array("data-description"=>""),),
                        )),
						array('label'=>'<b>مدیریت مساجد</b> <span class="caret"></span>', 'url'=>'#','visible'=>(Yii::app()->user->getId()==9) ,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""), 
                        'items'=>array(
                            array('label'=>'<b>تایید مساجد</b>', 'url'=>array('/site/AcceptMosque'),'visible'=>(Yii::app()->user->getId()==9),'linkOptions'=>array("data-description"=>""),),
							array('label'=>'<b>رد مساجد تایید شده</b>', 'url'=>array('/site/RejectMosque'),'visible'=>(Yii::app()->user->getId()==9),'linkOptions'=>array("data-description"=>""),),
                        )),
						array('label'=>'<b>پنل کاربری</b>', 'url'=>array('/site/ParentHome'),'visible'=>(Yii::app()->user->getId()==3),'linkOptions'=>array("data-description"=>"والد"),),	
						array('label'=>'<b>پنل کاربری</b>', 'url'=>array('/site/SchoolHome'),'visible'=>(Yii::app()->user->getId()==2),'linkOptions'=>array("data-description"=>"مسئول مدرسه"),),	
						array('label'=>'<b>پنل کاربری</b>', 'url'=>array('/site/MosqueHome'),'visible'=>(Yii::app()->user->getId()==1),'linkOptions'=>array("data-description"=>"مسئول مسجد"),),
						array('label'=>'<b>پنل کاربری</b>', 'url'=>array('/site/AdminHome'),'visible'=>(Yii::app()->user->getId()==9),'linkOptions'=>array("data-description"=>"مدیر"),),
						
   					),
                )); 
			?>
    	</div>
	</div>	
    </div>
	</div>
</section><!-- /#navigation-main -->

<!-- Include content pages -->
<?php echo $content; ?>

<!-- Require the footer -->
<section id="bottom" class="">
    <div class="container bottom"> 
    	<div class="row-fluid">
            
            
            
            <div class="span3">
            	<h5>ارتباط با ما</h5>
                <p>
                آدرس :</p>
                <p>تهران - دانشگاه علم و صنعت ايران</p>
<p>                    تلفن : 48-77240540-021</p>
<p>                پست الکترونيکي:</p>
              <p>iust@comp.iust.ac.ir</p>
            </div><!-- /span3-->
			
			<div class="span3">
           	  <h5>کليد آسمان در شبکه هاي اجتماعي</h5>
            	<p align="left">Facebook<br/>
                    <a href="http://www.facebook.com">http://www.facebook.com</a></p>
                <p align="left">Twitter<br/>
              <a href="http://www.twitter.com">http://www.twitter.com</a></p>
                <p align="left">Google Plus<br/>
                  <a href="https://plus.google.com">https://plus.google.com</a>
                    <br/>
              </p>
            </div><!-- /span3-->
			
			<div class="span3">
           	  <h5>لينک هاي مفيد</h5>
            	<ul class="list-blog-roll">
                    <li>
                    	<a href="http://www.jamkaran.info" title="jamkaran">وب سايت رسمي مسجد مقدس جمکران</a>	
                    </li>
                    <li>
                    	<a href="http://www.bachehayemasjed.ir" title="Example blog article">بچه هاي مسجد</a>	
                    </li>
                    <li>
                    	<a href="http://masjedblog.com" title="Example blog article">مسجد بلاگ</a>	
                    </li>
                    <li>
                   	<a href="http://www.masjed-alkufa.net" title="Example blog article">سايت رسمي مسجد کوفه</a></li>
                </ul>
            	
            </div><!-- /span3-->
			
			<div class="span3">
            	<h5>درباره ما</h5>
                <p>اعضاي تيم طراحي سامانه کليد آسمان</p>
                <p>محسن ابراهیمی</p>
                <p>علي جعفري</p>
                <p>امير سجادي</p>
                <p>سيده کوثر سجادي</p>
                <p>نجمه زارع</p>
                <p>زهره فلاح نژاد</p>
                <p>فائزه موحدي</p>
            </div><!-- /span3-->
        </div><!-- /row-fluid -->
        </div><!-- /container-->
</section><!-- /bottom-->

<footer>
    <div class="footer">
        <div class="container" style="text-align:center;">
        	Copyright &copy; 2013. Designed by Key-Of-The-Sky Team - All Rights Reserved
        </div>
	</div>
</footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo $baseUrl;?>/js/bootstrap-transition.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-alert.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-modal.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-tab.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-popover.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-button.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-collapse.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-carousel.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap-typeahead.js"></script>   
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

  </body>
</html>	