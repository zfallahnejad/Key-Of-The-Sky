<?php
/* @var $this SiteController */
/* @var $model EditliableForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Edit Reward';
$this->breadcrumbs=array(
	'Editreward', );
?>

<h1 align="right"><font size = 5><b>?????? ?????</b></font></h1>

<?php if(Yii::app()->user->hasFlash('editreward')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('editreward'); ?>
</div>

<?php else: ?>

<!--reward1-->

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'editreward-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	
	<p align="right" class="note">?? ????? ?? ???? ? ????? ???? ???? ?? ????? ????? ??????? ???? ??? ? ?? ???? ?? ?????? ???? ?????? ?????? ???.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'rewardTopic'); ?>
		<?php echo $form->textField($model,'rewardTopic'); ?>
		<?php echo $form->error($model,'rewardTopic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rewardPoint'); ?>
		<?php echo $form->textField($model,'rewardPoint'); ?>
		<?php echo $form->error($model,'rewardPoint'); ?>
	</div>

	
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('???'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>