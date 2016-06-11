<?php
/* @var $this MasterFamilyTypeController */
/* @var $model MasterFamilyType */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'family_type'); ?>
		<?php echo $form->textField($model,'family_type',array('size'=>60,'maxlength'=>155,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cb'); ?>
		<?php echo $form->textField($model,'cb',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ub'); ?>
		<?php echo $form->textField($model,'ub',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doc'); ?>
		<?php echo $form->textField($model,'doc',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dou'); ?>
		<?php echo $form->textField($model,'dou',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->