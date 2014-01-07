<?php
	$this->pageTitle=Yii::app()->name . ' - Collective Action ';
	$this->breadcrumbs=array(
		'Collective Action ', );
	$actId = (int) $_GET['actId'];
	if (!($actId>0)){
			$this->redirect(array('/site/MosqueHome'));
		}
	$userId = Yii::app()->user->getId();
	$mail=Yii::app()->user->name;
	$rowCounter=0;
	$rowNum=1;
?>
<h2 align="right" class="header">ثبت فعالیت های جمعی<span class="header-line"></span></h2>

<?php if(Yii::app()->user->hasFlash('CollectiveAction')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('CollectiveAction'); ?>
</div>

<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'CollectiveAction-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));?>
	<input id="date_btn" type="button" title="انتخاب تاریخ " value="انتخاب تاریخ" >
	<div align="right" class="row">
		<input name="CollectiveActionForm[actda]" id="GivePointForm_da" type="text" />

	</div>
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

