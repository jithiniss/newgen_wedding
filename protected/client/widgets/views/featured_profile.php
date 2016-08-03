<?php
foreach ($featured as $feature) {
        $userDetail = UserDetails::model()->findByPk($feature->user_id);
        $userPic = explode('.', $userDetail->photo);
        $folder = Yii::app()->Upload->folderName(0, 1000, $userDetail->id);
        ?>
        <div class="col-md-4 col-sm-6 col-xs-6 sized">
            <div class="load load_featured">
                <!--<img class="center-block img-responsive side" src="<?php // echo Yii::app()->request->baseUrl;    ?>/uploads/user/1000/<?= $userDetail->id; ?>/profile/<?= $userDetail->photo; ?>" alt="img23"/>-->
                <img  class = "center-block img-responsive side" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $userDetail->id . '/profile/' . $userPic[0] . '_' . $width . '_' . $height . '.' . $userPic[1]; ?>">
                <p><span class="names feature_name"><?= $userDetail->first_name; ?> <?= $userDetail->last_name; ?></span>, <?php echo date('Y') - date('Y', strtotime($userDetail->dob_year)); ?> Years</p>
                <h4><?= $userDetail->religion0->religion; ?>, <?= $userDetail->caste0->caste; ?></h4>

            </div>
        </div>
        <!--        <div class="col-lg-3 col-md-4 col-sm-6 nop">
                    <figure class="effect-goliath">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/user/1000/<?= $userDetail->id; ?>/profile/<?= $userDetail->photo ?>" alt="img23"/>
                        <figcaption>

                            <p><span class="names"><?= $userDetail->first_name; ?> <?= $userDetail->last_name; ?></span>, <?php echo date('Y') - date('Y', strtotime($userDetail->dob_year)); ?> Years</p>
                            <h4><?= $userDetail->religion0->religion; ?>, <?= $userDetail->caste0->caste; ?></h4>
                        </figcaption>
                    </figure>
                </div>-->
<?php } ?>