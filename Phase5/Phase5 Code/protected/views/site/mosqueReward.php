<?php
	$this->pageTitle=Yii::app()->name . ' - mosque reward';
	$mosqueId = (int) $_GET['Id'];
	if (!($mosqueId>0)){
			$this->redirect(array('/site'));

	}
	$this->breadcrumbs=array(
		'Point', );
	$mosqueName = Yii::app()->db->createCommand()
				->select('mosqueName')
				->from('mosqueculturalliablee')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->queryScalar();
	$rewards = Yii::app()->db->createCommand()
				->select('neededPoint,rewardTopic')
				->from('reward')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->queryAll();
	$students = Yii::app()->db->createCommand()
				->select('stName,stFamily,stCode')
				->from('student')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->queryAll();
	$results =Yii::app()->db->createCommand()
				->select ('regda, COUNT(regda) AS CNT')
		    	->from('student')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->group('regda')
		    	->query();  
	$counter = 0;
	$date = array();
	$counts = array();
	foreach ($results as $result)
    {
		$date[$counter] = $result['regda'];
        $counts[] = (int)$result['CNT'];
        $counter++;
    }             
?>
<div id='container' style="direction:rtl" align="right">
	<h2 class="header">مسجد <?php echo $mosqueName ;?><span class="header-line"></span></h2>
	<br>
	<h3 class="note">جدول جوایز<span class="header-line"></span></h3>
    <div id="object-browser">
		<div id="items">
			<table class="table table-striped">
				<thead>
            		<tr>
						<th><div align="right">جایزه</div></th>
                    	<th><div align="right">امتیاز</div></th>
                	</tr>
				</thead>
				<tbody>
					<?php
					foreach($rewards as $row)
					{
					?>
						<tr>
							<td><div align="right"><?php echo $row['rewardTopic'];?></div></td>
							<td><div align="right"><?php echo $row['neededPoint'];?></div></td>
						</tr>
					<?php
					}
					?>	
				</tbody>
			</table>
		</div>
	</div>
	<hr>
 	<br>
	<h3 class="note">امتیازات کسب شده<span class="header-line"></span></h3>	
	<div id="object-browser">
		<div id="items">
			<table class="table table-striped">
				<thead>
            		<tr>
						<th><div align="right">نام</div></th>
                    	<th><div align="right">نام خانوادگی</div></th>
						<th><div align="right">امتیاز کسب شده</div></th>                   			
                	</tr>
            	</thead>
				<tbody>
					<?php
					foreach($students as $row)
					{
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
<hr>
<br>
<h3 class="header">نمودار تعداد شرکت کنندگان در طرح از مسجد <?php echo $mosqueName;?>
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php
	$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'chart'=> array('type'=>'line', 'height'=>'500', 'spacingBottom'=>40),
            'title' => array('text'=>'نمودار تعداد شرکت کنندگان در طرح از مسجد '.$mosqueName),
            'legend'=> array('enabled'=>false),
            'plotOptions'=>array('column'=>array('dataLabels'=>array('enabled'=>true))),
            'xAxis' => array('categories'=>$date),
            'yAxis' => array('title'=>array('text'=>'تعداد شرکت کنندگان')),
            'series' => array(array('name' => 'تعداد شرکت کنندگان', 'data' => $counts),
        ),
		'credits' => array('enabled' => false))
     ));
?>
</div>
