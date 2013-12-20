<?php
/* @var $this CommentController */
/* @var $model comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->commentId,
);

$this->menu=array(
	array('label'=>'List comment', 'url'=>array('index')),
	array('label'=>'Create comment', 'url'=>array('create')),
	array('label'=>'Update comment', 'url'=>array('update', 'id'=>$model->commentId)),
	array('label'=>'Delete comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->commentId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage comment', 'url'=>array('admin')),
);
?>

<h1>View comment #<?php echo $model->commentId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'commentId',
		'SenderName',
		'SenderMail',
		'ReceiverMail',
		'Category',
		'Subject',
		'Body',
		'Status',
		'SendDate',
		'SendTime',
	),
)); ?>
