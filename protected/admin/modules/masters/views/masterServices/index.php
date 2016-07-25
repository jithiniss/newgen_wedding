<?php
/* @var $this MasterServicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Services',
);

$this->menu=array(
	array('label'=>'Create MasterServices', 'url'=>array('create')),
	array('label'=>'Manage MasterServices', 'url'=>array('admin')),
);
?>

<h1>Master Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
