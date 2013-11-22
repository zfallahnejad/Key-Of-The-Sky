<?php
/* @var $this SiteController */
/* @var $model EditliableForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Edit School';
$this->breadcrumbs=array(
	'Editschool', );
?>

<h1 align="right"><font size = 5><b>تغییر مشخصات</b></font></h1>

<?php if(Yii::app()->user->hasFlash('editschool')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('editschool'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با اطلاعات مناسب پر  کنید</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'editschool-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>
	<p align="right" class="note">پر ننمودن هر فیلد و فشردن دکمه ثبت، به منزله تایید اطلاعات قبلی است و آن فیلد در پایگاه داده تغییری تخواهد کرد.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'schoolName'); ?>
		<?php echo $form->textField($model,'schoolName'); ?>
		<?php echo $form->error($model,'schoolName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schoolPhone'); ?>
		<?php echo $form->textField($model,'schoolPhone'); ?>
		<?php echo $form->error($model,'schoolPhone'); ?>
	</div>

	<div align="right" class="row">
		<?php echo $form->labelEx($model,'schoolAddress'); ?>
		<?php echo $form->textField($model,'schoolAddress'); ?>
		<?php echo $form->error($model,'schoolAddress'); ?>
	</div>

	<div align="right" class="row">
		<?php echo $form->labelEx($model,'teacherName'); ?>
		<?php echo $form->textField($model,'teacherName'); ?>
		<?php echo $form->error($model,'teacherName'); ?>
	</div>

	<div align="right" class="row">
		<?php echo $form->labelEx($model,'teacherFamily'); ?>
		<?php echo $form->textField($model,'teacherFamily'); ?>
		<?php echo $form->error($model,'teacherFamily'); ?>
	</div>

	<div align="right" class="row">
		<?php echo $form->labelEx($model,'teacherPhone'); ?>
		<?php echo $form->textField($model,'teacherPhone'); ?>
		<?php echo $form->error($model,'teacherPhone'); ?>
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