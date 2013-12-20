<?php
/* @var $this parentclassController */
/* @var $model parentclass */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parentclass-parentclass-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parentCode'); ?>
		<?php echo $form->textField($model,'parentCode'); ?>
		<?php echo $form->error($model,'parentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parentName'); ?>
		<?php echo $form->textField($model,'parentName'); ?>
		<?php echo $form->error($model,'parentName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parentFamily'); ?>
		<?php echo $form->textField($model,'parentFamily'); ?>
		<?php echo $form->error($model,'parentFamily'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'homePhone'); ?>
		<?php echo $form->textField($model,'homePhone'); ?>
		<?php echo $form->error($model,'homePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobileNum'); ?>
		<?php echo $form->textField($model,'mobileNum'); ?>
		<?php echo $form->error($model,'mobileNum'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->