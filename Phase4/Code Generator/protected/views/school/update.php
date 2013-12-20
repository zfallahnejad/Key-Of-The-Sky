<?php
/* @var $this SchoolController */
/* @var $model school */

$this->breadcrumbs=array(
	'Schools'=>array('index'),
	$model->schoolId=>array('view','id'=>$model->schoolId),
	'Update',
);

$this->menu=array(
	array('label'=>'List school', 'url'=>array('index')),
	array('label'=>'Create school', 'url'=>array('create')),
	array('label'=>'View school', 'url'=>array('view', 'id'=>$model->schoolId)),
	array('label'=>'Manage school', 'url'=>array('admin')),
);
?>

<h1>Update school <?php echo $model->schoolId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>