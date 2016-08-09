<style>
        .request_result {
                margin-top: -14px;
        }
        img.center-block.img-responsive.side {
                height: 197px;
        }
</style>
<div class="loads">
        <?php
        $last_login = date('i') - strtotime('Y-m-d H:i:s', $data->last_login);
        if ($last_login > 43200) {
                $last_login = $last_login / 43200 . 'Month';
        } else if ($last_login > 1440) {
                $last_login = $last_login / 1440 . 'days';
        } else if ($last_login > 60) {
                $last_login = $last_login / 60 . 'Hours';
        } else {
                $last_login = $last_login . 'Min';
        }
        ?>
        <h1><a style="text-decoration: none" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Partner/Partnerdetails/userid/<?php echo $data->user_id; ?>"><?php echo $data->first_name; ?> - <?php echo $data->id; ?></a></h1>
        <h2>Profile created by <?php echo date('i') - strtotime('Y-m-d H:i:s', $data->last_login); ?> Last Online <?php echo $last_login; ?> ago  </h2>
        <div class="last">
                <div class="last-1">
                        <div class="profile">
                                <?php
                                $this->widget("application.client.widgets.PhotoVisibility", array(
                                    'id' => $data->id,
                                ));
                                ?>
                                <!--<img class="center-block file img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p1.jpg">-->
<!--                                <img class="lock" src="images/lock.png">
                                <h6>Visible on Accept</h6>-->
                        </div>
                </div>
                <div class="last-2">

                        <div class="commonz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">Age / Height:</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz"><?php echo date('Y') - $data->dob_year; ?> yrs,  <?php echo MasterHeight::model()->findByPk($data->height)->height ?></label>
                                </div>
                        </div>
                        <div class="commonz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">Religion</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz"><?php echo MasterReligion::model()->findByPk($data->religion)->religion ?></label>
                                </div>

                        </div>



                        <div class="commonz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">Mother Tongue</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz"><?php echo MasterMotherTongue::model()->findByPk($data->mothertongue)->mother_tongue ?></label>
                                </div>

                        </div>


                        <div class="commonz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">Community</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz"><?php echo MasterCaste::model()->findByPk($data->caste)->caste ?></label>
                                </div>
                        </div>
                        <div class="commonz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">Location	</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz"><?php echo MasterState::model()->findByPk($data->state)->state ?>, <?php echo MasterCountry::model()->findByPk($data->country)->country ?></label>
                                </div>
                        </div>




                        <div class="commonz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">Education</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz"><?php echo MasterEducationField::model()->findByPk($data->education_field)->education_field ?></label>
                                </div>
                        </div>


                        <div class="commonz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">Profession</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz"><?php echo MasterWorkingAs::model()->findByPk($data->working_as)->working_as ?></label>
                                </div>
                        </div>




                </div>
        </div>
        <div class="online">
                <div class="col-md-2 col-sm-2 col-xs-6 nop liz">
                        <a class="album" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Partner/Partnerdetails/userid/<?php echo $data->user_id; ?>"><img class="profiles" src="<?php echo Yii::app()->request->baseUrl; ?>/images/profile.png">View Album</a>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6 nop liz">
                        <a class="album" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Partner/Partnerdetails/userid/<?php echo $data->user_id; ?>"><img class="profiles" src="<?php echo Yii::app()->request->baseUrl; ?>/images/users.png">View Full Profile</a>
                </div>
                <!--                <div class="col-md-4 col-sm-3 col-xs-12 nop liz">
                                        <h5>Connect with her?</h5>
                                </div>-->
                <div class="col-md-4 col-sm-4 col-xs-12 nop liz">
                        <?php
                        $this->widget("application.client.components.UserInterest", array(
                            'interest_id' => $data->user_id,
                        ));
                        ?>
                </div>

                <div class="col-md-12 col-sm-12 nop">
                        <p><?php echo $data->about_me; ?></p>
                        <a class="hey" href="#">Read More<i class="fa would fa-caret-right"></i></a>
                </div>
        </div>
        <div class="clearfix"></div>
</div>

<div class="clearfix visible-xs"></div>