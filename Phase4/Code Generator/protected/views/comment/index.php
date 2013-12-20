<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comments',
);

$this->menu=array(
	array('label'=>'Create comment', 'url'=>array('create')),
	array('label'=>'Manage comment', 'url'=>array('admin')),
);
?>

<h1>Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
