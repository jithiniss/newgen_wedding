<?php
/* @var $this MasterParentStatusController */
/* @var $model MasterParentStatus */

$this->breadcrumbs=array(
	'Master Parent Statuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterParentStatus', 'url'=>array('index')),
	array('label'=>'Create MasterParentStatus', 'url'=>array('create')),
	array('label'=>'Update MasterParentStatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterParentStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterParentStatus', 'url'=>array('admin')),
);
?>

<h1>View MasterParentStatus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category',
		'parent_status',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
