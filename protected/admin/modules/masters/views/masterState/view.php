<?php
/* @var $this MasterStateController */
/* @var $model MasterState */

$this->breadcrumbs=array(
	'Master States'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterState', 'url'=>array('index')),
	array('label'=>'Create MasterState', 'url'=>array('create')),
	array('label'=>'Update MasterState', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterState', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterState', 'url'=>array('admin')),
);
?>

<h1>View MasterState #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'country_id',
		'state',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
