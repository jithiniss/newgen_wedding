<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/jquery.tokenize.js"></script>
<link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/jquery.tokenize.css" />
<style>
        .slick-dots li{
                background-color: transparent;
        }


</style>
<section class="religion">
        <div class="container">
                <div class="row">

                        <div class="col-md-3 newgens">
                                <h3>Settings</h3>
                                <ul class="list-unstyled">
                                        <?php
                                        $this->renderPartial('_leftSideSettings');
                                        ?>

                                </ul>
                        </div>
                        <div class="col-md-9">
                                <h4>Contact Filters</h4>
                                <?php if (Yii::app()->user->hasFlash('partner_fet')): ?>
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
                                                                                for ($i = 18; $i <= 50; $i++) {
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
                                                                <div class="col-sm-2 col-xs-2 zeros" id="religion">
                                                                        <div class="form-group">

                                                                                <?php
                                                                                $age_to = array();
                                                                                for ($i = 18; $i <= 50; $i++) {
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
                                                                                $doesnt_matter = array(
                                                                                    '-1' => Yii::t('fim', 'Does not Matter'),
                                                                                );
                                                                                if (!empty($partnerDetails->marital_status)) {

                                                                                        $marital_status = explode(',', $partnerDetails->marital_status);
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
                                                                                <?php echo CHtml::activeDropDownList($partnerDetails, 'marital_status', $doesnt_matter + $mas, array('empty' => 'Select Marital Status', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $marital_status_opt)); ?>
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
                                                                                if (!empty($partnerDetails->religion)) {

                                                                                        $religion = explode(',', $partnerDetails->religion);
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
                                                                                <?php echo CHtml::activeDropDownList($partnerDetails, 'religion', $doesnt_matter + $religi, array('empty' => 'Select a Religon', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $religion_opt)); ?>
                                                                                <?php echo $form->error($partnerDetails, 'religion'); ?>
                                                                        </div></div>
                                                        </div>





                                                        <div class="common">
                                                                <div class="col-sm-4 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Community</label>
                                                                </div>

                                                                714444444441                                                                <div class="col-sm-8 col-xs-9 zeros">
                                                                        <div class="form-group">

                                                                                <?php
                                                                                $caste_options = array();

                                                                                if ($partnerDetails->religion != '') {
                                                                                        $castes = MasterCaste::model()->findAll(array('condition' => 'religion_id in(' . $partnerDetails->religion . ')'));
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
                                                                                if (!empty($partnerDetails->caste)) {

                                                                                        $caste = explode(',', $partnerDetails->caste);
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
                                                                                <?php echo CHtml::activeDropDownList($partnerDetails, 'caste', $doesnt_matter + $caste_options, array('class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $caste_opt)); ?>
                                                                                <?php echo $form->error($partnerDetails, 'caste'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>

                                                        <div class="common" id="location">
                                                                <div class="col-sm-4 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Mother Tongue</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-9 zeros">
                                                                        <div class="form-group">
                                                                                <?php
                                                                                if (!empty($partnerDetails->mothertongue)) {

                                                                                        $mothertongue = explode(',', $partnerDetails->mothertongue);
                                                                                } else {
                                                                                        $mothertongue = $partnerDetails->mothertongue;
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
                                                                                <?php echo CHtml::activeDropDownList($partnerDetails, 'mothertongue', $doesnt_matter + $tounge, array('empty' => 'Select Mother Tongue', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $mothertongue_opt)); ?>
                                                                                <?php echo $form->error($partnerDetails, 'mothertongue'); ?>
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
                                                                                        <?php
                                                                                        if (!is_array($partnerDetails->profile_created_by)) {

                                                                                                $options = explode(',', $partnerDetails->profile_created_by);
                                                                                        } else {
                                                                                                $options = $partnerDetails->profile_created_by;
                                                                                        }
                                                                                        ?>
                                                                                        <?php
                                                                                        $partnerDetails->profile_created_by = $options;
                                                                                        echo CHtml::activeCheckboxList($partnerDetails, 'profile_created_by', $doesnt_matter + CHtml::listData(MasterProfileFor::model()->findAll(array('condition' => 'status=1')), 'id', 'profile_for'), array('template' => '<li style="padding-bottom:0px;padding-left:5px">{input}{label}</li>', 'separator' => '',
                                                                                            'labelOptions' => array(
                                                                                            ),
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
                                                                                if (!empty($partnerDetails->country_living_in)) {

                                                                                        $country_living_in = explode(',', $partnerDetails->country_living_in);
                                                                                } else {
                                                                                        $country_living_in = $partnerDetails->country_living_in;
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
                                                                                <?php echo CHtml::activeDropDownList($partnerDetails, 'country_living_in', $doesnt_matter + CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => 'Select Country', 'class' => 'aps tokenize-sample country_chan', 'multiple' => "multiple", 'options' => $country_living_in_opt)); ?>
                                                                                <?php echo $form->error($partnerDetails, 'country_living_in'); ?>
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
                                                                                if ($partnerDetails->country_living_in != '') {
                                                                                        $states = MasterState::model()->findAll(array('condition' => 'country_id in(' . $partnerDetails->country_living_in . ')'));
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
                                                                                if (!empty($partnerDetails->residency_status)) {

                                                                                        $residency_status = explode(',', $partnerDetails->residency_status);
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
                                                                                echo CHtml::activeDropDownList($partnerDetails, 'residency_status', $doesnt_matter + $state_options, array('class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $residency_status_opt));
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
                                                                                if (!empty($partnerDetails->country_grew_up)) {

                                                                                        $country_grew_up = explode(',', $partnerDetails->country_grew_up);
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
                                                                                <?php echo CHtml::activeDropDownList($partnerDetails, 'country_grew_up', $doesnt_matter + CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => 'Select Country', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $country_grew_up_opt)); ?>
                                                                                <?php echo $form->error($partnerDetails, 'country_grew_up'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>

                                                        <div class="common">

                                                                <div class="form-group">
                                                                        <button type="submit" class="btn row-btn btn-default">Update</button>
                                                                </div>
                                                        </div>



                                                </div>

                                        </div>

                                        <!--****-->


















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


        /* Country change function*/

        function StateLiving() {

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
                                $('#PartnerDetails_residency_status').prepend(data);

                        });
                }

        }

        /* Religion change function*/

        function Caste() {


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
                                $('#PartnerDetails_caste').prepend(data);

                        });
                }

        }


        function AddStateLiving(country, t, r) {

                if (country != '') {
                        $.ajax({
                                type: "POST",
                                url: baseurl + "ajax/selectState",
                                data: {country: country}
                        }).done(function (data) {
                                $('#PartnerDetails_residency_status').append(data);
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
                                $('#PartnerDetails_caste').append(data);
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
                                url: baseurl + "ajax/selectPartnerState",
                                data: {living_country: living_country}
                        }).done(function (data) {
                                $('#PartnerDetails_residency_status').html(data);
                                // $('#PartnerDetails_residency_status').empty(data);

                        });
                }

        }

</script>