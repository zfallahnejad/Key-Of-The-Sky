<?php
/* @var $this schoolController */
/* @var $model school */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'school-school-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'schoolId'); ?>
		<?php echo $form->textField($model,'schoolId'); ?>
		<?php echo $form->error($model,'schoolId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schoolName'); ?>
		<?php echo $form->textField($model,'schoolName'); ?>
		<?php echo $form->error($model,'schoolName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schoolPhone'); ?>
		<?php echo $form->textField($model,'schoolPhone'); ?>
		<?php echo $form->error($model,'schoolPhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schoolAddress'); ?>
		<?php echo $form->textField($model,'schoolAddress'); ?>
		<?php echo $form->error($model,'schoolAddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teacherName'); ?>
		<?php echo $form->textField($model,'teacherName'); ?>
		<?php echo $form->error($model,'teacherName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teacherFamily'); ?>
		<?php echo $form->textField($model,'teacherFamily'); ?>
		<?php echo $form->error($model,'teacherFamily'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teacherPhone'); ?>
		<?php echo $form->textField($model,'teacherPhone'); ?>
		<?php echo $form->error($model,'teacherPhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->