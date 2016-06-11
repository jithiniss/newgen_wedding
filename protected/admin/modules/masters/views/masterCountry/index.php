<?php
/* @var $this MasterCountryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Countries',
);

$this->menu=array(
	array('label'=>'Create MasterCountry', 'url'=>array('create')),
	array('label'=>'Manage MasterCountry', 'url'=>array('admin')),
);
?>

<h1>Master Countries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
