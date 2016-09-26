
<link href="<?= Yii::app()->baseUrl ?>/css/new.css" rel="stylesheet">
<section class="vendors">
        <div class="container">



                <div class="row">

                        <?php
                        $this->renderPartial('_leftSide', array('model' => $model));
                        ?>



                        <div class="col-md-9">
                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                        <div class="alert alert-success">
                                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>

                                        </div>
                                <?php endif; ?>
                                <a href="#" style="text-decoration:none;" class="connect-86" id="post_id">Add Post</a>
                                <?php // echo CHtml::link('Add Post', array('couple/addNewPost'), array('class' => 'connect-86')); ?>
                                <?php
                                $this->renderPartial('_addpost', array('addedpost' => $addedpost));
                                ?>

                        </div>

                        <div class="col-md-9">
                                <div class="send">
                                        <?php
                                        if (!empty($adduploads)) {
                                                foreach ($adduploads as $post) {
                                                        $profile_pic = CoupleDetails::model()->findByPk($post->cb);
                                                        ?>
                                                        <div class="couple_home">
                                                                <div class="ui-send ">
                                                                        <div class="send-left-couple">
                                                                                <?php
                                                                                if ($profile_pic->photo != '') {
                                                                                        $userPic = explode('.', $profile_pic->photo);
                                                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $profile_pic->id);
                                                                                        ?>
                                                                                        <img  class="center-block couple" src = "<?php echo Yii::app()->baseUrl . '/uploads/couple/' . $folder . '/' . $profile_pic->id . '/profile/' . $userPic[0] . '_31_49' . '.' . $userPic[1]; ?>">
                                                                                        <!--<img class="center-block line" src="<?php // echo Yii::app()->request->baseUrl;                                                                                                                                                                                                                                                                          ?>/uploads/couple/1000/<?= $model->id; ?>/profile/' . $userPic[0] . '_' . $width . '_' . $height . '.' . $userPic[1];">-->
                                                                                <?php } else {
                                                                                        ?>
                                                                                        <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-female.jpg">

                                                                                        <?php
                                                                                }
                                                                                ?>
                                                                        </div>

                                                                        <div class="couple_text">
                                                                                <b><?php echo $profile_pic->couple_name; ?></b> added new post
                                                                                <div class="couple_text_date">
                                                                                        <?php echo date(" dS F Y, H:i", strtotime($post->doc)); ?>
                                                                                </div>
                                                                        </div>


                                                                        <div class="couple_uploads">
                                                                                <div class="cont"><?php echo $post->title; ?></div>
                                                                                <?php
                                                                                if ($post->file != "") {
                                                                                        if ($post->file_type == 2) {
                                                                                                echo '<img class="img-responsive" src="' . Yii::app()->baseUrl . '/uploads/couple' . '/' . $post->cb . '/files/' . $post->id . '_.' . $post->file . '" />';
                                                                                        }
                                                                                }
                                                                                ?>


                                                                        </div>

                                                                        <div class="couple_like">
                                                                                <?php
                                                                                $like = CoupleUploadReport::model()->findByAttributes(array('like_id' => Yii::app()->session['couple']['id'], 'couple_upload_id' => $post->id));
                                                                                $criteria = new CDbCriteria;
                                                                                $criteria->condition = 'like = 1';
                                                                                $criteria->condition = 'couple_upload_id =' . $post->id . '';
                                                                                $total = CoupleUploadReport::model()->count($criteria);
                                                                                if (!empty($like)) {
                                                                                        ?>
                                                                                        <a href="#" data-toggle="tooltip"  data-placement="top" title="Like"><i class="fa fa-thumbs-o-up" style="font-size: 15px;padding: 8px;color: blue;"> <?php echo $total; ?> </i></a>

                                                                                <?php } else { ?>
                                                                                        <a href="#" data-toggle="tooltip" onclick="likeuploads(<?php echo $post->cb ?>,<?php echo $post->id ?>,<?php echo Yii::app()->session['couple']['id']; ?>)" data-placement="top" title="Like"><i class="fa fa-thumbs-o-up" style="font-size: 15px;padding: 8px;"> <?php echo '23'; ?> </i></a>

                                                                                <?php } ?>
                                                                                <?php
                                                                                $criteria1 = new CDbCriteria;
                                                                                $criteria1->condition = 'dislike = 1';
                                                                                $criteria1->condition = 'couple_upload_id =' . $post->id . '';
                                                                                $total1 = CoupleUploadReport::model()->count($criteria1);
                                                                                $dislike = CoupleUploadReport::model()->findByAttributes(array('dislike_id' => Yii::app()->session['couple']['id'], 'couple_upload_id' => $post->id));
                                                                                if (!empty($dislike)) {
                                                                                        ?>
                                                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Dislike"><i class="fa fa-thumbs-o-down" style="font-size: 15px;padding: 8px;color: blue; "> <?php echo $total1; ?> </i></a>

                                                                                <?php } else { ?>
                                                                                        <a href="#" data-toggle="tooltip" onclick="dislikeuploads(<?php echo $post->cb ?>,<?php echo $post->id ?>,<?php echo Yii::app()->session['couple']['id']; ?>)" data-placement="top" title="Dislike"><i class="fa fa-thumbs-o-down" style="font-size: 15px;padding: 8px;"> <?php echo '23'; ?> </i></a>

                                                                                <?php } ?>
                                                                                <?php
                                                                                $criteria2 = new CDbCriteria;
                                                                                $criteria2->condition = 'comment = 1';
                                                                                $criteria2->condition = 'couple_upload_id =' . $post->id . '';
                                                                                $total2 = CoupleUploadReport::model()->count($criteria2);
                                                                                ?>

                                                                                <a href="#" data-toggle="tooltip" id="couple_comment"  data-placement="top" title="Comment"><i class="fa fa-comments-o" style="font-size: 15px;padding: 8px;"> <?php echo $total2; ?>  </i></a>
                                                                                <div class="cont couple_comment">
                                                                                        dhggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggdh
                                                                                        <div class="couple_text">

                                                                                                <?php
//                                                                                                $comment = CoupleUploadReport::model()->findAll();
//                                                                                                foreach ($comment as $comments) {
//                                                                                                        $couple = CoupleDetails::model()->findByPk($comments->comment_id);
                                                                                                ?>
                                                                                                <div class="comment_text"><?php echo 'veena-mahesh' ?></div>
                                                                                                <div class="couple_text_date">
                                                                                                        <?php // echo date(" dS F Y, H:i", strtotime($comments->doc)); ?>
                                                                                                </div>
                                                                                                <?php // }  ?>
                                                                                        </div>

                                                                                </div>

                                                                                <div class="common">
                                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                                <div class="form-group">
                                                                                                        <textarea id="couple_textarea" name="comment_box" class="couple_textarea" placeholder="Share your comments here....."></textarea>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>

                                                                        </div>
                                                                </div>






                                                                <!--                                                                <div class="ui-send ">
                                                                                                                                        <div class="send-left">
                                                                <?php
//                                                                                if ($post->file != "") {
//                                                                                        echo '<img class="img-responsive" src="' . Yii::app()->baseUrl . '/uploads/couple' . '/' . $post->cb . '/files/' . $post->id . '_.' . $post->file . '" />';
                                                                ?>

                                                                <?php // }         ?>
                                                                                                                                        </div>

                                                                                                                                        <div class="send-left couple_text">
                                                                <?php // echo $post->texts;         ?>
                                                                                                                                        </div>
                                                                                                                                        <div class="send-right">
                                                                                                                                                <div class="lev-2">
                                                                                                                                                        <h3><?php // echo date(" dS F Y", strtotime($post->doc));                                                                                                                                                                                                                                                                               ?></h3>
                                                                                                                                                </div>
                                                                                                                                                                                                                <div class="lev-2">
                                                                                                                                                                                                                <a href="">Like</a>
                                                                                                                                                                                                                </div>
                                                                                                                                        </div>
                                                                                                                                </div>-->
                                                        </div>
                                                        <?php
                                                }
                                        }
                                        ?>



                                </div>
                        </div>







                </div>

        </div>
