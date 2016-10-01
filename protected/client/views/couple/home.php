
<link href="<?= Yii::app()->baseUrl ?>/css/new.css" rel="stylesheet">
<section class="vendors">
        <div class="container">



                <div class="row">

                        <?php
                        $this->renderPartial('_leftSide', array('model' => $model));
                        ?>



                        <div class="col-md-9">
                                <div class="add_new_post">
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
                                                                                        <!--<img class="center-block line" src="<?php // echo Yii::app()->request->baseUrl;                                                                                                                                                                                                                                                                                                                                                                                                                                                             ?>/uploads/couple/1000/<?= $model->id; ?>/profile/' . $userPic[0] . '_' . $width . '_' . $height . '.' . $userPic[1];">-->
                                                                                <?php } else {
                                                                                        ?>
                                                                                        <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-female.jpg">

                                                                                        <?php
                                                                                }
                                                                                ?>
                                                                        </div>

                                                                        <div class="couple_text">
                                                                                <b><?php echo $profile_pic->couple_name; ?></b> added new post<?php echo $post->id; ?>
                                                                                <div class="couple_text_date">
                                                                                        <?php echo date(" dS F Y, H:i", strtotime($post->doc)); ?>
                                                                                </div>
                                                                        </div>


                                                                        <div class="couple_uploads">
                                                                                <div class="cont"><?php echo $post->title; ?></div>
                                                                                <?php
                                                                                if ($post->file != "") {
                                                                                        echo '<img class="img-responsive" src="' . Yii::app()->baseUrl . '/uploads/couple' . '/' . $post->cb . '/files/' . $post->id . '_.' . $post->file . '" />';
                                                                                }
                                                                                ?>


                                                                        </div>

                                                                        <div class="couple_like">
                                                                                <?php
                                                                                $like = CoupleUploadReport::model()->findByAttributes(array('like_id' => Yii::app()->session['couple']['id'], 'couple_upload_id' => $post->id));
//                                                                                $criteria = new CDbCriteria;
//                                                                                $criteria->condition = 'like = 1 AND couple_upload_id=' . $post->id . '';
                                                                                $pid = $post->id;
                                                                                $like_count = CoupleUploadReport::model()->findAllByAttributes(array('like' => 1, 'couple_upload_id' => $pid));

//                                                                                $criteria->condition = 'like = 1';
//                                                                                $criteria->condition = 'couple_upload_id =' . $post->id . '';
                                                                                $total = count($like_count);
                                                                                if (!empty($like)) {
                                                                                        ?>
                                                                                        <a href="javascript:void(0)"  data-toggle="tooltip" onclick="likeuploads(<?php echo $post->cb ?>,<?php echo $post->id ?>,<?php echo Yii::app()->session['couple']['id']; ?>)"  data-placement="top" title="Like"><i class="fa fa-thumbs-o-up likecount_<?php echo $post->id; ?>" style="font-size: 15px;padding: 8px;color: blue;"> <?php echo $total; ?> </i></a>

                                                                                <?php } else { ?>
                                                                                        <a href="javascript:void(0);" data-toggle="tooltip" onclick="likeuploads(<?php echo $post->cb ?>,<?php echo $post->id ?>,<?php echo Yii::app()->session['couple']['id']; ?>)" data-placement="top" title="Like"><i class="fa fa-thumbs-o-up likecount_<?php echo $post->id; ?>" style="font-size: 15px;padding: 8px;"> <?php echo $total; ?> </i></a>

                                                                                <?php } ?>
                                                                                <?php
                                                                                $criteria1 = new CDbCriteria;
                                                                                $criteria1->condition = 'dislike = 1 AND couple_upload_id=' . $post->id . '';
//                                                                                $criteria1->condition = 'couple_upload_id =' . $post->id . '';
                                                                                $total1 = CoupleUploadReport::model()->count($criteria1);
                                                                                $dislike = CoupleUploadReport::model()->findByAttributes(array('dislike_id' => Yii::app()->session['couple']['id'], 'couple_upload_id' => $post->id));
                                                                                if (!empty($dislike)) {
                                                                                        ?>
                                                                                        <a href="javascript:void(0);" data-toggle="tooltip" onclick="dislikeuploads(<?php echo $post->cb ?>,<?php echo $post->id ?>,<?php echo Yii::app()->session['couple']['id']; ?>)" data-placement="top" title="Dislike"><i class="fa fa-thumbs-o-down dislikecount_<?php echo $post->id; ?>" style="font-size: 15px;padding: 8px;color: blue; "> <?php echo $total1; ?> </i></a>

                                                                                <?php } else { ?>
                                                                                        <a href="javascript:void(0);" data-toggle="tooltip" onclick="dislikeuploads(<?php echo $post->cb ?>,<?php echo $post->id ?>,<?php echo Yii::app()->session['couple']['id']; ?>)" data-placement="top" title="Dislike"><i class="fa fa-thumbs-o-down dislikecount_<?php echo $post->id; ?>" style="font-size: 15px;padding: 8px;"> <?php echo $total1; ?> </i></a>

                                                                                <?php } ?>
                                                                                <?php
                                                                                $criteria2 = new CDbCriteria;
                                                                                $criteria2->condition = 'comment = 1 AND comments !=" " AND couple_upload_id=' . $post->id . '';
