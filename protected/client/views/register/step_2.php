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
                    <li class="sim active"><a>Location & Background</a> </li>
                    <li class="sim"><a>Lifestyle & Appearance </a> </li>
                    <li class="sim"><a>Education & Career</a> </li>

                </ul>

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'register-two-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => true,
                ));
                ?>
                <h5>Welcome <?php echo (Yii::app()->session['user']['first_name']); ?>, give us a few details about your background...</h5>
                <div class="col-md-8 col-sm-12 col-xs-12 prime">
                    <div class="zeros">
                        <?php if(Yii::app()->user->hasFlash('register_error2')): ?>
                                <div class="alert alert-danger">
                                    <?php echo Yii::app()->user->getFlash('register_error2'); ?>
                                </div>
                        <?php endif; ?>
                        <!--                        <div class="common">
                                                    <div class="col-sm-4 col-xs-4 zeros">
                                                        <label for="textinput" class="control-label">Choose a Regional site <span class="required">*</span></label>
                                                    </div>
                                                    <div class="col-sm-1 col-xs-1 zeros">
                                                        <label for="textinput" class="control-label">:</label>
                                                    </div>
                                                    <div class="col-sm-7 col-xs-7 zeros">
                                                        <div class="form-group">

                                                            <select class="aps" name="carlist" form="carform">
                                                                <option value="volvo">--Select State--</option>
                                                                <option value="saab">1</option>
                                                                <option value="opel">2</option>
                                                                <option value="audi">3</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>-->

                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Marital Status <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($secondStep, 'marital_status', CHtml::listData(MasterMaritalStatus::model()->findAllByAttributes(array('status' => 1)), 'id', 'marital_status'), array('empty' => 'Select Marital Status', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($secondStep, 'marital_status'); ?>

                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">State Living in <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php
                                    $state_options = array();
                                    if($secondStep->country != '') {
                                            $states = MasterState::model()->findAllByAttributes(array('country_id' => $secondStep->country));
                                            if(!empty($states)) {
                                                    $state_options[""] = "Select State";
                                                    foreach($states as $state) {
                                                            $state_options[$state->id] = $state->state;
                                                    }
                                            } else {
                                                    $state_options[""] = "Select State";
                                                    $state_options[0] = "Other";
                                            }
                                    } else {
                                            $state_options[""] = 'Select State';
                                    }
                                    ?>
                                    <?php echo CHtml::activeDropDownList($secondStep, 'state', $state_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($secondStep, 'state'); ?>

                                </div>
                            </div>

                        </div>

                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">City Living in <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php
                                    $city_options = array();
                                    if($secondStep->state != 0) {
                                            $cities = MasterState::model()->findAllByAttributes(array('country_id' => $secondStep->state));
                                            if(!empty($cities)) {
                                                    $city_options[""] = "Select City";
                                                    foreach($cities as $city) {
                                                            $city_options[$city->id] = $city->city;
                                                    }
                                            } else {
                                                    $city_options[""] = "Select City";
                                                    $city_options[0] = "Other";
                                            }
                                    } else {
                                            $city_options[""] = 'Select City';
                                            $city_options[0] = "Other";
                                    }
                                    ?>
                                    <?php echo CHtml::activeDropDownList($secondStep, 'city', $city_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($secondStep, 'city'); ?>

                                </div>
                            </div>

                        </div>



                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Community <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php
                                    $caste_options = array();
                                    if($secondStep->religion != '') {
                                            $castes = MasterCaste::model()->findAllByAttributes(array('religion_id' => $secondStep->religion));
                                            if(!empty($castes)) {
                                                    $caste_options[""] = "Select Community";
                                                    foreach($castes as $caste) {
                                                            $caste_options[$caste->id] = $caste->caste;
                                                    }
                                            } else {
                                                    $caste_options[""] = "Select Community";
                                                    $caste_options[0] = "Other";
                                            }
                                    } else {
                                            $caste_options[""] = 'Select Community';
                                    }
                                    ?>
                                    <?php echo CHtml::activeDropDownList($secondStep, 'caste', $caste_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($secondStep, 'caste'); ?>

                                </div>
                            </div>

                        </div>

                        <div class="common" id="sub_community">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Sub-Community (Optional)</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php
                                    $subcaste_options = array();
                                    if($secondStep->caste != 0) {
                                            $subcastes = MasterSubCaste::model()->findAllByAttributes(array('caste_id' => $secondStep->caste));
                                            if(!empty($subcastes)) {
                                                    $subcaste_options[""] = "Select Sub-Community";
                                                    foreach($subcastes as $subcaste) {
                                                            $subcaste_options[$subcaste->id] = $subcaste->sub_caste;
                                                    }
                                            } else {
                                                    $subcaste_options[""] = "Select Sub-Community";
                                                    $subcaste_options[0] = "Other";
                                            }
                                    } else {
                                            $subcaste_options[""] = "Select Sub-Community";
                                    }
                                    ?>
                                    <?php echo CHtml::activeDropDownList($secondStep, 'sub_caste', $subcaste_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($secondStep, 'sub_caste'); ?>

                                </div>
                            </div>

                        </div>


                        <!--                        <div class="common">
                                                    <div class="col-sm-4 col-xs-4 zeros">
                                                        <label for="textinput" class="control-label">Gothra / Gothram(Optional)</label>
                                                    </div>
                                                    <div class="col-sm-1 col-xs-1 zeros">
                                                        <label for="textinput" class="control-label">:</label>
                                                    </div>
                                                    <div class="col-sm-7 col-xs-7 zeros">
                                                        <div class="form-group">

                                                            <select class="aps" name="carlist" form="carform">
                                                                <option value="volvo">--Select State--</option>
                                                                <option value="saab">1</option>
                                                                <option value="opel">2</option>
                                                                <option value="audi">3</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>-->

                        <?php //if($secondStep->religion == 1) { ?>

                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Nakshatra(Optional)</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($secondStep, 'nakshatra', CHtml::listData(MasterNakshatra::model()->findAllByAttributes(array('status' => 1)), 'id', 'nakshatra'), array('empty' => 'Select Nakshatra', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($secondStep, 'nakshatra'); ?>

                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-4 col-xs-4 zeros">
                                <label for="textinput" class="control-label">Suddha Jathakam (Optional)</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-7 col-xs-7 zeros">
                                <label class="radio-inline sec">
                                    <input type="radio" name="UserDetails[suddha_jadhagam]" id="UserDetails_suddha_jadhagam" value="1">Yes
                                </label>
                                <label class="radio-inline sec">
                                    <input type="radio" name="UserDetails[suddha_jadhagam]" id="UserDetails_suddha_jadhagam" value="2">No
                                </label>
                                <label class="radio-inline sec">
                                    <input type="radio" name="UserDetails[suddha_jadhagam]" id="UserDetails_suddha_jadhagam" value="3">Don't No
                                </label>
                                <?php echo $form->error($secondStep, 'suddha_jadhagam'); ?>
                            </div>
                        </div>
                        <?php //} ?>
                        <div class="common tops">

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

            /*state change function */
            var baseurl = "<?php print Yii::app()->request->baseUrl . "/index.php/"; ?>";
            var basepath = "<?php print Yii::app()->basePath; ?>";
            $('#UserDetails_state').change(function () {
                var state = $(this).val();
                if (state != '') {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "ajax/selectCity",
                        data: {state: state}
                    }).done(function (data) {
                        $('#UserDetails_city').html(data);
                    });
                } else {
                    $('#UserDetails_city').html("<option value=''>--Select--</option>");
                }
            });

            /* Caste change function*/
            $('#UserDetails_caste').change(function () {
                var caste = $(this).val();
                if (caste != '') {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "ajax/selectSubCaste",
                        data: {caste: caste}
                    }).done(function (data) {
                        if (data != '') {
                            $('#sub_community').show();
                            $('#UserDetails_sub_caste').html(data);
                        } else {
                            $('#sub_community').hide();
                        }
                    });
                } else {
                    $('#sub_community').hide();
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


