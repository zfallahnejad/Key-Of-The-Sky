<?php
/* @var $this RefrencepointController */
/* @var $model refrencepoint */

$this->breadcrumbs=array(
	'Refrencepoints'=>array('index'),
	$model->actId=>array('view','id'=>$model->actId),
	'Update',
);

$this->menu=array(
	array('label'=>'List refrencepoint', 'url'=>array('index')),
	array('label'=>'Create refrencepoint', 'url'=>array('create')),
	array('label'=>'View refrencepoint', 'url'=>array('view', 'id'=>$model->actId)),
	array('label'=>'Manage refrencepoint', 'url'=>array('admin')),
);
?>

<h1>Update refrencepoint <?php echo $model->actId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>