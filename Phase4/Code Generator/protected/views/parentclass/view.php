<?php
/* @var $this ParentclassController */
/* @var $model parentclass */

$this->breadcrumbs=array(
	'Parentclasses'=>array('index'),
	$model->parentCode,
);

$this->menu=array(
	array('label'=>'List parentclass', 'url'=>array('index')),
	array('label'=>'Create parentclass', 'url'=>array('create')),
	array('label'=>'Update parentclass', 'url'=>array('update', 'id'=>$model->parentCode)),
	array('label'=>'Delete parentclass', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->parentCode),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage parentclass', 'url'=>array('admin')),
);
?>

<h1>View parentclass #<?php echo $model->parentCode; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'parentCode',
		'parentName',
		'parentFamily',
		'homePhone',
		'mobileNum',
		'password',
		'email',
	),
)); ?>
