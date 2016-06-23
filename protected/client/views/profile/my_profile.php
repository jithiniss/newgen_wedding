<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>
<section class="religion">
    <div class="container">
        <div class="row">

            <div class="col-md-3 newgens">
                <h3>NEWGEN</h3>
                <ul class="list-unstyled">
                    <li><a href="#">My Contact Details</a></li>
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#">My Photos</a></li>
                    <li><a href="#">My Partner Preferences</a></li>
                </ul>
            </div>
            <div class="col-md-9 any nop">
                <h4><?php echo ucwords($myProfile->first_name . ' ' . $myProfile->last_name); ?></h4>
                <div class="pull-right">
                    <p>Fields in bold cannot be edited. Please contact customer care for any queries.</p>
                </div>
                <div class="clearfix"></div>
                <span class="labz">Activity Factor 65%</span>


                <div class="care">
                    <div class="content">
                        <div class="box-1">
                            <div class="box">
                                <input type="file" name="file-6[]" id="file-6" class="inputfile inputfile-5" data-multiple-caption="{count} files selected" multiple />
                                <label for="file-6">

                                    <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/images/upload.jpg">
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
                                                    if($myProfile->height != 0) {
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
                                                    if($myProfile->marital_status != 0) {
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
                                                    if($myProfile->profile_for != 0) {
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
                                                    if($myProfile->religion != 0) {
                                                            echo MasterReligion::model()->findByPk($myProfile->religion)->religion;
                                                    }
                                                    ?>
                                                    <?php
                                                    if($myProfile->caste != 0) {
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
                                                    <?php echo $myProfile->city; ?>
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
                                        <li><a href="#">Edit Personal Profile</a></li>
                                        <li><a href="#">Edit Partner Profile</a></li>

                                        <li><a href="#">Edit Contact Details </a></li>
                                        <li><a href="#">View Profile Status</a></li>
                                        <li><a href="#">Add Photos</a></li>

                                        <li><a href="#">Hobbies & Interests</a></li>
                                        <li><a href="#">Set Contact Filters</a></li>
                                        <li><a href="#">Hide / Delete Profile</a></li>


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
                                            <h6><a class="edit" href="#">Edit<i class="fa cart fa-caret-right"></i></a></h6>
                                        </div>
                                    </div>
                                    <div class="strip-padding">


                                        <div class="common">
                                            <div class="col-sm-12 col-xs-12 zeros">
                                                <p>
                                                    <?php
                                                    if($myProfile->about_me != "") {
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
                                            <h6><a class="edit" href="#">Edit<i class="fa cart fa-caret-right"></i></a></h6>
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
                                                    <label for="textinput" class="control-labelz"><?php echo date('d-F-Y', strtotime($myProfile->dob_year)); ?> </label>
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
                                                        if($myProfile->marital_status != 0) {
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
                                                        if($myProfile->height != 0) {
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
                                                        if($myProfile->skin_tone != 0) {
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
                                                        if($myProfile->body_type != 0) {
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
                                                        if($myProfile->weight != 0) {
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
                                                        if($myProfile->grow_up_in != 0) {
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
                                                        if($myProfile->diet != 0) {
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
                                                        if($myProfile->drink == 1) {
                                                                $drink = 'No';
                                                        } else if($myProfile->drink == 2) {
                                                                $drink = 'Yes';
                                                        } else if($myProfile->drink == 3) {
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
                                                        if($myProfile->smoke == 1) {
                                                                $smoke = 'No';
                                                        } else if($myProfile->smoke == 2) {
                                                                $smoke = 'Yes';
                                                        } else if($myProfile->smoke == 3) {
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
                                                        if($myProfile->nakshatra != 0) {
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
                                                        if($myProfile->blood_group != 0) {
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
                                                        if($myProfile->health_info != 0) {
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
                                                        if($myProfile->disablity == 1) {
                                                                $disablity = 'No';
                                                        } else if($myProfile->disablity == 2) {
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
                                            <h6><a class="edit" href="#">Edit<i class="fa cart fa-caret-right"></i></a></h6>
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
                                                        if($myProfile->religion != 0) {
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
                                                        if($myProfile->caste != 0) {
                                                                echo MasterCaste::model()->findByPk($myProfile->caste)->caste;
                                                        } else {
                                                                echo '--';
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php if($myProfile->sub_caste != 0) { ?>
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
                                                                if($myProfile->sub_caste != 0) {
                                                                        echo MasterSubCaste::model()->findByPk($myProfile->sub_caste)->sub_caste;
                                                                } else {
                                                                        echo '--';
                                                                }
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                            <?php } ?>
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
                                                        if($myProfile->mothertongue != 0) {
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
                                                        if($myProfile->suddha_jadhagam == 1) {
                                                                $suddha_jadhagam = 'Yes';
                                                        } else if($myProfile->suddha_jadhagam == 2) {
                                                                $suddha_jadhagam = 'No';
                                                        } else if($myProfile->suddha_jadhagam == 3) {
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
                                            <h6><a class="edit" href="#">Edit<i class="fa cart fa-caret-right"></i></a></h6>
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
                                                        if($myProfile->father_status != 0) {
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
                                                        if($myProfile->mother_status != 0) {
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
                                                        if($myProfile->marital_status != 0) {
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
                                                    <label for="textinput" class="control-labelz">Native Place</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                    <label for="textinput" class="control-labelz">:</label>
                                                </div>
                                                <div class="col-sm-6 col-xs-8 zeros">
                                                    <label for="textinput" class="control-labelz">
                                                        <?php
                                                        if($myProfile->height != 0) {
                                                                echo MasterHeight::model()->findByPk($myProfile->height)->height;
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
                                                        if($myProfile->diet != 0) {
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
                                                        if($myProfile->drink == 1) {
                                                                $drink = 'No';
                                                        } else if($myProfile->drink == 2) {
                                                                $drink = 'Yes';
                                                        } else if($myProfile->drink == 3) {
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
                                                        if($myProfile->smoke == 1) {
                                                                $smoke = 'No';
                                                        } else if($myProfile->smoke == 2) {
                                                                $smoke = 'Yes';
                                                        } else if($myProfile->smoke == 3) {
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
                                                        if($myProfile->nakshatra != 0) {
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
                                                        if($myProfile->blood_group != 0) {
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
                                                        if($myProfile->health_info != 0) {
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
                                                        if($myProfile->disablity == 1) {
                                                                $disablity = 'No';
                                                        } else if($myProfile->disablity == 2) {
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
                                <div class="fifty-1">
                                    <img class="fives" src="images/print.png">print
                                </div>

                                <div class="fifty-2">
                                    <span class="previews">Preview your profile</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            </section>