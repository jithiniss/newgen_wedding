<?php
/* @var $this MasterParentStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Parent Statuses',
);

$this->menu=array(
	array('label'=>'Create MasterParentStatus', 'url'=>array('create')),
	array('label'=>'Manage MasterParentStatus', 'url'=>array('admin')),
);
?>

<h1>Master Parent Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
