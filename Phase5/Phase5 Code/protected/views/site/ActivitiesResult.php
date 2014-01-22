<?php
	$this->pageTitle=Yii::app()->name . ' - Activities Report';
	$this->breadcrumbs=array(
		'ActivitiesReport', );
	$mosqueId=$_GET['MosqueId'];
	$actId=$_GET['actId'];
	if (!(($mosqueId>0)and ($actId>0))){
		$this->redirect(array('/site'));
	}
	$mosqueName = Yii::app()->db->createCommand()
							->select('mosqueName')
							->from('mosqueculturalliablee')
							->where('Id=:Id',array(':Id'=>$mosqueId))
							->queryScalar();
	$actTopic=Yii::app()->db->createCommand()
				->select('actTopic')
				->from('refrencepoint')
				->where('actId=:actId',array(':actId'=>$actId))
				->queryScalar();
	$startDate = Yii::app()->session['StartDate'];
	//unset(Yii::app()->session['StartDate']);
	
	$FinishDate = Yii::app()->session['FinishDate'];
	//unset(Yii::app()->session['FinishDate']);		
?>
<h3 class="header">گزارش دفعات انجام فعالیت <?php echo $actTopic;?>
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php

	$results =Yii::app()->db->createCommand()
					->select ('counter,weekstart')
		    		->from('mosactivities')
					->where('mosqueId=:mosqueId and actId=:actId and :startDate<=weekstart and weekstart<=:FinishDate',array(':mosqueId'=>$mosqueId,':startDate'=>$startDate,':FinishDate'=>$FinishDate,':actId'=>$actId))
					->order('weekstart')
					->query();
	$temp = 0;
	$weekstart = array();
	$counter = array();
	foreach ($results as $result)
	{
		$data[]=array($result['weekstart'],$result['counter']);
		$weekstart[$temp] = $result['weekstart'];
    	$counter[] = (int)$result['counter'];
    	$temp++;
	}
	$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'chart'=> array('polar'=>true,'type'=>'column', 'height'=>'450', 'spacingBottom'=>40,'borderWidth'=> 2,'plotShadow'=> true,'plotBorderWidth' => 1, 'plotBackgroundColor' => 'rgba(255, 255, 255, .9)','zoomType'=>'xy'),
            'title' => array('text'=>'گزارش دفعات انجام فعالیت '.$actTopic),
            //'subtitle' => array('text'=>'رشد ثبت نام در طرح'),
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
            'xAxis' => array('categories'=>$weekstart,'reversed'=>true),
            'yAxis' => array('title'=>array('text'=>'دفعات انجام فعالیت'),'opposite'=>true),
            'series' => array(array('name' => 'دفعات انجام فعالیت', 'data' => $counter),
        ),
		'credits' => array('enabled' => false)),
		'scripts' => array(
			'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
   			'modules/exporting', // adds Exporting button/menu to chart
   		)
     ));
?>
</div>