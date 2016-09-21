<?php
/* @var $this MasterBusinessController */
/* @var $model MasterBusiness */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'master-business-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>


        <?php echo $form->errorSummary($model); ?>

        <div class="form-inline">
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'type'); ?>
                        <?php echo $form->textField($model, 'type', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'type'); ?>
                </div>


                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>

                        <?php // echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </div>

                <?php $this->endWidget(); ?>

        </div><!-- form -->