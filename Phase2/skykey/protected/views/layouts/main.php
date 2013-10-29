<!-- Require the header -->
<!-- tpl_header.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">	
    <!--<meta name="author" content="Simpson Moyo - Webapplicationthemes.com">-->

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
    
    <!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo $baseUrl;?>/img/ico/favicon.ico">
</head>

<body style="direction:rtl;">
<section id="header">
<!-- Include the header bar -->
    <?php include_once('header.php');?>
<!-- /.container -->  
</section><!-- /#header -->

<!-- Require the navigation -->
<!-- tpl_navigation.php-->
<section id="navigation-main">  	
<div class="navbar" >
	<div class="navbar-inner" >
		<div class="container">
			<!-- NOTE: Do not remove this. It is the navigation dropdown for mobile devices. It only shows on small screens-->
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a><!--/.btn-navbar -->

		<div class="nav-collapse pull-right" >
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
					'items'=>array(
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
                    	array('label'=>'LiableRegister', 'url'=>array('/site/register'),'linkOptions'=>array("data-description"=>"Register Liable"),),
                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),'linkOptions'=>array("data-description"=>"what we are about"),),
                        array('label'=>'Styles <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"6 styles"), 
                        'items'=>array(
                            array('label'=>'<span class="style" style="background-color:#0088CC;"></span> Style 1', 'url'=>"javascript:chooseStyle('none', 60)"),
							array('label'=>'<span class="style" style="background-color:#e42e5d;"></span> Style 2', 'url'=>"javascript:chooseStyle('style2', 60)"),
							array('label'=>'<span class="style" style="background-color:#c80681;"></span> Style 3', 'url'=>"javascript:chooseStyle('style3', 60)"),
							array('label'=>'<span class="style" style="background-color:#51a351;"></span> Style 4', 'url'=>"javascript:chooseStyle('style4', 60)"),
							array('label'=>'<span class="style" style="background-color:#b88006;"></span> Style 5', 'url'=>"javascript:chooseStyle('style5', 60)"),
							array('label'=>'<span class="style" style="background-color:#f9630f;"></span> Style 6', 'url'=>"javascript:chooseStyle('style6', 60)"),
                        )),
						array('label'=>'Home', 'url'=>array('/site/index'),'linkOptions'=>array("data-description"=>"our home page"),),	
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
<!-- tpl_footer.php -->    
<section id="bottom" class="">
    <div class="container bottom"> 
    	<div class="row-fluid">
            
            
            
            <div class="span3">
            	<h5>Contact us</h5>
                <p>
                    795 Folsom Ave, Suite 600<br/>
                    Address<br/>
                    P: (123) 456-7890<br/>
                    E: mail@mail.com<br/>
                
                </p>
                <br>
                <h5>Follow us</h5>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Themeforest</a></li>
                
                </ul>
            </div><!-- /span3-->
			
			<div class="span3">
            	<h5>Twitter feed</h5>
            	<p>
                    Cool CSS tutorial
                    <br/>
                    <a href="#">http://t.co/Xdert</a>
                    <br/>
                    <span>about 1 hour ago</span>
                </p>
                <p>
                    Everything to know about HTML5
                    <br/>
                    <a href="#">http://t.co/Xdert</a>
                    <br/>
                    <span>about 7 hours ago</span>
                </p>
                <p>
                    Learn PHP in 3 days
                    <br/>
                    <a href="#">http://t.co/Xdert</a>
                    <br/>
                    <span>about 9 hours ago</span>
                </p>
            </div><!-- /span3-->
			
			<div class="span3">
            	<h5>Blog roll</h5>
            	<ul class="list-blog-roll">
                    <li>
                    	<a href="#" title="Example blog article">t1</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">t2</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">t3</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">t4</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">t5</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">t6</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">t7</a>	
                    </li>
                </ul>
            	
            </div><!-- /span3-->
			
			<div class="span3">
            	<h5>About us</h5>
                <p>Text</p>
            </div><!-- /span3-->
        </div><!-- /row-fluid -->
        </div><!-- /container-->
</section><!-- /bottom-->

<footer>
    <div class="footer">
        <div class="container" style="text-align:center;">
        	Copyright &copy; 2012. Designed by webapplicationthemes.com - High quality HTML Theme
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