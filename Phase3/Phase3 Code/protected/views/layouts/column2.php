<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php
	$baseUrl = Yii::app()->request->baseUrl;
?>
<section class="main-body">
  <div class="container">
  <div class="row-fluid">
	
    <div class="span8">

		<?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
                'homeLink'=>CHtml::link('Dashboard'),
                'htmlOptions'=>array('class'=>'breadcrumb')
            )); ?><!-- breadcrumbs -->
        <?php endif?>
        
        <!-- Include content pages -->
        <?php echo $content; ?>

	</div><!--/span-->
    
    <div class="span2">
		<div class="">
			<input class="input-block-level" id="appendedInput" placeholder="Search..." type="text">
<		/div>
		
		<h3>Categories</h3>

		<ul class="nav nav-list">
			<li class="active"><a href="#">Tutorials</a></li>
			<li><a href="#">Competitions</a></li>
			<li><a href="#">Freebies</a></li>
			<li><a href="#">Tips &amp; Tricks</a></li>
			<li><a href="#">Photo Library</a></li>
		</ul>

		<h3>Tags</h3>

		<div class="tags">
			<a href="#">CSS</a>
			<a href="#">Java Script</a>
			<a href="#">jQuery</a>
			<a href="#">HTML5</a>
			<a href="#">WordPress</a>
			<a href="#">Responsive</a>
			<a href="#">Themeforest</a> 
			<a href="#">Blog</a>
			<a href="#">Fluid</a>
			<a href="#">PHP</a>
			<a href="#">Slider</a>
			<a href="#">Bootstrap</a>
		</div>

		<h3>Popular &amp; recent</h3>

		<ul class="nav nav-tabs" id="side-bar-tabs">
			<li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
			<li><a href="#recent" data-toggle="tab">Recent</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="popular">
				<ul class="list-popular-content  clearfix">
					<li>
						<img src="<?php echo $baseUrl;?>/img/blog/small1.jpg" width="65" height="65" alt="Small blog image" class="pull-left" />
						<h5><a href="#" title="Example blog article">How to buy this theme</a></h5>
						<div>this is a summary of the content...</div>
					</li>
					<li>
						<img src="<?php echo $baseUrl;?>/img/blog/small2.jpg" width="65" height="65" alt="Small blog image" class="pull-left"/>
						<h5><a href="#" title="Example blog article">Guide to CSS3</a></h5>
						<div>this is a summary of the content...</div>
					</li>
					<li>
						<img src="<?php echo $baseUrl;?>/img/blog/small3.jpg" width="65" height="65" alt="Small blog image" class="pull-left"/>
						<h5><a href="#" title="Example blog article">Moved to a new building</a></h5>
						<div>this is a summary of the content...</div>
					</li>
					<li>
						<img src="<?php echo $baseUrl;?>/img/blog/small4.jpg" width="65" height="65" alt="Small blog image" class="pull-left"/>
						<h5><a href="#" title="Example blog article">Choose the right theme</a></h5>
						<div>this is a summary of the content...</div>
					</li>
					<li>
						<img src="<?php echo $baseUrl;?>/img/blog/small5.jpg" width="65" height="65" alt="Small blog image" class="pull-left" />
						<h5><a href="#" title="Example blog article">Why use bootstrap</a></h5>
						<div>this is a summary of the content...</div>
					</li>
				</ul>
			</div>
			<div class="tab-pane" id="recent">
			<ul class="list-recent-content">
				<li>
					<img src="<?php echo $baseUrl;?>/img/blog/small5.jpg" width="65" height="65" alt="Small blog image" class="pull-left" />
					<h5><a href="#" title="Example blog article">Why use bootstrap</a></h5>
					<div>this is a summary of the content...</div>
				</li>
				<li>
					<img src="<?php echo $baseUrl;?>/img/blog/small1.jpg" width="65" height="65" alt="Small blog image" class="pull-left" />
					<h5><a href="#" title="Example blog article">How to buy this theme</a></h5>
					<div>this is a summary of the content...</div>
				</li>
				<li>
					<img src="<?php echo $baseUrl;?>/img/blog/small3.jpg" width="65" height="65" alt="Small blog image" class="pull-left"/>
					<h5><a href="#" title="Example blog article">Moved to a new building</a></h5>
					<div>this is a summary of the content...</div>
				</li>
				<li>
					<img src="<?php echo $baseUrl;?>/img/blog/small4.jpg" width="65" height="65" alt="Small blog image" class="pull-left"/>
					<h5><a href="#" title="Example blog article">Choose the right theme</a></h5>
					<div>this is a summary of the content...</div>
				</li>
				<li>
					<img src="<?php echo $baseUrl;?>/img/blog/small2.jpg" width="65" height="65" alt="Small blog image" class="pull-left"/>
					<h5><a href="#" title="Example blog article">Guide to CSS3</a></h5>
					<div>this is a summary of the content...</div>
				</li>
			</ul>
			</div>
		</div>
		
    </div><!--/span-->
  </div><!--/row-->
</div>
</section>


<?php $this->endContent(); ?>