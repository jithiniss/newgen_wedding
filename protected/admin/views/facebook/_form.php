<?php
/* @var $this FacebookController */
/* @var $model Facebook */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facebook-form',
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
		<?php echo $form->labelEx($model,'facebook_link'); ?>
		<?php echo $form->textField($model,'facebook_link',array('size'=>60,'maxlength'=>300,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'facebook_link'); ?>
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
		<?php echo $form->labelEx($model,'ub'); ?>
		<?php echo $form->textField($model,'ub',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'ub'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doc'); ?>
		<?php echo $form->textField($model,'doc',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'doc'); ?>
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