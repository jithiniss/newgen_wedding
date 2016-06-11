<?php
/* @var $this MasterBodyTypeController */
/* @var $model MasterBodyType */

$this->breadcrumbs=array(
	'Master Body Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterBodyType', 'url'=>array('index')),
	array('label'=>'Create MasterBodyType', 'url'=>array('create')),
	array('label'=>'Update MasterBodyType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterBodyType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterBodyType', 'url'=>array('admin')),
);
?>

<h1>View MasterBodyType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'body_type',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
