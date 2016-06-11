<?php
/* @var $this MasterCasteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Castes',
);

$this->menu=array(
	array('label'=>'Create MasterCaste', 'url'=>array('create')),
	array('label'=>'Manage MasterCaste', 'url'=>array('admin')),
);
?>

<h1>Master Castes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
