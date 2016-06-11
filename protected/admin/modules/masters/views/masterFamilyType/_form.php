<?php
/* @var $this MasterFamilyTypeController */
/* @var $model MasterFamilyType */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'master-family-type-form',
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
                    <?php echo $form->labelEx($model,'family_type'); ?>
                    <?php echo $form->textField($model,'family_type',array('size'=>60,'maxlength'=>155,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'family_type'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'status'); ?>
                    <?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'status'); ?>
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

                    </div>
    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->