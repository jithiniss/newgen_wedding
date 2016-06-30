
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
                                        <li class="sims"><?php echo CHtml::link('Settings', array('Profile/MySettings')); ?></li>

                                </ul>



                                <div class="outs-2">


                                        <div class="med">
                                                <h2>Get more responses by uploading upto 10 photos on your profile</h2>

                                                <div class="computer">
                                                        <h4>Upload photos from your computer</h4>
                                <!--                                <input class="profile-class" type="file" name="usrname">-->

                                                        <div class="clearfix"></div>

                                                        <div class="box">
                                                                <form method="post" id="multiple_upload_form" enctype="multipart/form-data"  >
                                                                        <input type="file" name="fileToUpload" id="file-4" class="inputfile datas inputfile-3 img_files"  data-multiple-caption="{count} files selected" multiple />
                                                                        <label for="file-4" class="fileUpload"><span>Browser Photo</span></label>
                                                                </form>
                                                                <div class="photo_album">

                                                                </div>
                                                        </div>
                                                        <!--                                                        <div class="photo_album" id="ajax_pics" style="position: relative;cursor: pointer;">
                                                                                                                        <div style="
                                                                                                                             position: absolute;    height: 212px;
                                                                                                                             top: 0px;
                                                                                                                             left: 0px;
                                                                                                                             padding: 81px;display: none;background-color:#d2d2d2;background-image: url(<?= Yii::app()->baseUrl; ?>/images/profile_loader.gif); background-repeat: no-repeat;background-position: center; " id="loading_prof">


                                                                                                                        </div>
                                                        <?php
//                                                                if ($myProfile->photo != "") {
//                                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $myProfile->id);
//                                                                        echo '<img class="img-responsive" src="' . Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $myProfile->id . '/profile/' . $myProfile->photo . '" />';
//
                                                        ?>


                                                        <?php //}
                                                        ?>
                                                                                                                </div>-->
                                                        <div class="photo_album">

                                                        </div>








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
                $(".img_files").change(function () {
                        var fd = new FormData();
                        fd.append("fileToUpload", $(".img_files")[0].files[0]);
                        $.ajax({
                                url: '<?php echo Yii::app()->createUrl("Profile/MyPhotos"); ?>',
                                type: 'POST',
                                data: fd,
                                datatype: 'json',
                                // async: false,
                                beforeSend: function () {
                                        $('#loading_prof').show();
                                },
                                success: function (data) {
                                        // on success do some validation or refresh the content div to display the uploaded images
                                        $("#ajax_pics").html(data);
                                },
                                complete: function () {
                                        // success alerts
                                        $('#loading_prof').hide();
                                        // alert('Image uploaded successfully')
                                },
                                error: function (data) {
                                        alert("There may a error on uploading. Try again later");
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                        });

                        return false;
                });


//                $('.images').on('change', function () {
//                        $('#multiple_upload_form').ajaxForm({
//                                //display the uploaded images
//                                target: '.photo_album',
//                                beforeSubmit: function (e) {
//                                        $('.uploading').show();
//                                },
//                                success: function (e) {
//                                        $('.uploading').hide();
//                                },
//                                error: function (e) {
//                                }
//                        }).submit();
//                });




//                $('.fileUpload').on('click', function () {
//                        $(".img_files").change(function () {
//                                var fileToUpload = $(".img_files").val();
////                                $("form#photo_update").submit();
//                                $.ajax({
//                                        type: "POST",
//                                        cache: 'false',
//                                        async: false,
//                                        url: '<?php echo Yii::app()->createUrl("Profile/MyProfile"); ?>',
//                                        data: {fileToUpload: fileToUpload}
//                                }).done(function (data) {
////                                        var obj = jQuery.parseJSON(data);
////                                        $("#photos_album").html(obj.img);
//                                });
//                        });
//                });

        });

//        $(document).ready(function () {
//                $(".fileUpload").on('click', function () {
//                        $(".img_files").change(function () {
//                                var img_files = $(".img_files").val();
//                                $.ajax({
//                                        type: "POST",
//                                        cache: 'false',
//                                        async: false,
//                                        url: baseurl + 'Profile/MyPhotos',
//                                        data: {img_files: img_files}
//                                }).done(function (data) {
//                                        var obj = jQuery.parseJSON(data);
//                                        $("#photos_album").html(obj.img);
//                                });
//                        });
//                });
//
//        });

</script>





<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom-file-input.js"></script>