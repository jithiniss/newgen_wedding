<?php
/* @var $this FileUploadsController */
/* @var $model FileUploads */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'file-uploads-form',
            'htmlOptions' => array('class' => "form-horizontal", 'enctype' => 'multipart/form-data'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => true,
        ));
        ?>

        <!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">
                        <?php echo $form->labelEx($model, 'heading'); ?>
                </label>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'heading', array("placeholder" => "heading", "class" => "form-control")); ?>
                        <?php echo $form->error($model, 'headng'); ?>
                </div>
        </div>
        <div class="form-group-separator"></div>

        <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">
                        <?php echo $form->labelEx($model, 'file'); ?>
                </label>
                <div class="col-sm-10">
                        <?php echo $form->fileField($model, 'file', array("placeholder" => "", "class" => "form-control")); ?>
                        <?php echo $form->error($model, 'file'); ?>
                </div>
        </div>
        <div class="form-group-separator"></div>
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
        <div class="form-group-separator"></div>

        <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info btn-single pull-right')); ?>
        </div>
        <?php $this->endWidget(); ?>

</div><!-- form -->