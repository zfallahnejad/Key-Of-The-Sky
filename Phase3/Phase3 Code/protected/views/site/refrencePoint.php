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
  	  <h2 class="header">لیست امتیازات<span class="header-line"></span></h2>
      
      
      <div id="object-browser">
		<div id="items">
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><div align="right"><font size="3">عنوان فعالیت</font></div></th>
                    	<th><div align="left"><font size="3">امتیاز</font></div></th>
						                    	
						
                	</tr>
            	</thead>
				<tbody>
				
					<form  method="POST" action="point.php">
						<?php
							foreach($act as $row)
							{
								?>
								<tr>
									
									
									<td><div align="right"><font size="4"><?php echo $row['actTopic'];?></font></div></td>
                    				<td><div align="left"><font size="4"><?php echo $row['actPoint'];?></font></div></td>
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