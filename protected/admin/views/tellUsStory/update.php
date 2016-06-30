<?php
/* @var $this TellUsStoryController */
/* @var $model TellUsStory */

$this->breadcrumbs=array(
	'Tell Us Stories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TellUsStory', 'url'=>array('index')),
	array('label'=>'Create TellUsStory', 'url'=>array('create')),
	array('label'=>'View TellUsStory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TellUsStory', 'url'=>array('admin')),
);
?>

<h1>Update TellUsStory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>