<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'banner-form',
            'htmlOptions' => array('class' => "form-horizontal", 'enctype' => 'multipart/form-data'),
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
                        <?php echo $form->labelEx($model, 'page'); ?>
                        <?php echo $form->textField($model, 'page', array('size' => 60, 'maxlength' => 60, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'page'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'banner'); ?>
                        <?php echo $form->fileField($model, 'banner', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php if ($model->banner != "") { ?>
                                <div style="float:left;margin:5px;position:relative;">
                                        <?php $file = Yii::app()->basePath . '/../uploads/banner/' . $model->id . '/banner' . '.' . $model->banner; ?>
                                        <a style="position:absolute;top:43%;color:black;" href="<?= Yii::app()->request->baseUrl; ?>/admin.php/static/banner/ImageDelete?type=banner&id=<?= $model->id; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                        <img width="125"  height="75"style="border: 2px solid #d2d2d2;" src="<?= Yii::app()->request->baseUrl; ?>/uploads/banner/<?= $model->id; ?>/banner.<?= $model->banner; ?>" /></div>
                        <?php } ?>
                        <?php echo $form->error($model, 'banner'); ?>
                </div>





        </div>
        <div class="form-group btns">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->