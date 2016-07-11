<?php
/* @var $this MasterSportsController */
/* @var $model MasterSports */

$this->breadcrumbs=array(
	'Master Sports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterSports', 'url'=>array('index')),
	array('label'=>'Create MasterSports', 'url'=>array('create')),
	array('label'=>'View MasterSports', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MasterSports', 'url'=>array('admin')),
);
?>

<h1>Update MasterSports <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>