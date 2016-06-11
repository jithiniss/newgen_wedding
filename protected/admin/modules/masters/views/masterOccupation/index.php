<?php
/* @var $this MasterOccupationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Occupations',
);

$this->menu=array(
	array('label'=>'Create MasterOccupation', 'url'=>array('create')),
	array('label'=>'Manage MasterOccupation', 'url'=>array('admin')),
);
?>

<h1>Master Occupations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
