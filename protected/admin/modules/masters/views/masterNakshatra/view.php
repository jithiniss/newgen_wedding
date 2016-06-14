<?php
/* @var $this MasterNakshatraController */
/* @var $model MasterNakshatra */

$this->breadcrumbs=array(
	'Master Nakshatras'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterNakshatra', 'url'=>array('index')),
	array('label'=>'Create MasterNakshatra', 'url'=>array('create')),
	array('label'=>'Update MasterNakshatra', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterNakshatra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterNakshatra', 'url'=>array('admin')),
);
?>

<h1>View MasterNakshatra #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nakshatra',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
