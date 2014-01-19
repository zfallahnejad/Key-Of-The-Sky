<?php
/* @var $this SiteController */
/* @var $model mosqueReportForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Top Students';
$this->breadcrumbs=array(
	'TopStudents', );
?>

<h1 align="right"><font size = 5><b>گزارش دانش آموزان ممتاز مساجد</b></font></h1>

<?php if(Yii::app()->user->hasFlash('topStudents')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('topStudents'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با تکمیل نمایید.</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'topStudents-form',
	'enableClientValidation'=>true,/*'enableAjaxValidation' => true,*/
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>
	
	<div class="row">
		<?php echo $form->labelEx($model,'MosqueName'); ?>
		<?php echo $form->dropDownList($model,'MosqueName',$mosquesName,array('prompt'=>'لطفا یک مسجد را انتخاب کنید'/*,'value'=>'1'*/));?>
		<?php echo $form->error($model,'MosqueName'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'TopNumber'); ?>
		<?php echo $form->numberField($model,'TopNumber');?>
		<?php echo $form->error($model,'TopNumber'); ?>
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
		<div class="hint">لطفا عبارت مشاهده شده در بالا را وارد نمایید<br/>عبارت به حروف بزرگ و کوچک حساس نمیباشد</div>
		<?php //echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>
	
<?php $this->endWidget(); ?>
</div><!-- form -->

<?php endif; ?>