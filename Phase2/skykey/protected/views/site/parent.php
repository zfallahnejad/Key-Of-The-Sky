<?php 
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Parent';
$this->breadcrumbs=array(
	'Parent',);
?>

<h1 align="right"><font size = 5><b>ثبت نام والد</b></font></h1>

<?php if(Yii::app()->user->hasFlash('parent')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('parent'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با اطلاعات مناسب پر کنید</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parent-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>

	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'parentCode'); ?></h1>
		<?php echo $form->textField($model,'parentCode'); ?>
		<?php echo $form->error($model,'parentCode'); ?>
	</div>

	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'parentName'); ?></h1>
		<?php echo $form->textField($model,'parentName'); ?>
		<?php echo $form->error($model,'parentName'); ?>
	</div>
	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'parentFamily'); ?></h1>
		<?php echo $form->textField($model,'parentFamily'); ?>
		<?php echo $form->error($model,'parentFamily'); ?>
	</div>
	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'homePhone'); ?></h1>
		<?php echo $form->textField($model,'homePhone'); ?>
		<?php echo $form->error($model,'homePhone'); ?>
	</div>
	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'mobileNum'); ?></h1>
		<?php echo $form->textField($model,'mobileNum'); ?>
		<?php echo $form->error($model,'mobileNum'); ?>
	</div>

	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'email'); ?></h1>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'password'); ?></h1>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'confirmPassword'); ?></h1>
		<?php echo $form->passwordField($model,'confirmPassword'); ?>
		<?php echo $form->error($model,'confirmPassword'); ?>
	</div>

	<!--captcha-->	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<h1><?php echo $form->labelEx($model,'verifyCode'); ?></h1>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">لطفا عبارت مشاهده شده در بالا را وارد نمایید
		<br/>
		عبارت به حروف بزرگ و کوچک حساس نمیباشد</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	
	<div align="right" class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>