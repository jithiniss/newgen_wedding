<?php
/* @var $this UserPhotosController */
/* @var $model UserPhotos */

$this->breadcrumbs=array(
	'User Photoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserPhotos', 'url'=>array('index')),
	array('label'=>'Create UserPhotos', 'url'=>array('create')),
	array('label'=>'Update UserPhotos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserPhotos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserPhotos', 'url'=>array('admin')),
);
?>

<h1>View UserPhotos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'photo_name',
		'approval',
		'status',
		'cb',
		'doc',
		'ub',
		'dou',
	),
)); ?>
