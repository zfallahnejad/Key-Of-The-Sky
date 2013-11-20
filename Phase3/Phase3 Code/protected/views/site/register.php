<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Register Liable';
$this->breadcrumbs=array(
	'Register', );
?>

<h1 align="right"><font size = 5><b>ثبت نام مسئول مسجد</b></font></h1>

<?php if(Yii::app()->user->hasFlash('register')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('register'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با اطلاعات مناسب پر  کنید</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'name'); ?></h1>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'family'); ?></h1>
		<?php echo $form->textField($model,'family'); ?>
		<?php echo $form->error($model,'family'); ?>
	</div>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'mosqueName'); ?></h1>
		<?php echo $form->textField($model,'mosqueName'); ?>
		<?php echo $form->error($model,'mosqueName'); ?>
	</div>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'email'); ?></h1>
		<?php echo $form->emailField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'password'); ?></h1>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'confirmPassword'); ?></h1>
		<?php echo $form->passwordField($model,'confirmPassword'); ?>
		<?php echo $form->error($model,'confirmPassword'); ?>
	</div>
	<div class="row">
		<h1><?php echo $form->labelEx($model,'tel'); ?></h1>
		<?php echo $form->textField($model,'tel',array('size'=>7,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'tel'); ?>
	</div>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'mobile'); ?></h1>
		<?php echo $form->textField($model,'mobile',array('size'=>11,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'mosqueAddress'); ?></h1>
		<?php echo $form->textArea($model,'mosqueAddress',array('rows'=>6,'cols'=>50)); ?>
		<?php echo $form->error($model,'mosqueAddress'); ?>
	</div>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'image'); ?></h1>
		<?php echo $form->fileField($model,'image',array('file' ,'type'=>'jpg, png','maxSize'=>1024*60)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<!--captcha-->	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<h1><?php echo $form->labelEx($model,'verifyCode'); ?></h1>
		<div>
		<?php $this->widget('Captcha',array(
						    'buttonLabel' => "کد جدید",
						    'clickableImage' => true,
						    'refresh' => $refreshCaptcha));?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">لطفا عبارت مشاهده شده در بالا را وارد نمایید
		<br/>
		عبارت به حروف بزرگ و کوچک حساس نمیباشد</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>