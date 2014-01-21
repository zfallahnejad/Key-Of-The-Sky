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
				->where('Id=:Id',array(':Id'=>$mosqueId))
				->queryScalar();
	$rewards = Yii::app()->db->createCommand()
				->select('neededPoint,rewardTopic')
				->from('reward')
				->where('Id=:Id',array(':Id'=>$mosqueId))
				->order('neededPoint')
				->queryAll();
	$students = Yii::app()->db->createCommand()
				->select('stName,stFamily,stCode,total')
				->from('student')
				->where('Id=:Id',array(':Id'=>$mosqueId))
				->order('total')
				->queryAll();
	$results =Yii::app()->db->createCommand()
				->select ('regda, COUNT(regda) AS CNT')
		    	->from('student')
				->where('Id=:Id',array(':Id'=>$mosqueId))
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
						<th></th>                 			
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
							<td><div align="right"><?php echo $row['total'];//echo $points;?></div></td>
							<td><a <?php echo CHtml::link('صفحه دانش آموز',array('site/studentPage','stCode'=>$stCode));?></a></td>
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
<h3 class="header">نمودار امتیازات
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php
$studentData=array();
$counter=0;
foreach($students as $row)
{
	$studentData[]=array('name'=>$row['stName'].' '.$row['stFamily'],'y'=>(int)$row['total']);						
	$counter++;
}
$studentCount=$counter;
$data=array();
$data[]=array('name'=>'امتیاز شرکت کنندگان'/*,'colorByPoint'=>true*/,'data'=>$studentData,'type'=>'column');

foreach($rewards as $row){
	$temp=array();
	for ($x=0; $x<$studentCount; $x++)
  	{
		$temp[]=(int)$row['neededPoint'];
    }
	$data[]=array('name'=>$row['rewardTopic'],'data'=>$temp,'type'=>'spline');
}
								
$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'chart'=> array('height'=>'450', 'spacingBottom'=>40,'borderWidth'=> 2,'plotShadow'=> true,'plotBorderWidth' => 1, 'plotBackgroundColor' => 'rgba(255, 255, 255, .9)','zoomType'=>'xy'),
            'title' => array('text'=>'نمودار امتیازات'),
            'plotOptions'=>array('column'=>array('dataLabels'=>array('enabled'=>true)),'series'=>array('borderWidth'=>0,'dataLabels'=>array('enabled'=>true))),
			'tooltip'=> array(
					'headerFormat'=>'<span style="font-size:14px">{point.key}</span><br/>',
					'pointFormat'=>'<span style="font-size:14px">{series.name}:{point.y}</span><br/>',
					'footerFormat'=>'',
					'shared'=> true,
					'useHTML'=> true,
					'crosshairs'=> true
			),
			'xAxis' => array('type'=>'category','reversed'=>true),
            'yAxis' => array('title'=>array('text'=>'امتیاز'),'opposite'=>true),
            'series' =>$data,
			'credits' => array('enabled' => false)),
		'scripts' => array(
   			//'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
   			'modules/exporting', // adds Exporting button/menu to chart
   		),
     )
	 );	
?>
</div>
<hr>
<br>
<h3 class="header">نمودار تعداد شرکت کنندگان در طرح از مسجد <?php echo $mosqueName;?>
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php
$results =Yii::app()->db->createCommand()
				->select ('counter,weekstart')
		    	->from('participantcounter')
				->where('Id=:Id',array(':Id'=>$mosqueId))
		    	->query();			
