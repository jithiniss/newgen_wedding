<?php
/* @var $this EnquiryController */
/* @var $model Enquiry */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'enquiry-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>


        <div class="form-inline">
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'name'); ?>
                        <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'subject'); ?>
                        <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'subject'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'mobile'); ?>
                        <?php echo $form->textField($model, 'mobile', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'mobile'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'email'); ?>
                        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'message'); ?>
                        <?php echo $form->textArea($model, 'message', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'message'); ?>
                </div>

                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>

                        <?php // echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </div>

                <?php $this->endWidget(); ?>
        </div>