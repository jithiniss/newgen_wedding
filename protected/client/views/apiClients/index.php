<?php
/* @var $this ApiClientsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Api Clients',
);

$this->menu=array(
	array('label'=>'Create ApiClients', 'url'=>array('create')),
	array('label'=>'Manage ApiClients', 'url'=>array('admin')),
);
?>

<h1>Api Clients</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
