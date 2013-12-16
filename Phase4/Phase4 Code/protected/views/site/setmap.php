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
//$Map->enableMarkerClusterer(new EGMapMarkerClusterer());?>

<script>
	var latlng = new google.maps.LatLng(51.4975941, -0.0803232);
var map = new google.maps.Map(document.getElementById('map'), {
    center: latlng,
    zoom: 11,
    mapTypeId: google.maps.MapTypeId.ROADMAP
});
var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    title: 'Set lat/lon values for this property',
    draggable: true
});
google.maps.event.addListener(marker, 'dragend', function(a) {
    console.log(a);
    // bingo!
    // a.latLng contains the co-ordinates where the marker was dropped
});
</script>

<div id='container' style="direction:rtl" align="right">
<h1 align="right"><font size = 5><b>تعیین مختصات مسجد</b></font></h1>


<p align="right" class="note">با Drag & Drop مارکر مختصات مسجد را تعیین نمایید و سپس بر روی لینک ثبت مختصات کلیک نمایید</p>
	<div >
            <h4 align="right">
				<a href="?update&code=<?php print $row["Id"]; ?>" onclick="javascript: return confirm('آیا مطمئن هستید؟');"  >ثبت مختصات</a>
			</h4>
	</div>
	
</div>
<?php
$Map->renderMap();
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
		}
?>