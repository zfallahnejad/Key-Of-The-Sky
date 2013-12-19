<?php
/* @var $this SiteController */
/* @var $model EditliableForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Setmap';
$this->breadcrumbs=array(
	'Setmap', );
?>
<?php if(Yii::app()->user->hasFlash('register')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('register'); ?>
</div>

<?php else: ?>
<?php

$gMap = new EGMap();
$gMap->zoom = 10;
$gMap->setWidth("100%");
$gMap->setHeight("600px");
$mapTypeControlOptions = array(
  'position'=> EGMapControlPosition::LEFT_BOTTOM,
  'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
);

$gMap->mapTypeControlOptions= $mapTypeControlOptions;
$gMap->setCenter($model->lat, $model->lng);

// Saving coordinates after user dragged our marker.
$dragevent = new EGMapEvent('dragend', "function (event) { $.ajax({
                                            'type':'POST',
                                            'url':'".$this->createUrl('site/savecoords').'/'.$model->mosqueId."',
                                            'data':({'lat': event.latLng.lat(), 'lng': event.latLng.lng()}),
                                            'cache':false,
                                        });}", false, EGMapEvent::TYPE_EVENT_DEFAULT);

$marker = new EGMapMarker($model->lat, $model->lng, array('title' => $model->mosqueName,'draggable'=>true), 'marker', array('dragevent'=>$dragevent));
$gMap->addMarker($marker);
$gMap->setCenter($model->lat, $model->lng);
$gMap->zoom = 16;
$gMap->renderMap();
?>
<?php endif; ?>