//                                                                                $criteria2->condition = 'couple_upload_id =' . $post->id . '';
                                                                                $total2 = CoupleUploadReport::model()->count($criteria2);
                                                                                ?>

                                                                                <a href="javascript:void(0);" data-toggle="tooltip"  data-placement="top" title="comments"><i class="fa fa-comments-o"  style="font-size: 15px;padding: 8px;"> <?php echo $total2; ?>  </i></a>
                                                                                <!--<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/couple/Viewallcomments">View all comments</a>-->
                                                                                <?php
                                                                                $this->renderPartial('_addpost', array('addedpost' => $addedpost));
                                                                                ?>
                                                                                <style>
                                                                                        .post_user_image img {
                                                                                                width: 25px;
                                                                                        }
                                                                                        .user_comment{
                                                                                                margin: 20px 0px;
                                                                                        }
                                                                                        .post_user_image {
                                                                                                width: 7%;
                                                                                                float: left;
                                                                                                padding-top: 10px;
                                                                                        }
                                                                                        .post_user_content {
                                                                                                width: 93%;
                                                                                                float: left;
                                                                                                padding-top: 10px;
                                                                                        }
                                                                                        .post_user_content h5 {
                                                                                                font-weight: bold;
                                                                                                font-size: 9px;
                                                                                                margin: 0px;
                                                                                        }
                                                                                        .post_user_content p {
                                                                                                margin: 0px;
                                                                                        }
                                                                                        .post_user {
                                                                                                margin-bottom: 15px;
                                                                                        }
                                                                                        .view_comment_list{
                                                                                                color: #c76e6e;
                                                                                                padding-left: 12px;

                                                                                        }
                                                                                </style>
                                                                                <div class="user_comment">
                                                                                        <div id="post_content<?php echo $post->id ?>">
                                                                                                <?php
                                                                                                $comment_list = CoupleUploadReport::model()->findAllByAttributes(array('couple_upload_id' => $post->id), array('order' => 'id desc'));
                                                                                                $comments = CoupleUploadReport::model()->findAllByAttributes(array('couple_upload_id' => $post->id), array('limit' => 3, 'order' => 'id desc'));
                                                                                                $this->renderPartial('_coment_content', array('comments' => $comments, 'comment_list' => $comment_list));
                                                                                                ?>

                                                                                        </div>

                                                                                        <div class="clearfix"></div>
                                                                                </div>

                                                                                <div class="common">
                                                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                                                <div class="form-group">
                                                                                                        <textarea id="couple_textarea" post_id="<?php echo $post->id ?>" name="comment_box" class="couple_textarea" placeholder="Share your comments here....."></textarea>
                                                                                                </div>
                                                                                        </div>
                                                                                        <input type="hidden" id="comment_id" value="<?php echo $post->cb ?>"/>
                                                                                        <input type="hidden" id="comment_upload_id" value="<?php echo $post->id ?>"/>
                                                                                        <input type="hidden" id="session_upload_id" value="<?php echo Yii::app()->session['couple']['id']; ?>"/>
                                                                                </div>

                                                                        </div>
                                                                </div>

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
                $(".view_all_comments").hide();
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
                                var post_id = $(this).attr("post_id");
                                var comment = $(this).val();

                                var couple_id = $("#comment_id").val();
                                //      alert(comment);
                                var couple_upload_id = post_id;
                                var comment_id = $("#session_upload_id").val();
                                $.ajax({
                                        url: baseurl + 'Couple/Comment',
                                        type: "POST",
                                        cache: 'false',
                                        data: {couple_id: couple_id, couple_upload_id: couple_upload_id, comment_id: comment_id, comment: comment}
                                });
//                                        .done(function (data) {
//                                        $("#post_content" + post_id).html(data);
//                                        //  window.location.replace("<?= Yii::app()->baseUrl; ?>/index.php/couple/home/");
//                                });
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
                        var obj = jQuery.parseJSON(data);
                        $(".likecount_" + obj.post_id).html(obj.like_count);
                        $(".dislikecount_" + obj.post_id).html(obj.dislike_count);
//                        window.location.replace("<? //= Yii::app()->baseUrl; ?>/index.php/couple/home/");
                });
                // return false;

        }
        function dislikeuploads(couple_id, couple_upload_id, dislike_id) {
                $.ajax({
                        url: baseurl + 'Couple/Dislike',
                        type: "POST",
                        cache: 'false',
                        data: {couple_id: couple_id, couple_upload_id: couple_upload_id, dislike_id: dislike_id}
                }).done(function (data) {
                        var obj = jQuery.parseJSON(data);
                        $(".likecount_" + obj.post_id).html(obj.like_count);
                        $(".dislikecount_" + obj.post_id).html(obj.dislike_count);
                });
        }
        $(document).ready(function () {
                $(".view_comment_list").on('click', function () {
                        $(".view_all_comments").show();
                        $(".view_comment_list").hide();
                });
        });
</script>




