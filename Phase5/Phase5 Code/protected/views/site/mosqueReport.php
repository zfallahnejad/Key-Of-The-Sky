<?php
/* @var $this SiteController */
/* @var $model mosqueReportForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Mosque Report';
$this->breadcrumbs=array(
	'MosqueReport', );
?>

<h1 align="right"><font size = 5><b>گزارش گیری از عملکرد مساجد</b></font></h1>

<?php if(Yii::app()->user->hasFlash('mosqueReport')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('mosqueReport'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با تکمیل نمایید.</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mosqueReport-form',
	'enableClientValidation'=>true,/*'enableAjaxValidation' => true,*/
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>
	
	<div class="row">
		<?php echo $form->labelEx($model,'ReportType'); ?>
		<?php echo $form->dropDownList($model,'ReportType',array(1 => 'نمودار رشد ثبت نام',2 => 'فعالیت های گروهی',3=>'کل فعالیت ها(آمار هفتگی)'),array('prompt'=>'لطفا یک نوع گزارش را انتخاب کنید'/*,'value'=>'1'*/));?>
		<?php echo $form->error($model,'ReportType'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'MosqueName'); ?>
		<?php echo $form->dropDownList($model,'MosqueName',$mosquesName,array('prompt'=>'لطفا یک مسجد را انتخاب کنید'/*,'value'=>'1'*/));?>
		<?php echo $form->error($model,'MosqueName'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'startDate'); ?>
		<input id="startDate_btn" type="button" title="انتخاب تاریخ " value="انتخاب تاریخ" >
		<?php echo $form->textField($model,'startDate',array('id'=>'mosqueReportForm_startDate')); ?>
		<?php echo $form->error($model,'startDate'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'FinishDate'); ?>
		<input id="FinishDate_btn" type="button" title="انتخاب تاریخ " value="انتخاب تاریخ" >
		<?php echo $form->textField($model,'FinishDate',array('id'=>'mosqueReportForm_FinishDate')); ?>
		<?php echo $form->error($model,'FinishDate'); ?>
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
	
	<?php $this->widget('ext.bootstrap.widgets.TbButton', array('buttonType'=>'submit','label'=>'ثبت',/*'type'=>'info',*/'size'=>'large')); ?>
	
<?php $this->endWidget(); ?>
</div><!-- form -->
<script>		
Calendar.setup({
	inputField:'mosqueReportForm_startDate',
    button: 'startDate_btn',
    ifFormat: '%Y/%m/%d',
    dateType: 'jalali',
    langNumbers: 'true' ,
});
</script>
<script>		
Calendar.setup({
	inputField:'mosqueReportForm_FinishDate',
    button: 'FinishDate_btn',
    ifFormat: '%Y/%m/%d',
    dateType: 'jalali',
    langNumbers: 'true' ,
});
</script>
<?php endif; ?>