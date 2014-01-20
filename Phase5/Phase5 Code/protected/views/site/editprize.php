<?php
/* @var $this SiteController */
/* @var $model EditliableForm */
/* @var $form CActiveForm */
$rewardTopic = $_GET['rewardTopic'];
	if (!($rewardTopic>'')){
			$this->redirect(array('/site/MosqueHome'));

		}
$this->pageTitle=Yii::app()->name . ' - Editprize';
$this->breadcrumbs=array(
	'Editprize', );
?>

<h1 align="right"><font size = 5><b>تغییر امتیاز جایزه</b></font></h1>

<?php if(Yii::app()->user->hasFlash('editprize')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('editprize'); ?>
</div>

<?php else: ?>

<!--editprize-->

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'editprize-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'rewardTopic'); ?>
		<?php echo $form->textField($model,'rewardTopic',array('readonly'=>true)); ?>
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