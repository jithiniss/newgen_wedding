<?php
/* @var $this StaticPageController */
/* @var $model StaticPage */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
            'id' => 'static-page-form',
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
                        <?php echo $form->labelEx($model, 'category_name'); ?>
                        <?php echo $form->textField($model, 'category_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'category_name'); ?>
                </div>



                <div class="form-group">
                        <?php echo $form->labelEx($model, 'header_visibility'); ?>
                        <?php echo $form->dropDownList($model, 'header_visibility', array('0' => "No", '1' => "Yes"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'header_visibility'); ?>
                </div>


                <div class="form-group">
                        <?php echo $form->labelEx($model, 'has_page'); ?>
                        <?php echo $form->dropDownList($model, 'has_page', array('0' => "No", '1' => "Yes"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'has_page'); ?>
                </div>
                <?php
                if ($model->has_page != '' && $model->has_page == 1) {
                        $stat = 'block';
                } else if ($model->has_page != '' && $model->has_page == 0) {
                        $stat = 'none';
                } else {
                        $stat = 'none';
                }
                ?>
                <div class="hasapge" style="display: <?= $stat; ?>;">


                        <div class="form-group">
                                <?php echo $form->labelEx($model, 'title1'); ?>
                                <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'title'); ?>
                        </div>

                        <div class="form-group">
                                <?php echo $form->labelEx($model, 'title2'); ?>
                                <?php echo $form->textField($model, 'heading', array('size' => 60, 'maxlength' => 300, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'heading'); ?>
                        </div>

                        <div class="form-group">
                                <?php echo $form->labelEx($model, 'status'); ?>
                                <?php echo $form->dropDownList($model, 'status', array('0' => "Disabled", '1' => "Enabled"), array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'status'); ?>
                        </div>


                        <div class="form-group form-group-full">
                                <?php echo $form->labelEx($model, 'small_content'); ?>
                                <?php
                                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                                    'model' => $model,
                                    'attribute' => 'small_content',
                                ));
                                ?>
                                <?php echo $form->error($model, 'small_content'); ?>
                        </div> 
                        <div class="form-group form-group-full">
                                <?php echo $form->labelEx($model, 'big_content'); ?>
                                <?php
                                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                                    'model' => $model,
                                    'attribute' => 'big_content',
                                ));
                                ?>
                                <?php echo $form->error($model, 'big_content'); ?>
                        </div>


                        <!--   <div class="form-group">
                        <?php echo $form->labelEx($model, 'banner'); ?>
                        <?php echo $form->fileField($model, 'banner', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php if ($model->banner != "") { ?>
                                                                          <div style="float:left;margin:5px;position:relative;">
                                <?php $file = Yii::app()->basePath . '/../uploads/static_pages/' . $model->id . '/banner' . '.' . $model->banner; ?>
                                                                                  <a style="position:absolute;top:43%;color:black;" href="<?= Yii::app()->request->baseUrl; ?>/admin.php/static/staticPage/ImageDelete?type=banner&id=<?= $model->id; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                                                                  <img width="125"  height="75"style="border: 2px solid #d2d2d2;" src="<?= Yii::app()->request->baseUrl; ?>/uploads/static_pages/<?= $model->id; ?>/banner.<?= $model->banner; ?>" /></div>
                        <?php } ?>
                        <?php echo $form->error($model, 'banner'); ?>
                          </div>
                             <div class="form-group">
                        <?php //echo $form->labelEx($model, 'small_image'); ?>
                        <?php //echo $form->fileField($model, 'small_image', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php //if ($model->small_image != "") {
                        ?>

                                           <div style="float:left;margin:5px;position:relative;">
                                                   <a style="position:absolute;top:43%;color:black;" href="<?= Yii::app()->request->baseUrl; ?>/admin.php/static/staticPage/imageDelete?type=small&id=<?= $model->id; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                                   <img width="125"  height="75"style="border: 2px solid #d2d2d2;" src="<?= Yii::app()->request->baseUrl; ?>/uploads/static_pages/<?= $model->id; ?>/small.<?= $model->small_image; ?>" /></div>
                        <?php //} ?>
                        <?php //echo $form->error($model, 'small_image'); ?>
                           </div>

                           <div class="form-group">
                        <?php //echo $form->labelEx($model, 'big_image'); ?>
                        <?php //echo $form->fileField($model, 'big_image', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php //if ($model->big_image != "") { ?>
                                           <div style="float:left;margin:5px;position:relative;">
                                                   <a style="position:absolute;top:43%;color:black;" href="<?= Yii::app()->request->baseUrl; ?>/admin.php/static/staticPage/imageDelete?type=big&id=<?= $model->id; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                                   <img width="125"  height="75"style="border: 2px solid #d2d2d2;" src="<?= Yii::app()->request->baseUrl; ?>/uploads/static_pages/<?= $model->id; ?>/big.<?= $model->big_image; ?>" /></div>
                        <?php //} ?>
                        <?php //echo $form->error($model, 'big_image'); ?>
                           </div>

                     <div class="form-group">
                        <?php //echo $form->labelEx($model, 'field_2'); ?>
                        <?php //echo $form->textField($model, 'field_3', array('size' => 60, 'maxlength' => 300, 'class' => 'form-control')); ?>
                        <?php //echo $form->error($model, 'field_2'); ?>
                     </div>-->

                </div>



        </div>
        <div class="form-group btns">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

        <script>
                $(document).ready(function() {

                        $('#StaticPage_has_page').change(function() {
                                if ($(this).val() == 1) {
                                        $('.hasapge').show();
                                } else if ($(this).val() == 0) {
                                        $('.hasapge').hide();
                                }
                        });

                        $('#slug').keyup(function() {
                                $('#StaticPage_canonical_name').val(slug($(this).val()));
                        });


                });

                var slug = function(str) {
                        var $slug = '';
                        var trimmed = $.trim(str);
                        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                                replace(/-+/g, '-').
                                replace(/^-|-$/g, '');
                        return $slug.toLowerCase();
                }
        </script>

</div><!-- form -->