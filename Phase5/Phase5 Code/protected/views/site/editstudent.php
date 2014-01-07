<?php 
$stCode = (int) $_GET['stCode'];
if (!($stCode>0)){
			$this->redirect(array('/site/MosqueHome'));

		}
$this->pageTitle=Yii::app()->name . ' - Edit Student';
$this->breadcrumbs=array(
	'Edit Student',);
?>

<h1 align="right"><font size = 5><b>ویرایش مشخصات</b></font></h1>


<?php if(Yii::app()->user->hasFlash('editstudent')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('editstudent'); ?>
</div>

<?php else: ?>

<p align="right">لطفا فرم زیر را با اطلاعات مناسب پر کنید</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'editstudent-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); 
$birth=$model['birthdate'];
?>

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
		<input id="date_btn" type="button" title="انتخاب تاریخ " value="انتخاب تاریخ" >
		<div align="right" class="row">
			<input name="EditstudentForm[birthdate]" id="GivePointForm_da" type="text" value="<?php echo $birth ;?>"/>

		</div>
		<?php echo $form->error($model,'birthdate'); ?>
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
	
	<div align="right" class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<script>		
Calendar.setup({
	inputField:'GivePointForm_da',
    button: 'date_btn',
    ifFormat: '%Y/%m/%d',
    dateType: 'jalali',
    langNumbers: 'true' ,
    
});

</script>
<?php endif; ?>