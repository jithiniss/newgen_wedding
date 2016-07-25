<?php
/* @var $this VendorDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vendor Details',
);

$this->menu=array(
	array('label'=>'Create VendorDetails', 'url'=>array('create')),
	array('label'=>'Manage VendorDetails', 'url'=>array('admin')),
);
?>

<h1>Vendor Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
