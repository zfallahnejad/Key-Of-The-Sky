<?php
/* @var $this GooglemapController */
/* @var $model googlemap */

$this->breadcrumbs=array(
	'Googlemaps'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List googlemap', 'url'=>array('index')),
	array('label'=>'Create googlemap', 'url'=>array('create')),
	array('label'=>'Update googlemap', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete googlemap', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage googlemap', 'url'=>array('admin')),
);
?>

<h1>View googlemap #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'lat',
		'lng',
	),
)); ?>
