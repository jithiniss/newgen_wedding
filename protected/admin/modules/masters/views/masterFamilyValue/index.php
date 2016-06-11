<?php
/* @var $this MasterFamilyValueController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Family Values',
);

$this->menu=array(
	array('label'=>'Create MasterFamilyValue', 'url'=>array('create')),
	array('label'=>'Manage MasterFamilyValue', 'url'=>array('admin')),
);
?>

<h1>Master Family Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
