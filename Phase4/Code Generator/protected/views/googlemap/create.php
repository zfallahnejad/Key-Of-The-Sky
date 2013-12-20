<?php
/* @var $this GooglemapController */
/* @var $model googlemap */

$this->breadcrumbs=array(
	'Googlemaps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List googlemap', 'url'=>array('index')),
	array('label'=>'Manage googlemap', 'url'=>array('admin')),
);
?>

<h1>Create googlemap</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>