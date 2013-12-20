<?php
/* @var $this GooglemapController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Googlemaps',
);

$this->menu=array(
	array('label'=>'Create googlemap', 'url'=>array('create')),
	array('label'=>'Manage googlemap', 'url'=>array('admin')),
);
?>

<h1>Googlemaps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
