<?php
/* @var $this PlansController */
/* @var $model Plans */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'plans-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="form-inline">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'plan_name'); ?>
            <?php echo $form->textField($model, 'plan_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'plan_name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'amount'); ?>
            <?php echo $form->textField($model, 'amount', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'amount'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'view_contact'); ?>
            <?php echo $form->textField($model, 'view_contact', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'view_contact'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'send_message'); ?>
            <?php echo $form->dropDownList($model, 'send_message', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'send_message'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'search'); ?>
            <?php echo $form->dropDownList($model, 'search', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'search'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Interest'); ?>
            <?php echo $form->dropDownList($model, 'Interest', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Interest'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'sms_alerts'); ?>
            <?php echo $form->dropDownList($model, 'sms_alerts', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'sms_alerts'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'email_alerts'); ?>
            <?php echo $form->dropDownList($model, 'email_alerts', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email_alerts'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'premium_tag'); ?>
            <?php echo $form->dropDownList($model, 'premium_tag', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'premium_tag'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'featured'); ?>
            <?php echo $form->dropDownList($model, 'featured', array('0' => 'No', '1' => 'Yes'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'featured'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'number_of_days'); ?>
            <?php echo $form->textField($model, 'number_of_days', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'number_of_days'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList($model, 'status', array('0' => 'In-Active', '1' => 'Active'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>


    </div>

    <div class="form-group btns">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->