<style>
    .slick-dots li{
        background-color: transparent;
    }
    .document{
        font-weight: 600;
        padding-left: 205px;
        color: #006666;
    }
</style>   <label  id="basicinfo"></label>
<section class="profiles">
    <div class="container">
        <div class="row">

            <?php $this->renderPartial('/profile/_leftSide'); ?>
            <div class="col-md-9">
                <h4>My Documents</h4>
                <?php if (Yii::app()->user->hasFlash('edit_profile')): ?>
                        <div class="alert alert-success">
                            <?php echo Yii::app()->user->getFlash('edit_profile'); ?>
                        </div>
                <?php endif; ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'documents-form',
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                ));
                ?>

                <div class="zeros">
                    <!--****-->

                    <div class="strip">
                        <h2>Documents</h2>
                        <div class="strip-padding">
                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Document Name</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                        <?php echo $form->error($model, 'name');
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Document File</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php echo $form->filefield($model, 'file', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                        <?php echo $form->error($model, 'file');
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <?php foreach ($details as $detail) { ?>
                                    <?php echo CHtml::link($detail->name, array('/../uploads/user/files/' . $detail->id . '/' . $detail->name . '.' . $detail->file), array('class' => 'document', 'target' => '_blank')); ?>
                                    <a href="<?php echo yii::app()->baseUrl . '/index.php/user/delete/id/' . $detail->id; ?>"><img style="width: 25px;" alt="delete" class="delete_photo" src="/newgen_wedding/images/delete-trash.jpg"></a><br>
                            <?php } ?>
                            <div class="row buttons">
                                <button type="submit" class="btn row-btn btn-default">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</section>