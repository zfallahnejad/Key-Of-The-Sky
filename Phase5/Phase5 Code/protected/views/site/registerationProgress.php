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
<h3 class="header">نمودار تعداد شرکت کنندگان در طرح از مسجد <?php echo $mosqueName;?>
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php
$results =Yii::app()->db->createCommand()
		    ->select ('regda, COUNT(regda) AS CNT')
		    ->from('student')
			->group('regda')
		    ->where('Id=:Id',array(':Id'=>$mosqueId))
		    ->query();
$counter = 0;
$registerationDate = array();
$participantCount = array();

foreach ($results as $result)
{
	if(($startDate<=$result['regda'])and ($result['regda']<=$FinishDate))
	{
		$registerationDate[$counter] = $result['regda'];
    	$participantCount[] = (int)$result['CNT'];
    	$counter++;
	}
}
$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'chart'=> array('type'=>'bar', 'height'=>'450', 'spacingBottom'=>40,'borderWidth'=> 2,'plotShadow'=> true,'plotBorderWidth' => 1, 'plotBackgroundColor' => 'rgba(255, 255, 255, .9)','zoomType'=>'xy'),
            'title' => array('text'=>'نمودار تعداد ثبت نام کنندگان در طرح از مسجد '.$mosqueName),
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
            'xAxis' => array('categories'=>$registerationDate,'reversed'=>true),
            'yAxis' => array('title'=>array('text'=>'تعداد ثبت نام کنندگان'),'opposite'=>true),
            'series' => array(array('name' => 'تعداد ثبت نام کنندگان', 'data' => $participantCount),
        ),
		'credits' => array('enabled' => false)),
		'scripts' => array(
   			'modules/exporting', // adds Exporting button/menu to chart
   		)
     ));
?>
</div>