</section>

<script>
        $(document).ready(function () {
                $(".couple_post").hide();
                $(".couple_comment").hide();
                $("#couple_comment").on('click', function () {
                        $(".couple_comment").show();
                });
                $("#post_id").on('click', function () {
                        $(".couple_post").show();
                });
                $("#UsersFiles_file_type").on('change', function () {
                        var file_type = $('#UsersFiles_file_type').val();
                        if (file_type == 3) {
                                $('.file_texts').show();
                                $('#file_uploads').hide();
                        } else if (file_type == 1 || file_type == 2) {
                                $('.file_texts').hide();
                                $('#file_uploads').show();
                        }
                        $('#UsersFiles_file_type').change(function () {
                                var file_type = $('#UsersFiles_file_type').val();
                                if (file_type == 3) {
                                        $('.file_texts').show();
                                        $('#file_uploads').hide();
                                } else if (file_type == 1 || file_type == 2) {
                                        $('.file_texts').hide();
                                        $('#file_uploads').show();
                                }
                        });

                });


                $("textarea#couple_textarea").keypress(function (event) {
                        if (event.which == 13) {
                                event.preventDefault();
                                var comment = $("#couple_textarea").val();
                                $.ajax({
                                        url: baseurl + 'Couple/Comment',
                                        type: "POST",
                                        cache: 'false',
                                        data: {comment: comment}
                                }).done(function (data) {
                                        window.location.replace("<?= Yii::app()->baseUrl; ?>/index.php/couple/home/");
                                });
                        }
                });
        });

</script>
<script>
        $("#comment_box").hide();
        function likeuploads(couple_id, couple_upload_id, like_id) {
                $.ajax({
                        url: baseurl + 'Couple/Like',
                        type: "POST",
                        cache: 'false',
                        data: {couple_id: couple_id, couple_upload_id: couple_upload_id, like_id: like_id}
                }).done(function (data) {
                        window.location.replace("<?= Yii::app()->baseUrl; ?>/index.php/couple/home/");
                });
        }
        function dislikeuploads(couple_id, couple_upload_id, dislike_id) {
                $.ajax({
                        url: baseurl + 'Couple/Dislike',
                        type: "POST",
                        cache: 'false',
                        data: {couple_id: couple_id, couple_upload_id: couple_upload_id, dislike_id: dislike_id}
                }).done(function (data) {
                        window.location.replace("<?= Yii::app()->baseUrl; ?>/index.php/couple/home/");
                });
        }
        $(document).ready(function () {
                $("#comment_box").hide();
        });
</script>




