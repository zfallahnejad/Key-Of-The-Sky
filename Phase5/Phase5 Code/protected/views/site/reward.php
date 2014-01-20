<?php
$this->pageTitle=Yii::app()->name . ' - Reward';
$this->breadcrumbs=array(
	'Reward', );
?>

<h1 align="right"><font size = 5><b>تعیین جوایز</b></font></h1>

<?php if(Yii::app()->user->hasFlash('reward')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('reward'); ?>
</div>
<?php else: ?>

<!--reward1-->

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reward-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>
	
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

	<?php $this->widget('ext.bootstrap.widgets.TbButton', array('buttonType'=>'submit','label'=>'ثبت',/*'type'=>'info',*/'size'=>'large')); ?>
	
<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>