<?php
/* @var $this VendorDetailsController */
/* @var $model VendorDetails */

$this->breadcrumbs=array(
	'Vendor Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VendorDetails', 'url'=>array('index')),
	array('label'=>'Create VendorDetails', 'url'=>array('create')),
	array('label'=>'Update VendorDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VendorDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VendorDetails', 'url'=>array('admin')),
);
?>

<h1>View VendorDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'user_name',
		'password',
		'email',
		'country',
		'state',
		'city',
		'street',
		'dob',
		'gender',
		'phone_no1',
		'phone_no2',
		'fax',
		'business_type',
		'company_name',
		'company_website_link',
		'company_address',
		'our_services',
		'approval_status',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
