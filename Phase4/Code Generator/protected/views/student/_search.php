<?php
/* @var $this StudentController */
/* @var $model student */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'stName'); ?>
		<?php echo $form->textField($model,'stName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stFamily'); ?>
		<?php echo $form->textField($model,'stFamily',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fatherName'); ?>
		<?php echo $form->textField($model,'fatherName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stCode'); ?>
		<?php echo $form->textField($model,'stCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'school'); ?>
		<?php echo $form->textField($model,'school',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthdate'); ?>
		<?php echo $form->textField($model,'birthdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'picture'); ?>
		<?php echo $form->textField($model,'picture'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parentCode'); ?>
		<?php echo $form->textField($model,'parentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'schoolId'); ?>
		<?php echo $form->textField($model,'schoolId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->