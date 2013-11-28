<?php
	$this->pageTitle=Yii::app()->name . ' - Refrence Point';
	$this->breadcrumbs=array(
		'Point', );
	$act = Yii::app()->db->createCommand()
				->select('actTopic,actPoint')
				->from('refrencepoint')
				->query();
?>
<div id='container' >
  	  <h2 align="right" class="header">امتیازدهی<span class="header-line"></span></h2>
      
      
      <div id="object-browser" align="right">
		<div id="items" align="right">
			<table class="table table-striped" align="right">
				<thead align="right">
            		<tr align="right">
                		<th><div align="right"><font size="3">عنوان فعالیت ها</font></div></th>
                    	<th><font size="3">امتیاز</font></th>
                        <th><div align="left"><font size="3">وضعیت فعالیت</font></div></th>
						                    	
						
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
									<td><input type="checkbox" name="فعالیت ها" ></td>
									
								    <tr></tr>
				               	</tr>
								<?php
							}
							?>
					</form>	
				</tbody>
			</table>
		</div>
	</div>
	<div align="right" class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>

</div>