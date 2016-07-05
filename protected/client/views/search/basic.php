<style>
        .slick-dots li{
                background-color: transparent;
        }
</style>
<section class="advance">
        <div class="container wishes">
                <div class="row">
                        <ul id="myTabs" class="nav nav-tabs nav-justified adv">
                                <li class="sims active"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search">Basic Search</a></li>
                                <li class="sims"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search/advanced">Advanced Search</a> </li>

                        </ul>
                        <div class="col-md-8 col-sm-12 col-xs-12 outs mains2">

                                <?php
                                /* @var $this SavedSearchController */
                                /* @var $model SavedSearch */
                                /* @var $form CActiveForm */
                                ?>

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

                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                <label class="radio-inline sec">
                                                                        <input required="" type="radio" name="couple" value="2">Bride
                                                                </label>
                                                                <label class="radio-inline sec">
                                                                        <input type="radio" name="couple" value="1">Groom
                                                                </label>
                                                        </div>
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
                                                                        <?php echo $form->dropDownList($model, 'age_from', $age_from, array('empty' => 'Age From', 'class' => 'ages')); ?>
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
                                                                        <?php echo $form->dropDownList($model, 'age_to', $age_to, array('empty' => 'Age To', 'class' => 'ages')); ?>
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


                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Living In</label>
                                                        </div>

                                                        <div class="col-sm-8 col-xs-9 zeros">
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
                                <h2>My Saved Searches</h2>
                                <div class="right-box">
                                        <p>You can access up to 5 Saved Searches as logged-in user<img class="question" src="<?php echo Yii::app()->request->baseUrl; ?>/images/question.jpg"></p>
                                        <a href="#" class="frees">Sign Up Free</a>
                                        <p>Already a member?<a href="#" class="logins">Login Now</a></p>
                                </div>
                                <h2>Profile ID Search</h2>
                                <div class="right-box">
                                        <form class="form-inline" role="form">
                                                <div class="form-group">
                                                        <input type="email" class="form-control" id="email" placeholder="Enter Profile ID">
                                                </div>
                                                <button type="submit" class="btn btn-default go">GO</button>
                                        </form>
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

<script type="text/javascript">

        /* Religion change function*/

        function Caste() {

                $('.caste_value').change(function () {
                        var caste = $(this).val();
                });

//                $('#PartnerDetails_religion  option:selected').each(function () {
//                        caste.push(this.value);
//                });
                alert(caste);

                if (caste != '') {
                        $.ajax({
                                type: "POST",
                                url: baseurl + "ajax/selectPartnerCaste",
                                data: {caste: caste}
                        }).done(function (data) {
                                $('#PartnerDetails_caste').prepend(data);

                        });
                }

        }



</script>