
<style>
        .slick-dots li{
                background-color: transparent;
        }



</style>
<section class="my">
        <div class="container">
                <div class="row">

                        <?php $this->renderPartial('_leftSide'); ?>
                        <div class="col-md-9 details">
                                <h1>My Photos</h1>

                                <ul id="myTabs" class="nav nav-tabs nav-justified adv">
                                        <li class="sims active"><?php echo CHtml::link('Photo Album', array('Profile/MyPhotos')); ?></li>
                                        <li class="sims "><?php echo CHtml::link('Settings', array('Profile/PhotoSettings')); ?></li>

                                </ul>



                                <div class="outs-2">


                                        <div class="med">
                                                <h2>Get more responses by uploading upto 10 photos on your profile</h2>

                                                <div class="computer">
                                                        <h4>Upload photos from your computer</h4>
                                <!--                                <input class="profile-class" type="file" name="usrname">-->

                                                        <div class="clearfix"></div>

                                                        <div class="box">
                                                                <form method="post" id="photo_update" enctype="multipart/form-data" action="<?= Yii::app()->baseUrl; ?>/index.php/Profile/MyPhotosUpload" >
                                                                        <input type="file" name="UserPhotos[photo_name]" id="file-4" class="inputfile datas inputfile-3 img_files test"  id="my-file" data-multiple-caption="{count} files selected" multiple />
                                                                        <label for="file-4" class="fileUpload"><span>Browser Photo</span></label>
                                                                </form>
                                                        </div>
                                                </div>
                                                <div class="photo_album">
                                                        <?php
                                                        if (!empty($model)) {
                                                                ?>

                                                                <div class="photo_albums">
                                                                        <div class="row">
                                                                                <?php
                                                                                foreach ($model as $photos) {
                                                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $photos->user_id);
                                                                                        $userPic = explode('.', $photos->photo_name);
                                                                                        ?>

                                                                                        <div class="col-md-4 photo_album_col">
                                                                                                <?php
                                                                                                if ($photos->approval == 1) {
                                                                                                        echo '<img class="img-responsive" src="' . Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $photos->user_id . '/album/' . $userPic[0] . '_116_155.' . $userPic[1] . '" />';
                                                                                                        ?>
                                                                                                        <h2>Album Photo</h2>
                                                                                                        <?php
                                                                                                } else {
                                                                                                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                                                                                        ?>
                                                                                                        <?php if ($user->gender == 1) { ?>
                                                                                                                <img class="photo_approval img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/images/pp.jpg" />
                                                                                                                <h2>Awaiting Approval</h2>

                                                                                                        <?php } else { ?>
                                                                                                                <img class="photo_approval img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/images/w1.jpg" />
                                                                                                                <h2>Awaiting Approval</h2>
                                                                                                        <?php } ?>
                                                                                                <?php } ?>
                                                                                                <span class="delete_photo" style="cursor:pointer" ><img alt="delete" class="delete_photo"  src="<?php echo Yii::app()->baseUrl; ?>/images/delete-trash.jpg" onclick="delete_photo(<?php echo $photos->id; ?>)"/></span>
                                                                                        </div>
                                                                                        <?php
                                                                                }
                                                                                ?>
                                                                        </div>
                                                                </div>



                                                                <?php
                                                        }
                                                        ?>
                                                </div>

                                                <h5>Get more responses by uploading upto 20 photos on your profileGet more responses by uploading upto 20 photos on your profileGet more responses by uploading upto 20 photos on your profile</h5>
                                        </div>
                                        <div class="clearfix"></div>
                                        <h6>Other ways to upload your photos</h6>
                                        <div class="clearfix"></div>
                                        <div class="divider">
                                                <div class="ways-1">
                                                        <img class="way" src="<?= Yii::app()->baseUrl; ?>/images/at.png">
                                                        <p>Get more responses by uploading upto 20 photos on your profileGet more responses</p>
                                                </div>


                                                <div class="ways-2">
                                                        <img class="way" src="<?= Yii::app()->baseUrl; ?>/images/mail.png">
                                                        <p>Get more responses by uploading upto 20 photos on your profileGet more responses</p>
                                                </div>

                                        </div>

                                        <div class="upload">
                                                <div class="upload-1">
                                                        <h2>Photos you can upload<img class="tick" src="<?= Yii::app()->baseUrl; ?>/images/tick.png"></h2>
                                                        <ul class="list-unstyled list-inline">
                                                                <li><img src="<?= Yii::app()->baseUrl; ?>/images/z1.jpg">
                                                                        <p>Close Up </p>
                                                                </li>
                                                                <li><img src="<?= Yii::app()->baseUrl; ?>/images/z2.jpg">
                                                                        <p>Full View </p>
                                                                </li>
                                                        </ul>
                                                </div>
                                                <div class="upload-2">
                                                        <h2>Photos you cannot upload<img class="tick" src="<?= Yii::app()->baseUrl; ?>/images/cross.png"></h2>
                                                        <ul class="list-unstyled list-inline">
                                                                <li><img src="<?= Yii::app()->baseUrl; ?>/images/z3.jpg">
                                                                        <p>Side Face</p>
                                                                </li>
                                                                <li><img src="<?= Yii::app()->baseUrl; ?>/images/z4.jpg">
                                                                        <p>Blur </p>
                                                                </li>
                                                                <li><img src="<?= Yii::app()->baseUrl; ?>/images/z3.jpg">
                                                                        <p>Watermark </p>
                                                                </li>
                                                                <li><img src="<?= Yii::app()->baseUrl; ?>/images/z5.jpg">
                                                                        <p> Group</p>
                                                                </li>
                                                        </ul>
                                                </div>
                                        </div>

                                </div>


                        </div>
                </div>
                <div class="start">

                </div>

        </div>
</section>


<script>(function (e, t, n) {
                var r = e.querySelectorAll("html")[0];
                r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2");
        })(document, window, 0);

</script>
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
<script>
        function delete_photo(id) {
                var r = confirm("Are you sure wish to delete your photo ??");
                if (r == true) {
                        $.ajax({
                                type: "POST",
                                url: baseurl + 'Profile/DeleteItem',
                                data: ({id: id}),
                                success: function (data)
                                {
                                        window.location.replace("<?= Yii::app()->baseUrl; ?>/index.php/Profile/MyPhotos");
                                }
                        });
                } else {
                        window.location.replace("<?= Yii::app()->baseUrl; ?>/index.php/Profile/MyPhotos");
                }
        }
</script>





<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom-file-input.js"></script>