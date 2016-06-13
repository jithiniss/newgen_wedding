<?php
/* @var $this MasterSubCasteController */
/* @var $model MasterSubCaste */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'master-sub-caste-form',
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
            <?php echo $form->labelEx($model, 'religion_id'); ?>
            <?php echo CHtml::activeDropDownList($model, 'religion_id', CHtml::listData(MasterReligion::model()->findAllByAttributes(array('status' => 1)), 'id', 'religion'), array('empty' => '--please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
            <?php echo $form->error($model, 'religion_id'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'caste_id'); ?>
            <?php echo CHtml::activeDropDownList($model, 'caste_id', CHtml::listData(MasterCaste::model()->findAllByAttributes(array('status' => 1)), 'id', 'caste'), array('empty' => '--please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
            <?php echo $form->error($model, 'caste_id'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'sub_caste'); ?>
            <?php echo $form->textField($model, 'sub_caste', array('size' => 60, 'maxlength' => 99, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'sub_caste'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '0' => 'Disabled'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>



    </div>
    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->