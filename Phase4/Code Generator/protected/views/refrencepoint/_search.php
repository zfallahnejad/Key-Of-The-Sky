<?php
/* @var $this RefrencepointController */
/* @var $model refrencepoint */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'actId'); ?>
		<?php echo $form->textField($model,'actId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actPoint'); ?>
		<?php echo $form->textField($model,'actPoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actTopic'); ?>
		<?php echo $form->textField($model,'actTopic',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userID'); ?>
		<?php echo $form->textField($model,'userID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->