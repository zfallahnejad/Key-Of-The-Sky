<?php
/* @var $this MosqueculturalliableeController */
/* @var $model mosqueculturalliablee */

$this->breadcrumbs=array(
	'Mosqueculturalliablees'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List mosqueculturalliablee', 'url'=>array('index')),
	array('label'=>'Create mosqueculturalliablee', 'url'=>array('create')),
	array('label'=>'Update mosqueculturalliablee', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete mosqueculturalliablee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage mosqueculturalliablee', 'url'=>array('admin')),
);
?>

<h1>View mosqueculturalliablee #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'name',
		'family',
		'mosqueName',
		'email',
		'password',
		'tel',
		'mobile',
		'mosqueAddress',
		'image',
		'status',
	),
)); ?>
