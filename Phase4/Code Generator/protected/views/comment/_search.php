<?php
/* @var $this CommentController */
/* @var $model comment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'commentId'); ?>
		<?php echo $form->textField($model,'commentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SenderName'); ?>
		<?php echo $form->textField($model,'SenderName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SenderMail'); ?>
		<?php echo $form->textField($model,'SenderMail',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ReceiverMail'); ?>
		<?php echo $form->textField($model,'ReceiverMail',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Category'); ?>
		<?php echo $form->textField($model,'Category',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Subject'); ?>
		<?php echo $form->textField($model,'Subject',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Body'); ?>
		<?php echo $form->textArea($model,'Body',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SendDate'); ?>
		<?php echo $form->textField($model,'SendDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SendTime'); ?>
		<?php echo $form->textField($model,'SendTime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->