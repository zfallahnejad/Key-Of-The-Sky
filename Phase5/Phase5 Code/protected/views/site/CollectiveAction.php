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
	$actTopic = Yii::app()->db->createCommand()
				->select('actTopic')
				->from('refrencepoint')
				->where('actId=:actId',array(':actId'=>$actId))
				->queryScalar();
?>
<h2 align="right" class="header">ثبت فعالیت جمعی <?php echo $actTopic;?><span class="header-line"></span></h2>

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
	
	<div class="row">
		<?php echo $form->labelEx($model,'actdate'); ?>
		<input id="date_btn" type="button" title="انتخاب تاریخ " value="انتخاب تاریخ" >
		<?php echo $form->textField($model,'actdate',array('id'=>'CollectiveActionForm_date')); ?>
		<?php echo $form->error($model,'actdate'); ?>
	</div>
	
	<div align="right" class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->

<script>		
Calendar.setup({
	inputField:'CollectiveActionForm_date',
    button: 'date_btn',
    ifFormat: '%Y/%m/%d',
    dateType: 'jalali',
    langNumbers: 'true' ,
    
});

</script>
<?php endif; ?>

