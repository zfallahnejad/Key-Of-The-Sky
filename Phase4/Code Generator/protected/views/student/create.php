<?php
/* @var $this StudentController */
/* @var $model student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List student', 'url'=>array('index')),
	array('label'=>'Manage student', 'url'=>array('admin')),
);
?>

<h1>Create student</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>