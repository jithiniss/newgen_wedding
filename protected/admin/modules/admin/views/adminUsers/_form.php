<?php
/* @var $this AdminUsersController */
/* @var $model AdminUsers */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <br/>
    <div class="form-inline">
                        <div class="form-group">
                    <?php echo $form->labelEx($model,'post_id'); ?>
                    <?php echo $form->textField($model,'post_id',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'post_id'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'user_name'); ?>
                    <?php echo $form->textField($model,'user_name',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'user_name'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'password'); ?>
                    <?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>30,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'name'); ?>
                    <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'name'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'email'); ?>
                    <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'email'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'phone_no'); ?>
                    <?php echo $form->textField($model,'phone_no',array('size'=>15,'maxlength'=>15,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'phone_no'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'status'); ?>
                    <?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'status'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'doc'); ?>
                    <?php echo $form->textField($model,'doc',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'doc'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'dou'); ?>
                    <?php echo $form->textField($model,'dou',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'dou'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'cb'); ?>
                    <?php echo $form->textField($model,'cb',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'cb'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'ub'); ?>
                    <?php echo $form->textField($model,'ub',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'ub'); ?>
                </div>

                    </div>
    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->