<?php
/* @var $this TellUsStoryController */
/* @var $model TellUsStory */
/* @var $form CActiveForm */
?>
<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>
<section class="storyz">
    <div class="container wishes">
        <div class="row">
            <ul id="myTabs" class="nav nav-tabs nav-justified adv">
                <li class="sky"><a  href="<?php echo yii::app()->baseUrl . '/index.php/featuredstory' ?>">Featured success stories</a></li>
                <li class="sky active"><a  href="#">Tell us your story</a></li>
            </ul>
            <div class="tab-content">
                <div class="col-md-12 col-sm-12 col-xs-12 thank mains2">

                    <h1>Dear <?php echo ucfirst($account->first_name) . ' ' . ucfirst($account->last_name) ?>, </h1>
                    <?php if (!empty($story)) { ?>
                            <h2>Thank you for sharing your Story with us!</h2>
                    <?php } ?>
                    <?php if (empty($story)) { ?>
                            <div class="tellus">

                                <h3>Give us details of you and your partner</h3>
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'tell-us-story-tell_us_story-form',
                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // See class documentation of CActiveForm for details on this,
                                    // you need to use the performAjaxValidation()-method described there.
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <div class="zeros">
                                    <div class="common">
                                        <div class="col-sm-6 col-xs-6 zeros">
                                            <div class="form-group">
                                                <?php echo $form->textField($model, 'name', array('class' => 'ui_apps', 'placeholder' => 'Your Name ')); ?>
                                                <?php echo $form->error($model, 'name'); ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6 zeros">
                                            <div class="form-group">
                                                <?php echo $form->textField($model, 'partner_name', array('class' => 'ui_apps', 'placeholder' => 'Your partners name ')); ?>
                                                <?php echo $form->error($model, 'partner_name'); ?>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="common">
                                        <div class="col-sm-6 col-xs-6 zeros">
                                            <div class="form-group">
                                                <?php echo $form->textField($model, 'email', array('class' => 'ui_apps', 'placeholder' => 'Your Email ID ')); ?>
                                                <?php echo $form->error($model, 'email'); ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6 zeros">
                                            <div class="form-group">
                                                <?php echo $form->textField($model, 'partner_email', array('class' => 'ui_apps', 'placeholder' => 'Your Partner Email ID ')); ?>
                                                <?php echo $form->error($model, 'partner_email'); ?>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="common">
                                        <div class="col-sm-6 col-xs-6 zeros">
                                            <div class="form-group">
                                                <span class="in"> <input class="formc" type="checkbox" name="vehicle" value="Bike"> Do you want to disclose</span>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6 zeros">
                                            <div class="form-group">
                                                <span class="in"> <input class="formc" type="checkbox" name="vehicle" value="Bike"> Not yet fixed</span>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="common">
                                        <div class="col-sm-12 col-xs-12 zeros">
                                            <div class="form-group">
                                                <?php echo $form->textArea($model, 'feedback', array('class' => 'form-control', 'rows' => '5', 'placeholder' => 'Tell us how you met each other on newgen.com ')); ?>
                                                <?php echo $form->error($model, 'feedback'); ?>
                                                <!--<textarea class="form-control" rows="5" id="comments" placeholder="Tell us how you met each other on newgen.com"></textarea>-->
                                            </div>

                                        </div>
                                    </div>
                                    <div class="common">
                                        <div class="col-sm-6 col-xs-6 zeros">
                                            <div class="form-group">
                                                <?php echo $form->labelEx($model, 'date'); ?>
                                                <?php
                                                $from = date('Y') - 2;
                                                $to = date('Y') + 2;
                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                    'model' => $model,
                                                    'attribute' => 'wedding_date',
                                                    'options' => array(
                                                        'dateFormat' => 'yy-mm-dd',
                                                        'changeYear' => true, // can change year
                                                        'changeMonth' => true, // can change month
                                                        'yearRange' => $from . ':' . $to, // range of year
                                                        'showButtonPanel' => true, // show button panel
                                                    ),
                                                    'htmlOptions' => array(
                                                        'size' => '10', // textField size
                                                        'maxlength' => '10', // textField maxlength
                                                        'class' => 'form-control',
                                                        'readonly' => 'readonly',
                                                        'placeholder' => 'Your Wedding Date'
                                                    ),
                                                ));
                                                ?>
                                                <?php echo $form->error($model, 'wedding_date'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="common">
                                        <div class="col-sm-6 col-xs-3 zeros">
                                            <label for="textinput" class="control-label">Your Couple or Wedding Photos</label>
                                            <br/>(Size sholud be equal to 246 x 172)
                                        </div>

                                        <div class="col-sm-6 col-xs-9 zeros">
                                            <div class="pinky">
                                                <?php echo $form->fileField($model, 'image'); ?>
                                                <?php echo $form->error($model, 'image'); ?>
                                                <!--<input type="file" name="pic" accept="image">-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="common tops">
                                        <div class="col-sm-3 col-xs-3 zeros pull-right">
                                            <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => 'btn sub-ment btn-default')); ?>
                                            <!--<button type="submit" class="btn sub-ment btn-default">Submit</button>-->
                                        </div>
                                    </div>

                                </div>
                                <?php
                                $this->endWidget();
                                ?>
                            </div>
                            <?php
                    } else {
                            if ($story->admin_approval == "0") {
                                    ?>
                                    <div class="thank mains2">
                                        <h2 style="color: red"> Waiting For Admin Approval...</h2>
                                    </div>
                            <?php } else { ?>
                                    <div class="thank mains2">
                                        <h2 style="color: red"> Allready Submitted...</h2>
                                    </div>
                            <?php } ?>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- form -->
<script>
        $(document).ready(function () {

            /*----------------------- Case Study Enlarging Starts ------------------------*/

            $("body").on('click', 'section.case-wrp .case-study-margin a', function (e) {
                e.preventDefault();
                var ids = $(this).attr('id');
                $('.case-wrp').find('a:not(#' + ids + ')').find('.case-box-main.case-detail-large').removeClass('case-detail-large');
                $(this).find('.case-box-main').toggleClass('case-detail-large');
                $(this).parent().toggleClass('assdds');
            });
        });

        /*----------------------- Case Study Enlarging Ends ------------------------*/
</script>