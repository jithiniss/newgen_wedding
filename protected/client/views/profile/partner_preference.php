<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/jquery.tokenize.js"></script>
<link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/jquery.tokenize.css" />
<style>
    .slick-dots li{
        background-color: transparent;
    }


</style>
<section class="profiles">
    <div class="container">
        <div class="row">

            <?php $this->renderPartial('_leftSide'); ?>
            <div class="col-md-9">
                <h4>Set Your partner Preferences & find the right matches</h4>
                <?php if(Yii::app()->user->hasFlash('partner_fet')): ?>
                        <div class="alert alert-success">
                            <?php echo Yii::app()->user->getFlash('partner_fet'); ?>
                        </div>
                <?php endif; ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'partner-preference-form',
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
                        <h2>Basic Info</h2>
                        <div class="strip-padding">



                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Age</label>
                                </div>

                                <div class="col-sm-2 col-xs-2 zeros">
                                    <div class="form-group">
                                        <?php
                                        $age_from = array();
                                        for($i = 18; $i <= 50; $i++) {
                                                $age_from[sprintf("%02d", $i)] = sprintf("%02d", $i);
                                        }
                                        ?>
                                        <?php echo $form->dropDownList($partnerDetails, 'age_from', $age_from, array('empty' => 'Age From', 'class' => 'ages')); ?>
                                        <?php echo $form->error($partnerDetails, 'age_from'); ?>

                                    </div>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">To</label>
                                </div>
                                <div class="col-sm-2 col-xs-2 zeros">
                                    <div class="form-group">

                                        <?php
                                        $age_to = array();
                                        for($i = 18; $i <= 50; $i++) {
                                                $age_to[sprintf("%02d", $i)] = sprintf("%02d", $i);
                                        }
                                        ?>
                                        <?php echo $form->dropDownList($partnerDetails, 'age_to', $age_to, array('empty' => 'Age To', 'class' => 'ages')); ?>
                                        <?php echo $form->error($partnerDetails, 'age_to'); ?>
                                    </div>
                                </div>
                            </div>



                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Height</label>
                                </div>

                                <div class="col-sm-3 col-xs-3 zeros">
                                    <div class="form-group">
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'height_from', CHtml::listData(MasterHeight::model()->findAllByAttributes(array('status' => 1)), 'id', 'height'), array('empty' => 'Height From', 'class' => 'height', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                        <?php echo $form->error($partnerDetails, 'height_from'); ?>

                                    </div>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">To</label>
                                </div>
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <div class="form-group">

                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'height_to', CHtml::listData(MasterHeight::model()->findAllByAttributes(array('status' => 1)), 'id', 'height'), array('empty' => 'Height To', 'class' => 'height', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                        <?php echo $form->error($partnerDetails, 'height_to'); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Martial Status</label>
                                </div>

                                <div class="col-sm-8 col-xs-9 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!is_array($partnerDetails->marital_status)) {

                                                $marital_status = explode(',', $partnerDetails->marital_status);
                                        } else {
                                                $marital_status = $partnerDetails->marital_status;
                                        }
                                        $marital_status_opt = array();
                                        foreach($marital_status as $value) {
                                                $marital_status_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'marital_status', CHtml::listData(MasterMaritalStatus::model()->findAllByAttributes(array('status' => 1)), 'id', 'marital_status'), array('empty' => 'Select Marital Status', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $marital_status_opt)); ?>
                                        <?php echo $form->error($partnerDetails, 'marital_status'); ?>

                                    </div>
                                </div>

                            </div>




                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Religion</label>
                                </div>

                                <div class="col-sm-8 col-xs-9 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!is_array($partnerDetails->religion)) {

                                                $religion = explode(',', $partnerDetails->religion);
                                        } else {
                                                $religion = $partnerDetails->religion;
                                        }
                                        $religion_opt = array();
                                        foreach($religion as $value) {
                                                $religion_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'religion', CHtml::listData(MasterReligion::model()->findAllByAttributes(array('status' => 1)), 'id', 'religion'), array('empty' => 'Select a Religon', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $religion_opt)); ?>
                                        <?php echo $form->error($partnerDetails, 'religion'); ?>
                                    </div></div>
                            </div>


                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Mother Tongue</label>
                                </div>

                                <div class="col-sm-8 col-xs-9 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!is_array($partnerDetails->mothertongue)) {

                                                $mothertongue = explode(',', $partnerDetails->mothertongue);
                                        } else {
                                                $mothertongue = $partnerDetails->mothertongue;
                                        }
                                        $mothertongue_opt = array();
                                        foreach($mothertongue as $value) {
                                                $mothertongue_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'mothertongue', CHtml::listData(MasterMotherTongue::model()->findAllByAttributes(array('status' => 1)), 'id', 'mother_tongue'), array('empty' => 'Select Mother Tongue', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $mothertongue_opt)); ?>
                                        <?php echo $form->error($partnerDetails, 'mothertongue'); ?>
                                    </div>
                                </div>

                            </div>


                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Community</label>
                                </div>

                                <div class="col-sm-8 col-xs-9 zeros">
                                    <div class="form-group">

                                        <?php
                                        $caste_options = array();

                                        if($partnerDetails->religion != '') {
                                                $castes = MasterCaste::model()->findAllByAttributes(array('religion_id' => $partnerDetails->religion));
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
                                        <?php
                                        if(!is_array($partnerDetails->caste)) {

                                                $caste = explode(',', $partnerDetails->caste);
                                        } else {
                                                $caste = $partnerDetails->caste;
                                        }
                                        $caste_opt = array();
                                        foreach($caste as $value) {
                                                $caste_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'caste', $caste_options, array('class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $caste_opt)); ?>
                                        <?php echo $form->error($partnerDetails, 'caste'); ?>
                                    </div>
                                </div>

                            </div>


                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Profile Created By</label>
                                </div>

                                <div class="col-sm-8 col-xs-9 zeros">
                                    <div class="form-group">
                                        <ul class="list-unstyled list-inline">
                                            <ul class="list-unstyled list-inline">
                                                <?php
                                                if(!is_array($partnerDetails->profile_created_by)) {

                                                        $options = explode(',', $partnerDetails->profile_created_by);
                                                } else {
                                                        $options = $partnerDetails->profile_created_by;
                                                }
                                                ?>
                                                <?php
                                                $partnerDetails->profile_created_by = $options;
                                                echo CHtml::activeCheckboxList($partnerDetails, 'profile_created_by', CHtml::listData(MasterProfileFor::model()->findAll(array('condition' => 'status=1')), 'id', 'profile_for'), array('template' => '<li style="padding-bottom:0px;padding-left:0px">{input}{label}</li>', 'separator' => '',
                                                    'labelOptions' => array(
                                                        'style' => 'padding-left:13px;width: 60px;float: left;'),
                                                    'style' => 'float:left;'
                                                ));
                                                ?>

                                                <?php echo $form->error($partnerDetails, 'profile_created_by'); ?>



                                            </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!--****-->
                    <div class="clearfix"></div>

                    <div class="strip">
                        <h2>Location & Grew Up In </h2>
                        <div class="strip-padding">

                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Country Living In</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!is_array($partnerDetails->country_living_in)) {

                                                $country_living_in = explode(',', $partnerDetails->country_living_in);
                                        } else {
                                                $country_living_in = $partnerDetails->country_living_in;
                                        }
                                        $country_living_in_opt = array();
                                        foreach($country_living_in as $value) {
                                                $country_living_in_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'country_living_in', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => 'Select Country', 'class' => 'aps tokenize-sample country_chan', 'multiple' => "multiple", 'options' => $country_living_in_opt)); ?>
                                        <?php echo $form->error($partnerDetails, 'country_living_in'); ?>
                                    </div>
                                </div>

                            </div>




                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">State Living In</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!is_array($partnerDetails->residency_status)) {

                                                $residency_status = explode(',', $partnerDetails->residency_status);
                                        } else {
                                                $residency_status = $partnerDetails->residency_status;
                                        }
                                        $residency_status_opt = array();
                                        foreach($residency_status as $value) {
                                                $residency_status_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php
                                        $state_options = array();
                                        if($partnerDetails->country_living_in != '') {
                                                $states = MasterState::model()->findAllByAttributes(array('country_id' => $partnerDetails->country_living_in));
                                                if(!empty($states)) {
                                                        $state_options[""] = "Select State Living In";
                                                        foreach($states as $state) {
                                                                $state_options[$state->id] = $state->state;
                                                        }
                                                } else {
                                                        $state_options[""] = "Select State Living In";
                                                        $state_options[0] = "Other";
                                                }
                                        } else {
                                                $state_options[""] = "Select State Living In";
                                        }
                                        ?>

                                        <?php
                                        echo CHtml::activeDropDownList($partnerDetails, 'residency_status', $state_options, array('class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $residency_status_opt));
                                        ?>
                                        <?php echo $form->error($partnerDetails, 'residency_status'); ?>
                                    </div>
                                </div>

                            </div>



                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Country Grew up in</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!is_array($partnerDetails->country_grew_up)) {

                                                $country_grew_up = explode(',', $partnerDetails->country_grew_up);
                                        } else {
                                                $country_grew_up = $partnerDetails->country_grew_up;
                                        }
                                        $country_grew_up_opt = array();
                                        foreach($country_grew_up as $value) {
                                                $country_grew_up_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'country_grew_up', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => 'Select Country', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $country_grew_up_opt)); ?>
                                        <?php echo $form->error($partnerDetails, 'country_grew_up'); ?>
                                    </div>
                                </div>

                            </div>





                        </div>

                    </div>

                    <!--****-->


                    <div class="strip">
                        <h2>Education & Profession Details</h2>
                        <div class="strip-padding">

                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Education</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!is_array($partnerDetails->education)) {

                                                $education = explode(',', $partnerDetails->education);
                                        } else {
                                                $education = $partnerDetails->education;
                                        }
                                        $education_opt = array();
                                        foreach($education as $value) {
                                                $education_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'education', CHtml::listData(MasterEducationField::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_field'), array('empty' => 'Select Education', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $education_opt)); ?>
                                        <?php echo $form->error($partnerDetails, 'education'); ?>
                                    </div>
                                </div>

                            </div>



                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Working With</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!is_array($partnerDetails->working_with)) {

                                                $working_with = explode(',', $partnerDetails->working_with);
                                        } else {
                                                $working_with = $partnerDetails->working_with;
                                        }
                                        $working_with_opt = array();
                                        foreach($working_with as $value) {
                                                $working_with_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'working_with', CHtml::listData(MasterWorkingWith::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_with'), array('empty' => 'Select Working With', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $working_with_opt)); ?>
                                        <?php echo $form->error($partnerDetails, 'working_with'); ?>
                                    </div>
                                </div>

                            </div>











                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Profession Area</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!is_array($partnerDetails->profession_area)) {

                                                $profession_area = explode(',', $partnerDetails->profession_area);
                                        } else {
                                                $profession_area = $partnerDetails->profession_area;
                                        }
                                        $profession_area_opt = array();
                                        foreach($profession_area as $value) {
                                                $profession_area_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'profession_area', CHtml::listData(MasterWorkingAs::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_as'), array('empty' => 'Select Professional Area', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $profession_area_opt)); ?>
                                        <?php echo $form->error($partnerDetails, 'profession_area'); ?>
                                    </div>
                                </div>

                            </div>


                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Annual Income</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!is_array($partnerDetails->annual_income_from)) {

                                                $annual_income_from = explode(',', $partnerDetails->annual_income_from);
                                        } else {
                                                $annual_income_from = $partnerDetails->annual_income_from;
                                        }
                                        $annual_income_from_opt = array();
                                        foreach($annual_income_from as $value) {
                                                $annual_income_from_opt[$value] = array('selected' => 'selected');
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($partnerDetails, 'annual_income_from', CHtml::listData(MasterAnnualIncome::model()->findAllByAttributes(array('status' => 1)), 'id', 'income_from'), array('empty' => 'Select Annual Income', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $annual_income_from_opt)); ?>
                                        <?php echo $form->error($partnerDetails, 'annual_income_from'); ?>

                                    </div>


                                </div>
                            </div>







                        </div>

                    </div>






                    <div class="strip">
                        <h2>Lifestyle & Appearance</h2>
                        <div class="strip-padding">



                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Diet</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <ul class="list-unstyled list-inline">
                                            <?php
                                            if(!is_array($partnerDetails->diet)) {

                                                    $options1 = explode(',', $partnerDetails->diet);
                                            } else {
                                                    $options1 = $partnerDetails->diet;
                                            }
                                            ?>
                                            <?php
                                            $partnerDetails->diet = $options1;
                                            echo CHtml::activeCheckboxList($partnerDetails, 'diet', CHtml::listData(MasterDiet::model()->findAll(array('condition' => 'status=1')), 'id', 'diet'), array('template' => '<li style="padding-bottom:0px;padding-left:0px">{input}{label}</li>', 'separator' => '',
                                                'labelOptions' => array(
                                                    'style' => 'padding-left:13px;width: 70px;float: left;'),
                                                'style' => 'float:left;'
                                            ));
                                            ?>

                                            <?php echo $form->error($partnerDetails, 'diet'); ?>



                                        </ul>
                                    </div>
                                </div>

                            </div>



                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Drink</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <?php
                                    $drink = array('1' => 'No', '2' => 'Yes', '3' => 'Occasionally', '4' => 'Doesnt Matter');

                                    foreach($drink as $drinkkey => $drinkvalue) {

                                            if($partnerDetails->drink == $drinkkey) {
                                                    $checked = 'checked';
                                            } else {
                                                    $checked = '';
                                            }
                                            ?>

                                            <label class="radio-inline seekz">
                                                <input type="radio" name="PartnerDetails[drink]" id="PartnerDetails_drink<?= $dr ?>" value="<?= $drinkkey; ?>" <?= $checked ?>><?= $drinkvalue; ?>
                                            </label>
                                            <?php
                                            $dr++;
                                    }
                                    ?>

                                    <?php echo $form->error($partnerDetails, 'drink'); ?>

                                </div>
                            </div>




                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Smoke</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <?php
                                    $sm = 1;
                                    $smoke = array('1' => 'No', '2' => 'Yes', '3' => 'Occasionally', '4' => 'Doesnt Matter');
                                    foreach($smoke as $smokekey => $smokevalue) {

                                            if($partnerDetails->smoke == $smokekey) {
                                                    $checked = 'checked';
                                            } else {
                                                    $checked = '';
                                            }
                                            ?>

                                            <label class="radio-inline seekz">
                                                <input type="radio" name="PartnerDetails[smoke]" id="PartnerDetails_smoke<?= $sm ?>" value="<?= $smokekey; ?>" <?= $checked ?>><?= $smokevalue; ?>
                                            </label>
                                            <?php
                                            $sm++;
                                    }
                                    ?>

                                    <?php echo $form->error($partnerDetails, 'smoke'); ?>


                                </div>
                            </div>



                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Body Type</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <ul class="list-unstyled list-inline">
                                            <?php
                                            if(!is_array($partnerDetails->body_type)) {

                                                    $options2 = explode(',', $partnerDetails->body_type);
                                            } else {
                                                    $options2 = $partnerDetails->body_type;
                                            }
                                            ?>
                                            <?php
                                            $partnerDetails->body_type = $options2;
                                            echo CHtml::activeCheckboxList($partnerDetails, 'body_type', CHtml::listData(MasterBodyType::model()->findAll(array('condition' => 'status=1')), 'id', 'body_type'), array('template' => '<li style="padding-bottom:0px;padding-left:0px">{input}{label}</li>', 'separator' => '',
                                                'labelOptions' => array(
                                                    'style' => 'padding-left:13px;width: 70px;float: left;'),
                                                'style' => 'float:left;',
                                            ));
                                            ?>



                                        </ul>
                                    </div>
                                </div>

                            </div>




                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Skin Tone</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <ul class="list-unstyled list-inline">
                                            <?php
                                            if(!is_array($partnerDetails->skin_tone)) {

                                                    $options3 = explode(',', $partnerDetails->skin_tone);
                                            } else {
                                                    $options3 = $partnerDetails->skin_tone;
                                            }
                                            ?>
                                            <?php
                                            $partnerDetails->skin_tone = $options3;
                                            echo CHtml::activeCheckboxList($partnerDetails, 'skin_tone', CHtml::listData(MasterSkinTone::model()->findAll(array('condition' => 'status=1')), 'id', 'skin_tone'), array('template' => '<li style="padding-bottom:0px;padding-left:0px">{input}{label}</li>', 'separator' => '',
                                                'labelOptions' => array(
                                                    'style' => 'padding-left:13px;min-width: 70px;float: left;'),
                                                'style' => 'float:left;',
                                            ));
                                            ?>



                                        </ul>
                                    </div>
                                </div>

                            </div>



                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Disability</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <?php
                                    $d = 1;
                                    $disability = array('2' => 'Doesnt Matter', '1' => 'Dont include profiles with disability');
                                    foreach($disability as $key => $value) {

                                            if($partnerDetails->disability == $key) {
                                                    $checked = 'checked';
                                            } else {
                                                    $checked = '';
                                            }
                                            ?>

                                            <label class="radio-inline seekz">
                                                <input type="radio" name="PartnerDetails[disability]" id="PartnerDetails_disablity<?= $d ?>" value="<?= $key; ?>" <?= $checked ?>><?= $value; ?>
                                            </label>
                                            <?php
                                            $d++;
                                    }
                                    ?>


                                </div>
                            </div>

                            <div class="common">

                                <div class="form-group">
                                    <button type="submit" class="btn row-btn btn-default">Save & Continue</button>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>

    </div>
</section>
<script type="text/javascript">
        $('#PartnerDetails_marital_status').tokenize({displayDropdownOnFocus: true});
        $('#PartnerDetails_religion').tokenize({displayDropdownOnFocus: true,
            onAddToken: function (value, text, e) {
                if ($.isFunction(AddCaste)) { // check if func exists
                    AddCaste(value, text, e); // if true execute it
                }
            },
            onRemoveToken: function (value, text, e) {
                if ($.isFunction(RemoveCaste)) { // check if func exists
                    RemoveCaste(); // if true execute it
                }
            }
        });
        $('#PartnerDetails_mothertongue').tokenize({displayDropdownOnFocus: true});
        $('#PartnerDetails_caste').tokenize({displayDropdownOnFocus: true});
        $('#PartnerDetails_country_living_in').tokenize({displayDropdownOnFocus: true,
            onAddToken: function (value, text, e) {
                if ($.isFunction(AddStateLiving)) { // check if func exists
                    AddStateLiving(value, text, e); // if true execute it
                }
            },
            onRemoveToken: function (value, text, e) {
                if ($.isFunction(RemoveStateLiving)) { // check if func exists
                    RemoveStateLiving(); // if true execute it
                }
            }
        });
        $('#PartnerDetails_residency_status').tokenize({displayDropdownOnFocus: true});
        $('#PartnerDetails_country_grew_up').tokenize({displayDropdownOnFocus: true});
        $('#PartnerDetails_education').tokenize({displayDropdownOnFocus: true});
        $('#PartnerDetails_working_with').tokenize({displayDropdownOnFocus: true});
        $('#PartnerDetails_profession_area').tokenize({displayDropdownOnFocus: true});
        $('#PartnerDetails_annual_income_from').tokenize({displayDropdownOnFocus: true});

        function AddStateLiving(country, t, r) {

            if (country != '') {
                $.ajax({
                    type: "POST",
                    url: baseurl + "ajax/selectState",
                    data: {country: country}
                }).done(function (data) {
                    $('#PartnerDetails_residency_status').prepend(data);
                });
            }

        }
        function RemoveStateLiving() {


            var living_country = new Array();
            $('#PartnerDetails_country_living_in  option:selected').each(function () {
                living_country.push(this.value);
            });

            if (living_country != '') {
                $.ajax({
                    type: "POST",
                    url: baseurl + "ajax/selectPartnerState",
                    data: {living_country: living_country}
                }).done(function (data) {
                    $('#PartnerDetails_residency_status').html(data);
                    // $('#PartnerDetails_residency_status').empty(data);

                });
            }

        }

        /* Religion change function*/

        function AddCaste(religion, t, r) {

            if (religion != '') {
                $.ajax({
                    type: "POST",
                    url: baseurl + "ajax/selectCaste",
                    data: {religion: religion}
                }).done(function (data) {
                    $('#PartnerDetails_caste').prepend(data);
                });
            }

        }
        function RemoveCaste() {


            var caste = new Array();
            $('#PartnerDetails_religion  option:selected').each(function () {
                caste.push(this.value);
            });

            if (caste != '') {
                $.ajax({
                    type: "POST",
                    url: baseurl + "ajax/selectPartnerCaste",
                    data: {caste: caste}
                }).done(function (data) {
                    $('#PartnerDetails_caste').html(data);

                });
            }

        }

</script>
