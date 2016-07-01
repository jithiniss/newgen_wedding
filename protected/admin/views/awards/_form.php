<?php
/* @var $this AwardsController */
/* @var $model Awards */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'awards-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
            <?php echo $form->labelEx($model, 'year'); ?>
            <?php echo $form->textField($model, 'year', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'year'); ?>
        </div>
        <!--<div class="form-group-separator"></div>-->
        <div class="form-group">
            <?php echo $form->labelEx($model, 'image'); ?>
            <?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'image'); ?>
        </div>
        <!--<div class="form-group-separator"></div>-->
        <div class="form-group">
            <?php echo $form->labelEx($model, 'sort_order'); ?>
            <?php echo $form->textField($model, 'sort_order', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'sort_order'); ?>
        </div>
        <div class="form-group form-group-full">
            <?php echo $form->labelEx($model, 'content'); ?>
            <?php
            $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                'model' => $model,
                'attribute' => 'content',
            ));
            ?>
            <?php echo $form->error($model, 'content'); ?>
        </div>
        <!--<div class="form-group-separator"></div>-->

        <!--<div class="form-group-separator"></div>-->
        <!--    <div class="form-group">
        <?php // echo $form->labelEx($model, 'field1'); ?>
        <?php // echo $form->textField($model, 'field1', array('class' => 'form-control')); ?>
        <?php // echo $form->error($model, 'field1'); ?>
            </div>-->
    </div>

    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->