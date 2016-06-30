<?php
/* @var $this TellUsStoryController */
/* @var $model TellUsStory */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tell-us-story-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <br/>
    <div class="form-inline">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'partner_name'); ?>
            <?php echo $form->textField($model, 'partner_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'partner_name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'partner_email'); ?>
            <?php echo $form->textField($model, 'partner_email', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'partner_email'); ?>
        </div>

        <div class="form-group form-group-full">
            <?php echo $form->labelEx($model, 'feedback'); ?>
            <?php echo $form->textArea($model, 'feedback', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'feedback'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'wedding_date'); ?>
            <?php
            $from = date('Y') - 2;
            $to = date('Y') + 2;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'wedding_date',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'changeYear' => true, // can change year
                    'changeMonth' => true, // can change month
                    'yearRange' => $from . ':' . $to, // range of year
                    'showButtonPanel' => true, // show button panel
                ),
                'htmlOptions' => array(
                    'size' => '10', // textField size
                    'maxlength' => '10', // textField maxlength
                    'class' => 'form-control',
                    'readonly' => 'readonly',
                    'placeholder' => 'Wedding Date'
                ),
            ));
            ?>
            <?php echo $form->error($model, 'wedding_date'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'image'); ?>
            <?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'image'); ?>
        </div>


    </div>

    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->