<?php
	$this->pageTitle=Yii::app()->name . ' - mosque map';
	$mosqueId = (int) $_GET['Id'];
	$this->breadcrumbs=array(
		'map', );
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
	$position = Yii::app()->db->createCommand()
				->select('lat,lng')
				->from('googlemap')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->queryAll();          
?>
<div id='container' style="direction:rtl" align="right">
	<h2 class="header">نقشه مسجد <?php echo $mosqueName ;?><span class="header-line"></span></h2>
	<?php
//
// ext is your protected.extensions folder
// gmaps means the subfolder name under your protected.extensions folder
//  
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
foreach ($position as $row)
{
	$lat = $row['lat'];
	$lng = $row['lng'];
} 
$gMap->setCenter($lat, $lng);
 
// Create GMapInfoWindows
$info_window_b = new EGMapInfoWindow('Hey! I am a marker with label!');
 
// Create marker with label
$marker = new EGMapMarker($lat, $lng, array('title' => $mosqueAddress));
 
/*
// Two ways of setting options
// ONE WAY:
$marker_options = array(
  'labelContent'=>'$9393K',
  'labelStyle'=>$label_options,
  'draggable'=>true,
  // check the style ID 
  // afterwards!!!
  'labelClass'=>'labels',
  'labelAnchor'=>new EGMapPoint(22,2),
  'raiseOnDrag'=>true
);
 
$marker->setOptions($marker_options);
*/
 
// SECOND WAY:
$marker->draggable=FALSE;
$marker->raiseOnDrag= FALSE;
 
//$marker->addHtmlInfoWindow($info_window_b);
 
$gMap->addMarker($marker);
 
// enabling marker clusterer just for fun
// to view it zoom-out the map
$gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
 
$gMap->renderMap();
?>
</div>
