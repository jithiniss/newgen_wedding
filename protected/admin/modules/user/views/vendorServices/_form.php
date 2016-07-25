<?php
/* @var $this VendorServicesController */
/* @var $model VendorServices */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'vendor-services-form',
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
            <?php echo $form->labelEx($model, 'category_id'); ?>
            <?php echo CHtml::activeDropDownList($model, 'category_id', CHtml::listData(MasterServices::model()->findAllByAttributes(array('status' => 1)), 'id', 'name'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>

            <?php echo $form->error($model, 'category_id'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'address'); ?>
            <?php echo $form->textArea($model, 'address', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'address'); ?>
        </div>

        <div class="form-group form-group-full">
            <?php echo $form->labelEx($model, 'description'); ?>
            <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'description'); ?>
        </div>

        <div class="form-group" style="width: 30%;">
            <?php echo $form->labelEx($model, 'phn_no'); ?>
            <?php echo $form->textField($model, 'phn_no', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'phn_no'); ?>
        </div>

        <div class="form-group" style="width: 45%;">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>

        <div class="form-group form-group-full">
            <?php echo $form->labelEx($model, 'website'); ?>
            <?php echo $form->textField($model, 'website', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'website'); ?>
        </div>

        <div class="form-group form-group-full">
            <?php echo $form->labelEx($model, 'map'); ?>
            <?php echo $form->textArea($model, 'map', array('rows' => 3, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'map'); ?>
        </div>

        <div class="form-group form-group-full">
            <?php echo $form->labelEx($model, 'video'); ?>
            <?php echo $form->textField($model, 'video', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'video'); ?>
        </div>


        <div class="form-group form-group-full">
            <?php echo $form->labelEx($model, 'facebook'); ?>
            <?php echo $form->textField($model, 'facebook', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'facebook'); ?>
        </div>

        <div class="form-group form-group-full">
            <?php echo $form->labelEx($model, 'google_plus'); ?>
            <?php echo $form->textField($model, 'google_plus', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'google_plus'); ?>
        </div>

        <div class="form-group form-group-full">
            <?php echo $form->labelEx($model, 'twitter'); ?>
            <?php echo $form->textField($model, 'twitter', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'twitter'); ?>
        </div>

        <div class="form-group form-group-full">
            <?php echo $form->labelEx($model, 'linkdin'); ?>
            <?php echo $form->textField($model, 'linkdin', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'linkdin'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'image'); ?>
            <?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 99, 'class' => 'form-control')); ?>
            <?php
            if($model->image != '' && $model->id != "") {
                    $folder = Yii::app()->Upload->folderName(0, 1000, $model->vendor_id);
                    echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/vendor/' . $folder . '/' . $model->vendor_id . '/services/' . $model->id . '/' . $model->image . '" />';
            }
            ?>
            <?php echo $form->error($model, 'image'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'featured'); ?>
            <?php echo $form->dropDownList($model, 'featured', array(0 => 'No', 1 => 'Yes'), array('empty' => '--Featured Service--', 'class' => 'form-control')); ?>

            <?php echo $form->error($model, 'featured'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList($model, 'status', array(0 => 'In-Active', 1 => 'Active'), array('empty' => '--Status--', 'class' => 'form-control')); ?>

            <?php echo $form->error($model, 'status'); ?>
        </div>




    </div>
    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->