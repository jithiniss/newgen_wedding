<?php
/* @var $this MasterFamilyTypeController */
/* @var $model MasterFamilyType */

$this->breadcrumbs=array(
	'Master Family Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterFamilyType', 'url'=>array('index')),
	array('label'=>'Create MasterFamilyType', 'url'=>array('create')),
	array('label'=>'Update MasterFamilyType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterFamilyType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterFamilyType', 'url'=>array('admin')),
);
?>

<h1>View MasterFamilyType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'family_type',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
