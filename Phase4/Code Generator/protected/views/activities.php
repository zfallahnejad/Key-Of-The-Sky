<?php
/* @var $this activitiesController */
/* @var $model activities */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activities-activities-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mosqueId'); ?>
		<?php echo $form->textField($model,'mosqueId'); ?>
		<?php echo $form->error($model,'mosqueId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actId'); ?>
		<?php echo $form->textField($model,'actId'); ?>
		<?php echo $form->error($model,'actId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'counter'); ?>
		<?php echo $form->textField($model,'counter'); ?>
		<?php echo $form->error($model,'counter'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->