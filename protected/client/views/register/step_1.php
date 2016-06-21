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
                    <li class="sim active"><a href="register-1.php">Primary Info</a></li>
                    <li class="sim"><a href="register-2.php">Location & Background</a> </li>
                    <li class="sim"><a href="register-3.php">Lifestyle & Appearance </a> </li>
                    <li class="sim"><a href="register-4.php">Education & Career</a> </li>
                </ul>


                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'register-one-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                ));
                ?>

                <div class="col-md-8 col-sm-12 col-xs-12 prime">


                    <h1>Register</h1>

                    <div class="zeros">

                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Email <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo $form->textField($firstStep, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($firstStep, 'email'); ?>
                                </div>
                            </div>

                        </div>



                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Password <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo $form->passwordField($firstStep, 'password', array('size' => 50, 'maxlength' => 50, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($firstStep, 'password'); ?>
                                </div>
                            </div>

                        </div>

                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Profile for <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($firstStep, 'profile_for', CHtml::listData(MasterProfileFor::model()->findAllByAttributes(array('status' => 1)), 'id', 'profile_for'), array('empty' => '--Please select--', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>

                                    <?php echo $form->error($firstStep, 'profile_for'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Name <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-4 col-xs-4 zeros">
                                <div class="form-group">
                                    <?php echo $form->textField($firstStep, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($firstStep, 'first_name'); ?>
                                </div>
                            </div>

                            <div class="col-sm-4 col-xs-4 zeros">
                                <div class="form-group">

                                    <?php echo $form->textField($firstStep, 'last_name', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($firstStep, 'last_name'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Gender <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <label class="radio-inline sec">
                                    <input type="radio" name="UserDetails[gender]" id="UserDetails_gender">Male
                                </label>
                                <label class="radio-inline sec">
                                    <input type="radio" name="UserDetails[gender]" id="UserDetails_gender">Female
                                </label>
                                <?php echo $form->error($firstStep, 'gender'); ?>
                            </div>
                        </div>


                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Date of Birth <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-2 col-xs-2 zeros">
                                <div class="form-group">
                                    <?php
                                    $day = array();
                                    for($i = 1; $i <= 31; $i++) {
                                            $day[sprintf("%02d", $i)] = sprintf("%02d", $i);
                                    }
                                    ?>
                                    <?php echo $form->dropDownList($firstStep, 'dob_day', $day, array('empty' => 'Day', 'class' => 'aps')); ?>
                                    <?php echo $form->error($firstStep, 'dob_day'); ?>
                                </div>
                            </div>


                            <div class="col-sm-3 col-xs-3 zeros">
                                <div class="form-group">
                                    <?php $months = array(01 => 'Jan', 02 => 'Feb', 03 => 'Mar', 04 => 'Apr', 05 => 'May', 06 => 'Jun', 07 => 'Jul', 08 => 'Aug', 09 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'); ?>
                                    <?php echo $form->dropDownList($firstStep, 'dob_month', $months, array('empty' => 'Month', 'class' => 'aps')); ?>
                                    <?php echo $form->error($firstStep, 'dob_month'); ?>

                                </div>
                            </div>

                            <div class="col-sm-3 col-xs-3 zeros">
                                <div class="form-group">
                                    <?php
                                    $year = array();
                                    for($i = date("Y", strtotime("-18 year")); $i >= date("Y", strtotime("-69 year")); $i--) {
                                            $year[$i] = $i;
                                    }
                                    ?>
                                    <?php echo $form->dropDownList($firstStep, 'dob_year', $year, array('empty' => 'Year', 'class' => 'aps')); ?>
                                    <?php echo $form->error($firstStep, 'dob_year'); ?>

                                </div>
                            </div>
                        </div>


                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Religion <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($firstStep, 'religion', CHtml::listData(MasterReligion::model()->findAllByAttributes(array('status' => 1)), 'id', 'religion'), array('empty' => 'Select a Religon', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($firstStep, 'religion'); ?>

                                </div>
                            </div>

                        </div>



                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Mother Tongue <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($firstStep, 'mothertongue', CHtml::listData(MasterMotherTongue::model()->findAllByAttributes(array('status' => 1)), 'id', 'mother_tongue'), array('empty' => '--Please select--', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($firstStep, 'mothertongue'); ?>

                                </div>
                            </div>

                        </div>


                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Living In <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($firstStep, 'country', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--Please select--', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($firstStep, 'country'); ?>

                                </div>
                            </div>

                        </div>

                        <div class="common tops">
                            <div class="col-sm-8 col-xs-8 zeros">
                                <input type="checkbox" name="vehicle" value="Car" id="register_agree"> &nbsp; &nbsp; I agree to the <a class="privacy" href="#">Privacy Policy</a> and <a class="privacy" href="#">T&C</a>
                                <div id="agrees"></div>
                            </div>
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
            $('#register-one-form').submit(function () {

                if ($('#register_agree').prop('checked')) {

                    $('#agrees').html('').hide();
                    return true;
                } else {
                    $('#agrees').html('Please agree to the Privacy Policy and T&C.').show();
                    return false;
                }


            });

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

