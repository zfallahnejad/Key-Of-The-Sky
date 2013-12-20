<?php
/* @var $this StudentController */
/* @var $model student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->stCode,
);

$this->menu=array(
	array('label'=>'List student', 'url'=>array('index')),
	array('label'=>'Create student', 'url'=>array('create')),
	array('label'=>'Update student', 'url'=>array('update', 'id'=>$model->stCode)),
	array('label'=>'Delete student', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->stCode),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage student', 'url'=>array('admin')),
);
?>

<h1>View student #<?php echo $model->stCode; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'stName',
		'stFamily',
		'fatherName',
		'stCode',
		'school',
		'address',
		'birthdate',
		'picture',
		'parentCode',
		'Id',
		'schoolId',
	),
)); ?>
