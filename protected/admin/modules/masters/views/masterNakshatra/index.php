<?php
/* @var $this MasterNakshatraController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Nakshatras',
);

$this->menu=array(
	array('label'=>'Create MasterNakshatra', 'url'=>array('create')),
	array('label'=>'Manage MasterNakshatra', 'url'=>array('admin')),
);
?>

<h1>Master Nakshatras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
