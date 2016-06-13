<?php
/* @var $this UserDetailsController */
/* @var $model UserDetails */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="form-inline">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'user_id'); ?>
            <?php echo $form->textField($model, 'user_id', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'user_id'); ?>
        </div>

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
            <?php echo $form->textField($model, 'profile_for', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'profile_for'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'first_name'); ?>
            <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'first_name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'last_name'); ?>
            <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'last_name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'gender'); ?>
            <?php echo $form->textField($model, 'gender', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'gender'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'dob_day'); ?>
            <?php echo $form->textField($model, 'dob_day', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'dob_day'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'dob_month'); ?>
            <?php echo $form->textField($model, 'dob_month', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'dob_month'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'dob_year'); ?>
            <?php echo $form->textField($model, 'dob_year', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'dob_year'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'religion'); ?>
            <?php echo $form->textField($model, 'religion', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'religion'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'caste'); ?>
            <?php echo $form->textField($model, 'caste', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'caste'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'sub_caste'); ?>
            <?php echo $form->textField($model, 'sub_caste', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'sub_caste'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'nakshatra'); ?>
            <?php echo $form->textField($model, 'nakshatra', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'nakshatra'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'suddha_jadhagam'); ?>
            <?php echo $form->textField($model, 'suddha_jadhagam', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'suddha_jadhagam'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'regional_site'); ?>
            <?php echo $form->textField($model, 'regional_site', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'regional_site'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'marital_status'); ?>
            <?php echo $form->textField($model, 'marital_status', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'marital_status'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'mothertongue'); ?>
            <?php echo $form->textField($model, 'mothertongue', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'mothertongue'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'country'); ?>
            <?php echo $form->textField($model, 'country', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'country'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'state'); ?>
            <?php echo $form->textField($model, 'state', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'state'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'city'); ?>
            <?php echo $form->textField($model, 'city', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'city'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'zip_code'); ?>
            <?php echo $form->textField($model, 'zip_code', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'zip_code'); ?>
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
            <?php echo $form->textField($model, 'blood_group', array('class' => 'form-control')); ?>
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
            <?php echo $form->labelEx($model, 'mob_num_verification'); ?>
            <?php echo $form->textField($model, 'mob_num_verification', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'mob_num_verification'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'id_proof'); ?>
            <?php echo $form->textField($model, 'id_proof', array('size' => 60, 'maxlength' => 99, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'id_proof'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'register_step'); ?>
            <?php echo $form->textField($model, 'register_step', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'register_step'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->textField($model, 'status', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'last_login'); ?>
            <?php echo $form->textField($model, 'last_login', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'last_login'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'created_by'); ?>
            <?php echo $form->textField($model, 'created_by', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'created_by'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'profile_approval'); ?>
            <?php echo $form->textField($model, 'profile_approval', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'profile_approval'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'image_approval'); ?>
            <?php echo $form->textField($model, 'image_approval', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'image_approval'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'cb'); ?>
            <?php echo $form->textField($model, 'cb', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'cb'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'ub'); ?>
            <?php echo $form->textField($model, 'ub', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'ub'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'doc'); ?>
            <?php echo $form->textField($model, 'doc', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'doc'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'dou'); ?>
            <?php echo $form->textField($model, 'dou', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'dou'); ?>
        </div>

    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->