<?php
/* @var $this MasterServicesController */
/* @var $model MasterServices */

$this->breadcrumbs=array(
	'Master Services'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MasterServices', 'url'=>array('index')),
	array('label'=>'Create MasterServices', 'url'=>array('create')),
	array('label'=>'Update MasterServices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterServices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterServices', 'url'=>array('admin')),
);
?>

<h1>View MasterServices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'field',
		'status',
	),
)); ?>
