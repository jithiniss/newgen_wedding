<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>
<section class="login">
    <div class="container wishes">
        <div class="row">
            <div class="col-md-12 ">



                <div class="col-md-8 col-sm-12 col-xs-12 prime">

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'register-vendor-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation' => true,
                    ));
                    ?>
                    <h1>Vendor Register</h1>

                    <div class="zeros">
                        <?php if(Yii::app()->user->hasFlash('vendor_register_error1')): ?>
                                <div class="alert alert-danger">
                                    <?php echo Yii::app()->user->getFlash('vendor_register_error1'); ?>
                                </div>
                        <?php endif; ?>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Name <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-4 col-xs-4 zeros">
                                <div class="form-group">
                                    <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps', 'placeholder' => 'First Name')); ?>
                                    <?php echo $form->error($model, 'first_name'); ?>
                                </div>
                            </div>

                            <div class="col-sm-4 col-xs-4 zeros">
                                <div class="form-group">

                                    <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps', 'placeholder' => 'Last Name')); ?>
                                    <?php echo $form->error($model, 'last_name'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Email <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps', 'placeholder' => 'Email Address')); ?>
                                    <?php echo $form->error($model, 'email'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">User Name <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo $form->textField($model, 'user_name', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps', 'placeholder' => 'User Name')); ?>
                                    <?php echo $form->error($model, 'user_name'); ?>
                                </div>
                            </div>

                        </div>


                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Password <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo $form->passwordField($model, 'password', array('size' => 50, 'maxlength' => 50, 'class' => 'ui_apps', 'placeholder' => 'Enter Strong Password')); ?>
                                    <?php echo $form->error($model, 'password'); ?>
                                </div>
                            </div>

                        </div>




                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Gender <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <?php
                                echo $form->radioButtonList($model, 'gender', array(1 => 'Male',
                                    2 => 'Female',
                                    3 => 'Other'), array(
                                    'labelOptions' => array('style' => 'display:inline'), // add this code
                                    'separator' => '  ',
                                ));
                                ?>

                                <?php echo $form->error($model, 'gender'); ?>
                            </div>
                        </div>


                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Date of Birth <span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
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
                                            'class' => 'ui_apps',
                                            'placeholder' => 'Date Of Birth',
                                        ),
                                    ));
                                    ?>
                                    <?php echo $form->error($model, 'dob'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Phone No 1<span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo $form->textField($model, 'phone_no1', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps', 'placeholder' => 'Phone No 1')); ?>
                                    <?php echo $form->error($model, 'phone_no1'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Phone No 2</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo $form->textField($model, 'phone_no2', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps', 'placeholder' => 'Phone No 2')); ?>
                                    <?php echo $form->error($model, 'phone_no2'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Fax</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo $form->textField($model, 'fax', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps', 'placeholder' => 'Fax No')); ?>
                                    <?php echo $form->error($model, 'fax'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Country<span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--Please select--', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($model, 'country'); ?>
                                </div>
                            </div>

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
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">State<span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($model, 'state', $state_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($model, 'state'); ?>
                                </div>
                            </div>

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
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">City<span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($model, 'city', $city_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($model, 'city'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Street<span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">

                                    <?php echo $form->textField($model, 'street', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($model, 'street'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Business Type<span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">
                                    <?php echo CHtml::activeDropDownList($model, 'business_type', CHtml::listData(MasterBusiness::model()->findAll(), 'id', 'type'), array('empty' => '--Please select--', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($model, 'business_type'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Company Name</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">

                                    <?php echo $form->textField($model, 'company_name', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($model, 'company_name'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Company Website</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">

                                    <?php echo $form->textField($model, 'company_website_link', array('size' => 60, 'maxlength' => 100, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($model, 'company_website_link'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Company Address</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">

                                    <?php echo $form->textArea($model, 'company_address', array('rows' => 8, 'cols' => 50, 'class' => 'ui_apps', 'style' => 'height: 100px;')); ?>
                                    <?php echo $form->error($model, 'company_address'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Our Services<span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">

                                    <?php echo $form->textArea($model, 'our_services', array('rows' => 8, 'cols' => 50, 'class' => 'ui_apps', 'style' => 'height: 100px;')); ?>
                                    <?php echo $form->error($model, 'our_services'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common tops">
                            <div class="col-sm-8 col-xs-8 zeros">
                                <input type="checkbox" name="agree" value="1" id="vendor_agree"> &nbsp; &nbsp; I agree to the <a class="privacy" href="#">Privacy Policy</a> and <a class="privacy" href="#">T&C</a>
                                <div id="agrees"></div>
                            </div>
                            <div class="col-sm-4 col-xs-4 zeros">

                                <button type="submit" class="btn sub-btn btn-default">Submit</button>
                            </div>
                        </div>

                    </div>

                    <?php $this->endWidget(); ?>

                </div>


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



            </div>

        </div>
    </div>
</section>


<script>

        $(document).ready(function () {
            $('#register-vendor-form').submit(function () {

                if ($('#vendor_agree').prop('checked')) {

                    $('#agrees').html('').hide();
                    return true;
                } else {
                    $('#agrees').html('Please agree to the Privacy Policy and T&C.').show();
                    return false;
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