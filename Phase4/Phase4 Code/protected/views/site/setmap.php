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
$Pos = Yii::app()->db->createCommand()->select('Id,lat,lng')->from('googlemap')->where('Id=:id', array(':id'=>$mosqueId))->queryAll();
 
foreach ($Pos as $row)
{
	$lat = $row['lat'];
	$lng = $row['lng'];
}

$model = new SetmapForm;
$model->id = $mosqueId;
Yii::import('ext.gmap.*');
$gMap = new EGMap();
$gMap->zoom = 10;
$gMap->setWidth("100%");
$gMap->setHeight("600px");
$mapTypeControlOptions = array(
  'position'=> EGMapControlPosition::LEFT_BOTTOM,
  'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
);
 
$gMap->mapTypeControlOptions= $mapTypeControlOptions;

 
$gMap->setCenter($lat, $lng); 
//$marker = new EGMapMarker($lat, $lng, array('title' => $mosqueAddress));
//$marker->draggable=TRUE;
//$marker->raiseOnDrag= TRUE; 
//$gMap->addMarker($marker);
//$Map->enableMarkerClusterer(new EGMapMarkerClusterer());
$info_window_a = new EGMapInfoWindow("<div class='gmaps-label' style='color: #000;'>Hi! I'm your marker!</div>");

// Setting up an icon for marker.
$icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/car.png");

$icon->setSize(32, 37);
$icon->setAnchor(16, 16.5);
$icon->setOrigin(0, 0);

$dragevent = new EGMapEvent('dragend', 'function (event) { $.ajax({
type:"GET",
url:"'.CController::createUrl('site/savecoords', array('id'=>$model->id)).'",
data:({lat: event.latLng.lat(), lng: event.latLng.lng()}),
cache:false,
});}', false, EGMapEvent::TYPE_EVENT_DEFAULT);
if($model->lng)
{
// If we have already created marker - show it
$marker = new EGMapMarker($model->lat, $model->lng, array('title' => $mosqueAddress,
'icon'=>$icon, 'draggable'=>true), 'marker', array('dragevent'=>$dragevent));
$marker->addHtmlInfoWindow($info_window_a);
$gMap->addMarker($marker);
$gMap->setCenter($model->lat, $model->lng);
$gMap->zoom = 16;
}
else
{
// Setting up new event for user click on map, so marker will be created on place and respectful event added.
$gMap->addEvent(new EGMapEvent('click',
'function (event) {var marker = new google.maps.Marker({position: event.latLng, map: '.$gMap->getJsName().
', draggable: true, icon: '.$icon->toJs().'}); '.$gMap->getJsName().
'.setCenter(event.latLng); var dragevent = '.$dragevent->toJs('marker').
'; $.ajax({'.
'"type":"GET",'.
'"url":"'.CController::createUrl('site/savecoords', array('id'=>$model->id)).'",'.
'"data":({"lat": event.latLng.lat(), "lng": event.latLng.lng()}),'.
'"cache":false,'.
'}); }', false, EGMapEvent::TYPE_EVENT_DEFAULT_ONCE));
}
$gMap->renderMap(array());?>
<?php
/*$Map->renderMap();
if(isset($_GET["update"])){
//$marker->setJsName('google')
$New = $Map->getMarkersCenterCoord();
$array = explode(',',$New);
$lat2 = $array[0];
$lng2 = $array[1];
$command = Yii::app()->db->createCommand();
					$command->update('googlemap', array('lat'=>$lat2,'lng'=>$lng2), 'id=:id', array(':id'=>$mosqueId));
					$command->execute();
$command = Yii::app()->db->createCommand();
					$command->update('googlemap', array('lat'=>$lat2,'lng'=>$lng2), 'id=:id', array(':id'=>$mosqueId));
					$command->execute();
		$this->redirect('setmap');
		}*/
?>