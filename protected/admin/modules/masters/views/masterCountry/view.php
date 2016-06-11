<?php
/* @var $this MasterCountryController */
/* @var $model MasterCountry */

$this->breadcrumbs=array(
	'Master Countries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterCountry', 'url'=>array('index')),
	array('label'=>'Create MasterCountry', 'url'=>array('create')),
	array('label'=>'Update MasterCountry', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterCountry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterCountry', 'url'=>array('admin')),
);
?>

<h1>View MasterCountry #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'country',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
