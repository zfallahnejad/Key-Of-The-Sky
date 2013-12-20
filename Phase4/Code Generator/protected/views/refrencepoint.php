<?php
/* @var $this refrencepointController */
/* @var $model refrencepoint */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'refrencepoint-refrencepoint-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'actPoint'); ?>
		<?php echo $form->textField($model,'actPoint'); ?>
		<?php echo $form->error($model,'actPoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actTopic'); ?>
		<?php echo $form->textField($model,'actTopic'); ?>
		<?php echo $form->error($model,'actTopic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userID'); ?>
		<?php echo $form->textField($model,'userID'); ?>
		<?php echo $form->error($model,'userID'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->