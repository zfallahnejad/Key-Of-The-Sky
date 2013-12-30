<?php

?><?php
	$this->pageTitle=Yii::app()->name . ' - school page';
	$schoolId = (int) $_GET['schoolId'];
	$this->breadcrumbs=array(
		'school', );
	$schoolName = Yii::app()->db->createCommand()
				->select('schoolName')
				->from('school')
				->where('schoolId=:Id',array('Id'=>$schoolId))
				->queryScalar();
	
	$students = Yii::app()->db->createCommand()
				->select('stName,stFamily,stCode,Id')
				->from('student')
				->where('schoolId=:Id',array('Id'=>$schoolId))
				->queryAll();               
?>
<div id='container' style="direction:rtl" align="right">
	<h2 class="header">مدرسه <?php echo $schoolName ;?><span class="header-line"></span></h2>
	
	
    
 	<br>
	<h3 class="note">مشخصات دانش آموزان<span class="header-line"></span></h3>	
	<div id="object-browser">
		<div id="items">
			<table class="table table-striped">
				<thead>
            		<tr>
						<th><div align="right">نام</div></th>
                    	<th><div align="right">نام خانوادگی</div></th>
						<th><div align="right">نام مسجد</div></th>
						<th><div align="right">امتیاز کسب شده</div></th>               			
                	</tr>
            	</thead>
				<tbody>
					<?php
					foreach($students as $row)
					{	
						$stMosqueId=$row['Id'];
						$mosqueName = Yii::app()->db->createCommand()
										->select('mosqueName')
										->from('mosqueculturalliablee')
										->where('Id=:Id',array('Id'=>$stMosqueId))
										->queryScalar();
						$stCode=$row['stCode'];
						
						$points=0;
						$studentPoints = Yii::app()->db->createCommand()
										->select('actId,pcounter')
										->from('point')
										->where('stCode=:stCode',array(':stCode'=>$stCode))
										->query();
						foreach($studentPoints as $row1)
						{
							$actId=$row1['actId'];
							$actPoint = Yii::app()->db->createCommand()
										->select('actPoint')
										->from('refrencepoint')
										->where('actId=:actId',array(':actId'=>$actId))
										->queryScalar();
							$temp=$row1['pcounter'];
							$temp=$temp*$actPoint;
							$points=$points+$temp;
						}
						?>
						<tr>
							<td><div align="right"><?php echo $row['stName'];?></div></td>
							<td><div align="right"><?php echo $row['stFamily'];?></div></td>
							<td><div align="right"><?php echo $mosqueName;?></div></td>
							<td><div align="right"><?php echo $points;?></div></td>
						</tr>
					<?php
					}
					?>	
				</tbody>
			</table>
		</div>
	</div>
</div>
