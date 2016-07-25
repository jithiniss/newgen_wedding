<?php
/* @var $this VendorDetailsController */
/* @var $model VendorDetails */
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
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dob'); ?>
		<?php echo $form->textField($model,'dob',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_no1'); ?>
		<?php echo $form->textField($model,'phone_no1',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_no2'); ?>
		<?php echo $form->textField($model,'phone_no2',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_type'); ?>
		<?php echo $form->textField($model,'business_type',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_website_link'); ?>
		<?php echo $form->textField($model,'company_website_link',array('size'=>60,'maxlength'=>300,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_address'); ?>
		<?php echo $form->textArea($model,'company_address',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'our_services'); ?>
		<?php echo $form->textArea($model,'our_services',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approval_status'); ?>
		<?php echo $form->textField($model,'approval_status',array('class' => 'form-control')); ?>
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