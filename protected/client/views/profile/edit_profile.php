<style>
        .slick-dots li{
                background-color: transparent;
        }
</style>   <label  id="basicinfo"></label>
<section class="profiles">
        <div class="container">
                <div class="row">

                        <?php $this->renderPartial('_leftSide'); ?>
                        <div class="col-md-9">
                                <h4>Edit Personal Profile</h4>
                                <?php if (Yii::app()->user->hasFlash('edit_profile')): ?>
                                        <div class="alert alert-success">
                                                <?php echo Yii::app()->user->getFlash('edit_profile'); ?>
                                        </div>
                                <?php endif; ?>
                                <div class="pull-right">
                                        <p>Fields in bold cannot be edited. Please contact customer care for any queries.</p>
                                </div>

                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'edit-profile-form',
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
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Profile Created By <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">

                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'profile_for', CHtml::listData(MasterProfileFor::model()->findAllByAttributes(array('status' => 1)), 'id', 'profile_for'), array('empty' => '--Please select--', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>

                                                                                <?php echo $form->error($editProfile, 'profile_for'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Gender</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group" style="font-weight:bold;">

                                                                                <?php echo $editProfile->gender == 1 ? 'Male' : 'Female'; ?>
                                                                        </div>
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
                                                                                for ($i = 1; $i <= 31; $i++) {
                                                                                        $day[sprintf("%d", $i)] = sprintf("%02d", $i);
                                                                                }
                                                                                ?>
                                                                                <?php echo $form->dropDownList($editProfile, 'dob_day', $day, array('empty' => 'Day', 'class' => 'aps')); ?>
                                                                                <?php echo $form->error($editProfile, 'dob_day'); ?>
                                                                        </div>
                                                                </div>


                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <div class="form-group">
                                                                                <?php $months = array(01 => 'Jan', 02 => 'Feb', 03 => 'Mar', 04 => 'Apr', 05 => 'May', 06 => 'Jun', 07 => 'Jul', 08 => 'Aug', 09 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'); ?>
                                                                                <?php echo $form->dropDownList($editProfile, 'dob_month', $months, array('empty' => 'Month', 'class' => 'aps')); ?>
                                                                                <?php echo $form->error($editProfile, 'dob_month'); ?>

                                                                        </div>
                                                                </div>

                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <div class="form-group">
                                                                                <?php
                                                                                $year = array();
                                                                                for ($i = date("Y", strtotime("-18 year")); $i >= date("Y", strtotime("-69 year")); $i--) {
                                                                                        $year[$i] = $i;
                                                                                }
                                                                                ?>
                                                                                <?php echo $form->dropDownList($editProfile, 'dob_year', $year, array('empty' => 'Year', 'class' => 'aps')); ?>
                                                                                <?php echo $form->error($editProfile, 'dob_year'); ?>

                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Martial Status <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">

                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'marital_status', CHtml::listData(MasterMaritalStatus::model()->findAllByAttributes(array('status' => 1)), 'id', 'marital_status'), array('empty' => 'Select Marital Status', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'marital_status'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>


                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Height <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'height', CHtml::listData(MasterHeight::model()->findAllByAttributes(array('status' => 1)), 'id', 'height'), array('empty' => 'Select Your Height', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'height'); ?>
                                                                        </div>
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
                                                                        <?php
                                                                        $body_type = MasterBodyType::model()->findAll(array('condition' => 'status=1'));
                                                                        $t = 1;
                                                                        foreach ($body_type as $body_types) {

                                                                                if ($editProfile->body_type == $body_types->id) {
                                                                                        $checked = 'checked';
                                                                                } else {
                                                                                        $checked = '';
                                                                                }
                                                                                ?>
                                                                                <label class="radio-inline sec">
                                                                                        <input type="radio" name="UserDetails[body_type]" id="UserDetails_body_type<?= $t ?>" value="<?= $body_types->id; ?>" <?= $checked ?>><?= $body_types->body_type; ?>
                                                                                </label>
                                                                                <?php
                                                                                $t++;
                                                                        }
                                                                        ?>

                                                                </div>
                                                        </div>


                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Body Weight</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>

                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php
                                                                                $weight = array();
                                                                                for ($i = 30; $i <= 150; $i++) {
                                                                                        $weight[sprintf("%02d", $i)] = sprintf("%02d", $i) . ' Kg';
                                                                                }
                                                                                ?>
                                                                                <?php echo $form->dropDownList($editProfile, 'weight', $weight, array('empty' => 'Enter your Weight', 'class' => 'aps')); ?>
                                                                                <?php echo $form->error($editProfile, 'weight'); ?>

                                                                        </div>
                                                                </div>

                                                        </div>



                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Health Information</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">

                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'health_info', CHtml::listData(MasterHealthInformation::model()->findAllByAttributes(array('status' => 1)), 'id', 'health_info'), array('empty' => 'Health Information', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'health_info'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>

                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Skin Tone</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>  <label id="religiousbkd"></label>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <?php
                                                                        $skin_tone = MasterSkinTone::model()->findAll(array('condition' => 'status=1'));
                                                                        $s = 1;
                                                                        foreach ($skin_tone as $skin_tones) {

                                                                                if ($editProfile->skin_tone == $skin_tones->id) {
                                                                                        $checked = 'checked';
                                                                                } else {
                                                                                        $checked = '';
                                                                                }
                                                                                ?>
                                                                                <label class="radio-inline sec">
                                                                                        <input type="radio" name="UserDetails[skin_tone]" id="UserDetails_skin_tone<?= $s ?>" value="<?= $skin_tones->id; ?>" <?= $checked ?>><?= $skin_tones->skin_tone; ?>
                                                                                </label>
                                                                                <?php
                                                                                $s++;
                                                                        }
                                                                        ?>

                                                                </div>
                                                        </div>

                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Any Disability?</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <?php
                                                                        $d = 1;
                                                                        $disability = array('1' => 'No', '2' => 'Physically Disabled');
                                                                        foreach ($disability as $key => $value) {

                                                                                if ($editProfile->disablity == $key) {
                                                                                        $checked = 'checked';
                                                                                } else {
                                                                                        $checked = '';
                                                                                }
                                                                                ?>

                                                                                <label class="radio-inline sec">
                                                                                        <input type="radio" name="UserDetails[disablity]" id="UserDetails_disablity<?= $d ?>" value="<?= $key; ?>" <?= $checked ?>><?= $value; ?>
                                                                                </label>
                                                                                <?php
                                                                                $d++;
                                                                        }
                                                                        ?>


                                                                </div>
                                                        </div>


                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Blood Group</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">

                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'blood_group', CHtml::listData(MasterBloodGroup::model()->findAllByAttributes(array('status' => 1)), 'id', 'blood_group'), array('empty' => 'Select Blood Group', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'blood_group'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                </div>
                                        </div>

                                        <!--****-->



                                        <div class="strip" >
                                                <h2>Religious Background</h2>
                                                <div class="strip-padding">

                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Religion <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">

                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'religion', CHtml::listData(MasterReligion::model()->findAllByAttributes(array('status' => 1)), 'id', 'religion'), array('empty' => 'Select a Religon', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'religion'); ?>
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

                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'mothertongue', CHtml::listData(MasterMotherTongue::model()->findAllByAttributes(array('status' => 1)), 'id', 'mother_tongue'), array('empty' => '--Please select--', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'mothertongue'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>



                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Community <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">

                                                                                <?php
                                                                                $caste_options = array();

                                                                                if ($editProfile->religion != '') {
                                                                                        $castes = MasterCaste::model()->findAllByAttributes(array('religion_id' => $editProfile->religion));
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
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'caste', $caste_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'caste'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>








                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Sub Community</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros"  id="family">
                                                                        <div class="form-group">

                                                                                <?php
                                                                                $subcaste_options = array();
                                                                                if ($editProfile->caste != 0) {
                                                                                        $subcastes = MasterSubCaste::model()->findAllByAttributes(array('caste_id' => $editProfile->caste));
                                                                                        if (!empty($subcastes)) {
                                                                                                $subcaste_options[""] = "Select Sub-Community";
                                                                                                foreach ($subcastes as $subcaste) {
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
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'sub_caste', $subcaste_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'sub_caste'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="common" >
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Nakshatra(Optional)</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros" >
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'nakshatra', CHtml::listData(MasterNakshatra::model()->findAllByAttributes(array('status' => 1)), 'id', 'nakshatra'), array('empty' => 'Select Nakshatra', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'nakshatra'); ?>

                                                                        </div>
                                                                </div>

                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label" >Suddha Jathakam (Optional)</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-78 col-xs-8 zeros">
                                                                        <?php
                                                                        $sj = 1;
                                                                        $suddha_jadhagam = array('1' => 'Yes', '2' => 'No', '3' => 'Dont No');
                                                                        foreach ($suddha_jadhagam as $key => $value) {

                                                                                if ($editProfile->suddha_jadhagam == $key) {
                                                                                        $checked = 'checked';
                                                                                } else {
                                                                                        $checked = '';
                                                                                }
                                                                                ?>

                                                                                <label class="radio-inline sec">
                                                                                        <input type="radio" name="UserDetails[suddha_jadhagam]" id="UserDetails_disablity<?= $sj ?>" value="<?= $key; ?>" <?= $checked ?>><?= $value; ?>
                                                                                </label>
                                                                                <?php
                                                                                $sj++;
                                                                        }
                                                                        ?>
                                                                        <?php echo $form->error($editProfile, 'suddha_jadhagam');
                                                                        ?>
                                                                </div>
                                                        </div>

                                                </div>

                                        </div>

                                        <!--****-->


                                        <div class="strip" >
                                                <h2>Family</h2>
                                                <div class="strip-padding">

                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Father's Status</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'father_status', CHtml::listData(MasterParentStatus::model()->findAllByAttributes(array('status' => 1), array('condition' => 'category = 3 or category = 1')), 'id', 'parent_status'), array('empty' => 'Select Fathers Status', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'father_status'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>


                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Mother's Status</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'mother_status', CHtml::listData(MasterParentStatus::model()->findAllByAttributes(array('status' => 1), array('condition' => 'category = 3 or category = 2')), 'id', 'parent_status'), array('empty' => 'Select Mothers Status', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'mother_status'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>

                                                        <!--                            <div class="common">
                                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                            <label for="textinput" class="control-label">Family Location</label>
                                                                                        </div>
                                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                            <label for="textinput" class="control-label">:</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                            <div class="form-group">
                                                        <?php
//                            $city_options = array();
//                            if($editProfile->state != '') {
//                                    $cities = MasterState::model()->findAllByAttributes(array('country_id' => $editProfile->state));
//                                    if(!empty($cities)) {
//                                            $city_options[""] = "Select";
//                                            foreach($cities as $city) {
//                                                    $city_options[$city->id] = $city->city;
//                                            }
//                                    } else {
//                                            $city_options[""] = "Select";
//                                            $city_options[0] = "Other";
//                                    }
//                            } else {
//                                    $city_options[""] = 'Select';
//                            }
                                                        ?>
                                                        <?php //echo CHtml::activeDropDownList($editProfile, 'city', $city_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                        <?php //echo $form->error($editProfile, 'city'); ?>


                                                                                                <input type="checkbox" class="joint"  name="vehicle" value="Bike">Same as me
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>-->




                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">No of siblings</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>


                                                                <div class="col-sm-2 col-xs-2 zeros">
                                                                        <div class="form-group">
                                                                                <?php
                                                                                if ($editProfile->num_of_unmarried_brother == 0) {
                                                                                        $editProfile->num_of_unmarried_brother = "";
                                                                                }
                                                                                ?>
                                                                                <?php echo $form->numberField($editProfile, 'num_of_unmarried_brother', array('class' => 'ui_apps', 'placeholder' => 'Unmarried')); ?>
                                                                                <?php echo $form->error($editProfile, 'num_of_unmarried_brother'); ?>
                                                                                <label for="textinput" class="control-label" style="text-align: center;">Not Married Brother</label>
                                                                        </div>
                                                                </div>


                                                                <div class="col-sm-2 col-xs-2 zeros">
                                                                        <div class="form-group">
                                                                                <?php
                                                                                if ($editProfile->num_of_married_brother == 0) {
                                                                                        $editProfile->num_of_married_brother = "";
                                                                                }
                                                                                ?>
                                                                                <?php echo $form->numberField($editProfile, 'num_of_married_brother', array('class' => 'ui_apps', 'placeholder' => 'Married')); ?>
                                                                                <?php echo $form->error($editProfile, 'num_of_married_brother'); ?>

                                                                                <label for="textinput" class="control-label" style="text-align: center;">Married Brother</label>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-2 col-xs-2 zeros">
                                                                        <div class="form-group">
                                                                                <?php
                                                                                if ($editProfile->num_of_unmarried_sister == 0) {
                                                                                        $editProfile->num_of_unmarried_sister = "";
                                                                                }
                                                                                ?>
                                                                                <?php echo $form->numberField($editProfile, 'num_of_unmarried_sister', array('class' => 'ui_apps', 'placeholder' => 'Unmarried')); ?>
                                                                                <?php echo $form->error($editProfile, 'num_of_unmarried_sister'); ?>
                                                                                <label for="textinput" class="control-label" style="text-align: center;">Not Married Sister</label>
                                                                        </div>
                                                                </div>


                                                                <div class="col-sm-2 col-xs-2 zeros">
                                                                        <div class="form-group">
                                                                                <?php
                                                                                if ($editProfile->num_of_married_sister == 0) {
                                                                                        $editProfile->num_of_married_sister = "";
                                                                                }
                                                                                ?>
                                                                                <?php echo $form->numberField($editProfile, 'num_of_married_sister', array('class' => 'ui_apps', 'placeholder' => 'Married')); ?>
                                                                                <?php echo $form->error($editProfile, 'num_of_married_sister'); ?>
                                                                                <label for="textinput" class="control-label" style="text-align: center;">Married Sister</label>
                                                                        </div>
                                                                </div>

                                                        </div>









                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Native Place</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo $form->textField($editProfile, 'home_town', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps', 'placeholder' => 'Enter Your Home town')); ?>
                                                                                <?php echo $form->error($editProfile, 'home_town');
                                                                                ?>
                                                                        </div>
                                                                </div>

                                                        </div>





                                                        <div class="common" id="education">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Family Type</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <?php
                                                                        $family_type = MasterFamilyType::model()->findAll(array('condition' => 'status=1'));
                                                                        $f = 1;
                                                                        foreach ($family_type as $family_types) {

                                                                                if ($editProfile->family_type == $family_types->id) {
                                                                                        $checked = 'checked';
                                                                                } else {
                                                                                        $checked = '';
                                                                                }
                                                                                ?>
                                                                                <label class="radio-inline sec">
                                                                                        <input type="radio" name="UserDetails[family_type]" id="UserDetails_family_type<?= $f ?>" value="<?= $family_types->id; ?>" <?= $checked ?>><?= $family_types->family_type; ?>
                                                                                </label>
                                                                                <?php
                                                                                $f++;
                                                                        }
                                                                        ?>
                                                                        <?php echo $form->error($editProfile, 'family_type'); ?>
                                                                </div>
                                                        </div>


                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Family Values</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <?php
                                                                        $family_value = MasterFamilyValue::model()->findAll(array('condition' => 'status=1'));
                                                                        $v = 1;
                                                                        foreach ($family_value as $family_values) {

                                                                                if ($editProfile->family_value == $family_values->id) {
                                                                                        $checked = 'checked';
                                                                                } else {
                                                                                        $checked = '';
                                                                                }
                                                                                ?>
                                                                                <label class="radio-inline sec">
                                                                                        <input type="radio" name="UserDetails[family_value]" id="UserDetails_family_value<?= $v ?>" value="<?= $family_values->id; ?>" <?= $checked ?>><?= $family_values->family_value; ?>
                                                                                </label>
                                                                                <?php
                                                                                $v++;
                                                                        }
                                                                        ?>
                                                                        <?php echo $form->error($editProfile, 'family_value'); ?>
                                                                </div>
                                                        </div>

                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Affluence Level</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">

                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'affluence_level', CHtml::listData(MasterAffluenceLevel::model()->findAllByAttributes(array('status' => 1)), 'id', 'affluence_level'), array('empty' => 'Select Affluence Level', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'affluence_level'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>






                                                </div>

                                        </div>



                                        <div class="strip">
                                                <h2>Education & Career</h2>
                                                <div class="strip-padding">

                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Education	</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-3 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'education_level', CHtml::listData(MasterEducationLevel::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_level'), array('empty' => 'Select', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'education_level'); ?>

                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-8 zeros">

                                                                        <label for="textinput" class="control-labels">In</label>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-8 zeros">
                                                                        <div class="form-group">

                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'education_field', CHtml::listData(MasterEducationField::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_field'), array('empty' => 'Select', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'education_field'); ?>
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
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'working_with', CHtml::listData(MasterWorkingWith::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_with'), array('empty' => 'Select', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'working_with'); ?>

                                                                        </div>
                                                                </div>

                                                        </div>

                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Working As</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">

                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'working_as', CHtml::listData(MasterWorkingAs::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_as'), array('empty' => 'Select Working As', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'working_as'); ?>
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
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'annual_income', CHtml::listData(MasterAnnualIncome::model()->findAllByAttributes(array('status' => 1)), 'id', 'income_from'), array('empty' => 'Select Annual Income', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'annual_income'); ?>

                                                                        </div>
                                                                </div>

                                                        </div>








                                                </div>
                                        </div>



                                        <div class="strip" id="groom">
                                                <h2>Life Style</h2>
                                                <div class="strip-padding">
                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Diet</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <?php
                                                                        $diet = MasterDiet::model()->findAll(array('condition' => 'status=1'));
                                                                        $ei = 1;
                                                                        foreach ($diet as $diets) {

                                                                                if ($editProfile->diet == $diets->id) {
                                                                                        $checked = 'checked';
                                                                                } else {
                                                                                        $checked = '';
                                                                                }
                                                                                ?>
                                                                                <label class="radio-inline seek">
                                                                                        <input type="radio" name="UserDetails[diet]" id="UserDetails_diet<?= $ei ?>" value="<?= $diets->id; ?>" <?= $checked ?>><?= $diets->diet; ?>
                                                                                </label>
                                                                                <?php
                                                                                $ei++;
                                                                        }
                                                                        ?>
                                                                        <?php echo $form->error($editProfile, 'diet'); ?>
                                                                </div>
                                                        </div>






                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Drink <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <?php
                                                                        $dr = 1;
                                                                        $drink = array('1' => 'No', '2' => 'Yes', '3' => 'Occasionally');
                                                                        foreach ($drink as $drinkkey => $drinkvalue) {

                                                                                if ($editProfile->drink == $drinkkey) {
                                                                                        $checked = 'checked';
                                                                                } else {
                                                                                        $checked = '';
                                                                                }
                                                                                ?>

                                                                                <label class="radio-inline seek">
                                                                                        <input type="radio" name="UserDetails[drink]" id="UserDetails_drink<?= $dr ?>" value="<?= $drinkkey; ?>" <?= $checked ?>><?= $drinkvalue; ?>
                                                                                </label>
                                                                                <?php
                                                                                $dr++;
                                                                        }
                                                                        ?>
                                                                        <?php echo $form->error($editProfile, 'drink');
                                                                        ?>



                                                                </div>
                                                        </div>




                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Smoke <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <?php
                                                                        $sm = 1;
                                                                        $smoke = array('1' => 'No', '2' => 'Yes', '3' => 'Occasionally');
                                                                        foreach ($smoke as $smokekey => $smokevalue) {

                                                                                if ($editProfile->smoke == $smokekey) {
                                                                                        $checked = 'checked';
                                                                                } else {
                                                                                        $checked = '';
                                                                                }
                                                                                ?>

                                                                                <label class="radio-inline seek">
                                                                                        <input type="radio" name="UserDetails[smoke]" id="UserDetails_smoke<?= $sm ?>" value="<?= $smokekey; ?>" <?= $checked ?>><?= $smokevalue; ?>
                                                                                </label>
                                                                                <?php
                                                                                $sm++;
                                                                        }
                                                                        ?>
                                                                        <?php echo $form->error($editProfile, 'smoke');
                                                                        ?>



                                                                </div>
                                                        </div>



                                                </div>
                                        </div>





                                        <div class="strip">
                                                <h2>Location of Groom</h2>
                                                <div class="strip-padding">

                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Country Living In <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'country', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--Please select--', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'country'); ?>

                                                                        </div>
                                                                </div>


                                                        </div>



                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">State Living In <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php
                                                                                $state_options = array();
                                                                                if ($editProfile->country != '') {
                                                                                        $states = MasterState::model()->findAllByAttributes(array('country_id' => $editProfile->country));
                                                                                        if (!empty($states)) {
                                                                                                $state_options[""] = "--Select--";
                                                                                                foreach ($states as $state) {
                                                                                                        $state_options[$state->id] = $state->state;
                                                                                                }
                                                                                        } else {
                                                                                                $state_options[""] = "--Select--";
                                                                                                $state_options[0] = "Other";
                                                                                        }
                                                                                } else {
                                                                                        $state_options[""] = '--select--';
                                                                                }
                                                                                ?>
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'state', $state_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'state'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>

                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">City Living In <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">

                                                                                <?php
                                                                                $city_options = array();
                                                                                if ($editProfile->state != '') {
                                                                                        $cities = MasterState::model()->findAllByAttributes(array('country_id' => $editProfile->state));
                                                                                        if (!empty($cities)) {
                                                                                                $city_options[""] = "Select";
                                                                                                foreach ($cities as $city) {
                                                                                                        $city_options[$city->id] = $city->city;
                                                                                                }
                                                                                        } else {
                                                                                                $city_options[""] = "Select";
                                                                                                $city_options[0] = "Other";
                                                                                        }
                                                                                } else {
                                                                                        $city_options[""] = 'Select';
                                                                                }
                                                                                ?>
                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'city', $city_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'city'); ?>
                                                                        </div>
                                                                </div>

                                                        </div>

                                                        <div class="common clear">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Grew up in</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">

                                                                        <div class="form-group">

                                                                                <?php echo CHtml::activeDropDownList($editProfile, 'grow_up_in', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => 'Select Grewup In', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                                <?php echo $form->error($editProfile, 'grow_up_in'); ?>
                                                                        </div>
                                                                </div>


                                                        </div>





                                                        <!--                            <div class="common">
                                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                            <label for="textinput" class="control-label">Ethnic Origin</label>
                                                                                        </div>
                                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                            <label for="textinput" class="control-label">:</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                            <div class="form-group">

                                                                                                <select class="aps" name="carlist" form="carform">
                                                                                                    <option value="volvo">India</option>
                                                                                                    <option value="saab">1</option>
                                                                                                    <option value="opel">2</option>
                                                                                                    <option value="audi">3</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>-->



                                                        <div class="common">
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Zip/Pin Code</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php
                                                                                if ($editProfile->zip_code == 0) {
                                                                                        $editProfile->zip_code = "";
                                                                                }
                                                                                ?>


                                                                                <?php echo $form->textField($editProfile, 'zip_code', array('class' => 'ui_apps', 'placeholder' => 'Zip-code')); ?>
                                                                                <?php echo $form->error($editProfile, 'zip_code'); ?>

                                                                        </div>
                                                                </div>

                                                        </div>



                                                </div>
                                                <label  id="aboutme"></label>
                                        </div>





                                        <div class="strip">
                                                <h2>More About Yourself</h2>
                                                <div class="strip-padding">
                                                        <div class="common">
                                                                <div class="col-sm-12 col-xs-12 zeros">
                                                                        <p>This section will help you make a strong impression on your potential partner. So, express yourself.
                                                                                (NOTE: This section will be screened everytime you update it. Allow upto 24 hours for it to go live. )</p>
                                                                        <br>
                                                                        <p>Personality, Family Details, Career, Partner Expectations etc.</p>
                                                                        <div class="form-group">
                                                                                <?php echo $form->textArea($editProfile, 'about_me', array('rows' => 5, 'cols' => 50, 'class' => 'form-control')); ?>
                                                                                <?php echo $form->error($editProfile, 'about_me'); ?>

                                                                        </div>
                                                                        <button type="submit" class="btn row-btn btn-default">Submit</button>
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
