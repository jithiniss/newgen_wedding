<?php
if (!empty($comments)) {
        foreach ($comments as $comment) {
                ?>
                <div class="post_user">
                        <div class="post_user_image">
                                <?php
                                $profile_pic = CoupleDetails::model()->findByPk($comment->couple_id);
                                if ($profile_pic->photo != '') {
                                        $userPic = explode('.', $profile_pic->photo);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $profile_pic->id);
                                        ?>
                                        <img  class="center-block couple" src = "<?php echo Yii::app()->baseUrl . '/uploads/couple/' . $folder . '/' . $profile_pic->id . '/profile/' . $userPic[0] . '_31_49' . '.' . $userPic[1]; ?>">
                                        <!--<img class="center-block line" src="<?php // echo Yii::app()->request->baseUrl;                                                                                                                                                                                                                                                                                                                                                                                                                                       ?>/uploads/couple/1000/<?= $model->id; ?>/profile/' . $userPic[0] . '_' . $width . '_' . $height . '.' . $userPic[1];">-->
                                <?php } else {
                                        ?>
                                        <!--<img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-female.jpg">-->

                                        <?php
                                }
                                ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo.jpg" />-->
                        </div>
                        <div class="post_user_content">
                                <h5 style="font-weight: bold">  <?php echo CoupleDetails::model()->findByPk($comment->couple_id)->couple_name; ?> On (<?php echo $comment->doc; ?>)</h5>
                                <p><b><?php
                                                if (!empty($comment->comments) && $comment->comments != "") {
                                                        echo $comment->comments;
                                                }
                                                ?></b></p>
                        </div>

                        <div class="clearfix"></div>
                </div>
                <?php
        }
}
?>
<?php if (!empty($comments)) { ?>
        <a href="javascript:void(0)" class="view_comment_list">view all comments</a>
<?php }
?>

<div class="clearfix"></div>
<?php
if (!empty($comment_list)) {
        foreach ($comment_list as $list) {
                ?>
                <div class="view_comments view_all_comments">
                        <div class="post_user_image">
                                <?php
                                $profile_pic = CoupleDetails::model()->findByPk($list->couple_id);
                                if ($profile_pic->photo != '') {
                                        $userPic = explode('.', $profile_pic->photo);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $profile_pic->id);
                                        ?>
                                        <img  class="center-block couple" src = "<?php echo Yii::app()->baseUrl . '/uploads/couple/' . $folder . '/' . $profile_pic->id . '/profile/' . $userPic[0] . '_31_49' . '.' . $userPic[1]; ?>">
                                        <!--<img class="center-block line" src="<?php // echo Yii::app()->request->baseUrl;                                                                                                                                                                                                                                                                                                                                                                                                                                  ?>/uploads/couple/1000/<?= $model->id; ?>/profile/' . $userPic[0] . '_' . $width . '_' . $height . '.' . $userPic[1];">-->
                                <?php } else {
                                        ?>
                                        <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-female.jpg">

                                        <?php
                                }
                                ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo.jpg" />-->
                        </div>
                        <div class="post_user_content">
                                <h5 style="font-weight: bold">  <?php echo CoupleDetails::model()->findByPk($list->couple_id)->couple_name; ?> On (<?php echo $list->doc; ?>)</h5>
                                <p><b><?php
                                                if (!empty($list->comments) && $list->comments != " ") {
                                                        echo $list->comments;
                                                }
                                                ?></b></p>
                        </div>

                        <div class="clearfix"></div>
                </div>
                <?php
        }
}
?>
<div class="clearfix"></div>