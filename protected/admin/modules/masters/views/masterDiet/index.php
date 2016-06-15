<?php
/* @var $this MasterDietController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Diets',
);

$this->menu=array(
	array('label'=>'Create MasterDiet', 'url'=>array('create')),
	array('label'=>'Manage MasterDiet', 'url'=>array('admin')),
);
?>

<h1>Master Diets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
