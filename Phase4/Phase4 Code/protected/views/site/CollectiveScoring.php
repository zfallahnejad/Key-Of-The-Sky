<?php
	$this->pageTitle=Yii::app()->name . ' - Collective Scoring ';
	$this->breadcrumbs=array(
		'Collective Scoring ', );
	$actId = (int) $_GET['actId'];
	$model->actId = $actId;
	$userId = Yii::app()->user->getId();
	$mail=Yii::app()->user->name;
	if ($userId==1){
		$Id =Yii::app()->db->createCommand()
		    ->select ('id')
		    ->from('mosqueculturalliablee')
		    ->where('email=:mail', array(':mail'=>$mail))
            ->queryScalar();
		$students = Yii::app()->db->createCommand()
				->select('stName,stFamily,stCode')
				->from('student')
				->where('Id=:Id', array(':Id'=>$Id))
				->order('stFamily')
				->query();
	}
	elseif($userId==2){
		$schoolId =Yii::app()->db->createCommand()
		    ->select ('schoolId')
		    ->from('school')
		    ->where('email=:mail', array(':mail'=>$mail))
            ->queryScalar();
		$students = Yii::app()->db->createCommand()
				->select('stName,stFamily,stCode')
				->from('student')
				->where('schoolId=:schoolId', array(':schoolId'=>$schoolId))
				->order('stFamily')
				->query();
	}
	$rowCounter=0;
	$rowNum=1;
?>
<h2 align="right" class="header">امتیازدهی<span class="header-line"></span></h2>

<?php if(Yii::app()->user->hasFlash('CollectiveScoring')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('CollectiveScoring'); ?>
</div>

<?php else: ?>
<script type='text/javascript'>
	$().ready(function(){$('#i').focus()});// focus search area
</script>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'CollectiveScoring-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));?>
	<h3 class="note">جستجوی دانش آموز بر اساس فیلد انتخاب شده <span class="header-line"></span></h3>
    	<form action='javascript:void(0);'>
      		<h3>
        		<input id='i' name='i' type='text' autocomplete="off" style="font-family:'B Nazanin'"/>
       	  جستجو بر اساس:
	        	همه موارد<input id='s4' name='select' type="radio" value="همه موارد" checked="checked"/>
            نام
            	<input id='s1' name='select' type="radio" value="نام"  />
    		    نام خانوداگي<input id='s2' name='select' type="radio" value="نام خانوداگي" />
				کد ملي<input id='s3' name='select' type="radio" value="کد ملي" />
        	</h3>
      	</form>
      	<div id="object-browser">
			<div id="items" >
				<table class="table table-striped" align="right">
					<thead align="right">
         				<tr align="right">
							<th><div align="right">شماره ردیف</div></th>
         			    	<th><div align="right">نام</div></th>
         			    	<th><div align="right">نام خانوادگی</div></th>
          		    		<th><div align="right">کد ملی</div></th>
							<th></th>
						</tr>
					</thead>
					<tbody align="right">
						<div id='wrapper'>
        					<div id='content'>
								<?php
									foreach($students as $row)
									{
										?>
										<tr id='io'>
											<td>
												<h4 align="right">
													<?php echo $rowNum;?>
												</h4>	
											</td>
											<td>
												<div class='search_item1'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['stName'];?>
													</h4>
												</div>	
											</td>
											<td>
												<div class='search_item2'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['stFamily'];?>
													</h4>
												</div>
											</td>
                    						<td>
												<div class='search_item3'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['stCode'];?>
													</h4>
												</div>
											</td>
											<td>
												<?php echo $form->checkBox($model,"results[$rowCounter]");?>
											</td>
										</tr>
										<?php
										$rowCounter++;
										$rowNum++;
									}
								?>
							</div>
						</div>
					</tbody>
				</table>
			</div>
		</div>
		<div align="right" class="row buttons">
			<?php echo CHtml::submitButton('ثبت'); ?>
		</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>

