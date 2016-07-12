<style>
        .slick-dots li{
                background-color: transparent;
        }
</style>
<section class="advance">
        <div class="container wishes">
                <div class="row">
                        <ul id="myTabs" class="nav nav-tabs nav-justified adv">
                                <li class="sims "><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search">Basic Search</a></li>
                                <li class="sims active"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search/advanced">Advanced Search</a> </li>



                        </ul>
                        <div class="col-md-8 col-sm-12 col-xs-12 outs mains2">


                                <div class="form">

                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'saved-search-form',
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // There is a call to performAjaxValidation() commented in generated controller code.
                                            // See class documentation of CActiveForm for details on this.
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                                        <div class="zeros">
                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Looking For</label>
                                                        </div>
                                                        <?php if (isset(Yii::app()->session['user'])) { ?>
                                                                <div class="col-sm-8 col-xs-9 zeros">
                                                                        <?php if (Yii::app()->session['user']['gender'] == 1) { ?>
                                                                                <label class="radio-inline sec">
                                                                                        <input  readonly=""  checked="checked" type="radio" name="SavedSearch[gender]" value="2">Bride
                                                                                </label>
                                                                                <label class="radio-inline sec">
                                                                                        <input disabled='disabled'type="radio" name="SavedSearch[gender]" value="1">Groom
                                                                                </label>
                                                                        <?php } else if (Yii::app()->session['user']['gender'] == 2) { ?>
                                                                                <label class="radio-inline sec">
                                                                                        <input disabled='disabled'  type="radio" name="SavedSearch[gender]" value="2">Bride
                                                                                </label>
                                                                                <label class="radio-inline sec">
                                                                                        <input  readonly=""   checked="checked" type="radio" name="SavedSearch[gender]" value="1">Groom
                                                                                </label>
                                                                        <?php } ?>

                                                                </div>
                                                        <?php } else { ?>
                                                                <div class="col-sm-8 col-xs-9 zeros">
                                                                        <label class="radio-inline sec">
                                                                                <input checked="checked"  type="radio" name="SavedSearch[gender]" value="2">Bride
                                                                        </label>
                                                                        <label class="radio-inline sec">
                                                                                <input type="radio" name="SavedSearch[gender]" value="1">Groom
                                                                        </label>
                                                                </div>
                                                        <?php } ?>
                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Age</label>
                                                        </div>

                                                        <div class="col-sm-2 col-xs-2 zeros">
                                                                <div class="form-group">
                                                                        <?php
                                                                        $age_from = array();
                                                                        for ($i = 18; $i <= 50; $i++) {
                                                                                $age_from[sprintf("%02d", $i)] = sprintf("%02d", $i);
                                                                        }
                                                                        ?>
                                                                        <?php echo $form->dropDownList($model, 'age_from', $age_from, array('empty' => 'Age From', 'class' => 'ages', 'required' => true, 'options' => array(18 => array('selected' => 'selected')))); ?>
                                                                        <?php echo $form->error($model, 'age_from'); ?>
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">To</label>
                                                        </div>
                                                        <div class="col-sm-2 col-xs-2 zeros">
                                                                <div class="form-group">
                                                                        <?php
                                                                        $age_to = array();
                                                                        for ($i = 18; $i <= 50; $i++) {
                                                                                $age_to[sprintf("%02d", $i)] = sprintf("%02d", $i);
                                                                        }
                                                                        ?>
                                                                        <?php echo $form->dropDownList($model, 'age_to', $age_to, array('empty' => 'Age To', 'class' => 'ages', 'required' => true, 'options' => array(25 => array('selected' => 'selected')))); ?>
                                                                        <?php echo $form->error($model, 'age_to'); ?>


                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Height</label>
                                                        </div>

                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <div class="form-group">

                                                                        <?php echo CHtml::activeDropDownList($model, 'height_from', CHtml::listData(MasterHeight::model()->findAllByAttributes(array('status' => 1)), 'id', 'height'), array('empty' => 'Height From', 'class' => 'height', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                        <?php echo $form->error($model, 'height_from'); ?>
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">To</label>
                                                        </div>
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <div class="form-group">

                                                                        <?php echo CHtml::activeDropDownList($model, 'height_to', CHtml::listData(MasterHeight::model()->findAllByAttributes(array('status' => 1)), 'id', 'height'), array('empty' => 'Height To', 'class' => 'height', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                        <?php echo $form->error($model, 'height_to'); ?>
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
                                                                        $doesnt_matter = array(
                                                                            '-1' => Yii::t('fim', 'Doesnt Matter'),
                                                                        );
                                                                        if (!empty($model->marital_status)) {

                                                                                $marital_status = explode(',', $model->marital_status);
                                                                        }

                                                                        $marital_status_opt = array();
                                                                        if (!empty($marital_status)) {
                                                                                foreach ($marital_status as $value) {
                                                                                        $marital_status_opt[$value] = array('selected' => 'selected');
                                                                                }
                                                                        } else {

                                                                                $marital_status_opt[-1] = array('selected' => 'selected');
                                                                        }

                                                                        $mas = CHtml::listData(MasterMaritalStatus::model()->findAllByAttributes(array('status' => 1)), 'id', 'marital_status');
                                                                        ?>
                                                                        <?php echo CHtml::activeDropDownList($model, 'marital_status', $doesnt_matter + $mas, array('empty' => 'Select Marital Status', 'class' => 'religion aps tokenize-sample', 'options' => $marital_status_opt)); ?>
                                                                        <?php echo $form->error($model, 'marital_status'); ?>
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
                                                                        if (!empty($model->religion)) {

                                                                                $religion = explode(',', $model->religion);
                                                                        }
                                                                        $religion_opt = array();
                                                                        if (!empty($religion)) {
                                                                                foreach ($religion as $value) {
                                                                                        $religion_opt[$value] = array('selected' => 'selected');
                                                                                }
                                                                        } else {
                                                                                $religion_opt[-1] = array('selected' => 'selected');
                                                                        }
                                                                        $religi = CHtml::listData(MasterReligion::model()->findAllByAttributes(array('status' => 1)), 'id', 'religion');
                                                                        ?>
                                                                        <?php echo CHtml::activeDropDownList($model, 'religion', $doesnt_matter + $religi, array('empty' => 'Select a Religon', 'class' => 'caste_value aps tokenize-sample', 'options' => $religion_opt)); ?>
                                                                        <?php echo $form->error($model, 'religion'); ?>
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Caste.</label>
                                                        </div>

                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                <div class="form-group">

                                                                        <?php
                                                                        $caste_options = array();

                                                                        if ($model->religion != '') {
                                                                                $castes = MasterCaste::model()->findAll(array('condition' => 'religion_id in(' . $model->religion . ')'));
                                                                                if (!empty($castes)) {
                                                                                        $caste_options[""] = "Select Community";
                                                                                        foreach ($castes as $caste) {
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
                                                                        if (!empty($model->caste)) {

                                                                                $caste = explode(',', $model->caste);
                                                                        }
                                                                        $caste_opt = array();
                                                                        if (!empty($caste)) {
                                                                                foreach ($caste as $value) {
                                                                                        $caste_opt[$value] = array('selected' => 'selected');
                                                                                }
                                                                        } else {
                                                                                $caste_opt[-1] = array('selected' => 'selected');
                                                                        }
                                                                        ?>
                                                                        <?php echo CHtml::activeDropDownList($model, 'caste', $doesnt_matter + $caste_options, array('class' => 'aps tokenize-sample', 'options' => $caste_opt)); ?>
                                                                        <?php echo $form->error($model, 'caste'); ?>
                                                                </div>
                                                        </div>

                                                </div>



                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Mother Tonuge</label>
                                                        </div>

                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                <div class="form-group">

                                                                        <?php
                                                                        if (!empty($model->mothertongue)) {

                                                                                $mothertongue = explode(',', $model->mothertongue);
                                                                        } else {
                                                                                $mothertongue = $model->mothertongue;
                                                                        }
                                                                        $mothertongue_opt = array();
                                                                        if (!empty($mothertongue)) {
                                                                                foreach ($mothertongue as $value) {
                                                                                        $mothertongue_opt[$value] = array('selected' => 'selected');
                                                                                }
                                                                        } else {
                                                                                $mothertongue_opt[-1] = array('selected' => 'selected');
                                                                        }
                                                                        $tounge = CHtml::listData(MasterMotherTongue::model()->findAllByAttributes(array('status' => 1)), 'id', 'mother_tongue');
                                                                        ?>
                                                                        <?php echo CHtml::activeDropDownList($model, 'mothertongue', $doesnt_matter + $tounge, array('empty' => 'Select Mother Tongue', 'class' => 'aps tokenize-sample', 'options' => $mothertongue_opt)); ?>
                                                                        <?php echo $form->error($model, 'mothertongue'); ?>
                                                                </div>
                                                        </div>

                                                </div>

                                                <div class="clearfix"></div>
                                                <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel1">
                                                                                <h4 class="panel-title">
                                                                                        <i class="glyphicon glyphicon-minus"></i>Location & Grew up in details

                                                                                </h4>
                                                                        </a>

                                                                </div>
                                                                <div id="panel1" class="panel-collapse collapse in">
                                                                        <div class="panel-body">
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
                                                                                                        if (!empty($model->country_living_in)) {

                                                                                                                $country_living_in = explode(',', $model->country_living_in);
                                                                                                        } else {
                                                                                                                $country_living_in = $model->country_living_in;
                                                                                                        }
                                                                                                        $country_living_in_opt = array();
                                                                                                        if (!empty($country_living_in)) {
                                                                                                                foreach ($country_living_in as $value) {
                                                                                                                        $country_living_in_opt[$value] = array('selected' => 'selected');
                                                                                                                }
                                                                                                        } else {
                                                                                                                $country_living_in_opt[-1] = array('selected' => 'selected');
                                                                                                        }
                                                                                                        ?>
                                                                                                        <?php echo CHtml::activeDropDownList($model, 'country_living_in', $doesnt_matter + CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => 'Select Country', 'class' => 'aps tokenize-sample country_chan', 'options' => $country_living_in_opt)); ?>
                                                                                                        <?php echo $form->error($model, 'country_living_in'); ?>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>



                                                                                <div class="common">
                                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">State Living In</label>
                                                                                        </div>
                                                                                        <div class="col-sm-1 col-xs-1 zeros"  id="education">
                                                                                                <label for="textinput" class="control-label">:</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                                <div class="form-group">
                                                                                                        <?php
                                                                                                        $state_options = array();
                                                                                                        if ($model->country_living_in != '') {
                                                                                                                $states = MasterState::model()->findAll(array('condition' => 'country_id in(' . $model->country_living_in . ')'));
                                                                                                                if (!empty($states)) {
                                                                                                                        $state_options[""] = "Select State Living In";
                                                                                                                        foreach ($states as $state) {
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
                                                                                                        if (!empty($model->residency_status)) {

                                                                                                                $residency_status = explode(',', $model->residency_status);
                                                                                                        }
                                                                                                        $residency_status_opt = array();
                                                                                                        if (!empty($residency_status)) {
                                                                                                                foreach ($residency_status as $value) {
                                                                                                                        $residency_status_opt[$value] = array('selected' => 'selected');
                                                                                                                }
                                                                                                        } else {
                                                                                                                $residency_status_opt[-1] = array('selected' => 'selected');
                                                                                                        }
                                                                                                        ?>


                                                                                                        <?php
                                                                                                        echo CHtml::activeDropDownList($model, 'residency_status', $doesnt_matter + $state_options, array('class' => 'aps tokenize-sample', 'options' => $residency_status_opt));
                                                                                                        ?>
                                                                                                        <?php echo $form->error($model, 'residency_status'); ?>
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
                                                                                                        if (!empty($model->country_grew_up)) {

                                                                                                                $country_grew_up = explode(',', $model->country_grew_up);
                                                                                                        }
                                                                                                        $country_grew_up_opt = array();
                                                                                                        if (!empty($country_grew_up)) {
                                                                                                                foreach ($country_grew_up as $value) {
                                                                                                                        $country_grew_up_opt[$value] = array('selected' => 'selected');
                                                                                                                }
                                                                                                        } else {
                                                                                                                $country_grew_up_opt[-1] = array('selected' => 'selected');
                                                                                                        }
                                                                                                        ?>
                                                                                                        <?php echo CHtml::activeDropDownList($model, 'country_grew_up', $doesnt_matter + CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => 'Select Country', 'class' => 'aps tokenize-sample', 'options' => $country_grew_up_opt)); ?>
                                                                                                        <?php echo $form->error($model, 'country_grew_up'); ?>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>





                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel2">
                                                                                <h4 class="panel-title">
                                                                                        <i class="glyphicon glyphicon-minus"></i>Education & Profession Details
                                                                                </h4>
                                                                        </a>

                                                                </div>
                                                                <div id="panel2" class="panel-collapse collapse in">
                                                                        <div class="panel-body">
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
                                                                                                        if (!empty($model->education)) {

                                                                                                                $education = explode(',', $model->education);
                                                                                                        }
                                                                                                        $education_opt = array();
                                                                                                        if (!empty($education)) {
                                                                                                                foreach ($education as $value) {
                                                                                                                        $education_opt[$value] = array('selected' => 'selected');
                                                                                                                }
                                                                                                        } else {
                                                                                                                $education_opt[-1] = array('selected' => 'selected');
                                                                                                        }
                                                                                                        ?>
                                                                                                        <?php echo CHtml::activeDropDownList($model, 'education', $doesnt_matter + CHtml::listData(MasterEducationField::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_field'), array('empty' => 'Select Education', 'class' => 'aps tokenize-sample', 'options' => $education_opt)); ?>
                                                                                                        <?php echo $form->error($model, 'education'); ?>
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
                                                                                                        if (!empty($model->working_with)) {

                                                                                                                $working_with = explode(',', $model->working_with);
                                                                                                        }
                                                                                                        $working_with_opt = array();
                                                                                                        if (!empty($working_with)) {
                                                                                                                foreach ($working_with as $value) {
                                                                                                                        $working_with_opt[$value] = array('selected' => 'selected');
                                                                                                                }
                                                                                                        } else {
                                                                                                                $working_with_opt[-1] = array('selected' => 'selected');
                                                                                                        }
                                                                                                        ?>
                                                                                                        <?php echo CHtml::activeDropDownList($model, 'working_with', $doesnt_matter + CHtml::listData(MasterWorkingWith::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_with'), array('empty' => 'Select Working With', 'class' => 'aps tokenize-sample', 'options' => $working_with_opt)); ?>
                                                                                                        <?php echo $form->error($model, 'working_with'); ?>
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
                                                                                                        if (!empty($model->profession_area)) {

                                                                                                                $profession_area = explode(',', $model->profession_area);
                                                                                                        }
                                                                                                        $profession_area_opt = array();
                                                                                                        if (!empty($working_with)) {
                                                                                                                foreach ($profession_area as $value) {
                                                                                                                        $profession_area_opt[$value] = array('selected' => 'selected');
                                                                                                                }
                                                                                                        } else {
                                                                                                                $profession_area_opt[-1] = array('selected' => 'selected');
                                                                                                        }
                                                                                                        ?>
                                                                                                        <?php echo CHtml::activeDropDownList($model, 'profession_area', $doesnt_matter + CHtml::listData(MasterWorkingAs::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_as'), array('empty' => 'Select Professional Area', 'class' => 'aps tokenize-sample', 'options' => $profession_area_opt)); ?>
                                                                                                        <?php echo $form->error($model, 'profession_area'); ?>
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
                                                                                                        if (!empty($model->annual_income_from)) {

                                                                                                                $annual_income_from = explode(',', $model->annual_income_from);
                                                                                                        }
                                                                                                        $annual_income_from_opt = array();
                                                                                                        if (!empty($annual_income_from)) {
                                                                                                                foreach ($annual_income_from as $value) {
                                                                                                                        $annual_income_from_opt[$value] = array('selected' => 'selected');
                                                                                                                }
                                                                                                        } else {
                                                                                                                $annual_income_from_opt[-1] = array('selected' => 'selected');
                                                                                                        }
                                                                                                        ?>
                                                                                                        <?php echo CHtml::activeDropDownList($model, 'annual_income_from', $doesnt_matter + CHtml::listData(MasterAnnualIncome::model()->findAllByAttributes(array('status' => 1)), 'id', 'income_from'), array('empty' => 'Select Annual Income', 'class' => 'aps tokenize-sample', 'options' => $annual_income_from_opt)); ?>
                                                                                                        <?php echo $form->error($model, 'annual_income_from'); ?>

                                                                                                </div>


                                                                                        </div>
                                                                                </div>





                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>









                                                <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel3">
                                                                                <h4 class="panel-title">
                                                                                        <i class="glyphicon glyphicon-minus"></i> Lifestyle & Appearance
                                                                                </h4>
                                                                        </a>

                                                                </div>
                                                                <div id="panel3" class="panel-collapse collapse in">
                                                                        <div class="panel-body">
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
                                                                                                                if (!is_array($model->diet)) {

                                                                                                                        $options1 = explode(',', $model->diet);
                                                                                                                } else {
                                                                                                                        $options1 = $model->diet;
                                                                                                                }
                                                                                                                ?>
                                                                                                                <?php
                                                                                                                $model->diet = $options1;
                                                                                                                echo CHtml::activeCheckboxList($model, 'diet', $doesnt_matter + CHtml::listData(MasterDiet::model()->findAll(array('condition' => 'status=1')), 'id', 'diet'), array('template' => '<li style="padding-bottom:0px;padding-left:0px">{input}{label}</li>', 'separator' => '',
                                                                                                                    'labelOptions' => array(
                                                                                                                        'style' => 'padding-left:13px;width: 70px;float: left;'),
                                                                                                                    'style' => 'float:left;'
                                                                                                                ));
                                                                                                                ?>

                                                                                                                <?php echo $form->error($model, 'diet'); ?>



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
                                                                                                $drink = array('1' => 'No', '2' => 'Yes', '3' => 'Occasionally', '-1' => 'Doesnt Matter');

                                                                                                foreach ($drink as $drinkkey => $drinkvalue) {

                                                                                                        if ($model->drink == $drinkkey) {
                                                                                                                $checked = 'checked';
                                                                                                        } else {
                                                                                                                $checked = '';
                                                                                                        }
                                                                                                        ?>

                                                                                                        <label class="radio-inline seekz">
                                                                                                                <input type="radio" name="SavedSearch[drink]" id="PartnerDetails_drink<?= $dr ?>" value="<?= $drinkkey; ?>" <?= $checked ?>><?= $drinkvalue; ?>
                                                                                                        </label>
                                                                                                        <?php
                                                                                                        $dr++;
                                                                                                }
                                                                                                ?>

                                                                                                <?php echo $form->error($model, 'drink'); ?>

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
                                                                                                $smoke = array('1' => 'No', '2' => 'Yes', '3' => 'Occasionally', '-1' => 'Doesnt Matter');
                                                                                                foreach ($smoke as $smokekey => $smokevalue) {

                                                                                                        if ($model->smoke == $smokekey) {
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

                                                                                                <?php echo $form->error($model, 'smoke'); ?>


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
                                                                                                                if (!is_array($model->body_type)) {

                                                                                                                        $options2 = explode(',', $model->body_type);
                                                                                                                } else {
                                                                                                                        $options2 = $model->body_type;
                                                                                                                }
                                                                                                                ?>
                                                                                                                <?php
                                                                                                                $model->body_type = $options2;
                                                                                                                echo CHtml::activeCheckboxList($model, 'body_type', $doesnt_matter + CHtml::listData(MasterBodyType::model()->findAll(array('condition' => 'status=1')), 'id', 'body_type'), array('template' => '<li style="padding-bottom:0px;padding-left:0px">{input}{label}</li>', 'separator' => '',
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
                                                                                                                if (!is_array($model->skin_tone)) {

                                                                                                                        $options3 = explode(',', $model->skin_tone);
                                                                                                                } else {
                                                                                                                        $options3 = $model->skin_tone;
                                                                                                                }
                                                                                                                ?>
                                                                                                                <?php
                                                                                                                $model->skin_tone = $options3;
                                                                                                                echo CHtml::activeCheckboxList($model, 'skin_tone', $doesnt_matter + CHtml::listData(MasterSkinTone::model()->findAll(array('condition' => 'status=1')), 'id', 'skin_tone'), array('template' => '<li style="padding-bottom:0px;padding-left:0px">{input}{label}</li>', 'separator' => '',
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
                                                                                                $disability = array('-1' => 'Doesnt Matter', '1' => 'Dont include profiles with disability');
                                                                                                foreach ($disability as $key => $value) {

                                                                                                        if ($model->disability == $key) {
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





                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>






                                                <!--                                                <div class="panel-group" id="accordion">
                                                                                                        <div class="panel panel-default">
                                                                                                                <div class="panel-heading">
                                                                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel4">
                                                                                                                                <h4 class="panel-title">
                                                                                                                                        <i class="glyphicon glyphicon-minus"></i> Select Any Options
                                                                                                                                </h4>
                                                                                                                        </a>

                                                                                                                </div>
                                                                                                                <div id="panel4" class="panel-collapse collapse in">
                                                                                                                        <div class="panel-body">


                                                                                                                                <div class="commons">
                                                                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                                                                <label for="textinput" class="control-label">Photo Settings</label>
                                                                                                                                        </div>

                                                                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                                                                <div class="form-group">

                                                                                                                                                        <ul class="list-unstyled">
                                                                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Visible to all</li>
                                                                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Procted Photo<img class="ques" src="<?php echo Yii::app()->request->baseUrl; ?>/images/question.jpg"></li>

                                                                                                                                                        </ul>
                                                                                                                                                </div>
                                                                                                                                        </div>

                                                                                                                                </div>



                                                                                                                                <div class="commons">
                                                                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                                                                <label for="textinput" class="control-label">Photo Settings</label>
                                                                                                                                        </div>

                                                                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                                                                <div class="form-group">

                                                                                                                                                        <ul class="list-unstyled">
                                                                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Doesn't Matter</li>
                                                                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Self</li>
                                                                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Parent/Guardian</li>
                                                                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Sibling/Friend/Others</li>
                                                                                                                                                        </ul>
                                                                                                                                                </div>
                                                                                                                                        </div>

                                                                                                                                </div>


                                                                                                                                <div class="common tops">

                                                                                                                                        <div class="col-sm-6 col-xs-6 zeros"></div>

                                                                                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                                                                                <button type="submit" class="btn sub-btn btn-default">Search</button>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-sm-3 col-xs-3 zeros">

                                                                                                                                                <button type="submit" class="btn sub-btns btn-default">Reset</button>
                                                                                                                                        </div>
                                                                                                                                </div>


                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>

                                                                                                </div>-->
                                                <div class="common tops">

                                                        <div class="col-sm-6 col-xs-6 zeros"></div>

                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <button type="submit" class="btn sub-btn btn-default">Search</button>
                                                        </div>
                                                        <div class="col-sm-3 col-xs-3 zeros">

                                                                <button type="reset" class="btn sub-btns btn-default">Reset</button>
                                                        </div>
                                                </div>

                                        </div>
                                        <?php $this->endWidget(); ?>


                                </div>

                        </div>
                        <div class="clearfix visible-xs"></div>
                        <div class="col-md-4 col-sm-12">
                                <?php echo $this->renderPartial('_saved_search'); ?>


                        </div>
                </div>
        </div>
</section>



<script>
        $(document).ready(function () {
                var selectIds = $('#panel1,#panel2,#panel3,#panel4,#panel5,#panel6,#panel7,#panel8,#panel9');
                $(function ($) {
                        selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                                $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                        });
                });
        });
</script>