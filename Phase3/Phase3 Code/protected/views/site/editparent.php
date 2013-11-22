<?php
/* @var $this SiteController */
/* @var $model EditliableForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Edit Parent';
$this->breadcrumbs=array(
	'Editparent', );
?>

<h1 align="right"><font size = 5><b>تغییر مشخصات</b></font></h1>

<?php if(Yii::app()->user->hasFlash('editparent')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('editparent'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با اطلاعات مناسب پر  کنید</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'editparent-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>
	<p align="right" class="note">پر ننمودن هر فیلد و فشردن دکمه ثبت، به منزله تایید اطلاعات قبلی است و آن فیلد در پایگاه داده تغییری تخواهد کرد.</p>

	<div align="right" class="row">
		<?php echo $form->labelEx($model,'parentname'); ?>
		<?php echo $form->textField($model,'parentname'); ?>
		<?php echo $form->error($model,'parentname'); ?>
	</div>

	<div align="right" class="row">
		<?php echo $form->labelEx($model,'parentfamily'); ?>
		<?php echo $form->textField($model,'parentfamily'); ?>
		<?php echo $form->error($model,'parentfamily'); ?>
	</div>

	<div align="right" class="row">
		<?php echo $form->labelEx($model,'homephone'); ?>
		<?php echo $form->textField($model,'homephone'); ?>
		<?php echo $form->error($model,'homephone'); ?>
	</div>
	
	<div align="right" class="row">
		<?php echo $form->labelEx($model,'mobilenum'); ?>
		<?php echo $form->textField($model,'mobilenum'); ?>
		<?php echo $form->error($model,'mobilenum'); ?>
	</div>

	<!--captcha-->	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('Captcha',array(
						    'buttonLabel' => "کد جدید",
						    'clickableImage' => true,
						    'refresh' => $refreshCaptcha));?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">لطفا عبارت مشاهده شده در بالا را وارد نمایید
		<br/>
		عبارت به حروف بزرگ و کوچک حساس نمیباشد</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>