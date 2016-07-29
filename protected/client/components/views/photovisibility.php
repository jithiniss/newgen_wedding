<div class="profile nnn">

        <?php
        if ($partner->photo != '') {
                $userPic = explode('.', $partner->photo);
                $folder = Yii::app()->Upload->folderName(0, 1000, $partner->id);
                ?>
                <?php
                if ($partner->photo_visibility == 1) {
                        ?>
                        <img class = "center-block img-responsive side" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $partner->id . '/profile/' . $userPic[0] . '_' . $width . '_' . $height . '.' . $userPic[1]; ?>">
                        <?php
                } else if ($partner->photo_visibility == 2) {
                        if (!empty($intrest_send)) {
                                ?>
                                <img class = "center-block img-responsive side" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $partner->id . '/profile/' . $userPic[0] . '_' . $width . '_' . $height . '.' . $userPic[1]; ?>">

                                <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg">
                        <?php } else if (!empty($intrest_send)) {
                                ?>
                                <img class = "center-block img-responsive side" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $partner->id . '/profile/' . $userPic[0] . '_' . $width . '_' . $height . '.' . $userPic[1]; ?>">
                        <?php } else { ?>
                                <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w4.jpg">
                                <img class="lock" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                <p>Visible on Accept</p>
                        <?php } ?>
                <?php } else if ($partner->photo_visibility == 2) { ?>
                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w4.jpg">
                        <img class="lock" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                        <p>Password Protected</p>
                <?php } else { ?>
                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg">
                <?php } ?>
                <?php
        } else {
                var_dump($partner->photo);
                exit;
                ?>
                <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg">
        <?php } ?>

</div>
