<?php
/* @var $this UserDetailsController */
/* @var $model UserDetails */
/* @var $form CActiveForm */
?>
<style>

</style>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-details-form',
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

        <div class="form-group">
            <?php echo $form->labelEx($model, 'caste'); ?>
            <?php echo CHtml::activeDropDownList($model, 'religion', array(), array('empty' => '--Select a Religion to load Caste--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
            <?php echo $form->error($model, 'caste'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'sub_caste'); ?>
            <?php echo CHtml::activeDropDownList($model, 'religion', array(), array('empty' => '--Select a Caste to load Sub-caste--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
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
        <?php //echo $form->labelEx($model, 'regional_site'); ?>
        <?php //echo $form->textField($model, 'regional_site', array('class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'regional_site'); ?>
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

        <div class="form-group">
            <?php echo $form->labelEx($model, 'state'); ?>
            <?php echo CHtml::activeDropDownList($model, 'state', array(), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
            <?php echo $form->error($model, 'state'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'city'); ?>
            <?php echo CHtml::activeDropDownList($model, 'city', array(), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
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
            <?php echo $form->textField($model, 'height', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'height'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'weight'); ?>
            <?php echo $form->textField($model, 'weight', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'weight'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'skin_tone'); ?>
            <?php echo $form->textField($model, 'skin_tone', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'skin_tone'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'body_type'); ?>
            <?php echo $form->textField($model, 'body_type', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'body_type'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'health_info'); ?>
            <?php echo $form->textField($model, 'health_info', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'health_info'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'blood_group'); ?>
            <?php echo CHtml::activeDropDownList($model, 'profile_for', CHtml::listData(MasterBloodGroup::model()->findAllByAttributes(array('status' => 1)), 'id', 'blood_group'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
            <?php echo $form->error($model, 'blood_group'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'disablity'); ?>
            <?php echo $form->textField($model, 'disablity', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'disablity'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'smoke'); ?>
            <?php echo $form->textField($model, 'smoke', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'smoke'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'drink'); ?>
            <?php echo $form->textField($model, 'drink', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'drink'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'diet'); ?>
            <?php echo $form->textField($model, 'diet', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'diet'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'education_level'); ?>
            <?php echo $form->textField($model, 'education_level', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'education_level'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'education_field'); ?>
            <?php echo $form->textField($model, 'education_field', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'education_field'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'working_with'); ?>
            <?php echo $form->textField($model, 'working_with', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'working_with'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'working_as'); ?>
            <?php echo $form->textField($model, 'working_as', array('class' => 'form-control')); ?>
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
            <?php echo $form->textField($model, 'father_status', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'father_status'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'mother_status'); ?>
            <?php echo $form->textField($model, 'mother_status', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'mother_status'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'num_of_married_brother'); ?>
            <?php echo $form->textField($model, 'num_of_married_brother', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'num_of_married_brother'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'num_of_unmarried_brother'); ?>
            <?php echo $form->textField($model, 'num_of_unmarried_brother', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'num_of_unmarried_brother'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'num_of_married_sister'); ?>
            <?php echo $form->textField($model, 'num_of_married_sister', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'num_of_married_sister'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'num_of_unmarried_sister'); ?>
            <?php echo $form->textField($model, 'num_of_unmarried_sister', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'num_of_unmarried_sister'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'family_type'); ?>
            <?php echo $form->textField($model, 'family_type', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'family_type'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'family_value'); ?>
            <?php echo $form->textField($model, 'family_value', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'family_value'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'affluence_level'); ?>
            <?php echo $form->textField($model, 'affluence_level', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'affluence_level'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'grow_up_in'); ?>
            <?php echo $form->textField($model, 'grow_up_in', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'grow_up_in'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'about_me'); ?>
            <?php echo $form->textArea($model, 'about_me', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'about_me'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'photo'); ?>
            <?php echo $form->textField($model, 'photo', array('size' => 60, 'maxlength' => 99, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'photo'); ?>
        </div>



        <div class="form-group">
            <?php echo $form->labelEx($model, 'id_proof'); ?>
            <?php echo $form->textField($model, 'id_proof', array('size' => 60, 'maxlength' => 99, 'class' => 'form-control')); ?>
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

</div><!-- form -->