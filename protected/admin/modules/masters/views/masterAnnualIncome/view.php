<?php
/* @var $this MasterAnnualIncomeController */
/* @var $model MasterAnnualIncome */

$this->breadcrumbs=array(
	'Master Annual Incomes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterAnnualIncome', 'url'=>array('index')),
	array('label'=>'Create MasterAnnualIncome', 'url'=>array('create')),
	array('label'=>'Update MasterAnnualIncome', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterAnnualIncome', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterAnnualIncome', 'url'=>array('admin')),
);
?>

<h1>View MasterAnnualIncome #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'income_from',
		'income_to',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
