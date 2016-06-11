<?php
/* @var $this MasterOccupationController */
/* @var $model MasterOccupation */

$this->breadcrumbs=array(
	'Master Occupations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterOccupation', 'url'=>array('index')),
	array('label'=>'Create MasterOccupation', 'url'=>array('create')),
	array('label'=>'Update MasterOccupation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterOccupation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterOccupation', 'url'=>array('admin')),
);
?>

<h1>View MasterOccupation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'father_status',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
