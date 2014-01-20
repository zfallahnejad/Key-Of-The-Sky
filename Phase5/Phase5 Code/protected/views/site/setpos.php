<?php
/* @var $this SiteController */
/* @var $model EditliableForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Setpos';
$this->breadcrumbs=array(
	'Setpos', );
?>

<h1 align="right"><font size = 5><b>تعیین مختصات مسجد</b></font></h1>

<?php if(Yii::app()->user->hasFlash('setpos')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('setpos'); ?>
</div>



<?php else: ?>


<!--reward1-->

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setpos-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>
	

	<div class="row">
		<?php echo $form->labelEx($model,'lat'); ?>
		<?php echo $form->textField($model,'lat'); ?>
		<?php echo $form->error($model,'lat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lng'); ?>
		<?php echo $form->textField($model,'lng'); ?>
		<?php echo $form->error($model,'lng'); ?>
	</div>

	
	<?php $this->widget('ext.bootstrap.widgets.TbButton', array('buttonType'=>'submit','label'=>'ثبت',/*'type'=>'info',*/'size'=>'large')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>