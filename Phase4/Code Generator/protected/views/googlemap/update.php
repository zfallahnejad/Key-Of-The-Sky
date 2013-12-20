<?php
/* @var $this GooglemapController */
/* @var $model googlemap */

$this->breadcrumbs=array(
	'Googlemaps'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List googlemap', 'url'=>array('index')),
	array('label'=>'Create googlemap', 'url'=>array('create')),
	array('label'=>'View googlemap', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage googlemap', 'url'=>array('admin')),
);
?>

<h1>Update googlemap <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>