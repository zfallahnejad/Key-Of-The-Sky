<?php
/* @var $this SiteController */
/* @var $model EditpasswordForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Edit Password';
$this->breadcrumbs=array(
	'Editpassword', );
?>

<h1 align="right"><font size = 5><b>تغییر رمز عبور</b></font></h1>

<?php if(Yii::app()->user->hasFlash('editpassword')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('editpassword'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با اطلاعات مناسب پر  کنید</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'editpassword-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>
	
	<div class="row">
		<?php echo $form->labelEx($model,'currentpassword'); ?>
		<?php echo $form->passwordField($model,'currentpassword'); ?>
		<?php echo $form->error($model,'currentpassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'newpassword'); ?>
		<?php echo $form->passwordField($model,'newpassword'); ?>
		<?php echo $form->error($model,'newpassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'confirmPassword'); ?>
		<?php echo $form->passwordField($model,'confirmPassword'); ?>
		<?php echo $form->error($model,'confirmPassword'); ?>
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