<?php 

$this->pageTitle=Yii::app()->name . ' - School';
$this->breadcrumbs=array(
	'School',);
?>

<h1 align="right"><font size = 5><b>ثبت نام مسئول مدرسه</b></font></h1>

<p align="right">لطفا فرم زیر را با اطلاعات مناسب پر کنید</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'school-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>

	<div align="right" class="row">
		<?php echo $form->labelEx($model,'schoolname'); ?>
		<?php echo $form->textField($model,'schoolname'); ?>
		<?php echo $form->error($model,'schoolname'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'schoolphone'); ?>
		<?php echo $form->textField($model,'schoolphone'); ?>
		<?php echo $form->error($model,'schoolphone'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'schooladdress'); ?>
		<?php echo $form->textArea($model,'schooladdress'); ?>
		<?php echo $form->error($model,'schooladdress'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'teachername'); ?>
		<?php echo $form->textField($model,'teachername'); ?>
		<?php echo $form->error($model,'teachername'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'teacherfamily'); ?>
		<?php echo $form->textField($model,'teacherfamily'); ?>
		<?php echo $form->error($model,'teacherfamily'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'teacherphone'); ?>
		<?php echo $form->textField($model,'teacherphone'); ?>
		<?php echo $form->error($model,'teacherphone'); ?>
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

	<div align="right" class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
