<style>
        .slick-dots li{
                background-color: transparent;
        }
</style>
<section class = "similar">
        <div class = "container">
                <div class = "row">
                        <div class = "col-md-3 col-sm-4">
                                <div class = "profilez">
                                        <?php
                                        if ($user_details->photo != '') {

                                                $folder = Yii::app()->Upload->folderName(0, 1000, $user_details->id);
                                                ?>
                                                <?php if ($user_details->gender == 1) { ?>
                                                        <?php if ($user_details->photo_visibility == 1) { ?>
                                                                <img class = "img-responsive fulls" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $user_details->id . '/profile/' . $user_details->photo; ?>"><br>
                                                        <?php }if ($user_details->photo_visibility == 2) { ?>
                                                                <div class="profile mynewgenz ">
                                                                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                                        <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                        <p>Visible on Accept/Sent</p>
                                                                </div>
                                                        <?php }if ($user_details->photo_visibility == 3) { ?>
                                                                <div class="profile mynewgenz ">
                                                                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                                        <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                        <p>Password Protected</p>
                                                                </div>
                                                                <?php
                                                        }
                                                } else {
                                                        ?>
                                                        <?php if ($user_details->photo_visibility == 1) { ?>
                                                                <img class = "img-responsive fulls" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $user_details->id . '/profile/' . $user_details->photo; ?>"><br>
                                                        <?php }if ($user_details->photo_visibility == 2) { ?>
                                                                <div class="profile mynewgenz ">
                                                                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                        <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                        <p>Visible on Accept/Sent</p>
                                                                </div>
                                                        <?php }if ($user_details->photo_visibility == 3) { ?>
                                                                <div class="profile mynewgenz ">
                                                                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                        <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                        <p>Password Protected</p>
                                                                </div>

                                                                <?php
                                                        }
                                                }
                                                ?>

                                        <?php } else if ($user_details->gender == 1) { ?>
                                                <img class = "img-responsive fulls" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/pp.jpg" />
                                        <?php } else { ?>
                                                <img class = "img-responsive fulls" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg" />
                                        <?php } ?>

                                        <?php if ($user_details->photo != '') { ?>
                                                <a class="doc1" href="#"><img class="albums" src="<?php echo Yii::app()->request->baseUrl; ?>/images/album.png">View Album</a>
                                        <?php } else {
                                                ?>
                                                <?php echo CHtml::link('Request Photo', array('Partner/PhotoRequest', 'data' => $user_details->user_id), array('class' => 'doc1')); ?>
                                        <?php } ?>

                                        <a class="doc2" href="#"><img class="album" src="<?php echo Yii::app()->request->baseUrl; ?>/images/d3.png">Report Misuse</a>
                                        <div class="clearfix">  </div>
                                        <?php if (!empty($similar_profiles)) { ?>
                                                <h1>Similar Profiles</h1>

                                                <div class="simi">
                                                        <?php foreach ($similar_profiles as $similar_profile) { ?>
                                                                <div class="item">
                                                                        <div class="main luck">
                                                                                <?php
                                                                                if ($similar_profile->photo != '') {
                                                                                        $folder1 = Yii::app()->Upload->folderName(0, 1000, $similar_profile->id);
                                                                                        ?>
                                                                                        <?php if ($similar_profile->gender == 1) { ?>
                                                                                                <?php if ($similar_profile->photo_visibility == 1) { ?>
                                                                                                        <img class = "img-responsive sim" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $similar_profile->id . '/profile/' . $similar_profile->photo; ?>"><br>
                                                                                                <?php }if ($similar_profile->photo_visibility == 2) { ?>
                                                                                                        <div class="profile mynewgenz ">
                                                                                                                <img class="sim side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                                                                        </div>
                                                                                                <?php }if ($similar_profile->photo_visibility == 3) { ?>
                                                                                                        <div class="profile mynewgenz ">
                                                                                                                <img class="sim side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                                                                        </div>
                                                                                                        <?php
                                                                                                }
                                                                                        } else {
                                                                                                ?>
                                                                                                <?php if ($similar_profile->photo_visibility == 1) { ?>
                                                                                                        <img class = "sim" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $similar_profile->id . '/profile/' . $similar_profile->photo; ?>"><br>
                                                                                                <?php }if ($similar_profile->photo_visibility == 2) { ?>
                                                                                                        <div class="profile mynewgenz ">
                                                                                                                <img class="sim side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                        </div>
                                                                                                <?php }if ($similar_profile->photo_visibility == 3) { ?>
                                                                                                        <div class="profile mynewgenz ">
                                                                                                                <img class="sim side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                        </div>

                                                                                                        <?php
                                                                                                }
                                                                                        }
                                                                                        ?>                                                                                <?php } else if ($similar_profile->gender == 1) { ?>
                                                                                        <img class = "sim" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/pp.jpg" />
                                                                                <?php } else { ?>
                                                                                        <img class = "sim" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg" />
                                                                                <?php } ?>
                <!--<img class="sim" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w2.jpg">-->
                                                                                <h4><?= $similar_profile->first_name; ?> <?= $similar_profile->last_name; ?></h4>
                                                                                <h2><?= date('Y') - $similar_profile->dob_year; ?> yrs, <?= MasterHeight::model()->findByPk($similar_profile->height)->height; ?>, <?= MasterReligion::model()->findByPk($similar_profile->religion)->religion; ?>, <?= MasterMotherTongue::model()->findByPk($similar_profile->mothertongue)->mother_tongue; ?></h2>
                                                                                <h2><?= MasterEducationField::model()->findByPk($similar_profile->education_field)->education_field; ?></h2>
                                                                                <h2>Lives in <?= MasterState::model()->findByPk($similar_profile->state)->state; ?>, <?= MasterCountry::model()->findByPk($similar_profile->country)->country; ?></h2>
                                                                        </div>
                                                                </div>
                                                        <?php } ?>


                                                </div>
                                        <?php } ?>

                                        <?php if (!empty($story)) { ?>
                                                <h1>Success Stories</h1>


                                                <div class="story">
                                                        <?php
                                                        foreach ($story as $stories) {
                                                                ?>
                                                                <div class="item">
                                                                        <div class="main">
                                                                                <img width="248" height="220" src="<?php echo yii::app()->baseUrl . '/uploads/wedding/' . $stories->id . '/wedding.' . $stories->image ?>">
                                                                                <h5 class="text"><?php echo $stories->feedback; ?></h5>
                                                                        </div>
                                                                </div>
                                                        <?php } ?>

                                                </div>
                                        <?php } ?>

                                </div>
                        </div>

                        <div class="col-md-9 col-sm-8 janet">
                                <h1><?php echo $user_details->first_name . ' ' . $user_details->last_name; ?> &nbsp;
                                        |&nbsp;
                                        <span class = "names"><?php echo $user_details->user_id; ?></span></h1>
                                <h2>Profile Created By <?php echo MasterProfileFor::model()->findByPk($user_details->profile_for)->profile_for; ?></h2>

                                <div class = "clearfix"></div>

                                <div class = "badges">
                                        <h3>Trust Badge</h3>


                                        <div class = "trust">
                                                <i class = "fa circles fa-check-circle-o"></i>
                                                <img class = "k1" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/k1.png">
                                        </div>
                                        <div class = "trust">
                                                <img class = "k1" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/k2.png">
                                        </div>
                                        <div class = "trust">
                                                <img class = "k1" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/k3.png">
                                        </div>


                                </div>

                                <div class = "ui-profile">
                                        <div class = "ui-left">
                                                <ul class = "list-unstyled">
                                                        <li><i class = "fa love fa-user"></i><?php echo date('Y') - $user_details->dob_year; ?> yrs, <?php echo MasterHeight::model()->findByPk($user_details->height)->height; ?>, <?php
                                                                if ($user_details->nakshatra != 0) {
                                                                        echo MasterNakshatra::model()->findByPk($user_details->nakshatra)->nakshatra;
                                                                }
                                                                ?></li>
                                                        <li><i class="fa love fa-mercury"></i><?php echo MasterMaritalStatus::model()->findByPk($user_details->marital_status)->marital_status; ?></li>
                                                        <li><i class="fa love fa-book"></i><?php echo MasterReligion::model()->findByPk($user_details->religion)->religion; ?>, <?php echo MasterMotherTongue::model()->findByPk($user_details->mothertongue)->mother_tongue; ?></li>
                                                        <li><i class="fa love fa-deviantart"></i><?php echo MasterCaste::model()->findByPk($user_details->caste)->caste; ?>, <?php
                                                                if ($user_details->sub_caste != 0) {
                                                                        echo MasterSubCaste::model()->findByPk($user_details->sub_caste)->sub_caste;
                                                                }
                                                                ?></li>
                                                        <li><i class="fa love fa-mortar-board"></i><?php echo MasterEducationLevel::model()->findByPk($user_details->education_level)->education_level; ?> in <?php echo MasterEducationField::model()->findByPk($user_details->education_field)->education_field; ?></li>
                                                        <li><i class="fa love fa-mars-stroke-v"></i><?php echo MasterWorkingAs::model()->findByPk($user_details->working_as)->working_as; ?></li>
                                                        <li><i class="fa love fa-map-marker"></i>Lives in <?php
                                                                if ($user_details->city != 0) {
                                                                        echo MasterCity::model()->findByPk($user_details->city)->city;
                                                                } else {
                                                                        echo MasterState::model()->findByPk($user_details->state)->state;
                                                                }
                                                                ?>, <?php echo MasterCountry::model()->findByPk($user_details->country)->country; ?></li>
                                                </ul>
                                        </div>
                                        <div class="ui-right">
                                                <?php
                                                $this->widget("application.client.components.UserInterest", array(
                                                    'interest_id' => $user_details->user_id,
                                                ));
                                                ?>
                                        </div>
                                </div>


                                <div class="clearfix"></div>
                                <div class="preference">
                                        <h6>About Her</h6>
                                        <h4><?php echo $user_details->about_me; ?></h4>
                                </div>


                                <div class="preference">
                                        <h6>Lifestyle & Appearance</h6>
                                        <div class="drink-2">
                                                <div class="smoke">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/d4.png">
                                                </div>
                                                <div class="skin">
                                                        <h4><?php echo MasterDiet::model()->findByPk($user_details->diet)->diet; ?></h4>
                                                </div>
                                        </div>

                                        <div class="drink-2">
                                                <div class="smoke">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/d5.png">
                                                </div>
                                                <div class="skin">
                                                        <h4><?php
                                                                if ($user_details->drink == 0) {
                                                                        echo 'No';
                                                                } else if ($user_details->drink == 1) {
                                                                        echo 'Yes';
                                                                } else if ($user_details->drink == 2) {
                                                                        echo 'Occasionally';
                                                                }
                                                                ?></h4>
                                                </div>
                                        </div>


                                        <div class="drink-2">
                                                <div class="smoke">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/d6.png">
                                                </div>
                                                <div class="skin">
                                                        <h4><?php
                                                                if ($user_details->smoke == 0) {
                                                                        echo 'No';
                                                                } else if ($user_details->smoke == 1) {
                                                                        echo 'Yes';
                                                                } else if ($user_details->smoke == 2) {
                                                                        echo 'Occasionally';
                                                                }
                                                                ?></h4>
                                                </div>
                                        </div>


                                        <div class="drink-2">
                                                <div class="smoke">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/d7.png">
                                                </div>
                                                <div class="skins">
                                                        <h4><?php echo MasterSkinTone::model()->findByPk($user_details->skin_tone)->skin_tone; ?></h4>
                                                </div>
                                        </div>

                                </div>

                                <div class="preference">
                                        <h6>Background</h6>
                                        <ul class="list-unstyled">
                                                <li><i class="fa love fa-book"></i><?php echo MasterReligion::model()->findByPk($user_details->religion)->religion; ?>, <?php echo MasterMotherTongue::model()->findByPk($user_details->mothertongue)->mother_tongue; ?></li>
                                                <li><i class="fa love fa-group"></i><?php echo MasterCaste::model()->findByPk($user_details->caste)->caste; ?>, <?php
                                                        if ($user_details->sub_caste != 0) {
                                                                echo MasterSubCaste::model()->findByPk($user_details->sub_caste)->sub_caste;
                                                        }
                                                        ?></li>
                                                <li><i class="fa love fa-map-marker"></i>Lives in <?php
                                                        if ($user_details->city != 0) {
                                                                echo MasterCity::model()->findByPk($user_details->city)->city;
                                                        }
                                                        ?>, <?php echo MasterState::model()->findByPk($user_details->state)->state; ?>, <?php echo MasterCountry::model()->findByPk($user_details->country)->country; ?></li>
                        <!--                                                <li><i class="fa love fa-credit-card"></i>Can Speak English, Hindi, Malayalam</li>-->

                                        </ul>

                                </div>
                                <div class="preference">
                                        <h6>Her Family</h6>
                                        <h4>Her parents are retired.Ours is a middle class family with moderate values. She personally has a liberal approach to life. She has 1 brother (unmarried).</h4>
                                </div>

                                <div class="preference">
                                        <h6>Education & career</h6>
                                        <ul class="list-unstyled">
                                                <li><i class="fa love fa-mortar-board"></i><?php echo MasterEducationLevel::model()->findByPk($user_details->education_level)->education_level; ?> in <?php echo MasterEducationField::model()->findByPk($user_details->education_field)->education_field; ?></li>
                                                <li><i class="fa love fa-mars-stroke-v"></i><?php echo MasterWorkingAs::model()->findByPk($user_details->working_as)->working_as; ?></li>
                                                <li><i class="fa love fa-inr"></i><?php
                                                        if ($user_details->annual_income != 0) {
                                                                echo $user_details->annual_income;
                                                        } else {
                                                                echo "Doesn't wish to specify her income";
                                                        }
                                                        ?></li>

                                        </ul>

                                </div>

                                <div class="preference">
                                        <h6>INTERESTS & MORE </h6>
                                        <div class="drink">
                                                <div class="smoke-2">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/c1.png">
                                                </div>
                                                <div class="skin-2">
                                                        <h3> Interests & Hobbies</h3>
                                                        <p>
                                                                <?php
                                                                if ($interest->hobbies != '') {

                                                                        $hobbies = explode(',', $interest->hobbies);
                                                                        $hs = 1;
                                                                        foreach ($hobbies as $hobbie) {
                                                                                if ($hs == 1) {
                                                                                        echo MasterHobbies::model()->findByPk($hobbie)->hobbies;
                                                                                } else {
                                                                                        echo ", " . MasterHobbies::model()->findByPk($hobbie)->hobbies;
                                                                                }
                                                                                $hs++;
                                                                        }
                                                                } else {
                                                                        echo "No Hobbies";
                                                                }
                                                                ?>
                                                        </p>
                                                </div>
                                        </div>

                                        <div class="drink">
                                                <div class="smoke-2">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/c2.png">
                                                </div>
                                                <div class="skin-2">
                                                        <h3> Interests & Hobbies</h3>
                                                        <p><?php
                                                                if ($interest->music != '') {

                                                                        $usermusic = explode(',', $interest->music);
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
                                                        </p>
                                                </div>
                                        </div>


                                        <div class="drink">
                                                <div class="smoke-2">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/c3.png">
                                                </div>
                                                <div class="skin-2">
                                                        <h3>Movies</h3>
                                                        <p>
                                                                <?php
                                                                if ($interest->movies != '') {

                                                                        $usermovies = explode(',', $interest->movies);
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
                                                        </p>
                                                </div>
                                        </div>


                                        <div class="drink">
                                                <div class="smoke-2">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/c4.png">
                                                </div>
                                                <div class="skin-3">
                                                        <h3>Sports</h3>
                                                        <p>
                                                                <?php
                                                                if ($interest->sports != '') {

                                                                        $usersports = explode(',', $interest->sports);
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
                                                        </p>
                                                </div>
                                        </div>

                                </div>






                                <div class="clearfix"></div>

                                <div class="preference">
                                        <h6>WHAT she IS LOOKING FOR </h6>
                                        <div class="table-responsive">
                                                <table class="table bless">


                                                        <thead>
                                                                <tr>
                                                                        <th style="border-right:0;">
                                                                                <?php
                                                                                if ($user_details->photo != '') {
                                                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $user_details->id);
                                                                                        $user_details_pic = explode('.', $user_details->photo);
                                                                                        ?>
                                                                                        <img class="her" src="<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $user_details->id . '/profile/' . $user_details_pic[0] . '_100_130.' . $user_details_pic[1]; ?>" />
                                                                                <?php } else if ($user_details->gender == 1) { ?>
                                                                                        <img class = "him" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/pp.jpg" />
                                                                                <?php } else { ?>
                                                                                        <img class = "him" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg" />
                                                                                <?php } ?>
<!--                                                                                <img class="her" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p1.jpg">--><br>
                                                                                <span class="lift-1"> Her Preferences</span>
                                                                        </th>
                                                                        <th>
                                                                                <span class="lift">You match 8/8 of her Preferences</span>
                                                                        </th>
                                                                        <th>
                                                                                <?php
                                                                                if ($current_user->photo != '') {
                                                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $current_user->id);
                                                                                        $current_user_pic = explode('.', $current_user->photo);
                                                                                        ?>
                                                                                        <img class="him" src="<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $current_user->id . '/profile/' . $current_user_pic[0] . '_100_130.' . $current_user_pic[1]; ?>" />
                                                                                        <br>
                                                                                <?php } else if ($current_user->gender == 1) { ?>
                                                                                        <img class = "him" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/pp.jpg" />
                                                                                <?php } else { ?>
                                                                                        <img class = "him" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg" />
                                                                                <?php } ?>
                                                                                <span class = "lift-3"> You Match</span>
                                                                        </th>

                                                                </tr>
                                                        </thead>


                                                        <tbody>

                                                                <tr>
                                                                        <td style = "borde">Age </td>
                                                                        <td><?php echo $partner_details->age_from; ?> to <?php echo $partner_details->age_to; ?></td>
                                                                        <td><?php if (($partner_details->age_from < (date('Y') - $current_user->dob_year)) && (date('Y') - $current_user->dob_year) < ($partner_details->age_to)) { ?>
                                                                                        <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                <?php } else { ?>
                                                                                        <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                <?php } ?></td>

                                                                </tr>
                                                                <?php if ($partner_details->height_from != 0 && $partner_details->height_to != 0) { ?>
                                                                        <tr>
                                                                                <td>Height</td>
                                                                                <td><?php echo $partner_details->height_from; ?> cm to <?php echo $partner_details->height_to; ?> cm</td>
                                                                                <td>
                                                                                        <?php if (($partner_details->height_from < (date('Y') - $current_user->height)) && (date('Y') - $current_user->height) < ($partner_details->height_from)) { ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                        <?php } else { ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                        <?php } ?>
                                                                                </td>

                                                                        </tr>
                                                                <?php } ?>
                                                                <?php if ($partner_details->marital_status != 0) { ?>
                                                                        <tr>
                                                                                <td>Marital Status</td>
                                                                                <td><?php echo MasterMaritalStatus::model()->findByPk($partner_details->marital_status)->marital_status; ?></td>
                                                                                <td>
                                                                                        <?php if ($partner_details->marital_status == $current_user->marital_status) {
                                                                                                ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                        <?php } else { ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                        <?php } ?>
                                                                        </tr>
                                                                <?php } ?>
                                                                <?php if ($partner_details->religion != 0) { ?>
                                                                        <tr>
                                                                                <td>Religion / Community</td>
                                                                                <td><?php echo MasterReligion::model()->findByPk($partner_details->religion)->religion; ?></td>
                                                                                <td> <?php if ($partner_details->religion == $current_user->religion) {
                                                                                ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                        <?php } else { ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                        <?php } ?></td>

                                                                        </tr>

                                                                <?php } ?>
                                                                <?php if ($partner_details->mothertongue != 0) { ?>
                                                                        <tr>
                                                                                <td>Mother Tongue </td>
                                                                                <td><?php echo MasterMotherTongue::model()->findByPk($partner_details->mothertongue)->mother_tongue; ?></td>
                                                                                <td><?php if ($partner_details->mothertongue == $current_user->mothertongue) {
                                                                                ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                        <?php } else { ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                        <?php } ?></td>

                                                                        </tr>
                                                                <?php } ?>
                                                                <?php if ($partner_details->profession_area != 0) { ?>
                                                                        <tr>
                                                                                <td>Education </td>
                                                                                <td><?php echo MasterEducationLevel::model()->findByPk($partner_details->profession_area)->education_level; ?></td>
                                                                                <td><?php if ($partner_details->profession_area == $current_user->education_level) {
                                                                                ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                        <?php } else { ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                        <?php } ?></td>
                                                                        </tr>
                                                                <?php } ?>
                                                                <tr>
                                                                        <td>Smoke </td>
                                                                        <td><?php
                                                                                if ($partner_details->smoke == 0) {
                                                                                        echo 'No';
                                                                                } else if ($partner_details->smoke == 1) {
                                                                                        echo 'Yes';
                                                                                } else if ($partner_details->smoke == 2) {
                                                                                        echo 'Occasionally';
                                                                                }
                                                                                ?></td>
                                                                        <td><?php if ($partner_details->smoke == $current_user->smoke) {
                                                                                        ?>
                                                                                        <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                <?php } else { ?>
                                                                                        <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                <?php } ?></td>
                                                                </tr>

                                                                <tr>
                                                                        <td>Drink </td>
                                                                        <td><?php
                                                                                if ($partner_details->drink == 0) {
                                                                                        echo 'No';
                                                                                } else if ($partner_details->drink == 1) {
                                                                                        echo 'Yes';
                                                                                } else if ($partner_details->drink == 2) {
                                                                                        echo 'Occasionally';
                                                                                }
                                                                                ?></td>
                                                                        <td><?php if ($partner_details->drink == $current_user->drink) {
                                                                                        ?>
                                                                                        <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                <?php } else { ?>
                                                                                        <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                <?php } ?></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                        </div>


                                </div>


                        </div>

                </div>
        </div>
</section>


<script>

        $(document).ready(function () {

                $('.story').slick({
                        slidesToShow: 1,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
                        dots: true,
                        fade: true,
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                },
                                {
                                        breakpoint: 780,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                },
                                {
                                        breakpoint: 767,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                }
                        ]
                });

        });

</script>
<script>

        $(document).ready(function () {

                $('.simi').slick({
                        slidesToShow: 3,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
                        vertical: true,
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 3
                                        }
                                },
                                {
                                        breakpoint: 780,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 3
                                        }
                                },
                                {
                                        breakpoint: 767,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                }
                        ]
                });

        });

</script>
