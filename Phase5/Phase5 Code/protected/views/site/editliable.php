<?php
/* @var $this SiteController */
/* @var $model EditliableForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Edit Liable';
$this->breadcrumbs=array(
	'Editliable', );
?>

<h1 align="right"><font size = 5><b>تغییر مشخصات</b></font></h1>

<?php if(Yii::app()->user->hasFlash('editliable')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('editliable'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با اطلاعات مناسب پر  کنید</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'editliable-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'family'); ?>
		<?php echo $form->textField($model,'family'); ?>
		<?php echo $form->error($model,'family'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel'); ?>
		<?php echo $form->textField($model,'tel',array('size'=>7,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'tel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>11,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mosqueAddress'); ?>
		<?php echo $form->textArea($model,'mosqueAddress',array('rows'=>6,'cols'=>50)); ?>
		<?php echo $form->error($model,'mosqueAddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('file' ,'type'=>'jpg, png','maxSize'=>1024*60)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<!--captcha-->	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
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
		<?php //echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	
	<?php $this->widget('ext.bootstrap.widgets.TbButton', array('buttonType'=>'submit','label'=>'ثبت',/*'type'=>'info',*/'size'=>'large')); ?>
	
<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>