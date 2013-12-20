<?php
/* @var $this StudentController */
/* @var $model student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->stCode=>array('view','id'=>$model->stCode),
	'Update',
);

$this->menu=array(
	array('label'=>'List student', 'url'=>array('index')),
	array('label'=>'Create student', 'url'=>array('create')),
	array('label'=>'View student', 'url'=>array('view', 'id'=>$model->stCode)),
	array('label'=>'Manage student', 'url'=>array('admin')),
);
?>

<h1>Update student <?php echo $model->stCode; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>