<?php
/* @var $this MasterProfileForController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Profile Fors',
);

$this->menu=array(
	array('label'=>'Create MasterProfileFor', 'url'=>array('create')),
	array('label'=>'Manage MasterProfileFor', 'url'=>array('admin')),
);
?>

<h1>Master Profile Fors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
