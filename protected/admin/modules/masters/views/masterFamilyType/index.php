<?php
/* @var $this MasterFamilyTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Family Types',
);

$this->menu=array(
	array('label'=>'Create MasterFamilyType', 'url'=>array('create')),
	array('label'=>'Manage MasterFamilyType', 'url'=>array('admin')),
);
?>

<h1>Master Family Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
