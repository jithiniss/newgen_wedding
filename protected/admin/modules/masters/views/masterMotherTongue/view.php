<?php
/* @var $this MasterMotherTongueController */
/* @var $model MasterMotherTongue */

$this->breadcrumbs=array(
	'Master Mother Tongues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterMotherTongue', 'url'=>array('index')),
	array('label'=>'Create MasterMotherTongue', 'url'=>array('create')),
	array('label'=>'Update MasterMotherTongue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterMotherTongue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterMotherTongue', 'url'=>array('admin')),
);
?>

<h1>View MasterMotherTongue #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mother_tongue',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
