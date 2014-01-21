<?php
	$this->pageTitle=Yii::app()->name . ' - school page';
	$schoolId = (int) $_GET['schoolId'];
	if (!($schoolId>0)){
			$this->redirect(array('/site'));
	}
	$this->breadcrumbs=array(
		'school', );
	$schoolName = Yii::app()->db->createCommand()
				->select('schoolName')
				->from('school')
				->where('schoolId=:Id',array('Id'=>$schoolId))
				->queryScalar();
	
	$students = Yii::app()->db->createCommand()
				->select('stName,stFamily,stCode,Id')
				->from('student')
				->where('schoolId=:Id',array('Id'=>$schoolId))
				->queryAll();               
?>
<div id='container' style="direction:rtl" align="right">
	<h2 class="header">مدرسه <?php echo $schoolName ;?><span class="header-line"></span></h2>
	<br>
	<h3 class="note">مشخصات دانش آموزان<span class="header-line"></span></h3>	
	<div id="object-browser">
		<div id="items">
			<table class="table table-striped">
				<thead>
            		<tr>
						<th><div align="right">نام</div></th>
                    	<th><div align="right">نام خانوادگی</div></th>
						<th><div align="right">نام مسجد</div></th>
						<th><div align="right">امتیاز کسب شده</div></th>
						<th></th>           			
                	</tr>
            	</thead>
				<tbody>
					<?php
					foreach($students as $row)
					{	
						$stMosqueId=$row['Id'];
						$mosqueName = Yii::app()->db->createCommand()
										->select('mosqueName')
										->from('mosqueculturalliablee')
										->where('Id=:Id',array('Id'=>$stMosqueId))
										->queryScalar();
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
							<td><div align="right"><?php echo $mosqueName;?></div></td>
							<td><div align="right"><?php echo $points;?></div></td>
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
<h3 class="header">نمودار رشد تعداد دانش آموزان ثبت نام کننده در طرح از مدرسه <?php echo $schoolName;?>
	<span class="header-line"></span> 
</h3>
<div style="direction:ltr;">
<?php
$results =Yii::app()->db->createCommand()
				->select('regda,count(regda) as CNT')
		    	->from('student')
				->where('schoolId=:schoolId',array(':schoolId'=>$schoolId))
		    	->group('regda')
				->query();	
$counter = 0;
$registrationDate = array();
$participantCount = array();
foreach ($results as $result)
{
	$registrationDate[$counter] = $result['regda'];
    $participantCount[] = (int)$result['CNT'];
    $counter++;
}
$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'chart'=> array('type'=>'areaspline', 'height'=>'450', 'spacingBottom'=>40,'borderWidth'=> 2,'plotShadow'=> true,'plotBorderWidth' => 1, 'plotBackgroundColor' => 'rgba(255, 255, 255, .9)','zoomType'=>'xy'),
            'title' => array('text'=>'نمودار رشد تعداد دانش آموزان ثبت نام کننده در طرح از مدرسه '.$schoolName),
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
            'xAxis' => array('categories'=>$registrationDate,'reversed'=>true),
            'yAxis' => array('title'=>array('text'=>'تعداد شرکت کنندگان'),'opposite'=>true),
            'series' => array(array('name' => 'تعداد ثبت نام کنندگان', 'data' => $participantCount),
        ),
		'credits' => array('enabled' => false)),
		'scripts' => array(
   			'modules/exporting', // adds Exporting button/menu to chart
   		)
     ));	
?>
</div>