<?php
/* @var $this MasterAnnualIncomeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Annual Incomes',
);

$this->menu=array(
	array('label'=>'Create MasterAnnualIncome', 'url'=>array('create')),
	array('label'=>'Manage MasterAnnualIncome', 'url'=>array('admin')),
);
?>

<h1>Master Annual Incomes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
