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
                    <li class="sim"><a>Lifestyle & Appearance </a> </li>
                    <li class="sim active"><a>Education & Career</a> </li>

                </ul>

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'register-fourth-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                ));
                ?>
                <h5>Hi <?php echo (Yii::app()->session['user']['first_name']); ?>, Add your professional details to help us build a good profile...
                </h5>
                <div class="col-md-8 col-sm-12 col-xs-12 prime">
                    <div class="zeros">
                        <?php if(Yii::app()->user->hasFlash('register_error4')): ?>
                                <div class="alert alert-danger">
                                    <?php echo Yii::app()->user->getFlash('register_error4'); ?>
                                </div>
                        <?php endif; ?>
                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Education Level</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($fourthStep, 'education_level', CHtml::listData(MasterEducationLevel::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_level'), array('empty' => 'Select Education Level', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($fourthStep, 'education_level'); ?>

                                </div>
                            </div>

                        </div>

                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Education Field</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">

                                    <?php echo CHtml::activeDropDownList($fourthStep, 'education_field', CHtml::listData(MasterEducationField::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_field'), array('empty' => 'Select Education Field', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($fourthStep, 'education_field'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Working With </label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($fourthStep, 'working_with', CHtml::listData(MasterWorkingWith::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_with'), array('empty' => 'Company Name', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($fourthStep, 'working_with'); ?>

                                </div>
                            </div>

                        </div>

                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Working As</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">

                                    <?php echo CHtml::activeDropDownList($fourthStep, 'working_as', CHtml::listData(MasterWorkingAs::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_as'), array('empty' => 'Job Title', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($fourthStep, 'working_as'); ?>
                                </div>
                            </div>

                        </div>



                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Annual Income</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php
                                    if($fourthStep->annual_income == 0) {
                                            $fourthStep->annual_income = '';
                                    }
                                    ?>
                                    <?php echo $form->textField($fourthStep, 'annual_income', array('class' => 'ui_apps', 'placeholder' => 'Enter Your Annual Income')); ?>
                                    <?php echo $form->error($fourthStep, 'annual_income'); ?>
                                </div>
                            </div>

                        </div>


                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Mobile Number</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php echo $form->textField($fourthStep, 'mobile_number', array('size' => 20, 'maxlength' => 20, 'class' => 'ui_apps', 'placeholder' => 'Enter Your Mobile No')); ?>
                                    <?php echo $form->error($fourthStep, 'mobile_number'); ?>

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




                </form>

            </div>
        </div>
    </div>
</section>




<script>

        $(document).ready(function () {

            $('.infos').slick({
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 4000,
                slidesToScroll: 1,
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


