<?php
/* @var $this MasterWorkingWithController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Working Withs',
);

$this->menu=array(
	array('label'=>'Create MasterWorkingWith', 'url'=>array('create')),
	array('label'=>'Manage MasterWorkingWith', 'url'=>array('admin')),
);
?>

<h1>Master Working Withs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
