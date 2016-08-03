<style>
    .slick-dots li{
        background-color: transparent;
    }
    .horo{
        margin: 0 auto;
        display: block;
        margin-top: -26px;
        margin-bottom: 25px;
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
                        <!--<div class="box-1">-->
                        <div class="computer">
                            <!--<h4>Upload Horoscope</h4>-->
    <!--                                <input class="profile-class" type="file" name="usrname">-->

                            <div class="clearfix"></div>

                            <div class="box">

                                <form method="post" id="photo_update" enctype="multipart/form-data" action="<?= Yii::app()->baseUrl; ?>/index.php/profile/horoscope" >
                                    <input type="file" name="UserDetails[horoscope]" id="file-4" class="inputfile datas inputfile-3 img_files profile_pics"  id="my-file" data-multiple-caption="{count} files selected"  />
                                    <label for="file-4" class="fileUpload"><span>Upload Horoscope</span></label>

                                </form>

                            </div>
                        </div><?php if ($myProfile->horoscope) { ?>
                                <img class="horo" src="<?= Yii::app()->baseUrl . '/uploads/horoscope/' . $myProfile->id . '/horoscope.' . $myProfile->horoscope; ?>">
                        <?php } ?>
                        <!--</div>-->





                    </div>




                    <div class="clearfix"></div>
                    <div class="zeros">
                        <!--****-->





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



                        <div class="fifty-2">
                            <span class="previews">Preview your profile</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<script>
        $(document).ready(function () {
            $('.fileUpload').on('click', function () {
//                        $(".img_files").click();
                $(".img_files").change(function () {
                    var photo = $(".img_files").val();
                    $("form#photo_update").submit();

                });
            });

        });

</script>