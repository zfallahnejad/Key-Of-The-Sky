<?php
/* @var $this studentController */
/* @var $model student */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-student-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'stName'); ?>
		<?php echo $form->textField($model,'stName'); ?>
		<?php echo $form->error($model,'stName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stFamily'); ?>
		<?php echo $form->textField($model,'stFamily'); ?>
		<?php echo $form->error($model,'stFamily'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fatherName'); ?>
		<?php echo $form->textField($model,'fatherName'); ?>
		<?php echo $form->error($model,'fatherName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stCode'); ?>
		<?php echo $form->textField($model,'stCode'); ?>
		<?php echo $form->error($model,'stCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school'); ?>
		<?php echo $form->textField($model,'school'); ?>
		<?php echo $form->error($model,'school'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address'); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parentCode'); ?>
		<?php echo $form->textField($model,'parentCode'); ?>
		<?php echo $form->error($model,'parentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
		<?php echo $form->error($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schoolId'); ?>
		<?php echo $form->textField($model,'schoolId'); ?>
		<?php echo $form->error($model,'schoolId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthdate'); ?>
		<?php echo $form->textField($model,'birthdate'); ?>
		<?php echo $form->error($model,'birthdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture'); ?>
		<?php echo $form->textField($model,'picture'); ?>
		<?php echo $form->error($model,'picture'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->