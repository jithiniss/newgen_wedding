
<section class="mynew">
        <div class="container">
                <div class="row">
                        <?php
                        $this->renderPartial('_leftSide', array('model' => $model));
                        ?>
                        <div class="col-md-9 mynewgenz actions">
                                <div class="zeros">
                                        <h4>My Profile Details</h4>
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'couple-details-accountsettings-form',
                                            'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // See class documentation of CActiveForm for details on this,
                                            // you need to use the performAjaxValidation()-method described there.
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                                        <div class="strip" style="padding-top: 22px;">
                                                <div class="strip-padding">
                                                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                                <div class="alert alert-success">
                                                                        <?php echo Yii::app()->user->getFlash('success'); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                                <div class="alert alert-danger">
                                                                        <?php echo Yii::app()->user->getFlash('error'); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <div class="common">

                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'couple_name'); ?></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo $form->textField($model, 'couple_name', array('class' => 'ui_apps', 'placeholder' => 'Email Address')); ?>
                                                                                <?php echo $form->error($model, 'couple_name'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="common">

                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'bride_id'); ?></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo $form->textField($model, 'bride_id', array('class' => 'ui_apps', 'placeholder' => 'Email Address', 'readonly' => 'true')); ?>
                                                                                <?php echo $form->error($model, 'bride_id'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="common">

                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'bride_password'); ?></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo $form->textField($model, 'bride_password', array('class' => 'ui_apps', 'placeholder' => 'Email Address')); ?>
                                                                                <?php echo $form->error($model, 'bride_password'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="common">

                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'groom_id'); ?></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo $form->textField($model, 'groom_id', array('class' => 'ui_apps', 'placeholder' => 'Email Address', 'readonly' => 'true')); ?>
                                                                                <?php echo $form->error($model, 'groom_id'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="common">

                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'groom_password'); ?></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo $form->textField($model, 'groom_password', array('class' => 'ui_apps', 'placeholder' => 'Email Address')); ?>
                                                                                <?php echo $form->error($model, 'groom_password'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="common">

                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'couple_password'); ?></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo $form->PasswordField($model, 'couple_password', array('class' => 'ui_apps', 'placeholder' => 'Email Address')); ?>
                                                                                <?php echo $form->error($model, 'couple_password'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="common">

                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'confirm_password'); ?></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo $form->PasswordField($model, 'confirm_password', array('class' => 'ui_apps', 'placeholder' => 'Email Address')); ?>
                                                                                <?php echo $form->error($model, 'confirm_password'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="common">

                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Profile Photo</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo $form->fileField($model, 'photo', array('class' => 'ui_apps', 'placeholder' => 'Email Address')); ?>
                                                                                <?php echo $form->error($model, 'photo'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="col-sm-4 col-xs-4 zeros">
                                                                <button type="submit" class="btn sub-btn btn-default">Submit</button>
                                                        </div>
                                                </div>
                                        </div>

                                        <?php $this->endWidget(); ?>

                                        <!-- form -->
                                </div>
                        </div>
                        </section>
