<?php
	$this->pageTitle=Yii::app()->name . ' - Registeration Progress';
	$this->breadcrumbs=array(
		'RegisterationProgress', );
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
	$ColactActs =Yii::app()->db->createCommand()
					->select ('actId, SUM(actcount) AS CNT')
		    		->from('moscolact')
					->where('mosqueId=:mosqueId and :startDate<=actda and actda<=:FinishDate',array(':mosqueId'=>$mosqueId,'startDate'=>$startDate,'FinishDate'=>$FinishDate))
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
				->select ('actda,actcount')
		    	->from('moscolact')
				->where('mosqueId=:mosqueId and actId=:actId and :startDate<=actda and actda<=:FinishDate',array(':mosqueId'=>$mosqueId,':actId'=>(int)$ColactAct['actId'],'startDate'=>$startDate,'FinishDate'=>$FinishDate))
				->order('actda')
				->query();
		$CollactActivitiesArray=array();
		foreach($MosMonth as $row){
			$CollactActivitiesArray[]=array($row['actda'],(int)$row['actcount']);
		}
		$drillDownArray[]=array('id'=>(int)$ColactAct['actId'],'data'=>$CollactActivitiesArray);
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