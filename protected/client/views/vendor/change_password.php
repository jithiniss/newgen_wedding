

<section class="mynew">
    <div class="container">
        <div class="row">
            <?php
            $this->renderPartial('_leftSide', array('model' => $model));
            ?>
            <div class="col-md-9 mynewgenz actions">
                <div class="zeros">
                    <h4>Change Password</h4>
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'vendor-change-password-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation' => true,
                    ));
                    ?>

                    <div class="strip" style="padding-top: 22px;">

                        <div class="strip-padding">


                            <?php if(Yii::app()->user->hasFlash('vendor_change_success')): ?>
                                    <div class="alert alert-success">
                                        <?php echo Yii::app()->user->getFlash('vendor_change_success'); ?>
                                    </div>
                            <?php endif; ?>
                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Current Password</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php echo $form->passwordField($model, 'old_password', array('maxlength' => 50, 'class' => 'ui_apps')); ?>
                                        <?php echo $form->error($model, 'old_password'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">New Password</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php echo $form->passwordField($model, 'new_password', array('maxlength' => 50, 'class' => 'ui_apps')); ?>
                                        <?php echo $form->error($model, 'new_password'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Confirm Password</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php echo $form->passwordField($model, 'repeat_password', array('maxlength' => 50, 'class' => 'ui_apps')); ?>
                                        <?php echo $form->error($model, 'repeat_password'); ?>
                                    </div>
                                </div>
                                <?php echo CHtml::submitButton('Change', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'background: #64536f;color: #fff;border-radius:0px;padding: 10px 50px;')); ?>
                            </div> </div> </div>
                    <?php $this->endWidget(); ?>

                </div>



            </div>
        </div>

    </div>
</section>

