<?php
$this->pageTitle=Yii::app()->name . ' - Top Result';
$this->breadcrumbs=array(
	'TopResult', );
$mosqueId=$_GET['MosqueId'];
$TopNumber=$_GET['TopNumber'];
if (!(($mosqueId>0) and ($TopNumber<6) and ($TopNumber>0))){
		$this->redirect(array('/site'));
}
$mosqueName = Yii::app()->db->createCommand()
					->select('mosqueName')
					->from('mosqueculturalliablee')
					->where('Id=:Id',array(':Id'=>$mosqueId))
					->queryScalar();
?>
<h3 class="header">برترین های مسجد <?php echo $mosqueName;?>
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php
$results =Yii::app()->db->createCommand()
		    ->select ('stName,stFamily,total')
		    ->from('student')
			->where('Id=:Id',array(':Id'=>$mosqueId))
			->order('total desc')
		    ->query();
$resultsCount =Yii::app()->db->createCommand()
		    ->select ('count(*)')
		    ->from('student')
			->where('Id=:Id',array(':Id'=>$mosqueId))
			->queryScalar();
if($resultsCount<$TopNumber){
	$TopNumber=$resultsCount;
}
$counter = 0;
$TopStudents = array();
$Points = array();
foreach ($results as $result)
{
	$TopStudents[$counter] = $result['stName'].' '.$result['stFamily'];
    $Points[] = (int)$result['total'];
    $counter++;
	if($counter==$TopNumber)
	{
		break;
	}
}

$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'chart'=> array('polar'=>true,'type'=>'column', 'height'=>'450', 'spacingBottom'=>40,'borderWidth'=> 2,'plotShadow'=> true,'plotBorderWidth' => 1, 'plotBackgroundColor' => 'rgba(255, 255, 255, .9)','zoomType'=>'xy'),
            'title' => array('text'=>'برترین های مسجد '.$mosqueName),
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
            'xAxis' => array('categories'=>$TopStudents,'reversed'=>true),
            'yAxis' => array('title'=>array('text'=>'امتیاز'),'opposite'=>true),
            'series' => array(array('name' => 'برترین ها', 'data' => $Points),
        ),
		'credits' => array('enabled' => false)),
		'scripts' => array(
			'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
   			'modules/exporting', // adds Exporting button/menu to chart
   		)
     ));
?>
</div>