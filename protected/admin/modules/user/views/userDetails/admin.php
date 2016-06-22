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
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update}{delete}',
                                ),
                                array(
                                    'name' => 'photo',
                                    'value' => function($data) {
                                            if ($data->photo == "") {
                                                    if ($data->gender == 2) {
                                                            return '<img width="65" height="65" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/images/w1.jpg" />';
                                                    } else if ($data->gender == 1) {
                                                            return '<img width="65" height="65" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/images/pp.jpg" />';
                                                    }
                                            } else {
                                                    $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                                    return '<img width="65" height="65" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/user/' . $folder . '/' . $data->id . '/profile/' . $data->photo . '" />';
                                            }
                                    },
                                    'type' => 'raw'
                                ),
                                'user_id',
                                'email',
                                'password',
                                //'contact_number',
                                array(
                                    'name' => 'profile_for',
                                    'filter' => CHtml::listData(MasterProfileFor::model()->findAllByAttributes(array('status' => 1)), 'id', 'profile_for'),
                                    'value' => function($data) {
                                    return MasterProfileFor::model()->findByPk($data->profile_for)->profile_for;
                            }
                                ),
                                'first_name',
                                'last_name',
                                array(
                                    'name' => 'gender',
                                    'filter' => array('1' => 'Male', '2' => 'Female'),
                                    'value' => function($data) {
                                    return $data->gender == 1 ? 'Male' : 'Female';
                            }
                                ),
                                /* 'dob_day',
                                  'dob_month',
                                  'dob_year', */
                                array(
                                    'name' => 'religion',
                                    'filter' => CHtml::listData(MasterReligion::model()->findAllByAttributes(array('status' => 1)), 'id', 'religion'),
                                    'value' => function($data) {
                                    return MasterReligion::model()->findByPk($data->religion)->religion;
                            }
                                ),
                                array(
                                    'name' => 'caste',
                                    'filter' => CHtml::listData(MasterCaste::model()->findAllByAttributes(array('status' => 1)), 'id', 'caste'),
                                    'value' => function($data) {
                                    return MasterCaste::model()->findByPk($data->caste)->caste;
                            }
                                ),
                                array(
                                    'name' => 'sub_caste',
                                    'filter' => CHtml::listData(MasterSubCaste::model()->findAllByAttributes(array('status' => 1)), 'id', 'sub_caste'),
                                    'value' => function($data) {
                                    return MasterSubCaste::model()->findByPk($data->sub_caste)->sub_caste;
                            }
                                ),
                                array(
                                    'name' => 'nakshatra',
                                    'filter' => CHtml::listData(MasterNakshatra::model()->findAllByAttributes(array('status' => 1)), 'id', 'nakshatra'),
                                    'value' => function($data) {
                                    return MasterNakshatra::model()->findByPk($data->nakshatra)->nakshatra;
                            }
                                ),
                                array(
                                    'name' => 'suddha_jadhagam',
                                    'filter' => array('1' => 'Yes', '0' => 'No'),
                                    'value' => function($data) {
                                    return $data->suddha_jadhagam == 1 ? 'Yes' : 'No';
                            }
                                ),
                                array(
                                    'name' => 'marital_status',
                                    'filter' => CHtml::listData(MasterMaritalStatus::model()->findAllByAttributes(array('status' => 1)), 'id', 'marital_status'),
                                    'value' => function($data) {
                                    return MasterMaritalStatus::model()->findByPk($data->marital_status)->marital_status;
                            }
                                ),
