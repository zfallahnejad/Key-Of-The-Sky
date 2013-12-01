<?php
	$this->pageTitle=Yii::app()->name . ' - Give Point';
	$this->breadcrumbs=array(
		'Point', );
	$stCode = (int) $_GET['stCode'];
	$student = Yii::app()->db->createCommand()
				->select('stName,stFamily')
				->from('student')
				->where('stCode=:stCode', array(':stCode'=>$stCode))
				->queryRow();
	$userId = Yii::app()->user->getId();
	$act = Yii::app()->db->createCommand()
				->select('actTopic,actPoint')
				->from('refrencepoint')
				->where('userId=:userId',array('userId'=>$userId))
				->order('actId')
				->query();
	$rowCounter=0;
?>
<h2 align="right" class="header">امتیازدهی<span class="header-line"></span></h2>

<?php if(Yii::app()->user->hasFlash('givepoint')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('givepoint'); ?>
</div>

<?php else: ?>

<p><font size="3"><?php echo $student['stName'],' ',$student['stFamily'] ;?></font></p>
      
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'givepoint-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));?>
	<table class="table table-striped" align="right">
		<thead align="right">
         	<tr align="right">
             	<th><div align="right"<font size="3">عنوان فعالیت ها</font></div></th>
                <th><font size="3">امتیاز</font></th>
				<th></th>
			</tr>
		</thead>
		<tbody align="right">
			<?php
				foreach($act as $row)
				{
					?>
					<tr align="right">
						<td><div align="right"><font size="4"><?php echo $row['actTopic'];?></font></div></td>
                    	<td><font size="4"><?php echo $row['actPoint'];?></font></td>
						<td>
							<?php echo $form->checkBox($model,"results[$rowCounter]");?>
						</td>
					</tr>
					<?php
					$rowCounter++;
				}
				?>	
		</tbody>
	</table>
	
	<div align="right" class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>
	
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>

