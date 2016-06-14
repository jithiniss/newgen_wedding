<?php
/* @var $this MasterMotherTongueController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Mother Tongues',
);

$this->menu=array(
	array('label'=>'Create MasterMotherTongue', 'url'=>array('create')),
	array('label'=>'Manage MasterMotherTongue', 'url'=>array('admin')),
);
?>

<h1>Master Mother Tongues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
