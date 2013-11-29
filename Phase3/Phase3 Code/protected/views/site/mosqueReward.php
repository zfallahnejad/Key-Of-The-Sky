<?php

?><?php
	$this->pageTitle=Yii::app()->name . ' - mosque reward';
	$mosqueId = (int) $_GET['Id'];
	$this->breadcrumbs=array(
		'Point', );
	$act = Yii::app()->db->createCommand()
				->select('neededPoint,rewardTopic')
				->from('reward')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->queryAll();
				
	$mosqueName = Yii::app()->db->createCommand()
				->select('mosqueName')
				->from('mosqueculturalliablee')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->queryScalar();
                
?>

				

				
<div id='container'>
  
      <p><font size="3"><?php echo $mosqueName ;?></font></p>
      
      <div id="object-browser">
		<div id="items">
			<table class="table table-striped">
				<thead>
            		<tr>
					
						<th><font size="5">جایزه</font></th>
                		<th><font size="5">امتیاز</font></th>
                    	<th></th>				            	
						
                	</tr>
					
            	</thead>
				<tbody>
				
					<form  method="POST" action="mosqueReward.php">
						<?php
							foreach($act as $row)
							{
								?>
								<tr>
									
									<td><font size="4"><?php echo $row['neededPoint'];?></font></td>
									<td><font size="4"><?php echo $row['rewardTopic'];?></font></td>
									
									
									<td></td>
								
                    				
				               	</tr>
								<?php
							}
							?>
					
					</form>
						
				</tbody>
			</table>
		</div>
		</div>
 		
<?php
	$act = Yii::app()->db->createCommand()
				->select('stName,stFamily')
				->from('student')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->queryAll();

				
?>	
		<div id="object-browser">
		<div id="items">
			<table class="table table-striped">
				<thead>
            		<tr>
					    
                		<th><font size="5">نام دانش آموز</font></th>
                    	<th><font size="5">نام خانوادگی دانش آموز</font></th>
						<th></th>
						                    	
						
                	</tr>
            	</thead>
				<tbody>
				
					<form  method="POST" action="point.php">
						<?php
							foreach($act as $row)
							{
								?>
								<tr>
								    
									
									<td><font size="4"><?php echo $row['stName'];?></font></td>
									<td><font size="4"><?php echo $row['stFamily'];?></font></td>
									
                    				<td></td>
				               	</tr>
								<?php
							}
							?>
					</form>	
				</tbody>
			</table>
		</div>
		</div>

		
	</div>
