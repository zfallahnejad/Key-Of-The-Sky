<?php
/* @var $this ParentclassController */
/* @var $model parentclass */

$this->breadcrumbs=array(
	'Parentclasses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List parentclass', 'url'=>array('index')),
	array('label'=>'Manage parentclass', 'url'=>array('admin')),
);
?>

<h1>Create parentclass</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>