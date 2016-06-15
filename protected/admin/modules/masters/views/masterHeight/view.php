<?php
/* @var $this MasterHeightController */
/* @var $model MasterHeight */

$this->breadcrumbs=array(
	'Master Heights'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterHeight', 'url'=>array('index')),
	array('label'=>'Create MasterHeight', 'url'=>array('create')),
	array('label'=>'Update MasterHeight', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterHeight', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterHeight', 'url'=>array('admin')),
);
?>

<h1>View MasterHeight #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'height',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
