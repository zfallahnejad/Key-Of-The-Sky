<?php
/* @var $this GooglemapController */
/* @var $model googlemap */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lat'); ?>
		<?php echo $form->textField($model,'lat',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lng'); ?>
		<?php echo $form->textField($model,'lng',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->