<?php
/* @var $this AdminPostController */
/* @var $model AdminPost */
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
		<?php echo $form->label($model,'post_name'); ?>
		<?php echo $form->textField($model,'post_name',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'static_content'); ?>
		<?php echo $form->textField($model,'static_content',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dynamic_content'); ?>
		<?php echo $form->textField($model,'dynamic_content',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'slider'); ?>
		<?php echo $form->textField($model,'slider',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gallery'); ?>
		<?php echo $form->textField($model,'gallery',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_us'); ?>
		<?php echo $form->textField($model,'contact_us',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'social_media'); ?>
		<?php echo $form->textField($model,'social_media',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other'); ?>
		<?php echo $form->textField($model,'other',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_content'); ?>
		<?php echo $form->textField($model,'site_content',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service'); ?>
		<?php echo $form->textField($model,'service',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'news'); ?>
		<?php echo $form->textField($model,'news',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'settings'); ?>
		<?php echo $form->textField($model,'settings',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doc'); ?>
		<?php echo $form->textField($model,'doc',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dou'); ?>
		<?php echo $form->textField($model,'dou',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cb'); ?>
		<?php echo $form->textField($model,'cb',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ub'); ?>
		<?php echo $form->textField($model,'ub',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->