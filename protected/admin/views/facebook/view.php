<?php
/* @var $this FacebookController */
/* @var $model Facebook */

$this->breadcrumbs=array(
	'Facebooks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Facebook', 'url'=>array('index')),
	array('label'=>'Create Facebook', 'url'=>array('create')),
	array('label'=>'Update Facebook', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Facebook', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Facebook', 'url'=>array('admin')),
);
?>

<h1>View Facebook #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'facebook_link',
		'verify_status',
		'cb',
		'ub',
		'doc',
		'dou',
		'status',
	),
)); ?>
