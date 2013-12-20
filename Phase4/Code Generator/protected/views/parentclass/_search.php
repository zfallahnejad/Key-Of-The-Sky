<?php
/* @var $this ParentclassController */
/* @var $model parentclass */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'parentCode'); ?>
		<?php echo $form->textField($model,'parentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parentName'); ?>
		<?php echo $form->textField($model,'parentName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parentFamily'); ?>
		<?php echo $form->textField($model,'parentFamily',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'homePhone'); ?>
		<?php echo $form->textField($model,'homePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobileNum'); ?>
		<?php echo $form->textField($model,'mobileNum'); ?>
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