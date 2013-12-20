<?php
/* @var $this CommentController */
/* @var $model comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->commentId=>array('view','id'=>$model->commentId),
	'Update',
);

$this->menu=array(
	array('label'=>'List comment', 'url'=>array('index')),
	array('label'=>'Create comment', 'url'=>array('create')),
	array('label'=>'View comment', 'url'=>array('view', 'id'=>$model->commentId)),
	array('label'=>'Manage comment', 'url'=>array('admin')),
);
?>

<h1>Update comment <?php echo $model->commentId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>