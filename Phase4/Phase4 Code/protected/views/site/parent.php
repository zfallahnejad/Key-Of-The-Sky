<?php 

$this->pageTitle=Yii::app()->name . ' - Parent';
$this->breadcrumbs=array(
	'Parent',);
?>
<?php
	$baseUrl = Yii::app()->request->baseUrl;
?>
<h1 align="right"><font size = 5><b>ثبت نام والدین</b></font></h1>

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
		<?php echo $form->labelEx($model,'parentname'); ?>
		<?php echo $form->textField($model,'parentname'); ?>
		<?php echo $form->error($model,'parentname'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'parentfamily'); ?>
		<?php echo $form->textField($model,'parentfamily'); ?>
		<?php echo $form->error($model,'parentfamily'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'parentcode'); ?>
		<?php echo $form->textField($model,'parentcode'); ?>
		<?php echo $form->error($model,'parentcode'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'homephone'); ?>
		<?php echo $form->textField($model,'homephone'); ?>
		<?php echo $form->error($model,'homephone'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'mobilenum'); ?>
		<?php echo $form->textField($model,'mobilenum'); ?>
		<?php echo $form->error($model,'mobilenum'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div align="right" class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'confirmPassword'); ?>
		<?php echo $form->passwordField($model,'confirmPassword'); ?>
		<?php echo $form->error($model,'confirmPassword'); ?>
	</div>
	
	<div align="right" class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>