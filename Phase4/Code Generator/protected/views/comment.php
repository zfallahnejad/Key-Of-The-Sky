<?php
/* @var $this commentController */
/* @var $model comment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-comment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'SenderMail'); ?>
		<?php echo $form->textField($model,'SenderMail'); ?>
		<?php echo $form->error($model,'SenderMail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ReceiverMail'); ?>
		<?php echo $form->textField($model,'ReceiverMail'); ?>
		<?php echo $form->error($model,'ReceiverMail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Category'); ?>
		<?php echo $form->textField($model,'Category'); ?>
		<?php echo $form->error($model,'Category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Subject'); ?>
		<?php echo $form->textField($model,'Subject'); ?>
		<?php echo $form->error($model,'Subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Body'); ?>
		<?php echo $form->textField($model,'Body'); ?>
		<?php echo $form->error($model,'Body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SendDate'); ?>
		<?php echo $form->textField($model,'SendDate'); ?>
		<?php echo $form->error($model,'SendDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SendTime'); ?>
		<?php echo $form->textField($model,'SendTime'); ?>
		<?php echo $form->error($model,'SendTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SenderName'); ?>
		<?php echo $form->textField($model,'SenderName'); ?>
		<?php echo $form->error($model,'SenderName'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->