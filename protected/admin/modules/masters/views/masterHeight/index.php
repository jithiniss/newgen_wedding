<?php
/* @var $this MasterHeightController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Heights',
);

$this->menu=array(
	array('label'=>'Create MasterHeight', 'url'=>array('create')),
	array('label'=>'Manage MasterHeight', 'url'=>array('admin')),
);
?>

<h1>Master Heights</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
