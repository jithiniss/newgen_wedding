<?php
/* @var $this ApiClientsController */
/* @var $model ApiClients */

$this->breadcrumbs=array(
	'Api Clients'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApiClients', 'url'=>array('index')),
	array('label'=>'Create ApiClients', 'url'=>array('create')),
	array('label'=>'View ApiClients', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ApiClients', 'url'=>array('admin')),
);
?>

<h1>Update ApiClients <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>