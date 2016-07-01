<?php
/* @var $this FileUploadsController */
/* @var $model FileUploads */

$this->breadcrumbs=array(
	'File Uploads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FileUploads', 'url'=>array('index')),
	array('label'=>'Create FileUploads', 'url'=>array('create')),
	array('label'=>'Update FileUploads', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FileUploads', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FileUploads', 'url'=>array('admin')),
);
?>

<h1>View FileUploads #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'heading',
		'file',
		'cb',
		'dou',
	),
)); ?>
