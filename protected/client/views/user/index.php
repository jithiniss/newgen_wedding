<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>   <label  id="basicinfo"></label>
<section class="profiles">
    <div class="container">
        <div class="row">

            <?php $this->renderPartial('/profile/_leftSide'); ?>
            <div class="col-md-9">
                <h4>Facebook Link</h4>
                <?php if (Yii::app()->user->hasFlash('edit_profile')): ?>
                        <div class="alert alert-success">
                            <?php echo Yii::app()->user->getFlash('edit_profile'); ?>
                        </div>
                <?php endif; ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'facebook-form',
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
                        <h2>Facebook</h2>
                        <div class="strip-padding">

                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Facebook Link</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php echo $form->textField($model, 'facebook_link', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                        <?php echo $form->error($model, 'facebook_link');
                                        ?>                                                                </div>
                                </div>

                            </div>

                            <!--                            <div class="row">
                            <?php echo $form->labelEx($model, 'facebook_link'); ?>
                            <?php echo $form->textField($model, 'facebook_link', array('size' => 60, 'maxlength' => 300, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'facebook_link'); ?>
                                                        </div>-->



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