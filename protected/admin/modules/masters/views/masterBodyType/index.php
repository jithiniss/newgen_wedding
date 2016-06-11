<?php
/* @var $this MasterBodyTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Body Types',
);

$this->menu=array(
	array('label'=>'Create MasterBodyType', 'url'=>array('create')),
	array('label'=>'Manage MasterBodyType', 'url'=>array('admin')),
);
?>

<h1>Master Body Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
