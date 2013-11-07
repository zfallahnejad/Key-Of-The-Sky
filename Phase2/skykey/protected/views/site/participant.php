<?php 
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Participant';
$this->breadcrumbs=array(
	'Participant',);
?>

<h1 align="right"><font size = 5><b>ثبت نام شرکت کننده</b></font></h1>

<?php if(Yii::app()->user->hasFlash('participant')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('participant'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با اطلاعات مناسب پر کنید</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'participant-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>

	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'stName'); ?></h1>
		<?php echo $form->textField($model,'stName'); ?>
		<?php echo $form->error($model,'stName'); ?>
	</div>

	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'schoolphone'); ?></h1>
		<?php echo $form->textField($model,'schoolphone'); ?>
		<?php echo $form->error($model,'schoolphone'); ?>
	</div>
	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'schooladdress'); ?></h1>
		<?php echo $form->textField($model,'schooladdress'); ?>
		<?php echo $form->error($model,'schooladdress'); ?>
	</div>
	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'teachername'); ?></h1>
		<?php echo $form->textField($model,'teachername'); ?>
		<?php echo $form->error($model,'teachername'); ?>
	</div>
	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'teacherfamily'); ?></h1>
		<?php echo $form->textField($model,'teacherfamily'); ?>
		<?php echo $form->error($model,'teacherfamily'); ?>
	</div>
	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'teacherphone'); ?></h1>
		<?php echo $form->textField($model,'teacherphone'); ?>
		<?php echo $form->error($model,'teacherphone'); ?>
	</div>

	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'email'); ?></h1>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div align="right" class="row">
		<h1><?php echo $form->labelEx($model,'password'); ?></h1>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>

	<div class="row">
		<h1><?php echo $form->labelEx($model,'confirmPassword'); ?></h1>
		<?php echo $form->passwordField($model,'confirmPassword'); ?>
		<?php echo $form->error($model,'confirmPassword'); ?>
	</div>

	<!--captcha-->	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<h1><?php echo $form->labelEx($model,'verifyCode'); ?></h1>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">لطفا عبارت مشاهده شده در بالا را وارد نمایید
		<br/>
		عبارت به حروف بزرگ و کوچک حساس نمیباشد</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	
	<div align="right" class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>