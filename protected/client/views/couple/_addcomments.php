<div class="cont couple_comment" id="comment_box">
        <?php
        $comment_id = CoupleUploadReport::model()->findAllByAttributes(array('couple_upload_id' => $post->id));
        foreach ($comment_id as $comment_ids) {
                $users_id = CoupleDetails::model()->findByPk($comment_ids->comment_id);
//                if ($users_id->photo != '') {
//                        $userPic = explode('.', $users_id->photo);
//                        $folder = Yii::app()->Upload->folderName(0, 1000, $users_id->id);
                ?>
                                        <!--<img  class="center-block couple" src = "<?php echo Yii::app()->baseUrl . '/uploads/couple/' . $folder . '/' . $users_id->id . '/profile/' . $userPic[0] . '_31_49' . '.' . $userPic[1]; ?>">-->
                                        <!--<img class="center-block line" src="<?php // echo Yii::app()->request->baseUrl;                                                                                                                                                                                                                                                                                               ?>/uploads/couple/1000/<?= $model->id; ?>/profile/' . $userPic[0] . '_' . $width . '_' . $height . '.' . $userPic[1];">-->
                <?php // } else {
                ?>
                                        <!--<img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-female.jpg">-->

                <?php
//                }
                ?>
                <?php echo $comment_ids->comment; ?>
                <div class="couple_text">

                        <div class="comment_text"><?php echo $users_id->couple_name; ?></div>
                        <div class="couple_text_date">
                                <?php // echo date(" dS F Y, H:i", strtotime($comments->doc));  ?>
                        </div>
                        <?php // }   ?>
                </div>
        <?php } ?>
</div>