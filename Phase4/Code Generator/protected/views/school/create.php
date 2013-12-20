<?php
/* @var $this SchoolController */
/* @var $model school */

$this->breadcrumbs=array(
	'Schools'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List school', 'url'=>array('index')),
	array('label'=>'Manage school', 'url'=>array('admin')),
);
?>

<h1>Create school</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>