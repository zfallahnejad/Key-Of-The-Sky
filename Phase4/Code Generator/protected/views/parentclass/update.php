<?php
/* @var $this ParentclassController */
/* @var $model parentclass */

$this->breadcrumbs=array(
	'Parentclasses'=>array('index'),
	$model->parentCode=>array('view','id'=>$model->parentCode),
	'Update',
);

$this->menu=array(
	array('label'=>'List parentclass', 'url'=>array('index')),
	array('label'=>'Create parentclass', 'url'=>array('create')),
	array('label'=>'View parentclass', 'url'=>array('view', 'id'=>$model->parentCode)),
	array('label'=>'Manage parentclass', 'url'=>array('admin')),
);
?>

<h1>Update parentclass <?php echo $model->parentCode; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>