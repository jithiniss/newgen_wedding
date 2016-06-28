
<style>
        .slick-dots li{
                background-color: transparent;
        }



</style>
<section class="my">
        <div class="container">
                <div class="row">

                        <div class="col-md-3 newgens">
                                <h3>Newgen</h3>
                                <ul class="list-unstyled">
                                        <li><a href="#">My Contact Details</a></li>
                                        <li><?php echo CHtml::link('My Profile', array('Profile/MyProfile')); ?></li>
                                        <li class="active"><?php echo CHtml::link('My Photos', array('Profile/MyPhotos')); ?></li>
                                        <li><a href="#">My Partner Preferences</a></li>
                                </ul>
                        </div>
                        <div class="col-md-9 details">
                                <h1>My Photos</h1>

                                <ul id="myTabs" class="nav nav-tabs nav-justified adv">
                                        <li class="sims active"><a href="my-photo.php">Photo Album</a></li>
                                        <li class="sims"><a href="settings.php">Settings</a> </li>

                                </ul>



                                <div class="outs-2">


                                        <div class="med">
                                                <h2>Get more responses by uploading upto 20 photos on your profile</h2>

                                                <div class="computer">
                                                        <h4>Upload photos from your computer</h4>
                                <!--                                <input class="profile-class" type="file" name="usrname">-->

                                                        <div class="clearfix"></div>

                                                        <div class="box">
                                                                <form action="<?= Yii::app()->baseUrl; ?>/index.php/Profile/MyPhotos" name="" method="post" enctype="multipart/form-data" >
                                                                        <input type="file" name="fileToUpload[]" id="file-4" class="inputfile datas inputfile-3" data-multiple-caption="{count} files selected" multiple />
                                                                        <label for="file-4"><span>Browser Photo</span></label>
                                                                </form>
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






                                <!--
                                                <div id="myTabContent" class="tab-content outs-2">
                                                    <div class="tab-pane fade active in" id="service-1">


                                                        <div class="med">
                                                            <h2>Get more responses by uploading upto 20 photos on your profile</h2>

                                                            <div class="computer">
                                                                <h4>Upload photos from your computer</h4>
                                                                <input class="profile-class" type="file" name="usrname">

                                                                <div class="clearfix"></div>

                                                                <div class="box">
                                                                    <input type="file" name="file-4[]" id="file-4" class="inputfile datas inputfile-3" data-multiple-caption="{count} files selected" multiple />
                                                                    <label for="file-4"><span>Browser Photo</span></label>
                                                                </div>







                                                            </div>

                                                            <h5>Get more responses by uploading upto 20 photos on your profileGet more responses by uploading upto 20 photos on your profileGet more responses by uploading upto 20 photos on your profile</h5>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <h6>Other ways to upload your photos</h6>
                                                        <div class="clearfix"></div>
                                                        <div class="divider">
                                                            <div class="ways-1">
                                                                <img class="way" src="images/at.png">
                                                                <p>Get more responses by uploading upto 20 photos on your profileGet more responses</p>
                                                            </div>


                                                            <div class="ways-2">
                                                                <img class="way" src="images/mail.png">
                                                                <p>Get more responses by uploading upto 20 photos on your profileGet more responses</p>
                                                            </div>

                                                        </div>

                                                        <div class="upload">
                                                            <div class="upload-1">
                                                                <h2>Photos you can upload<img class="tick" src="images/tick.png"></h2>
                                                                <ul class="list-unstyled list-inline">
                                                                    <li><img src="images/z1.jpg">
                                                                        <p>Close Up </p>
                                                                    </li>
                                                                    <li><img src="images/z2.jpg">
                                                                        <p>Full View </p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="upload-2">
                                                                <h2>Photos you cannot upload<img class="tick" src="images/cross.png"></h2>
                                                                <ul class="list-unstyled list-inline">
                                                                    <li><img src="images/z3.jpg">
                                                                        <p>Side Face</p>
                                                                    </li>
                                                                    <li><img src="images/z4.jpg">
                                                                        <p>Blur </p>
                                                                    </li>
                                                                    <li><img src="images/z3.jpg">
                                                                        <p>Watermark </p>
                                                                    </li>
                                                                    <li><img src="images/z5.jpg">
                                                                        <p> Group</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>



                                                    </div>


                                                    <div class="tab-pane fade" id="service-2">
                                                        <div class="computer">
                                                            <h4>Upload photos from your computer</h4>
                                                            <input class="profile-class" type="file" name="usrname">










                                                        </div>

                                                    </div>

                                                </div>
                                -->

                        </div>
                </div>

        </div>
</section>


<script>(function (e, t, n) {
                var r = e.querySelectorAll("html")[0];
                r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
        })(document, window, 0);</script>






<script src="js/custom-file-input.js"></script>