<?php
/* @var $this ReportMisuseController */
/* @var $model ReportMisuse */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-misuse-form',
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
		<?php echo $form->labelEx($model,'report_id'); ?>
		<?php echo $form->textField($model,'report_id',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'report_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'report_reason'); ?>
		<?php echo $form->textField($model,'report_reason',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'report_reason'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cb'); ?>
		<?php echo $form->textField($model,'cb',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'cb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doc'); ?>
		<?php echo $form->textField($model,'doc',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'doc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ub'); ?>
		<?php echo $form->textField($model,'ub',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'ub'); ?>
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