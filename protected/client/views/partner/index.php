<style>
        .slick-dots li{
                background-color: transparent;
        }
</style>
<section class="similar">
        <div class="container">
                <div class="row">
                        <div class="col-md-3 col-sm-4">
                                <div class="profilez">
                                        <?php
                                        if ($user_details->photo != '') {
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $user_details->id);
                                                ?>
                                                <img class = "img-responsive fulls" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $user_details->id . '/profile/' . $user_details->photo; ?>"><br>
                                        <?php } else if ($user_details->gender == 1) { ?>
                                                <img class = "img-responsive fulls" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/pp.jpg" />
                                        <?php } else { ?>
                                                <img class = "img-responsive fulls" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg" />
                                        <?php } ?>

                                        <a class="doc1" href="#"><img class="albums" src="<?php echo Yii::app()->request->baseUrl; ?>/images/album.png">View Album</a>
                                        <a class="doc2" href="#"><img class="album" src="<?php echo Yii::app()->request->baseUrl; ?>/images/d3.png">Report Misuse</a>
                                        <div class="clearfix">  </div>
                                        <h1>Similar Profiles</h1>

                                        <div class="simi">
                                                <div class="item">
                                                        <div class="main luck">
                                                                <img class="sim" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w2.jpg">
                                                                <h4>Amala Paul</h4>
                                                                <h2>24 yrs, 5' 4", Christian, English</h2>
                                                                <h2>Doctor</h2>
                                                                <h2>Lives in Cuttack, India</h2>
                                                        </div>
                                                </div>
                                                <div class="item">
                                                        <div class="main luck">
                                                                <img class="sim" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w2.jpg">
                                                                <h4>Amala Paul</h4>
                                                                <h2>24 yrs, 5' 4", Christian, English</h2>
                                                                <h2>Doctor</h2>
                                                                <h2>Lives in Cuttack, India</h2>
                                                        </div>
                                                </div>

                                                <div class="item">
                                                        <div class="main luck">
                                                                <img class="sim" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w2.jpg">
                                                                <h4>Amala Paul</h4>
                                                                <h2>24 yrs, 5' 4", Christian, English</h2>
                                                                <h2>Doctor</h2>
                                                                <h2>Lives in Cuttack, India</h2>
                                                        </div>
                                                </div>

                                                <div class="item">
                                                        <div class="main luck">
                                                                <img class="sim" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w2.jpg">
                                                                <h4>Amala Paul</h4>
                                                                <h2>24 yrs, 5' 4", Christian, English</h2>
                                                                <h2>Doctor</h2>
                                                                <h2>Lives in Cuttack, India</h2>
                                                        </div>
                                                </div>

                                        </div>



                                        <h1>Success Stories</h1>


                                        <div class="story">
                                                <div class="item">
                                                        <div class="main">
                                                                <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/d33.jpg">
                                                                <h5>It was being a rapid transition...being bachelor to being engaged, to be married.</h5>
                                                        </div>
                                                </div>
                                                <div class="item">
                                                        <div class="main">
                                                                <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/d3.jpg">
                                                                <h5>It was being a rapid transition...being bachelor to being engaged, to be married.</h5>
                                                        </div>
                                                </div>
                                                <div class="item">
                                                        <div class="main">
                                                                <img class="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/d44.jpg">
                                                                <h5>It was being a rapid transition...being bachelor to being engaged, to be married.</h5>
                                                        </div>
                                                </div>
                                        </div>

                                </div>
                        </div>

                        <div class="col-md-9 col-sm-8 janet">
                                <h1><?php echo $user_details->first_name . ' ' . $user_details->first_name; ?> &nbsp;
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
                                                        <li><i class = "fa love fa-user"></i><?php echo date('Y') - $user_details->dob_year;
                                        ?> yrs, <?php echo MasterHeight::model()->findByPk($user_details->height)->height; ?>, <?php
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
                                                <div class="connect-6">
                                                        <h5>Do you want to connect?</h5>

                                                        <div class="yes">
                                                                <div class="f4"><a href="#" class="connect-3">Yes</a></div>
                                                                <div class="f5"><a href="#" class="connect-4">No</a></div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <a href="#" class="offsets"><i class="fa car fa-envelope"></i>Send a message<i class="fa car fa-caret-right"></i></a>
                                                        <a href="#" class="offsets"><i class="fa car fa-phone"></i>View  Contacts<i class="fa car fa-caret-right"></i></a>

                                                </div>
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
                                                        <p>DIY(do it yourself) projects, Photography, Handicraft, Singing</p>
                                                </div>
                                        </div>

                                        <div class="drink">
                                                <div class="smoke-2">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/c2.png">
                                                </div>
                                                <div class="skin-2">
                                                        <h3> Interests & Hobbies</h3>
                                                        <p>MusicBlues, Gospel Music, Country Music, Jazz, R&B / Soul
                                                        </p>
                                                </div>
                                        </div>


                                        <div class="drink">
                                                <div class="smoke-2">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/c3.png">
                                                </div>
                                                <div class="skin-2">
                                                        <h3>Movies</h3>
                                                        <p>Classical, Art, Sci-Fi & Fantasy</p>
                                                </div>
                                        </div>


                                        <div class="drink">
                                                <div class="smoke-2">
                                                        <img class="non" src="<?php echo Yii::app()->request->baseUrl; ?>/images/c4.png">
                                                </div>
                                                <div class="skin-3">
                                                        <h3>Sports</h3>
                                                        <p>Badminton, Water Sports</p>
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
                                                                                        ?>
                                                                                        <img class = "her" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $user_details->id . '/profile/' . $user_details->photo; ?>"><br>
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
                                                                                if (Yii::app()->session['user']['photo'] != '') {
                                                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $user_details->id);
                                                                                        ?>
                                                                                        <img class = "him" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . Yii::app()->session['user']['id'] . '/profile/' . Yii::app()->session['user']['photo']; ?>"><br>
                                                                                <?php } else if (Yii::app()->session['user']['gender'] == 1) { ?>
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
                                                                        <td><?php if (($partner_details->age_from < (date('Y') - Yii::app()->session['user']['dob_year'])) && (date('Y') - Yii::app()->session['user']['dob_year']) < ($partner_details->age_to)) { ?>
                                                                                        <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                <?php } else { ?>
                                                                                        <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                <?php } ?></td>

                                                                </tr>
                                                                <?php if ($partner_details->height_from != 0 && $partner_details->height_from != 0) { ?>
                                                                        <tr>
                                                                                <td>Height</td>
                                                                                <td><?php echo $partner_details->height_from; ?> cm to <?php echo $partner_details->height_to; ?> cm</td>
                                                                                <td>
                                                                                        <?php if (($partner_details->height_from < (date('Y') - Yii::app()->session['user']['height'])) && (date('Y') - Yii::app()->session['user']['height']) < ($partner_details->height_from)) { ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                        <?php } else { ?>
                                                                                                <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                        <?php } ?>
                                                                                </td>

                                                                        </tr>
                                                                <?php } ?>

                                                                <tr>
                                                                        <td>Marital Status</td>
                                                                        <td>Never Married</td>
                                                                        <td>
                                                                                <?php if ($partner_details->marital_status == Yii::app()->session['user']['marital_status']) { ?>
                                                                                        <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">
                                                                                <?php } else { ?>
                                                                                        <img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png">
                                                                                <?php } ?>
                                                                </tr>

                                                                <tr>
                                                                        <td>Religion / Community</td>
                                                                        <td>Christian:Born Again, Christian:IPC... more</td>
                                                                        <td><img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png"></td>

                                                                </tr>



                                                                <tr>
                                                                        <td>Mother Tongue </td>
                                                                        <td>English, Malayalam</td>
                                                                        <td><img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png"></td>

                                                                </tr>

                                                                <tr>
                                                                        <td>Education </td>
                                                                        <td>Masters</td>
                                                                        <td><img class = "never" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td>Smoke </td>
                                                                        <td> Don't include profiles who smoke</td>
                                                                        <td><img class="never" src="<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png"></td>
                                                                </tr>

                                                                <tr>
                                                                        <td>Drink </td>
                                                                        <td> Never Drinks </td>
                                                                        <td><img class="never" src="<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png"></td>
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