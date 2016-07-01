<?php
/* @var $this AwardsController */
/* @var $model Awards */

$this->breadcrumbs=array(
	'Awards'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Awards', 'url'=>array('index')),
	array('label'=>'Create Awards', 'url'=>array('create')),
	array('label'=>'Update Awards', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Awards', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Awards', 'url'=>array('admin')),
);
?>

<h1>View Awards #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'year',
		'content',
		'image',
		'sort_order',
		'field1',
		'cb',
		'ub',
		'doc',
		'dou',
		'status',
	),
)); ?>
