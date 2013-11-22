<?php 

$this->pageTitle=Yii::app()->name . ' - Student';
$this->breadcrumbs=array(
	'Student',);
?>

<h1 align="right"><font size = 5><b>ثبت نام دانش‌آموز</b></font></h1>


<?php if(Yii::app()->user->hasFlash('student')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('student'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با اطلاعات مناسب پر کنید</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>

	<div align="right" class="row">
		<?php echo $form->labelEx($model,'stname'); ?>
		<?php echo $form->textField($model,'stname'); ?>
		<?php echo $form->error($model,'stname'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'stfamily'); ?>
		<?php echo $form->textField($model,'stfamily'); ?>
		<?php echo $form->error($model,'stfamily'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'birthdate'); ?>
		<?php echo $form->dateField($model,'birthdate'); ?>
		<?php echo $form->error($model,'birthdate'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'fathername'); ?>
		<?php echo $form->textField($model,'fathername'); ?>
		<?php echo $form->error($model,'fathername'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'parentcode'); ?>
		<?php echo $form->numberField($model,'parentcode'); ?>
		<?php echo $form->error($model,'parentcode'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'school'); ?>
		<?php echo $form->textField($model,'school'); ?>
		<?php echo $form->error($model,'school'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'schoolid'); ?>
		<?php echo $form->numberField($model,'schoolid'); ?>
		<?php echo $form->error($model,'schoolid'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'stcode'); ?>
		<?php echo $form->numberField($model,'stcode'); ?>
		<?php echo $form->error($model,'stcode'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address'); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'picture'); ?>
		<?php echo $form->fileField($model,'picture',array('file' ,'type'=>'jpg, png','maxSize'=>1024*60)); ?>
		<?php echo $form->error($model,'picture'); ?>
	</div>

	<div align="right" class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>