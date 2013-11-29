<?php
	$this->pageTitle=Yii::app()->name . ' - give Point';
	$this->breadcrumbs=array(
		'Point', );
	$userId = Yii::app()->user->getId();
	$act = Yii::app()->db->createCommand()
				->select('actTopic,actPoint')
				->from('refrencepoint')
				->where('userId=:userId',array('userId'=>$userId))
				->query();
	$stCode = (int) $_GET['stCode'];
	
	$category=Yii::app()->db->createCommand()
				->select('actId')
				->from('refrencepoint')
				->where('userId=:userId',array('userId'=>$userId))
				->queryAll();
 
	$list=Yii::app()->db->createCommand()
				->select('actTopic')
				->from('refrencepoint')
				->where('userId=:userId',array('userId'=>$userId))
				->queryAll();
	
	
	$name =Yii::app()->db->createCommand()
				->select('stName')
				->from('student')
				->where("stCode=:stCode")
       			->queryScalar(array(':stCode'=>$stCode));
	$family =Yii::app()->db->createCommand()
				->select('stFamily')
				->from('student')
				->where("stCode=:stCode")
       			->queryScalar(array(':stCode'=>$stCode));

?>



<div id='container' >

	<?php if(Yii::app()->user->hasFlash('givepoint')): ?>

	<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('givepoint'); ?>
	</div>

	<?php else: ?>
	<?php endif ?>
		
  	  <h2 align="right" class="header">امتیازدهی<span class="header-line"></span></h2>
      <p><font size="3"><?php echo $name,' ',$family ;?></font></p>
      
      <div id="object-browser" align="right">
		<div id="items" align="right">
			<table class="table table-striped" align="right">
				<thead align="right">
            		<tr align="right">
                		<th><div align="right"<font size="3">عنوان فعالیت ها</font></div></th>
                    	<th><font size="3">امتیاز</font></th>
						                    	
						
                	</tr>
            	</thead>
				<tbody align="right">
				
					<form  method="POST" action="point.php">
						<?php
							foreach($act as $row)
							{
								?>
								<tr align="right">
									
									 
									<td><div align="right"><font size="4"><?php echo $row['actTopic'];?></font></div></td>
                    				<td><font size="4"><?php echo $row['actPoint'];?></font></td>
														
				               	</tr>
								<?php
							}
							?>
					</form>	
				</tbody>
			</table>				
								
									<?php
									$form=$this->beginWidget('CActiveForm', array(
									'enableAjaxValidation'=>true,
									'clientOptions'=>array('validateOnSubmit'=>true
   									),
    								)); ?>
									
									
									<?php echo $form->labelEx($model,'actTopic'); ?>
									<?php echo $form->error($model,'actTopic'); ?>
									<?php
									echo CHtml::dropDownList('actTopic', $category,$list,
           							array('empty' => 'لطفا یک فعالیت را انتخاب کنید'));
									?>
									
									
									
									
									
									
									
		</div>
	</div>
	<div align="right" class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>