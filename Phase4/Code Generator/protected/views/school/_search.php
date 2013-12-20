<?php
/* @var $this SchoolController */
/* @var $model school */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'schoolId'); ?>
		<?php echo $form->textField($model,'schoolId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'schoolName'); ?>
		<?php echo $form->textField($model,'schoolName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'schoolPhone'); ?>
		<?php echo $form->textField($model,'schoolPhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'schoolAddress'); ?>
		<?php echo $form->textArea($model,'schoolAddress',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'teacherName'); ?>
		<?php echo $form->textField($model,'teacherName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'teacherFamily'); ?>
		<?php echo $form->textField($model,'teacherFamily',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'teacherPhone'); ?>
		<?php echo $form->textField($model,'teacherPhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->