$counter = 0;
$week = array();
$participantCount = array();
foreach ($results as $result)
{
	$week[$counter] = $result['weekstart'];
    $participantCount[] = (int)$result['counter'];
    $counter++;
}
$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'chart'=> array('type'=>'areaspline', 'height'=>'450', 'spacingBottom'=>40,'borderWidth'=> 2,'plotShadow'=> true,'plotBorderWidth' => 1, 'plotBackgroundColor' => 'rgba(255, 255, 255, .9)','zoomType'=>'xy'),
            'title' => array('text'=>'نمودار تعداد شرکت کنندگان در طرح از مسجد '.$mosqueName),
            'subtitle' => array('text'=>'رشد ثبت نام در طرح'),
			//'legend'=> array('enabled'=>false),
			'tooltip'=> array(
					'headerFormat'=>'<span style="font-size:14px">{point.key}</span><br/>',
					'pointFormat'=>'<span style="font-size:14px">{series.name}:{point.y}</span><br/>',
					'footerFormat'=>'',
					'shared'=> true,
					'useHTML'=> true,
					'crosshairs'=> true
			),
			'plotOptions'=>array('column'=>array('dataLabels'=>array('enabled'=>true))),
            'xAxis' => array('categories'=>$week,'reversed'=>true),
            'yAxis' => array('title'=>array('text'=>'تعداد شرکت کنندگان'),'opposite'=>true),
            'series' => array(array('name' => 'تعداد شرکت کنندگان', 'data' => $participantCount),
        ),
		'credits' => array('enabled' => false)),
		'scripts' => array(
   			'modules/exporting', // adds Exporting button/menu to chart
   		)
     ));
?>
</div>
<hr>
<br>
<h3 class="header">نمودار میزان مشارکت در فعالیت ها
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php
$ColactActs =Yii::app()->db->createCommand()
				->select ('actId, SUM(counter) AS CNT')
		    	->from('mosmonth')
				->where('mosqueId=:mosqueId',array(':mosqueId'=>$mosqueId))
				->group('actId')
		    	->query();
$data=array();
$drillDownArray=array();
foreach($ColactActs as $ColactAct){
	$actTopic = Yii::app()->db->createCommand()
				->select('actTopic')
				->from('refrencepoint')
				->where('actId=:actId',array(':actId'=>(int)$ColactAct['actId']))
				->queryScalar();
	$data[]=array('name'=>$actTopic ,'y'=>(int)$ColactAct['CNT'],'drilldown'=>(int)$ColactAct['actId']);
	$MosMonth =Yii::app()->db->createCommand()
				->select ('counter, monthstart')
		    	->from('mosmonth')
				->where('mosqueId=:mosqueId and actId=:actId',array(':mosqueId'=>$mosqueId,':actId'=>(int)$ColactAct['actId']))
				->order('monthstart')
				->query();
	$MosMonthArray=array();
	foreach($MosMonth as $row){
		$MosMonthArray[]=array($row['monthstart'],(int)$row['counter']);
	}
	$drillDownArray[]=array('id'=>(int)$ColactAct['actId'],'data'=>$MosMonthArray);
}
$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'chart'=> array('type'=>'column','height'=>'450', 'spacingBottom'=>40,'borderWidth'=> 2,'plotShadow'=> true,'plotBorderWidth' => 1, 'plotBackgroundColor' => 'rgba(255, 255, 255, .9)','zoomType'=>'xy'),
			'title' => array('text'=>'نمودار میزان مشارکت در فعالیت ها'),
			'subtitle' => array('text'=>'قابل تفکیک به زمان اجرا فعالیت'),
			'xAxis' => array('type'=>'category','reversed'=>true),
			'legend'=> array('enabled'=>false),
            'yAxis' => array('title'=>array('text'=>'دفعات انجام کار'),'opposite'=>true),
        	'credits' => array('enabled' => false),
			'plotOptions'=>array('column'=>array('dataLabels'=>array('enabled'=>true)),'series'=>array('borderWidth'=>0,'dataLabels'=>array('enabled'=>true))),
			'tooltip'=> array(
					'headerFormat'=>'<span style="font-size:14px">{point.key}</span><br/>',
					'pointFormat'=>'<span style="font-size:14px">{series.name}:{point.y}</span><br/>',
					'footerFormat'=>'',
					'shared'=> true,
					'useHTML'=> true,
					//'crosshairs'=> true
			),
			'series'=>array(array('name'=>'فعالیت ها','colorByPoint'=>true,'data'=>$data)),
			'drilldown'=>array('series'=>$drillDownArray)),
		'scripts' => array(
   			'drilldown',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
   			'modules/exporting', // adds Exporting button/menu to chart
   		),
     )
);
?>
</div>