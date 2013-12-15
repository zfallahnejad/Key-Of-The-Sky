<?php
/* @var $this SiteController */
/* @var $model EditliableForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Setmap';
$this->breadcrumbs=array(
	'Setmap', );
$mail=Yii::app()->user->name;
	$mosqueId = Yii::app()->db->createCommand()->select('Id')->from('mosqueculturalliablee')->where('email=:mail', array(':mail'=>$mail))->queryScalar();
	$mosqueName = Yii::app()->db->createCommand()
				->select('mosqueName')
				->from('mosqueculturalliablee')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->queryScalar();
	$mosqueAddress = Yii::app()->db->createCommand()
	->select('mosqueAddress')
	->from('mosqueculturalliablee')
	->where('Id=:Id',array('Id'=>$mosqueId))
	->queryScalar();
	$Pos = Yii::app()->db->createCommand()->select('lat,lng')->from('googlemap')->where('id=:id', array(':id'=>$mosqueId))->queryAll();
 
foreach ($Pos as $row)
{
	$lat = $row['lat'];
	$lng = $row['lng'];
}

?>

<div id='container' style="direction:rtl" align="right">
<h1 align="right"><font size = 5><b>تعیین مختصات مسجد</b></font></h1>


<?php if(Yii::app()->user->hasFlash('setmap')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('setmap'); ?>
</div>

<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setmap-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<p align="right" class="note">با Drag & Drop مختصات مسجد را تعیین و سپس بر روی ثبت کلیک نمایید</p>

<?php
$model->lat = 2;
Yii::import('ext.gmap.*');
$Map = new EGMap();
$Map->zoom = 10;
$Map->setWidth("100%");
$Map->setHeight("600px");
$mapTypeControlOptions = array(
  'position'=> EGMapControlPosition::LEFT_BOTTOM,
  'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
);
 
$Map->mapTypeControlOptions= $mapTypeControlOptions;

 
$Map->setCenter($lat, $lng); 
$marker = new EGMapMarker($lat, $lng, array('title' => $mosqueAddress));
$marker->draggable=TRUE;
$marker->raiseOnDrag= TRUE; 
$Map->addMarker($marker);
$Map->enableMarkerClusterer(new EGMapMarkerClusterer());
?>

<div class="row">
		<?php echo $form->labelEx($model,'lat'); ?>
		<?php echo $form->textField($model,'lat'); ?>
		<?php echo $form->error($model,'lat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lng'); ?>
		<?php echo $form->textField($model,'lng'); ?>
		<?php echo $form->error($model,'lng'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('ثبت'); ?>
	</div>

<?php $this->endWidget();
$New = $Map->getMarkersCenterCoord();
$array = explode(',',$New);
$lat = $array[0];
$lng = $array[1];

$model->Id = (int) $mosqueId;
$model->lat =  $lat;
$model->lng =  $lng;
$Map->renderMap();
$command = Yii::app()->db->createCommand();
					$command->update('googlemap', array('lat'=>$lat,'lng'=>$lng), 'id=:id', array(':id'=>$mosqueId));
					$command->execute();
					
 
?>


</div><!-- form -->

</div>

<?php endif; ?>