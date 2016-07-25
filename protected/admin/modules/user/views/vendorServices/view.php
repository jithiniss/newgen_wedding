<?php
/* @var $this VendorServicesController */
/* @var $model VendorServices */

$this->breadcrumbs=array(
	'Vendor Services'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List VendorServices', 'url'=>array('index')),
	array('label'=>'Create VendorServices', 'url'=>array('create')),
	array('label'=>'Update VendorServices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VendorServices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VendorServices', 'url'=>array('admin')),
);
?>

<h1>View VendorServices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'vendor_id',
		'category_id',
		'name',
		'address',
		'description',
		'phn_no',
		'email',
		'website',
		'map',
		'video',
		'image',
		'facebook',
		'google_plus',
		'twitter',
		'linkdin',
		'featured',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
