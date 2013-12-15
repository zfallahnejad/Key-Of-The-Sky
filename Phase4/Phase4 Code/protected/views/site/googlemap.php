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
 
$gMap->setCenter(35.615189311812094, 51.45295944519042);
 
// Create GMapInfoWindows
$info_window_a = new EGMapInfoWindow('<div>I am a marker with custom image!</div>');
$info_window_b = new EGMapInfoWindow('Hey! I am a marker with label!');
 
$icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/gazstation.png");
 
$icon->setSize(32, 37);
$icon->setAnchor(16, 16.5);
$icon->setOrigin(0, 0);
 
// Create marker
$marker = new EGMapMarker(39.721089311812094, 2.91165944519042, array('title' => 'Marker With Custom Image','icon'=>$icon));
$marker->addHtmlInfoWindow($info_window_a);
$gMap->addMarker($marker);
 
// Create marker with label
$marker = new EGMapMarkerWithLabel(39.821089311812094, 2.90165944519042, array('title' => 'Marker With Label'));
 
$label_options = array(
  'backgroundColor'=>'yellow',
  'opacity'=>'0.75',
  'width'=>'100px',
  'color'=>'blue'
);
 
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
$marker->labelContent= '$425K';
$marker->labelStyle=$label_options;
$marker->draggable=true;
$marker->labelClass='labels';
$marker->raiseOnDrag= true;
 
$marker->setLabelAnchor(new EGMapPoint(22,0));
 
$marker->addHtmlInfoWindow($info_window_b);
 
$gMap->addMarker($marker);
 
// enabling marker clusterer just for fun
// to view it zoom-out the map
$gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
 
$gMap->renderMap();
?>