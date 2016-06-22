<?php
/* @var $this UserDetailsController */
/* @var $model UserDetails */
/* @var $form CActiveForm */
?>

<?php if (Yii::app()->user->hasFlash('error')): ?>
        <div class="info">
                <?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
<?php endif; ?>
<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-details-form',
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
        <br/>
        <div class="form-inline">
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'email'); ?>
                        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'password'); ?>
                        <?php echo $form->passwordField($model, 'password', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'password'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'contact_number'); ?>
                        <?php echo $form->textField($model, 'contact_number', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'contact_number'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'profile_for'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'profile_for', CHtml::listData(MasterProfileFor::model()->findAllByAttributes(array('status' => 1)), 'id', 'profile_for'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'profile_for'); ?>
                </div>

                <div class="form-group" style="width: 12.5%">
                        <?php echo $form->labelEx($model, 'first_name'); ?>
                        <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'first_name'); ?>
                </div>

                <div class="form-group" style="width: 12.5%; margin-left: 0px;">
                        <?php echo $form->labelEx($model, 'last_name'); ?>
                        <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'last_name'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'gender'); ?>
                        <?php echo $form->dropDownList($model, 'gender', array(1 => 'Male', 2 => 'Female', 3 => 'Other'), array('empty' => '--Gender--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'gender'); ?>
                </div>
                <br/>
                <div class="form-group" style="width: 8.2%">
                        <label for="UserDetails_dob_day" class="required">Date of birth<span class="required">*</span></label>
                        <?php
                        $day = array();
                        for ($i = 1; $i <= 31; $i++) {
                                $day[sprintf("%02d", $i)] = sprintf("%02d", $i);
                        }
                        ?>
                        <?php echo $form->dropDownList($model, 'dob_day', $day, array('empty' => '--Date--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'dob_day'); ?>
                </div>

                <div class="form-group" style="width: 8.2%; margin-left: 0px;">
                        <label for="UserDetails_dob_day" class="required">&nbsp;</label>
                        <?php $months = array(01 => 'Jan', 02 => 'Feb', 03 => 'Mar', 04 => 'Apr', 05 => 'May', 06 => 'Jun', 07 => 'Jul', 08 => 'Aug', 09 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'); ?>
                        <?php echo $form->dropDownList($model, 'dob_month', $months, array('empty' => '--Month--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'dob_month'); ?>
                </div>

                <div class="form-group" style="width: 8.2%; margin-left: 0px;">
                        <label for="UserDetails_dob_day" class="required">&nbsp;</label>
                        <?php
                        $year = array();
                        for ($i = date("Y", strtotime("-18 year")); $i >= date("Y", strtotime("-69 year")); $i--) {
                                $year[$i] = $i;
                        }
                        ?>
                        <?php echo $form->dropDownList($model, 'dob_year', $year, array('empty' => '--Year--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'dob_year'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'religion'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'religion', CHtml::listData(MasterReligion::model()->findAllByAttributes(array('status' => 1)), 'id', 'religion'), array('empty' => '--Please select a Religon--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'religion'); ?>
                </div>
                <?php
                $caste_options = array();
                if ($model->religion != '') {
                        $castes = MasterCaste::model()->findAllByAttributes(array('religion_id' => $model->religion));
                        if (!empty($castes)) {
                                $caste_options[""] = "--Select--";
                                foreach ($castes as $caste) {
                                        $caste_options[$caste->id] = $caste->caste;
                                }
                        } else {
                                $caste_options[""] = "--Select--";
                                $caste_options[0] = "Other";
                        }
                } else {
                        $caste_options[""] = '--Select--';
                }
                ?>
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'caste'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'caste', $caste_options, array('class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'caste'); ?>
                </div>

                <?php
                $subcaste_options = array();
                if ($model->caste != '') {
                        $subcastes = MasterSubCaste::model()->findAllByAttributes(array('caste_id' => $model->caste));
                        if (!empty($subcastes)) {
                                $subcaste_options[""] = "--Select--";
                                foreach ($subcastes as $subcaste) {
                                        $subcaste_options[$subcaste->id] = $subcaste->sub_caste;
                                }
                        } else {
                                $subcaste_options[""] = "--Select--";
                                $subcaste_options[0] = "Other";
                        }
                } else {
                        $subcaste_options[""] = '--Select--';
                }
                ?>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'sub_caste'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'sub_caste', $subcaste_options, array('class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'sub_caste'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'nakshatra'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'nakshatra', CHtml::listData(MasterNakshatra::model()->findAllByAttributes(array('status' => 1)), 'id', 'nakshatra'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'nakshatra'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'suddha_jadhagam'); ?>
                        <?php echo $form->dropDownList($model, 'suddha_jadhagam', array('1' => 'Yes', '0' => 'No'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'suddha_jadhagam'); ?>
                </div>

                <!--        <div class="form-group">
                <?php //echo $form->labelEx($model, 'regional_site');    ?>
                <?php //echo $form->textField($model, 'regional_site', array('class' => 'form-control')); ?>
                <?php //echo $form->error($model, 'regional_site');   ?>
                        </div>-->

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'marital_status'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'marital_status', CHtml::listData(MasterMaritalStatus::model()->findAllByAttributes(array('status' => 1)), 'id', 'marital_status'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'marital_status'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'mothertongue'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'mothertongue', CHtml::listData(MasterMotherTongue::model()->findAllByAttributes(array('status' => 1)), 'id', 'mother_tongue'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'mothertongue'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'country'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'country'); ?>
                </div>
                <?php
                $state_options = array();
                if ($model->country != '') {
                        $states = MasterState::model()->findAllByAttributes(array('country_id' => $model->country));
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
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'state'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'state', $state_options, array('class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'state'); ?>
                </div>

                <?php
                $city_options = array();
                if ($model->state != '') {
                        $cities = MasterState::model()->findAllByAttributes(array('country_id' => $model->state));
                        if (!empty($cities)) {
                                $city_options[""] = "--Select--";
                                foreach ($cities as $city) {
                                        $city_options[$city->id] = $city->city;
                                }
                        } else {
                                $city_options[""] = "--Select--";
                                $city_options[0] = "Other";
                        }
                } else {
                        $city_options[""] = '--select--';
                }
                ?>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'city'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'city', $city_options, array('class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'city'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'zip_code'); ?>
                        <?php echo $form->textField($model, 'zip_code', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'zip_code'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'home_town'); ?>
                        <?php echo $form->textField($model, 'home_town', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'home_town'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'house_name'); ?>
                        <?php echo $form->textField($model, 'house_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'house_name'); ?>
                </div>


                <div class="form-group">
                        <?php echo $form->labelEx($model, 'height'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'height', CHtml::listData(MasterHeight::model()->findAllByAttributes(array('status' => 1)), 'id', 'height'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'height'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'weight'); ?>
                        <?php
                        $weight = array();
                        for ($i = 30; $i <= 150; $i++) {
                                $weight[sprintf("%02d", $i)] = sprintf("%02d", $i) . ' Kg';
                        }
                        ?>
                        <?php echo $form->dropDownList($model, 'weight', $weight, array('empty' => '--Weight--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'weight'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'skin_tone'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'skin_tone', CHtml::listData(MasterSkinTone::model()->findAllByAttributes(array('status' => 1)), 'id', 'skin_tone'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'skin_tone'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'body_type'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'body_type', CHtml::listData(MasterBodyType::model()->findAllByAttributes(array('status' => 1)), 'id', 'body_type'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'body_type'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'health_info'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'health_info', CHtml::listData(MasterHealthInformation::model()->findAllByAttributes(array('status' => 1)), 'id', 'health_info'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'health_info'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'blood_group'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'blood_group', CHtml::listData(MasterBloodGroup::model()->findAllByAttributes(array('status' => 1)), 'id', 'blood_group'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'blood_group'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'disablity'); ?>
                        <?php echo $form->dropDownList($model, 'disablity', array('0' => 'No', '1' => 'Physically Disabled'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'disablity'); ?>
                </div>
                <br/>
                <div class="form-group" style="width: 12.5%;">
                        <?php echo $form->labelEx($model, 'smoke'); ?>
                        <?php echo $form->dropDownList($model, 'smoke', array('0' => 'No', '1' => 'Yes', '2' => 'Occasionally'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'smoke'); ?>
                </div>

                <div class="form-group" style="width: 12.5%; margin-left: 0px;">
                        <?php echo $form->labelEx($model, 'drink'); ?>
                        <?php echo $form->dropDownList($model, 'drink', array('0' => 'No', '1' => 'Yes', '2' => 'Occasionally'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'drink'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'diet'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'diet', CHtml::listData(MasterDiet::model()->findAllByAttributes(array('status' => 1)), 'id', 'diet'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'diet'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'education_level'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'education_level', CHtml::listData(MasterEducationLevel::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_level'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'education_level'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'education_field'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'education_field', CHtml::listData(MasterEducationField::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_field'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'education_field'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'working_with'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'working_with', CHtml::listData(MasterWorkingWith::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_with'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'working_with'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'working_as'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'working_as', CHtml::listData(MasterWorkingAs::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_as'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'working_as'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'annual_income'); ?>
                        <?php echo $form->textField($model, 'annual_income', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'annual_income'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'mobile_number'); ?>
                        <?php echo $form->textField($model, 'mobile_number', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'mobile_number'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'father_status'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'father_status', CHtml::listData(MasterParentStatus::model()->findAllByAttributes(array('status' => 1), array('condition' => 'category = 3 or category = 1')), 'id', 'parent_status'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'father_status'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'mother_status'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'mother_status', CHtml::listData(MasterParentStatus::model()->findAllByAttributes(array('status' => 1), array('condition' => 'category = 3 or category = 2')), 'id', 'parent_status'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'mother_status'); ?>
                </div>

                <div class="form-group" style="width: 12.5%; ">
                        <label for="UserDetails_num_of_married_brother" class="required">Brother's</label>
                        <?php echo $form->numberField($model, 'num_of_married_brother', array('class' => 'form-control', 'placeholder' => 'Married')); ?>
                        <?php echo $form->error($model, 'num_of_married_brother'); ?>
                </div>

                <div class="form-group" style="width: 12.5%; margin-left: 0px;">
                        <label for="UserDetails_num_of_unmarried_brother" class="required">&nbsp;</label>
                        <?php echo $form->numberField($model, 'num_of_unmarried_brother', array('class' => 'form-control', 'placeholder' => 'Unmarried')); ?>
                        <?php echo $form->error($model, 'num_of_unmarried_brother'); ?>
                </div>

                <div class="form-group" style="width: 12.5%; ">
                        <label for="UserDetails_num_of_married_sister" class="required"> Sister's</label>
                        <?php echo $form->numberField($model, 'num_of_married_sister', array('class' => 'form-control', 'placeholder' => 'Married')); ?>
                        <?php echo $form->error($model, 'num_of_married_sister'); ?>
                </div>

                <div class="form-group" style="width: 12.5%; margin-left: 0px;">
                        <label for="UserDetails_num_of_unmarried_sister" class="required">&nbsp;</label>
                        <?php echo $form->numberField($model, 'num_of_unmarried_sister', array('class' => 'form-control', 'placeholder' => 'Unmarried')); ?>
                        <?php echo $form->error($model, 'num_of_unmarried_sister'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'family_type'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'family_type', CHtml::listData(MasterFamilyType::model()->findAllByAttributes(array('status' => 1)), 'id', 'family_type'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'family_type'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'family_value'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'family_value', CHtml::listData(MasterFamilyValue::model()->findAllByAttributes(array('status' => 1)), 'id', 'family_value'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'family_value'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'affluence_level'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'affluence_level', CHtml::listData(MasterAffluenceLevel::model()->findAllByAttributes(array('status' => 1)), 'id', 'affluence_level'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'affluence_level'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'grow_up_in'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'grow_up_in', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'grow_up_in'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'plan_id'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'plan_id', CHtml::listData(Plans::model()->findAllByAttributes(array('status' => 1)), 'id', 'plan_name'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'plan_id'); ?>
                </div>

                <div class="form-group" style="    width: 80%;">
                        <?php echo $form->labelEx($model, 'about_me'); ?>
                        <?php echo $form->textArea($model, 'about_me', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'about_me'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'photo'); ?>
                        <?php echo $form->fileField($model, 'photo', array('size' => 60, 'maxlength' => 99, 'class' => 'form-control')); ?>
                        <?php
                        if ($model->photo != '' && $model->id != "") {
                                $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                                echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $model->id . '/profile/' . $model->photo . '" />';
                        }
                        ?>
                        <?php echo $form->error($model, 'photo'); ?>
                </div>



                <div class="form-group">
                        <?php echo $form->labelEx($model, 'id_proof'); ?>
                        <?php echo $form->fileField($model, 'id_proof', array('size' => 60, 'maxlength' => 99, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'id_proof'); ?>
                </div>



                <div class="form-group">
                        <?php echo $form->labelEx($model, 'status'); ?>
                        <?php echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '0' => 'Disabled'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                </div>



        </div>
        <div class="form-group btns">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>
        <script>
                $(document).ready(function () {

                        /* Religion change function*/
                        $('#UserDetails_religion').change(function () {
                                var religion = $(this).val();
                                if (religion != '') {
                                        $.ajax({
                                                type: "POST",
                                                url: baseurl + "ajax/selectCaste",
                                                data: {religion: religion}
                                        }).done(function (data) {
                                                $('#UserDetails_caste').html(data);
                                        });
                                } else {
                                        $('#UserDetails_caste').html("<option value=''>--Select--</option>");
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
                                                $('#UserDetails_sub_caste').html(data);
                                        });
                                } else {
                                        $('#UserDetails_sub_caste').html("<option value=''>--Select--</option>");
                                }
                        });


                        /*country change function */

                        $('#UserDetails_country').change(function () {
                                var country = $(this).val();
                                if (country != '') {
                                        $.ajax({
                                                type: "POST",
                                                url: baseurl + "ajax/selectState",
                                                data: {country: country}
                                        }).done(function (data) {
                                                $('#UserDetails_state').html(data);
                                        });
                                } else {
                                        $('#UserDetails_state').html("<option value=''>--Selec--</option>");
                                }
                        });

                        /*state change function */

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

                });

        </script>

</div><!-- form -->