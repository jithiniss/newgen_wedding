<?php
/* @var $this VendorDetailsController */
/* @var $model VendorDetails */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'vendor-details-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <br/>
    <div class="form-inline">


        <div class="form-group">
            <?php echo $form->labelEx($model, 'first_name'); ?>
            <?php echo $form->textField($model, 'first_name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'first_name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'last_name'); ?>
            <?php echo $form->textField($model, 'last_name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'last_name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'user_name'); ?>
            <?php echo $form->textField($model, 'user_name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'user_name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>



        <div class="form-group">
            <?php echo $form->labelEx($model, 'dob'); ?>
            <?php
            $from = date('Y') - 80;
            $to = date('Y') - 16;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'dob',
                'value' => 'dob',
                'options' => array(
                    'dateFormat' => 'dd-mm-yy',
                    'changeYear' => true, // can change year
                    'changeMonth' => true, // can change month
                    'yearRange' => $from . ':' . $to, // range of year
                    'showButtonPanel' => true, // show button panel
                ),
                'htmlOptions' => array(
                    'size' => '10', // textField size
                    'maxlength' => '10', // textField maxlength
                    'class' => 'form-control',
                    'placeholder' => 'Date Of Birth',
                ),
            ));
            ?>
            <?php echo $form->error($model, 'dob'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'gender'); ?>
            <?php echo $form->dropDownList($model, 'gender', array(1 => 'Male', 2 => 'Female', 3 => 'Other'), array('empty' => '--Gender--', 'class' => 'form-control')); ?>

            <?php echo $form->error($model, 'gender'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'phone_no1'); ?>
            <?php echo $form->textField($model, 'phone_no1', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'phone_no1'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'phone_no2'); ?>
            <?php echo $form->textField($model, 'phone_no2', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'phone_no2'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'fax'); ?>
            <?php echo $form->textField($model, 'fax', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'fax'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'country'); ?>
            <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
            <?php echo $form->error($model, 'country'); ?>
        </div>
        <?php
        $state_options = array();
        if($model->country != '') {
                $states = MasterState::model()->findAllByAttributes(array('country_id' => $model->country));
                if(!empty($states)) {
                        $state_options[""] = "--Select--";
                        foreach($states as $state) {
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
        if($model->state != 0) {
                $cities = MasterCity::model()->findAllByAttributes(array('state_id' => $model->state));
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

        <div class="form-group">
            <?php echo $form->labelEx($model, 'city'); ?>
            <?php echo CHtml::activeDropDownList($model, 'city', $city_options, array('class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
            <?php echo $form->error($model, 'city'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'street'); ?>
            <?php echo $form->textField($model, 'street', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'street'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'business_type'); ?>
            <?php echo CHtml::activeDropDownList($model, 'business_type', CHtml::listData(MasterBusiness::model()->findAll(), 'id', 'type'), array('empty' => '--Please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>

            <?php echo $form->error($model, 'business_type'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'company_name'); ?>
            <?php echo $form->textField($model, 'company_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'company_name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'company_website_link'); ?>
            <?php echo $form->textField($model, 'company_website_link', array('size' => 60, 'maxlength' => 300, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'company_website_link'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'company_address'); ?>
            <?php echo $form->textArea($model, 'company_address', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'company_address'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'our_services'); ?>
            <?php echo $form->textArea($model, 'our_services', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'our_services'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'photo'); ?>
            <?php echo $form->fileField($model, 'photo', array('size' => 60, 'maxlength' => 99, 'class' => 'form-control')); ?>
            <?php
            if($model->photo != '' && $model->id != "") {
                    $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                    echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/vendor/' . $folder . '/' . $model->id . '/profile/' . $model->photo . '" />';
            }
            ?>
            <?php echo $form->error($model, 'photo'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'approval_status'); ?>
            <?php echo $form->dropDownList($model, 'approval_status', array(0 => 'Pending', 1 => 'Approved', 2 => 'Declined'), array('empty' => '--Approval Status--', 'class' => 'form-control')); ?>

            <?php echo $form->error($model, 'approval_status'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList($model, 'status', array(0 => 'In-Active', 1 => 'Active'), array('empty' => '--Status--', 'class' => 'form-control')); ?>

            <?php echo $form->error($model, 'status'); ?>
        </div>


    </div>
    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
        $(document).ready(function () {



            /*country change function */

            $('#VendorDetails_country').change(function () {
                var country = $(this).val();
                if (country != '') {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "ajax/selectState",
                        data: {country: country}
                    }).done(function (data) {
                        $('#VendorDetails_state').html(data);
                    });
                } else {
                    $('#VendorDetails_state').html("<option value=''>--Selec--</option>");
                }
            });

            /*state change function */

            $('#VendorDetails_state').change(function () {
                var state = $(this).val();

                if (state != '') {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "ajax/selectCity",
                        data: {state: state}
                    }).done(function (data) {
                        $('#VendorDetails_city').html(data);
                    });
                } else {
                    $('#VendorDetails_city').html("<option value=''>--Select--</option>");
                }
            });

        });

</script>