<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>
<section class="religion">
    <div class="container">
        <div class="row">

            <?php
            $this->renderPartial('_leftSide');
            ?>
            <div class="col-md-9 any nop">
                <h4><?php echo ucwords($myProfile->first_name . ' ' . $myProfile->last_name); ?> -
                    <?php echo ucwords($myProfile->user_id); ?>
                </h4>
                <div class="pull-right">
                    <p>Fields in bold cannot be edited. Please contact customer care for any queries.</p>
                </div>
                <div class="clearfix"></div>
                <span class="labz">&nbsp;</span>


                <div class="care">
                    <div class="content">
                        <div class="box-1">
                            <div class="box">
                                <form method="post" enctype="multipart/form-data"  id="profile_form">

                                    <input type="file" name="UserDetails[photo]" id="file-6" class="inputfile inputfile-5 profile_pics"/>


                                </form>
                                <label for="file-6" id="ajax_pics" style="position: relative;cursor: pointer;">
                                    <div style="
                                         position: absolute;    height: 212px;
                                         top: 0px;
                                         left: 0px;
                                         padding: 81px;display: none;background-color:#d2d2d2;background-image: url(<?= Yii::app()->baseUrl; ?>/images/profile_loader.gif); background-repeat: no-repeat;background-position: center; " id="loading_prof">


                                    </div>
                                    <?php
                                    if ($myProfile->photo != "") {
                                            $folder = Yii::app()->Upload->folderName(0, 1000, $myProfile->id);
                                            $userPic = explode('.', $myProfile->photo);

                                            echo '<img class="img-responsive" src="' . Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $myProfile->id . '/profile/' . $userPic[0] . '_163_212.' . $userPic[1] . '" />';
                                            ?>

                                    <?php } else {
                                            ?>
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/images/upload.jpg">
                                    <?php }
                                    ?>
                                </label>





                            </div>
                        </div>



                        <div class="box-2">
                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Age / Height</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz"><?php echo date('Y') - date('Y', strtotime($myProfile->dob_year)); ?>
                                        <?php
                                        if ($myProfile->height != 0) {
                                                echo " / " . MasterHeight::model()->findByPk($myProfile->height)->height;
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Marital Status</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">
                                        <?php
                                        if ($myProfile->marital_status != 0) {
                                                echo MasterMaritalStatus::model()->findByPk($myProfile->marital_status)->marital_status;
                                        } else {
                                                echo '--';
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Posted by</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">

                                        <?php
                                        if ($myProfile->profile_for != 0) {
                                                echo MasterProfileFor::model()->findByPk($myProfile->profile_for)->profile_for;
                                        } else {
                                                echo '--';
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Religion / Community</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">
                                        <?php
                                        if ($myProfile->religion != 0) {
                                                echo MasterReligion::model()->findByPk($myProfile->religion)->religion;
                                        }
                                        ?>
                                        <?php
                                        if ($myProfile->caste != 0) {
                                                echo " / " . MasterCaste::model()->findByPk($myProfile->caste)->caste;
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>


                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Location</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">
                                        <?php
                                        if ($myProfile->city != 0 || $myProfile->city != "") {

                                                echo MasterCity::model()->findByPk($myProfile->city)->city;
                                        } else {
                                                echo '--';
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>


                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Mother Tongue	</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">Malayalam</label>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="zeros">

                        <div class="strip">


                            <span class="sets">Manage your profile</span>





                            <ul class="list-unstyled">
                                <li><?php echo CHtml::link('Edit Personal Profile', array('profile/EditProfile')); ?></li>
                                <li><?php echo CHtml::link('Edit Partner Preferences', array('profile/PartnerPreference')); ?></li>
                                <li><?php echo CHtml::link('Edit Contact Details', array('settings/index')); ?></li>

                                <li><a href="#">View Profile Status</a></li>
                                <li><?php echo CHtml::link('Add Photos', array('Profile/MyPhotos')); ?></li>
                                <li><?php echo CHtml::link('Hobbies & Interests', array('profile/HobbiesInterest')); ?></li>
                                <li><a href="#">Set Contact Filters</a></li>
                                <li><a href="#">Hide / Delete Profile</a></li>
                                <li><?php echo CHtml::link('Facebook Link', array('/user')); ?></li>
                                <li><?php echo CHtml::link('Documents', array('/user/document')); ?></li>


                            </ul>
                        </div>

                    </div>


                    <div class="clearfix"></div>
                    <div class="zeros">
                        <!--****-->



                        <div class="strip">
                            <div class="rels">
                                <div class="rel-1">
                                    <h2>Personality, Family Details, Career, Partner Expectations etc. </h2>
                                </div>

                                <div class="rel-2">
                                    <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/EditProfile', '#' => 'aboutme'), array('class' => 'edit')); ?></h6>
                                </div>
                            </div>
                            <div class="strip-padding">


                                <div class="common">
                                    <div class="col-sm-12 col-xs-12 zeros">
                                        <p>
                                            <?php
                                            if ($myProfile->about_me != "") {
                                                    echo $myProfile->about_me;
                                            } else {
                                                    echo "Write about Personality, Family Details, Career, Partner Expectations etc.";
                                            }
                                            ?>

                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>



                        <div class="strip">
                            <div class="rels">
                                <div class="rel-1">
                                    <h2>Basics & Lifestyle </h2>
                                </div>

                                <div class="rel-2">
                                    <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/EditProfile', '#' => 'basicinfo'), array('class' => 'edit')); ?></h6>

                                </div>
                            </div>
                            <div class="strip-paddingz">
                                <div class="col-md-6">

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Age </label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz"><?php echo date('Y') - date('Y', strtotime($myProfile->dob_year)); ?></label>
                                        </div>
                                    </div>






                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Date of Birth</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz"><?php
                                                if ($myProfile->dob != '0000-00-00') {
                                                        echo date('d-F-Y', strtotime($myProfile->dob));
                                                } else {
                                                        echo '--';
                                                }
                                                ?> </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Marital Status</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->marital_status != 0) {
                                                        echo MasterMaritalStatus::model()->findByPk($myProfile->marital_status)->marital_status;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Height</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->height != 0) {
                                                        echo MasterHeight::model()->findByPk($myProfile->height)->height;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Skin Tone</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->skin_tone != 0) {
                                                        echo MasterSkinTone::model()->findByPk($myProfile->skin_tone)->skin_tone;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Body Type</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->body_type != 0) {
                                                        echo MasterBodyType::model()->findByPk($myProfile->body_type)->body_type;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Body Weight</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->weight != 0) {
                                                        echo $myProfile->weight . ' kgs';
                                                } else {
                                                        echo '--';
                                                }
                                                ?></label>
                                        </div>
                                    </div>

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Grew up in</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->grow_up_in != 0) {
                                                        echo MasterCountry::model()->findByPk($myProfile->grow_up_in)->country;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>




                                </div>


                                <div class="col-md-6 lifestyle">



                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz"> Diet</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->diet != 0) {
                                                        echo MasterDiet::model()->findByPk($myProfile->diet)->diet;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">  Drink</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->drink == 1) {
                                                        $drink = 'No';
                                                } else if ($myProfile->drink == 2) {
                                                        $drink = 'Yes';
                                                } else if ($myProfile->drink == 3) {
                                                        $drink = 'Occasionally';
                                                } else {
                                                        $drink = '--';
                                                }
                                                echo $drink;
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">  Smoke</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->smoke == 1) {
                                                        $smoke = 'No';
                                                } else if ($myProfile->smoke == 2) {
                                                        $smoke = 'Yes';
                                                } else if ($myProfile->smoke == 3) {
                                                        $smoke = 'Occasionally';
                                                } else {
                                                        $smoke = '--';
                                                }
                                                echo $smoke;
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">  Personal Values</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz"> Will tell you later</label>
                                        </div>
                                    </div>

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Sun Sign</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->nakshatra != 0) {
                                                        echo MasterNakshatra::model()->findByPk($myProfile->nakshatra)->nakshatra;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>

                                            </label>
                                        </div>
                                    </div>

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Blood Group</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->blood_group != 0) {
                                                        echo MasterBloodGroup::model()->findByPk($myProfile->blood_group)->blood_group;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Health Information</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->health_info != 0) {
                                                        echo MasterHealthInformation::model()->findByPk($myProfile->health_info)->health_info;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Disability</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">

                                                <?php
                                                if ($myProfile->disablity == 1) {
                                                        $disablity = 'No';
                                                } else if ($myProfile->disablity == 2) {
                                                        $disablity = 'Physically Disabled';
                                                } else {
                                                        $disablity = '--';
                                                }
                                                echo $disablity;
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>







                        <div class="strip">
                            <div class="rels">
                                <div class="rel-1">
                                    <h2>Religious Background </h2>
                                </div>

                                <div class="rel-2">
                                    <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/EditProfile', '#' => 'religiousbkd'), array('class' => 'edit')); ?></h6>

                                </div>
                            </div>
                            <div class="strip-paddingz">
                                <div class="col-md-6">

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Religion </label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->religion != 0) {
                                                        echo MasterReligion::model()->findByPk($myProfile->religion)->religion;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>

                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Community </label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->caste != 0) {
                                                        echo MasterCaste::model()->findByPk($myProfile->caste)->caste;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if ($myProfile->sub_caste != 0) { ?>
                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Sub community </label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($myProfile->sub_caste != 0) {
                                                                echo MasterSubCaste::model()->findByPk($myProfile->sub_caste)->sub_caste;
                                                        } else {
                                                                echo '--';
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                    <?php } ?>








                                </div>
                                <div class="col-md-6 lifestyle">






                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Mother Tongue </label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->mothertongue != 0) {
                                                        echo MasterMotherTongue::model()->findByPk($myProfile->mothertongue)->mother_tongue;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Suddha Jathakam</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">

                                                <?php
                                                if ($myProfile->suddha_jadhagam == 1) {
                                                        $suddha_jadhagam = 'Yes';
                                                } else if ($myProfile->suddha_jadhagam == 2) {
                                                        $suddha_jadhagam = 'No';
                                                } else if ($myProfile->suddha_jadhagam == 3) {
                                                        $suddha_jadhagam = 'Dont No';
                                                } else {
                                                        $suddha_jadhagam = '--';
                                                }
                                                echo $suddha_jadhagam;
                                                ?>
                                            </label>
                                        </div>
                                    </div>





                                </div>


                            </div>

                        </div>

                        <div class="strip">
                            <div class="rels">
                                <div class="rel-1">
                                    <h2>Family Details</h2>
                                </div>

                                <div class="rel-2">
                                    <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/EditProfile', '#' => 'family'), array('class' => 'edit')); ?></h6>

                                </div>
                            </div>
                            <div class="strip-paddingz">
                                <div class="col-md-6">

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Fathers Status </label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->father_status != 0) {
                                                        echo MasterParentStatus::model()->findByPk($myProfile->father_status)->parent_status;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>






                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Mother's Status </label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->mother_status != 0) {
                                                        echo MasterParentStatus::model()->findByPk($myProfile->mother_status)->parent_status;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Family Location</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->city != 0) {

                                                        echo MasterCity::model()->findByPk($myProfile->city)->city;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Native Place</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">

                                                <?php
                                                if ($myProfile->home_town != '') {
                                                        echo $myProfile->home_town;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>





                                </div>


                                <div class="col-md-6 lifestyle">



                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz"> No of Brothers</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->num_of_unmarried_brother != 0 || $myProfile->num_of_married_brother != 0) {
                                                        echo $myProfile->num_of_unmarried_brother . ' of which married ' . $myProfile->num_of_married_brother;
                                                } else {
                                                        echo 0;
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">  No of Sisters</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->num_of_unmarried_sister != 0 || $myProfile->num_of_married_sister != 0) {
                                                        echo $myProfile->num_of_unmarried_sister . ' of which married ' . $myProfile->num_of_married_sister;
                                                } else {
                                                        echo 0;
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">  Family Type</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->family_type != 0) {
                                                        echo MasterFamilyType::model()->findByPk($myProfile->family_type)->family_type;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">  Family Values</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->family_value != 0) {
                                                        echo MasterFamilyValue::model()->findByPk($myProfile->family_value)->family_value;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Affluence Level</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->affluence_level != 0) {
                                                        echo MasterAffluenceLevel::model()->findByPk($myProfile->affluence_level)->affluence_level;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>

                                            </label>
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>

                        <div class="strip">
                            <div class="rels">
                                <div class="rel-1">
                                    <h2>Education & Career</h2>
                                </div>

                                <div class="rel-2">
                                    <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/EditProfile', '#' => 'education'), array('class' => 'edit')); ?></h6>

                                </div>
                            </div>
                            <div class="strip-paddingz">
                                <div class="col-md-6">

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Education</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->education_level != 0) {
                                                        echo MasterEducationLevel::model()->findByPk($myProfile->education_level)->education_level;
                                                }
                                                if ($myProfile->education_field != 0) {
                                                        echo " - " . MasterEducationField::model()->findByPk($myProfile->education_field)->education_field;
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>






                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Working With</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->working_with != 0) {
                                                        echo MasterWorkingWith::model()->findByPk($myProfile->working_with)->working_with;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6 lifestyle">


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Working As</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->working_as != 0) {
                                                        echo MasterWorkingAs::model()->findByPk($myProfile->working_as)->working_as;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Annual Income</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->annual_income != 0) {
                                                        echo MasterAnnualIncome::model()->findByPk($myProfile->annual_income)->income_from;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>

                                            </label>
                                        </div>
                                    </div>





                                </div>




                            </div>

                        </div>
                        <div class="strip"><label  id="hobbies"></label>
                            <div class="rels">
                                <div class="rel-1">
                                    <h2>Location</h2>
                                </div>

                                <div class="rel-2">
                                    <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/EditProfile', '#' => 'groom'), array('class' => 'edit')); ?></h6>

                                </div>
                            </div>
                            <div class="strip-paddingz">
                                <div class="col-md-6">

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Current Residence</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->city != 0) {
                                                        echo MasterCity::model()->findByPk($myProfile->city)->city;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>






                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">State of Residence</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($myProfile->state != 0) {
                                                        echo MasterState::model()->findByPk($myProfile->state)->state;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Zip / Pin Code</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">

                                                <?php
                                                if ($myProfile->zip_code != '' || $myProfile->zip_code != 0) {
                                                        echo $myProfile->zip_code;
                                                } else {
                                                        echo '--';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                </div>





                            </div>

                        </div>
                        <div class="strip"><label  id="partner"></label>
                            <div class="rels">
                                <div class="rel-1">
                                    <h2>Hobbies & Interests</h2>
                                </div>

                                <div class="rel-2">
                                    <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/HobbiesInterest'), array('class' => 'edit')); ?></h6>

                                </div>
                            </div>
                            <div class="strip-paddingz">
                                <div class="col-md-6">

                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Hobbies</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($userInterest->hobbies != '') {

                                                        $userInterests = explode(',', $userInterest->hobbies);
                                                        $hs = 1;
                                                        foreach ($userInterests as $userInterestss) {
                                                                if ($hs == 1) {
                                                                        echo MasterHobbies::model()->findByPk($userInterestss)->hobbies;
                                                                } else {
                                                                        echo ", " . MasterHobbies::model()->findByPk($userInterestss)->hobbies;
                                                                }
                                                                $hs++;
                                                        }
                                                } else {
                                                        echo "No Hobbies";
                                                }
                                                ?>

                                            </label>
                                        </div>
                                    </div>






                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Music</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">
                                                <?php
                                                if ($userInterest->music != '') {

                                                        $usermusic = explode(',', $userInterest->music);
                                                        $umu = 1;
                                                        foreach ($usermusic as $usermusics) {
                                                                if ($umu == 1) {
                                                                        echo MasterMusic::model()->findByPk($usermusics)->music;
                                                                } else {
                                                                        echo ", " . MasterMusic::model()->findByPk($usermusics)->music;
                                                                }
                                                                $umu++;
                                                        }
                                                } else {
                                                        echo "No Interest";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 lifestyle">
                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Movies</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">

                                                <?php
                                                if ($userInterest->movies != '') {

                                                        $usermovies = explode(',', $userInterest->movies);
                                                        $umm = 1;
                                                        foreach ($usermovies as $usermovie) {
                                                                if ($umm == 1) {
                                                                        echo MasterMovies::model()->findByPk($usermovie)->movies;
                                                                } else {
                                                                        echo ", " . MasterMovies::model()->findByPk($usermovie)->movies;
                                                                }
                                                                $umm++;
                                                        }
                                                } else {
                                                        echo "No Interest";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="copyz">
                                        <div class="col-sm-5 col-xs-3 zeros">
                                            <label for="textinput" class="control-labelz">Sports</label>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-labelz">:</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-8 zeros">
                                            <label for="textinput" class="control-labelz">

                                                <?php
                                                if ($userInterest->sports != '') {

                                                        $usersports = explode(',', $userInterest->sports);
                                                        $ums = 1;
                                                        foreach ($usersports as $usersport) {
                                                                if ($ums == 1) {
                                                                        echo MasterSports::model()->findByPk($usersport)->sports;
                                                                } else {
                                                                        echo ", " . MasterSports::model()->findByPk($usersport)->sports;
                                                                }
                                                                $ums++;
                                                        }
                                                } else {
                                                        echo "No Interest";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                </div>





                            </div>

                        </div>
                        <?php
                        if (!empty($partnerDetails)) {
                                ?>
                                <div class="strip stripsss">
                                    <h2 class="partner_det ">Partner Preference</h2>
                                </div>
                                <div class="strip">
                                    <div class="rels">
                                        <div class="rel-1">
                                            <h2>Basics & Lifestyle</h2>
                                        </div>

                                        <div class="rel-2">
                                            <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/PartnerPreference', '#' => 'basics'), array('class' => 'edit')); ?></h6>

                                        </div>
                                    </div>
                                    <div class="strip-paddingz">
                                        <div class="col-md-6">

                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Age</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        echo $partnerDetails->age_from . ' to ' . $partnerDetails->age_to;
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>






                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Marital Status</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->marital_status != '') {
                                                                if ($partnerDetails->marital_status == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $partner_marital_status = explode(',', $partnerDetails->marital_status);
                                                                        $pms = 1;
                                                                        foreach ($partner_marital_status as $partner_marital_s) {
                                                                                if ($pms == 1) {
                                                                                        echo MasterMaritalStatus::model()->findByPk($partner_marital_s)->marital_status;
                                                                                } else {
                                                                                        echo ", " . MasterMaritalStatus::model()->findByPk($partner_marital_s)->marital_status;
                                                                                }
                                                                                $pms++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Height</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        $height_from_p = MasterHeight::model()->findByPk($partnerDetails->height_from)->height;
                                                        $height_to_p = MasterHeight::model()->findByPk($partnerDetails->height_to)->height;
                                                        echo $height_from_p . ' TO ' . $height_to_p;
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Skin Tone</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->skin_tone != '') {
                                                                if ($partnerDetails->skin_tone == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $profile_skin = explode(',', $partnerDetails->skin_tone);
                                                                        $ho = 1;
                                                                        foreach ($profile_skin as $profile_skins) {
                                                                                if ($ho == 1) {
                                                                                        echo MasterSkinTone::model()->findByPk($profile_skins)->skin_tone;
                                                                                } else {
                                                                                        echo ", " . MasterSkinTone::model()->findByPk($profile_skins)->skin_tone;
                                                                                }
                                                                                $ho++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Body Type</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->body_type != '') {
                                                                if ($partnerDetails->body_type == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $profile_body = explode(',', $partnerDetails->body_type);
                                                                        $hi = 1;
                                                                        foreach ($profile_body as $profile_bodys) {
                                                                                if ($hi == 1) {
                                                                                        echo MasterBodyType::model()->findByPk($profile_bodys)->body_type;
                                                                                } else {
                                                                                        echo ", " . MasterBodyType::model()->findByPk($profile_bodys)->body_type;
                                                                                }
                                                                                $hi++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Grew Up in</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">

                                                        <?php
                                                        if ($partnerDetails->country_grew_up != '') {
                                                                if ($partnerDetails->country_grew_up == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $country_grew_up = explode(',', $partnerDetails->country_grew_up);
                                                                        $cgp = 1;
                                                                        foreach ($country_grew_up as $country_grew_ups) {
                                                                                if ($cgp == 1) {
                                                                                        echo MasterCountry::model()->findByPk($country_grew_ups)->country;
                                                                                } else {
                                                                                        echo ", " . MasterCountry::model()->findByPk($country_grew_ups)->country;
                                                                                }
                                                                                $cgp++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>

                                                    </label>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-6 lifestyle">

                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Profile Created By</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->profile_created_by != '') {
                                                                if ($partnerDetails->profile_created_by == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $profile_cret = explode(',', $partnerDetails->profile_created_by);
                                                                        $hh = 1;
                                                                        foreach ($profile_cret as $profile_crets) {
                                                                                if ($hh == 1) {
                                                                                        echo MasterProfileFor::model()->findByPk($profile_crets)->profile_for;
                                                                                } else {
                                                                                        echo ", " . MasterProfileFor::model()->findByPk($profile_crets)->profile_for;
                                                                                }
                                                                                $hh++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Disability</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?= $partnerDetails->disability == 1 ? 'Dont include profiles with disability' : 'Doesnt Matter'; ?>
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Drink</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">

                                                        <?php
                                                        if ($partnerDetails->drink != '') {
                                                                if ($partnerDetails->drink == 1) {
                                                                        echo 'No';
                                                                } elseif ($partnerDetails->drink == 2) {
                                                                        echo 'Yes';
                                                                } elseif ($partnerDetails->drink == 3) {
                                                                        echo 'Occasionally';
                                                                } else {
                                                                        echo "Doesn't Matter";
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Diet</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->diet != '') {
                                                                if ($partnerDetails->diet == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $profile_diet = explode(',', $partnerDetails->diet);
                                                                        $hs = 1;
                                                                        foreach ($profile_diet as $profile_diets) {
                                                                                if ($hs == 1) {
                                                                                        echo MasterDiet::model()->findByPk($profile_diets)->diet;
                                                                                } else {
                                                                                        echo ", " . MasterDiet::model()->findByPk($profile_diets)->diet;
                                                                                }
                                                                                $hs++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Smoke</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">

                                                        <?php
                                                        if ($partnerDetails->smoke != 0) {
                                                                if ($partnerDetails->smoke == 1) {
                                                                        echo 'No';
                                                                } elseif ($partnerDetails->smoke == 2) {
                                                                        echo 'Yes';
                                                                } elseif ($partnerDetails->smoke == 3) {
                                                                        echo 'Occasionally';
                                                                } else {
                                                                        echo "Doesn't Matter";
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>





                                        </div>


                                    </div>

                                </div>
                                <div class="strip">
                                    <div class="rels">
                                        <div class="rel-1">
                                            <h2>Religion & Social Background</h2>
                                        </div>

                                        <div class="rel-2">
                                            <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/PartnerPreference', '#' => 'religion'), array('class' => 'edit')); ?></h6>

                                        </div>
                                    </div>
                                    <div class="strip-paddingz">
                                        <div class="col-md-6">

                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Religion</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->religion != '') {
                                                                if ($partnerDetails->religion == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $partner_religion = explode(',', $partnerDetails->religion);
                                                                        $hsr = 1;
                                                                        foreach ($partner_religion as $partner_religions) {
                                                                                if ($hsr == 1) {
                                                                                        echo MasterReligion::model()->findByPk($partner_religions)->religion;
                                                                                } else {
                                                                                        echo ", " . MasterReligion::model()->findByPk($partner_religions)->religion;
                                                                                }
                                                                                $hsr++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>






                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Community</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->caste != '') {
                                                                if ($partnerDetails->caste == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $partner_caste = explode(',', $partnerDetails->caste);
                                                                        $hsb = 1;
                                                                        foreach ($partner_caste as $partner_castes) {
                                                                                if ($hsb == 1) {
                                                                                        echo MasterCaste::model()->findByPk($partner_castes)->caste;
                                                                                } else {
                                                                                        echo ", " . MasterCaste::model()->findByPk($partner_castes)->caste;
                                                                                }
                                                                                $hsb++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>





                                        </div>


                                        <div class="col-md-6 lifestyle">






                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Mother Tongue</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->mothertongue != '') {
                                                                if ($partnerDetails->mothertongue == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $profile_mothertongue = explode(',', $partnerDetails->mothertongue);
                                                                        $mt = 1;
                                                                        foreach ($profile_mothertongue as $profile_mothertongues) {
                                                                                if ($mt == 1) {
                                                                                        echo MasterMotherTongue::model()->findByPk($profile_mothertongues)->mother_tongue;
                                                                                } else {
                                                                                        echo ", " . MasterMotherTongue::model()->findByPk($profile_mothertongues)->mother_tongue;
                                                                                }
                                                                                $mt++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>

                                                    </label>
                                                </div>
                                            </div>






                                        </div>


                                    </div>

                                </div>
                                <div class="strip">
                                    <div class="rels">
                                        <div class="rel-1">
                                            <h2>Education & Career</h2>
                                        </div>

                                        <div class="rel-2">
                                            <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/PartnerPreference', '#' => 'education'), array('class' => 'edit')); ?></h6>

                                        </div>
                                    </div>
                                    <div class="strip-paddingz">
                                        <div class="col-md-6">

                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Education</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->education != '') {
                                                                if ($partnerDetails->education == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $partner_education = explode(',', $partnerDetails->education);
                                                                        $hpe = 1;
                                                                        foreach ($partner_education as $partner_educations) {
                                                                                if ($hpe == 1) {
                                                                                        echo MasterEducationField::model()->findByPk($partner_educations)->education_field;
                                                                                } else {
                                                                                        echo ", " . MasterEducationField::model()->findByPk($partner_educations)->education_field;
                                                                                }
                                                                                $hpe++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>






                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Working With</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->working_with != '') {
                                                                if ($partnerDetails->working_with == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $partner_working_with = explode(',', $partnerDetails->working_with);
                                                                        $ww = 1;
                                                                        foreach ($partner_working_with as $partner_working) {
                                                                                if ($ww == 1) {
                                                                                        echo MasterWorkingWith::model()->findByPk($partner_working)->working_with;
                                                                                } else {
                                                                                        echo ", " . MasterWorkingWith::model()->findByPk($partner_working)->working_with;
                                                                                }
                                                                                $ww++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="col-md-6 lifestyle">






                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Profession Area</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->profession_area != '') {
                                                                if ($partnerDetails->profession_area == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $partner_profession_area = explode(',', $partnerDetails->profession_area);
                                                                        $ppa = 1;
                                                                        foreach ($partner_profession_area as $partner_profession_areas) {
                                                                                if ($ppa == 1) {
                                                                                        echo MasterWorkingAs::model()->findByPk($partner_profession_areas)->working_as;
                                                                                } else {
                                                                                        echo ", " . MasterWorkingAs::model()->findByPk($partner_profession_areas)->working_as;
                                                                                }
                                                                                $ppa++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Annual Income</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->annual_income_from != '') {
                                                                if ($partnerDetails->annual_income_from == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $p_annual_income_from = explode(',', $partnerDetails->annual_income_from);
                                                                        $aif = 1;
                                                                        foreach ($p_annual_income_from as $p_annual_income_froms) {
                                                                                if ($aif == 1) {
                                                                                        echo MasterAnnualIncome::model()->findByPk($p_annual_income_froms)->income_from;
                                                                                } else {
                                                                                        echo ", " . MasterAnnualIncome::model()->findByPk($p_annual_income_froms)->income_from;
                                                                                }
                                                                                $aif++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>





                                        </div>


                                    </div>

                                </div>
                                <div class="strip">
                                    <div class="rels">
                                        <div class="rel-1">
                                            <h2>Partner Location</h2>
                                        </div>

                                        <div class="rel-2">
                                            <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('profile/PartnerPreference', '#' => 'location'), array('class' => 'edit')); ?></h6>

                                        </div>
                                    </div>
                                    <div class="strip-paddingz">
                                        <div class="col-md-6">

                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Country of Residence</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->country_living_in != '') {
                                                                if ($partnerDetails->country_living_in == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $country_living_in = explode(',', $partnerDetails->country_living_in);
                                                                        $cli = 1;
                                                                        foreach ($country_living_in as $country_living_ins) {
                                                                                if ($cli == 1) {
                                                                                        echo MasterCountry::model()->findByPk($country_living_ins)->country;
                                                                                } else {
                                                                                        echo ", " . MasterCountry::model()->findByPk($country_living_ins)->country;
                                                                                }
                                                                                $cli++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>






                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">State of Residence</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->residency_status != '') {
                                                                if ($partnerDetails->residency_status == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $residency_status = explode(',', $partnerDetails->residency_status);
                                                                        $rs = 1;
                                                                        foreach ($residency_status as $residency_statuss) {
                                                                                if ($rs == 1) {
                                                                                        echo MasterState::model()->findByPk($residency_statuss)->state;
                                                                                } else {
                                                                                        echo ", " . MasterState::model()->findByPk($residency_statuss)->state;
                                                                                }
                                                                                $rs++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="col-md-6 lifestyle">






                                            <div class="copyz">
                                                <div class="col-sm-5 col-xs-3 zeros">
                                                    <label for="textinput" class="control-labelz">Country Grew up in</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if ($partnerDetails->country_grew_up != '') {
                                                                if ($partnerDetails->country_grew_up == '-1') {
                                                                        echo "Doesn't Matter";
                                                                } else {
                                                                        $p_country_grew_up = explode(',', $partnerDetails->country_grew_up);
                                                                        $cgu = 1;
                                                                        foreach ($p_country_grew_up as $p_country_grew_ups) {
                                                                                if ($cgu == 1) {
                                                                                        echo MasterCountry::model()->findByPk($p_country_grew_ups)->country;
                                                                                } else {
                                                                                        echo ", " . MasterCountry::model()->findByPk($p_country_grew_ups)->country;
                                                                                }
                                                                                $cgu++;
                                                                        }
                                                                }
                                                        } else {
                                                                echo "Doesn't Matter";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>


                                        </div>


                                    </div>

                                </div>
                        <?php } ?>


                        <div class="fifty-2">
                            <span class="previews">Preview your profile</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<script type="text/javascript">
        $(document).ready(function () {
            $(".profile_pics").change(function () {


                var fd = new FormData();
                fd.append("UserDetails[photo]", $(".profile_pics")[0].files[0]);
                $.ajax({
                    url: '<?php echo Yii::app()->createUrl("Profile/MyProfile"); ?>',
                    type: 'POST',
                    data: fd,
                    datatype: 'json',
                    // async: false,
                    beforeSend: function () {
                        $('#loading_prof').show();
                    },
                    success: function (data) {

                        // on success do some validation or refresh the content div to display the uploaded images
                        $("#ajax_pics").html(data);
                    },
                    complete: function () {
                        // success alerts
                        $('#loading_prof').hide();
                        // alert('Image uploaded successfully')
                    },
                    error: function (data) {
                        alert("There may a error on uploading. Try again later");
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                return false;
            });
        });
</script>