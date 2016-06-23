<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>
<section class="login">
    <div class="container wishes">
        <div class="row">
            <div class="col-md-12 ">

                <ul id="myTabf" class="nav nav-tabs ppl nav-justified ">
                    <li class="sim "><a>Primary Info</a></li>
                    <li class="sim"><a>Location & Background</a> </li>
                    <li class="sim active"><a>Lifestyle & Appearance </a> </li>
                    <li class="sim"><a>Education & Career</a> </li>

                </ul>

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'register-three-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => true,
                ));
                ?>

                <h5>Hi <?php echo (Yii::app()->session['user']['first_name']); ?>, Your lifestyle details will help us find the best matches for you...
                </h5>
                <div class="col-md-8 col-sm-12 col-xs-12 prime">
                    <div class="zeros">
                        <?php if(Yii::app()->user->hasFlash('register_error3')): ?>
                                <div class="alert alert-danger">
                                    <?php echo Yii::app()->user->getFlash('register_error3'); ?>
                                </div>
                        <?php endif; ?>
                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Height <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($thirdStep, 'height', CHtml::listData(MasterHeight::model()->findAllByAttributes(array('status' => 1)), 'id', 'height'), array('empty' => 'Select Your Height', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($thirdStep, 'height'); ?>

                                </div>
                            </div>

                        </div>

                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Skin Tone </label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($thirdStep, 'skin_tone', CHtml::listData(MasterSkinTone::model()->findAllByAttributes(array('status' => 1)), 'id', 'skin_tone'), array('empty' => 'Select Your Skin Tone', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($thirdStep, 'skin_tone'); ?>

                                </div>
                            </div>

                        </div>


                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Body Type </label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">

                                    <?php echo CHtml::activeDropDownList($thirdStep, 'body_type', CHtml::listData(MasterBodyType::model()->findAllByAttributes(array('status' => 1)), 'id', 'body_type'), array('empty' => 'Select Your Body Type', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($thirdStep, 'body_type'); ?>
                                </div>
                            </div>

                        </div>



                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Smoke <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">

                                    <?php echo $form->dropDownList($thirdStep, 'smoke', array('1' => 'No', '2' => 'Yes', '3' => 'Occasionally'), array('class' => 'aps', 'empty' => 'Do you Smoke?')); ?>
                                    <?php echo $form->error($thirdStep, 'smoke'); ?>
                                </div>
                            </div>

                        </div>


                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Drink <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php echo $form->dropDownList($thirdStep, 'drink', array('1' => 'No', '2' => 'Yes', '3' => 'Occasionally'), array('class' => 'aps', 'empty' => 'Do you Drink?')); ?>
                                    <?php echo $form->error($thirdStep, 'drink'); ?>

                                </div>
                            </div>

                        </div>

                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Diet </label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">

                                    <?php echo CHtml::activeDropDownList($thirdStep, 'diet', CHtml::listData(MasterDiet::model()->findAllByAttributes(array('status' => 1)), 'id', 'diet'), array('empty' => 'Select Your Diet', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($thirdStep, 'diet'); ?>
                                </div>
                            </div>

                        </div>

                        <div class="common tops">
                            <!--                                        <div class="col-sm-8 zeros">
                                                                        <input type="checkbox" name="vehicle" value="Car"> &nbsp; &nbsp; I agree to the Privacy Policy and T&C
                                                                    </div>-->
                            <div class="col-sm-4 col-xs-4 zeros">

                                <button type="submit" class="btn sub-btn btn-default">Submit</button>
                            </div>
                        </div>


                    </div>


                </div>
                <?php $this->endWidget(); ?>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="infos">
                        <div class="item">
                            <div class="main">
                                <img class="sliders" src="<?= Yii::app()->baseUrl ?>/images/t1.jpg">
                            </div>
                        </div>
                        <div class="item">
                            <div class="main">
                                <img class="sliders" src="<?= Yii::app()->baseUrl ?>/images/t2.jpg">
                            </div>
                        </div>
                        <div class="item">
                            <div class="main">
                                <img class="sliders" src="<?= Yii::app()->baseUrl ?>/images/t3.jpg">
                            </div>
                        </div>
                        <div class="item">
                            <div class="main">
                                <img class="sliders" src="<?= Yii::app()->baseUrl ?>/images/t2.jpg">
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>
</section>




<script>

        $(document).ready(function () {

            $('.infos').slick({
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 4000, slidesToScroll: 1,
                pauseOnHover: false,
                fade: false,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1000,
                        settings: {
                            centerMode: false,
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            centerMode: false,
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            centerMode: false,
                            slidesToShow: 1
                        }
                    }
                ]
            });

        });

</script>


