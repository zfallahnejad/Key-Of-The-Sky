<?php
/* @var $this rewardController */
/* @var $model reward */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reward-reward-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rewardTopic'); ?>
		<?php echo $form->textField($model,'rewardTopic'); ?>
		<?php echo $form->error($model,'rewardTopic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'neededPoint'); ?>
		<?php echo $form->textField($model,'neededPoint'); ?>
		<?php echo $form->error($model,'neededPoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
		<?php echo $form->error($model,'Id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->