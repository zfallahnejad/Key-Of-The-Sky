<?php
/* @var $this CommentController */
/* @var $model comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List comment', 'url'=>array('index')),
	array('label'=>'Manage comment', 'url'=>array('admin')),
);
?>

<h1>Create comment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>