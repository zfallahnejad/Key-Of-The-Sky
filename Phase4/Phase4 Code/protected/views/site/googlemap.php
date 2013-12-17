<?php
//
// ext is your protected.extensions folder
// gmaps means the subfolder name under your protected.extensions folder
//  
$Pos = Yii::app()->db->createCommand()
		->select('googlemap.Id,lat,lng,mosqueAddress')
		->from('mosqueculturalliablee,googlemap')
		->where('status = 1 and googlemap.Id = mosqueculturalliablee.Id')
		->query();

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
 
$gMap->setCenter(35.615189311812094, 51.45295944519042);

foreach ($Pos as $row)
{
	$lat = $row['lat'];
	$lng = $row['lng'];
	$mosqueAddress = $row['mosqueAddress'];
	$marker = new EGMapMarkerWithLabel($lat, $lng, array('title' => $mosqueAddress));
	$gMap->addMarker($marker);
	$marker->draggable=FALSE;
	$gMap->addMarker($marker);
}
 
$gMap->renderMap();
?>