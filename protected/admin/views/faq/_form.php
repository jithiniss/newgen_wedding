<?php
/* @var $this FaqController */
/* @var $model Faq */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'faq-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
                <?php echo $form->labelEx($model, 'question'); ?>
                <?php echo $form->textField($model, 'question', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'question'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model, 'answer'); ?>
                <?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'answer',
                ));
                ?>
                <?php echo $form->error($model, 'answer'); ?>
        </div>



        <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->