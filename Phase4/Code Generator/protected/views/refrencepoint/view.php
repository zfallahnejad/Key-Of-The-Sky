<?php
/* @var $this RefrencepointController */
/* @var $model refrencepoint */

$this->breadcrumbs=array(
	'Refrencepoints'=>array('index'),
	$model->actId,
);

$this->menu=array(
	array('label'=>'List refrencepoint', 'url'=>array('index')),
	array('label'=>'Create refrencepoint', 'url'=>array('create')),
	array('label'=>'Update refrencepoint', 'url'=>array('update', 'id'=>$model->actId)),
	array('label'=>'Delete refrencepoint', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->actId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage refrencepoint', 'url'=>array('admin')),
);
?>

<h1>View refrencepoint #<?php echo $model->actId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'actId',
		'actPoint',
		'actTopic',
		'userID',
	),
)); ?>
