<?php
	$this->pageTitle=Yii::app()->name . ' - Activities Report';
	$this->breadcrumbs=array(
		'ActivitiesReport', );
	$mosqueId=$_GET['MosqueId'];
	if (!($mosqueId>0)){
		$this->redirect(array('/site'));
	}
	$mosqueName = Yii::app()->db->createCommand()
							->select('mosqueName')
							->from('mosqueculturalliablee')
							->where('Id=:Id',array(':Id'=>$mosqueId))
							->queryScalar();
	$startDate = Yii::app()->session['StartDate'];
	//unset(Yii::app()->session['StartDate']);
	
	$FinishDate = Yii::app()->session['FinishDate'];
	//unset(Yii::app()->session['FinishDate']);		
?>
<h3 class="header">نمودار میزان مشارکت در فعالیت ها
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php
	$Activities =Yii::app()->db->createCommand()
					->select ('actId, SUM(counter) AS CNT')
		    		->from('mosactivities')
					->where('mosqueId=:mosqueId and :startDate<=weekstart and weekstart<=:FinishDate',array(':mosqueId'=>$mosqueId,'startDate'=>$startDate,'FinishDate'=>$FinishDate))
					->group('actId')
		    		->query();
	$data=array();
	$drillDownArray=array();
	foreach($Activities as $Activity){
		$actTopic = Yii::app()->db->createCommand()
				->select('actTopic')
				->from('refrencepoint')
				->where('actId=:actId',array(':actId'=>(int)$Activity['actId']))
				->queryScalar();
		$data[]=array('name'=>$actTopic ,'y'=>(int)$Activity['CNT'],'drilldown'=>(int)$Activity['actId']);
		$MosMonth =Yii::app()->db->createCommand()
				->select ('counter,weekstart')
		    	->from('mosactivities')
				->where('mosqueId=:mosqueId and actId=:actId and :startDate<=weekstart and weekstart<=:FinishDate',array(':mosqueId'=>$mosqueId,':actId'=>(int)$Activity['actId'],'startDate'=>$startDate,'FinishDate'=>$FinishDate))
				->order('weekstart')
				->query();
		$CollactActivitiesArray=array();
		foreach($MosMonth as $row){
			$CollactActivitiesArray[]=array($row['weekstart'],(int)$row['counter']);
		}
		$drillDownArray[]=array('id'=>(int)$Activity['actId'],'data'=>$CollactActivitiesArray);
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