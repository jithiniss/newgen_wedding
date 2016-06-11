<?php
/* @var $this AdminPostController */
/* @var $model AdminPost */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-post-form',
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
                    <?php echo $form->labelEx($model,'post_name'); ?>
                    <?php echo $form->textField($model,'post_name',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'post_name'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'static_content'); ?>
                    <?php echo $form->textField($model,'static_content',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'static_content'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'dynamic_content'); ?>
                    <?php echo $form->textField($model,'dynamic_content',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'dynamic_content'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'slider'); ?>
                    <?php echo $form->textField($model,'slider',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'slider'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'gallery'); ?>
                    <?php echo $form->textField($model,'gallery',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'gallery'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'contact_us'); ?>
                    <?php echo $form->textField($model,'contact_us',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'contact_us'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'social_media'); ?>
                    <?php echo $form->textField($model,'social_media',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'social_media'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'other'); ?>
                    <?php echo $form->textField($model,'other',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'other'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'site_content'); ?>
                    <?php echo $form->textField($model,'site_content',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'site_content'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'service'); ?>
                    <?php echo $form->textField($model,'service',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'service'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'news'); ?>
                    <?php echo $form->textField($model,'news',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'news'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'settings'); ?>
                    <?php echo $form->textField($model,'settings',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'settings'); ?>
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