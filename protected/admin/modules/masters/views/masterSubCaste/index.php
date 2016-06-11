<?php
/* @var $this MasterSubCasteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Sub Castes',
);

$this->menu=array(
	array('label'=>'Create MasterSubCaste', 'url'=>array('create')),
	array('label'=>'Manage MasterSubCaste', 'url'=>array('admin')),
);
?>

<h1>Master Sub Castes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
