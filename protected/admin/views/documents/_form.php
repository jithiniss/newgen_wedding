<?php
/* @var $this DocumentsController */
/* @var $model Documents */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'documents-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->textField($model,'file',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verify_status'); ?>
		<?php echo $form->textField($model,'verify_status',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'verify_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cb'); ?>
		<?php echo $form->textField($model,'cb',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'cb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dou'); ?>
		<?php echo $form->textField($model,'dou',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'dou'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->