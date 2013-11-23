<?php
	$this->pageTitle=Yii::app()->name . ' - Mosque Liable';
	$this->breadcrumbs=array(
		'Liable', );
	$mail=Yii::app()->user->name;
	$parentCode =Yii::app()->db->createCommand()
		    ->select ('parentCode')
		    ->from('parent')
		    ->where('email=:mail', array(':mail'=>$mail))
            ->queryScalar();
	$students = Yii::app()->db->createCommand()
				->select('stName,stFamily,stCode')
				->from('student')
				->where('parentCode=:parentCode', array(':parentCode'=>$parentCode))
				->query();
?>
<div id='container'>
      <h2 class="header">فرزندان شما<span class="header-line"></span></h2>
      
      
      <div id="object-browser">
		<div id="items">
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th>نام</th>
                    	<th>نام خانوادگی</th>
                    	<th>کد ملی</th>
						<th></th>
                	</tr>
            	</thead>
				<tbody>
					<form  method="POST" action="point2.php">
						<?php
							foreach($students as $row)
							{
								?>
								<tr>
									<td><?php echo $row['stName'];?></td>
									<td><?php echo $row['stFamily'];?></td>
									<td><?php echo $row['stCode']; ?></td>
                    				<td><a href="http://localhost/skykey/protected/views/site/point2.php?StCode=<?php echo $row['stCode'];?>" >امتیازدهی</a></td>
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