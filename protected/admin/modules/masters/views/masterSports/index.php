<?php
/* @var $this MasterSportsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Sports',
);

$this->menu=array(
	array('label'=>'Create MasterSports', 'url'=>array('create')),
	array('label'=>'Manage MasterSports', 'url'=>array('admin')),
);
?>

<h1>Master Sports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
