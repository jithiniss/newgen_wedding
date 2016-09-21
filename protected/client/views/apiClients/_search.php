<?php
/* @var $this ApiClientsController */
/* @var $model ApiClients */
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
		<?php echo $form->label($model,'client_id'); ?>
		<?php echo $form->textField($model,'client_id',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_secret'); ?>
		<?php echo $form->textField($model,'client_secret',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_time'); ?>
		<?php echo $form->textField($model,'created_time',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'access_token'); ?>
		<?php echo $form->textField($model,'access_token',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expire_time'); ?>
		<?php echo $form->textField($model,'expire_time',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->