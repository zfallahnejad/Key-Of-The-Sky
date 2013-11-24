<?php
	$this->pageTitle=Yii::app()->name . ' - Refrence Point';
	$this->breadcrumbs=array(
		'Point', );
	$act = Yii::app()->db->createCommand()
				->select('actTopic,actPoint')
				->from('refrencepoint')
				->query();
?>
<div id='container'>
  
      
      
      <div id="object-browser">
		<div id="items">
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><font size="5">??????</font></th>
                    	<th><font size="5">??????</font></th>
						                    	
						
                	</tr>
            	</thead>
				<tbody>
				
					<form  method="POST" action="point.php">
						<?php
							foreach($act as $row)
							{
								?>
								<tr>
									
									<td><font size="4"><?php echo $row['actPoint'];?></font></td>
									<td><font size="4"><?php echo $row['actTopic'];?></font></td>
                    				
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