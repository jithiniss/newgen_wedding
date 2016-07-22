<?php
/* @var $this ReportMisuseController */
/* @var $model ReportMisuse */

$this->breadcrumbs=array(
	'Report Misuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReportMisuse', 'url'=>array('index')),
	array('label'=>'Create ReportMisuse', 'url'=>array('create')),
	array('label'=>'Update ReportMisuse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReportMisuse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReportMisuse', 'url'=>array('admin')),
);
?>

<h1>View ReportMisuse #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'report_id',
		'report_reason',
		'description',
		'cb',
		'doc',
		'ub',
		'dou',
		'status',
	),
)); ?>
