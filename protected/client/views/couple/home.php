
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
                                                                                        <!--<img class="center-block line" src="<?php // echo Yii::app()->request->baseUrl;                                                                            ?>/uploads/couple/1000/<?= $model->id; ?>/profile/' . $userPic[0] . '_' . $width . '_' . $height . '.' . $userPic[1];">-->
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
                                                                                <!--<img src="<?php echo Yii::app()->baseUrl ?>/images/1.jpg">-->
                                                                                <?php
                                                                                if ($post->file != "") {
                                                                                        if ($post->file_type == 2) {
                                                                                                echo '<img class="img-responsive" src="' . Yii::app()->baseUrl . '/uploads/couple' . '/' . $post->cb . '/files/' . $post->id . '_.' . $post->file . '" />';
                                                                                        }
                                                                                }
                                                                                ?>


                                                                        </div>
                                                                </div>






                                                                <!--                                                                <div class="ui-send ">
                                                                                                                                        <div class="send-left">
                                                                <?php
//                                                                                if ($post->file != "") {
//                                                                                        echo '<img class="img-responsive" src="' . Yii::app()->baseUrl . '/uploads/couple' . '/' . $post->cb . '/files/' . $post->id . '_.' . $post->file . '" />';
                                                                ?>

                                                                <?php // }     ?>
                                                                                                                                        </div>

                                                                                                                                        <div class="send-left couple_text">
                                                                <?php // echo $post->texts;     ?>
                                                                                                                                        </div>
                                                                                                                                        <div class="send-right">
                                                                                                                                                <div class="lev-2">
                                                                                                                                                        <h3><?php // echo date(" dS F Y", strtotime($post->doc));                                                                                 ?></h3>
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

        });
</script>




