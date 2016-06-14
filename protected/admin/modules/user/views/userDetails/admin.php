<?php
/* @var $this UserDetailsController */
/* @var $model UserDetails */
?>
<style>
    .table th, td{
        text-align: center;
    }
    .table td{
        text-align: center;
    }
    .panel-default {
        overflow-x: scroll;
    }
    #user-details-grid table{
        width: 4200px;
    }
</style>


<div class="page-title">

    <div class="title-env">
        <h1 style="float: left;" class="title">User Details</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage User Details</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage User Details</strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/user/userDetails/create'; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add User Details</span>
        </a>
        <div class="panel panel-default">
            <?php
            Yii::app()->clientScript->registerScript('search', "
            $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
            });
            $('.search-form form').submit(function(){
            $('#user-details-grid').yiiGridView('update', {
            data: $(this).serialize()
            });
            return false;
            });
            ");
            ?>

            <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
            <div class="search-form" style="display:none">
                <?php
                $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                ?>
            </div>
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'user-details-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'user_id',
                    'email',
                    'password',
                    //'contact_number',
                    'profile_for',
                    'first_name',
                    'last_name',
                    'gender',
                    /* 'dob_day',
                      'dob_month',
                      'dob_year', */
                    'religion',
                    'caste',
                    'sub_caste',
                    'nakshatra',
                    'suddha_jadhagam',
                    'regional_site',
                    'marital_status',
                    'mothertongue',
                    'country',
                    'state',
                    'city',
                    'zip_code',
                    'home_town',
                    'house_name',
                    'height',
                    'weight',
                    'skin_tone',
                    'body_type',
                    'health_info',
                    'blood_group',
                    'disablity',
                    'smoke',
                    'drink',
                    'diet',
                    'education_level',
                    'education_field',
                    'working_with',
                    'working_as',
                    'annual_income',
                    'mobile_number',
                    'father_status',
                    'mother_status',
                    'num_of_married_brother',
                    'num_of_unmarried_brother',
                    'num_of_married_sister',
                    'num_of_unmarried_sister',
                    'family_type',
                    'family_value',
                    'affluence_level',
                    'grow_up_in',
                    'about_me',
                    /* 'photo',
                      'mob_num_verification',
                      'id_proof',
                      'register_step',
                      'status',
                      'last_login',
                      'created_by',
                      'profile_approval',
                      'image_approval',
                     */
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{update}{delete}',
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>