//                                'regional_site',
                                array(
                                    'name' => 'mothertongue',
                                    'filter' => CHtml::listData(MasterMotherTongue::model()->findAllByAttributes(array('status' => 1)), 'id', 'mothertongue'),
                                    'value' => function($data) {
                                    return MasterMotherTongue::model()->findByPk($data->mothertongue)->mother_tongue;
                            }
                                ),
                                array(
                                    'name' => 'country',
                                    'filter' => CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'),
                                    'value' => function($data) {
                                    return MasterCountry::model()->findByPk($data->country)->country;
                            }
                                ),
                                array(
                                    'name' => 'state',
                                    'filter' => CHtml::listData(MasterState::model()->findAllByAttributes(array('status' => 1)), 'id', 'state'),
                                    'value' => function($data) {
                                    return MasterState::model()->findByPk($data->state)->state;
                            }
                                ),
                                array(
                                    'name' => 'city',
                                    'filter' => CHtml::listData(MasterCity::model()->findAllByAttributes(array('status' => 1)), 'id', 'city'),
                                    'value' => function($data) {
                                    return MasterCity::model()->findByPk($data->city)->city;
                            }
                                ),
                                'zip_code',
                                'home_town',
                                'house_name',
                                array(
                                    'name' => 'height',
                                    'filter' => CHtml::listData(MasterHeight::model()->findAllByAttributes(array('status' => 1)), 'id', 'height'),
                                    'value' => function($data) {
                                    return MasterHeight::model()->findByPk($data->height)->height;
                            }
                                ),
                                'weight',
                                array(
                                    'name' => 'skin_tone',
                                    'filter' => CHtml::listData(MasterSkinTone::model()->findAllByAttributes(array('status' => 1)), 'id', 'skin_tone'),
                                    'value' => function($data) {
                                    return MasterSkinTone::model()->findByPk($data->skin_tone)->skin_tone;
                            }
                                ),
                                array(
                                    'name' => 'body_type',
                                    'filter' => CHtml::listData(MasterBodyType::model()->findAllByAttributes(array('status' => 1)), 'id', 'body_type'),
                                    'value' => function($data) {
                                    return MasterBodyType::model()->findByPk($data->body_type)->body_type;
                            }
                                ),
                                array(
                                    'name' => 'health_info',
                                    'filter' => CHtml::listData(MasterHealthInformation::model()->findAllByAttributes(array('status' => 1)), 'id', 'health_info'),
                                    'value' => function($data) {
                                    return MasterHealthInformation::model()->findByPk($data->health_info)->health_info;
                            }
                                ),
                                array(
                                    'name' => 'blood_group',
                                    'filter' => CHtml::listData(MasterBloodGroup::model()->findAllByAttributes(array('status' => 1)), 'id', 'blood_group'),
                                    'value' => function($data) {
                                    return MasterBloodGroup::model()->findByPk($data->blood_group)->blood_group;
                            }
                                ),
                                array(
                                    'name' => 'disablity',
                                    'filter' => array('0' => 'No', '1' => 'Physically Disabled'),
                                    'value' => function($data) {
                                    return $data->disablity == 1 ? 'Physically Disabled' : 'No';
                            }
                                ),
                                array(
                                    'name' => 'smoke',
                                    'filter' => array('0' => 'No', '1' => 'Yes', '2' => 'Occasionally'),
                                    'value' => function($data) {
                                    if ($data->smoke == 1) {
                                            $result = 'Physically Disabled';
                                    } else if ($data->smoke == 2) {
                                            $result = 'Yes';
                                    } else {
                                            $result = 'No';
                                    }
                                    return $result;
                            }
                                ),
                                array(
                                    'name' => 'drink',
                                    'filter' => array('0' => 'No', '1' => 'Yes', '2' => 'Occasionally'),
                                    'value' => function($data) {
                                    if ($data->drink == 1) {
                                            $result = 'Physically Disabled';
                                    } else if ($data->drink == 2) {
                                            $result = 'Yes';
                                    } else {
                                            $result = 'No';
                                    }
                                    return $result;
                            }
                                ),
                                array(
                                    'name' => 'diet',
                                    'filter' => CHtml::listData(MasterDiet::model()->findAllByAttributes(array('status' => 1)), 'id', 'diet'),
                                    'value' => function($data) {
                                    return MasterDiet::model()->findByPk($data->diet)->diet;
                            }
                                ),
                                array(
                                    'name' => 'education_level',
                                    'filter' => CHtml::listData(MasterEducationLevel::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_level'),
                                    'value' => function($data) {
                                    return MasterEducationLevel::model()->findByPk($data->education_level)->education_level;
                            }
                                ),
                                array(
                                    'name' => 'education_field',
                                    'filter' => CHtml::listData(MasterEducationField::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_field'),
                                    'value' => function($data) {
                                    return MasterEducationField::model()->findByPk($data->education_field)->education_field;
                            }
                                ),
                                array(
                                    'name' => 'working_with',
                                    'filter' => CHtml::listData(MasterWorkingWith::model()->findAllByAttributes(array('status' => 1)), 'id', 'education_field'),
                                    'value' => function($data) {
                                    return MasterWorkingWith::model()->findByPk($data->working_with)->working_with;
                            }
                                ),
                                array(
                                    'name' => 'working_as',
                                    'filter' => CHtml::listData(MasterWorkingAs::model()->findAllByAttributes(array('status' => 1)), 'id', 'working_as'),
                                    'value' => function($data) {
                                    return MasterWorkingAs::model()->findByPk($data->working_as)->working_as;
                            }
                                ),
                                'annual_income',
                                'mobile_number',
                                array(
                                    'name' => 'father_status',
                                    'filter' => CHtml::listData(MasterParentStatus::model()->findAllByAttributes(array('status' => 1), array('condition' => 'category = 3 or category = 1')), 'id', 'parent_status'),
                                    'value' => function($data) {
                                    return MasterParentStatus::model()->findByPk($data->father_status)->parent_status;
                            }
                                ),
                                array(
                                    'name' => 'mother_status',
                                    'filter' => CHtml::listData(MasterParentStatus::model()->findAllByAttributes(array('status' => 1), array('condition' => 'category = 3 or category = 2')), 'id', 'parent_status'),
                                    'value' => function($data) {
                                    return MasterParentStatus::model()->findByPk($data->mother_status)->parent_status;
                            }
                                ),
                                'num_of_married_brother',
                                'num_of_unmarried_brother',
                                'num_of_married_sister',
                                'num_of_unmarried_sister',
                                array(
                                    'name' => 'family_type',
                                    'filter' => CHtml::listData(MasterFamilyType::model()->findAllByAttributes(array('status' => 1)), 'id', 'family_type'),
                                    'value' => function($data) {
                                    return MasterFamilyType::model()->findByPk($data->family_type)->family_type;
                            }
                                ),
                                array(
                                    'name' => 'family_value',
                                    'filter' => CHtml::listData(MasterFamilyValue::model()->findAllByAttributes(array('status' => 1)), 'id', 'family_value'),
                                    'value' => function($data) {
                                    return MasterFamilyValue::model()->findByPk($data->family_value)->family_value;
                            }
                                ),
                                array(
                                    'name' => 'affluence_level',
                                    'filter' => CHtml::listData(MasterAffluenceLevel::model()->findAllByAttributes(array('status' => 1)), 'id', 'affluence_level'),
                                    'value' => function($data) {
                                    return MasterAffluenceLevel::model()->findByPk($data->affluence_level)->affluence_level;
                            }
                                ),
                                array(
                                    'name' => 'grow_up_in',
                                    'filter' => CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'),
                                    'value' => function($data) {
                                    return MasterCountry::model()->findByPk($data->grow_up_in)->country;
                            }
                                ),
                                'about_me',
                                array(
                                    'name' => 'status',
                                    'filter' => array('0' => 'Desabled', '1' => 'Enabled'),
                                    'value' => function($data) {
                                    return $data->disablity == 1 ? 'Enabled ' : 'Desabled';
                            }
                                ),
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

