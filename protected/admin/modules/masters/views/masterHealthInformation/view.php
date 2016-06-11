<?php
/* @var $this MasterHealthInformationController */
/* @var $model MasterHealthInformation */

$this->breadcrumbs=array(
	'Master Health Informations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterHealthInformation', 'url'=>array('index')),
	array('label'=>'Create MasterHealthInformation', 'url'=>array('create')),
	array('label'=>'Update MasterHealthInformation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterHealthInformation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterHealthInformation', 'url'=>array('admin')),
);
?>

<h1>View MasterHealthInformation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'health_info',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
