<?php
/* @var $this SchoolController */
/* @var $model school */

$this->breadcrumbs=array(
	'Schools'=>array('index'),
	$model->schoolId,
);

$this->menu=array(
	array('label'=>'List school', 'url'=>array('index')),
	array('label'=>'Create school', 'url'=>array('create')),
	array('label'=>'Update school', 'url'=>array('update', 'id'=>$model->schoolId)),
	array('label'=>'Delete school', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->schoolId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage school', 'url'=>array('admin')),
);
?>

<h1>View school #<?php echo $model->schoolId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'schoolId',
		'schoolName',
		'schoolPhone',
		'schoolAddress',
		'teacherName',
		'teacherFamily',
		'teacherPhone',
		'email',
		'password',
	),
)); ?>
