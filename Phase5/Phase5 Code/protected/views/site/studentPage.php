<?php
	$this->pageTitle=Yii::app()->name . ' - Student Page';
	$stCode=(int)$_GET['stCode'];
	if (!($stCode>0)){
			$this->redirect(array('/site'));

	}
	$this->breadcrumbs=array(
		'Student Page', );
	$student = Yii::app()->db->createCommand()
			->select('stName,stFamily,total,Id')
			->from('student')
			->where('stCode=:stCode',array(':stCode'=>$stCode))
			->queryRow();
	$studentFullName=$student['stName'].' '.$student['stFamily'];
	$results =Yii::app()->db->createCommand()
				->select('weekstart, SUM(counter) AS CNT')
		    	->from('studentweek')
				->where('stCode=:stCode',array(':stCode'=>$stCode))
				->group('weekstart')
		    	->query();
	$studentActivities=array();
	$drillDownArray=array();
	foreach($results as $result){
		$studentActivities[]=array('name'=>$result['weekstart'] ,'y'=>(int)$result['CNT'],'drilldown'=>$result['weekstart']);
		$Activities = Yii::app()->db->createCommand()
				->select('refrencepoint.actTopic as actTopic, studentweek.counter AS CNT')
		    	->from('refrencepoint,studentweek')
				->where('studentweek.weekstart=:weekstart AND studentweek.stCode=:stCode AND refrencepoint.actId=studentweek.actId',array(':weekstart'=>$result['weekstart'],':stCode'=>$stCode))
				->order('weekstart')
				->query();
		$ActivitiesArray=array();
		foreach($Activities as $row){
			$ActivitiesArray[]=array($row['actTopic'],(int)$row['CNT']);
		}
		$drillDownArray[]=array('id'=>$result['weekstart'],'data'=>$ActivitiesArray);
	}		
?>
<h3 class="header">نمودار فعالیت های <?php echo $studentFullName;?>
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'chart'=> array('type'=>'column','height'=>'500', 'spacingBottom'=>40,'borderWidth'=> 2,'plotShadow'=> true,'plotBorderWidth' => 1, 'plotBackgroundColor' => 'rgba(255, 255, 255, .9)','zoomType'=>'xy'),
			'title' => array('text'=>'نمودار فعالیت های '.$studentFullName.' به صورت هفتگی'),
            'subtitle' => array('text'=>'قابل تفکیک به نوع فعالیت انجام گرفته'),
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
			'series'=>array(array('name'=>'فعالیت ها','colorByPoint'=>true,'data'=>$studentActivities)),
			'drilldown'=>array('series'=>$drillDownArray)),
		'scripts' => array(
   			'drilldown',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
   			'modules/exporting', // adds Exporting button/menu to chart
   		),
     )
);

?>
</div>
<hr>
<br>
<h3 class="header">نمودار امتیاز <?php echo $studentFullName;?>
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php
$studentData=array();
$studentData[]=array('name'=>$studentFullName,'y'=>(int)$student['total']);						
$data=array();
$data[]=array('name'=>'امتیاز شرکت کنندگان'/*,'colorByPoint'=>true*/,'data'=>$studentData,'type'=>'bar');
$rewards = Yii::app()->db->createCommand()
				->select('neededPoint,rewardTopic')
				->from('reward')
				->where('Id=:Id',array(':Id'=>$student['Id']))
				->order('neededPoint')
				->queryAll();
foreach($rewards as $row){
	$data[]=array('name'=>$row['rewardTopic'],'data'=>array((int)$row['neededPoint']),'type'=>'spline');
}
								
$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'chart'=> array('height'=>'450', 'spacingBottom'=>40,'borderWidth'=> 2,'plotShadow'=> true,'plotBorderWidth' => 1, 'plotBackgroundColor' => 'rgba(255, 255, 255, .9)','zoomType'=>'xy'),
            'title' => array('text'=>'نمودار امتیاز '.$studentFullName),
            'plotOptions'=>array('column'=>array('dataLabels'=>array('enabled'=>true)),'series'=>array('borderWidth'=>0,'dataLabels'=>array('enabled'=>true))),
			'tooltip'=> array(
					'headerFormat'=>'<span style="font-size:10px">{point.key}</span><br/>',
					'pointFormat'=>'{series.name}:{point.y}<br/>',
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