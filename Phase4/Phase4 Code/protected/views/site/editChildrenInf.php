<?php
if (Yii::app()->user->getId()==3)
{
		$this->pageTitle=Yii::app()->name . ' - Edit children information';
	$this->breadcrumbs=array(
		'EditChildrenInformation', );
	$mail=Yii::app()->user->name;
	$parentCode =Yii::app()->db->createCommand()
		    ->select ('parentCode')
		    ->from('parent')
		    ->where('email=:mail', array(':mail'=>$mail))
            ->queryScalar();
	$children = Yii::app()->db->createCommand()
				->select('stName,stFamily,stCode')
				->from('student')
				->where('parentCode=:parentCode', array(':parentCode'=>$parentCode))
				->query();
	$num = Yii::app()->db->createCommand()
				->select('count(*)')
				->from('student')
				->where('parentCode=:parentCode', array(':parentCode'=>$parentCode))
				->queryScalar();
	$r=1;
?>
<div id='container'>
      <h2 class="header">ویرایش مشخصات فرزندان شما<span class="header-line"></span></h2>
      
      
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
					<?php
						foreach($children as $row)
						{
						?>
						<tr>
							<td><?php echo $row['stName'];?></td>
							<td><?php echo $row['stFamily'];?></td>
							<td><?php echo $row['stCode']; ?></td>
                    		<td><a <?php echo CHtml::link('ویرایش مشخصات',array('site/editstudent','stCode'=>$row['stCode']));		?></a></td>
				        </tr>
						<?php
						$r=$r+1;
							}
							?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
}
?>

<?php
if (Yii::app()->user->getId()==1)
{
	$this->pageTitle=Yii::app()->name . ' - Edit student information';
	$this->breadcrumbs=array(
		'EditStudentInformation', );
	$mail=Yii::app()->user->name;
	$Id =Yii::app()->db->createCommand()
		    ->select ('Id')
		    ->from('mosqueculturalliablee')
		    ->where('email=:mail', array(':mail'=>$mail))
            ->queryScalar();
	$children = Yii::app()->db->createCommand()
				->select('stName,stFamily,stCode')
				->from('student')
				->where('Id=:Id', array(':Id'=>$Id))
				->query();
	$num = Yii::app()->db->createCommand()
				->select('count(*)')
				->from('student')
				->where('Id=:Id', array(':Id'=>$Id))
				->queryScalar();
	$r=1;
?>
<div id='container'>
      <h2 class="header">ویرایش مشخصات فرزندان شما<span class="header-line"></span></h2>
      
      
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
					<?php
						foreach($children as $row)
						{
						?>
						<tr>
							<td><?php echo $row['stName'];?></td>
							<td><?php echo $row['stFamily'];?></td>
							<td><?php echo $row['stCode']; ?></td>
                    		<td><a <?php echo CHtml::link('ویرایش مشخصات',array('site/editstudent','stCode'=>$row['stCode']));		?></a></td>
				        </tr>
						<?php
						$r=$r+1;
							}
							?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
}
	?>