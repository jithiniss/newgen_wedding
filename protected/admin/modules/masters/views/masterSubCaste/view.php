<?php
/* @var $this MasterSubCasteController */
/* @var $model MasterSubCaste */

$this->breadcrumbs=array(
	'Master Sub Castes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterSubCaste', 'url'=>array('index')),
	array('label'=>'Create MasterSubCaste', 'url'=>array('create')),
	array('label'=>'Update MasterSubCaste', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterSubCaste', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterSubCaste', 'url'=>array('admin')),
);
?>

<h1>View MasterSubCaste #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'religion_id',
		'caste_id',
		'sub_caste',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
