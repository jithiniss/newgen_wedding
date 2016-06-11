<?php
/* @var $this MasterCasteController */
/* @var $model MasterCaste */

$this->breadcrumbs=array(
	'Master Castes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterCaste', 'url'=>array('index')),
	array('label'=>'Create MasterCaste', 'url'=>array('create')),
	array('label'=>'Update MasterCaste', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterCaste', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterCaste', 'url'=>array('admin')),
);
?>

<h1>View MasterCaste #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'religion_id',
		'caste',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
