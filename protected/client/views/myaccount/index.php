<style>
        .slick-dots li{
                background-color: transparent;
        }
        .test{
                position: relative;
                cursor: pointer;
                text-align: center;
                overflow: hidden;
                visibility: hidden;
        }
        #my-file { visibility: hidden; }
</style>
<script>
        $(document).ready(function () {
                $('#my-button').on('click', function () {
                        $("#my-file").click();
                        $("#my-file").change(function () {
                                var photo = $("#my-file").val();
                                $("form#photo_update").submit();

                        });
                });

        });
</script>
<section class="mynew">
        <div class="container">


                <div class="row">
                        <div class="col-md-3 mynewgen nest">

                                <div class="messagez">
                                        <form method="post" id="photo_update" enctype="multipart/form-data" action="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/UpdatePhoto" >
                                                <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/user/1000/<?= $user->id; ?>/profile/<?= $user->photo ?>">
                                                <input type="file"  name="fileToUpload" class="test" id="my-file"/>
                                                <ul class="list-unstyled">
                                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Profile/MyPhotos" ><img class="access" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ab1.png">Add Photos</a></li>
                                                        <li> <?php echo CHtml::link('<img class="access" src="' . Yii::app()->request->baseUrl . '/images/ab2.png">My Profile', array('profile/MyProfile')); ?></li>
                                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/settings"><img class="access" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ab3.png">Settings</a></li>
                                                </ul>
                                        </form>
                                </div>
                        </div>

                        <div class="col-md-9 mynewgenz nop strongz">
                                <h4><?php echo $user->first_name; ?> <span class="ng">| <?php echo $user->user_id; ?></span> </h4>




                                <div class="prog-1">
                                        <span class="may">Your Profile Complete  </span>
                                </div>

                                <div class="prog-2">
                                        <div id="ui-progressbar">
                                                <div id="ui-progress" >
                                                </div>
                                                <span class="calculate">70%</span>

                                        </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="badgez">
                                        <h3>Trust Badge</h3>


                                        <div class="trust">
                                                <i class="fa circles fa-check-circle-o"></i>

                                                <img class="k1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/k1.png">
                                        </div>
                                        <div class="trust">
                                                <img class="k1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/k2.png">
                                        </div>
                                        <div class="trust">
                                                <img class="k1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/k3.png">
                                        </div>


                                </div>





                                <div class="stripuser">
                                        <div class="gen">
                                                <div class="rel-1">
                                                        <h2>Your current plan - premium plan </h2>
                                                </div>

                                                <div class="rel-2">
                                                        <h6><a class="edits" href="#">Upgrade<i class="fa cart fa-caret-right"></i></a></h6>
                                                </div>
                                        </div>
                                        <div class="strip-paddingz">
                                                <div class="col-md-6">

                                                        <div class="run">
                                                                <div class="col-sm-5 col-xs-6 zeros">
                                                                        <label for="textinput" class="control-labelz">View Contact Left </label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-labelz">:</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xs-5 zeros">
                                                                        <label for="textinput" class="control-labelz">4  (6/2)</label>
                                                                </div>
                                                        </div>

                                                        <div class="run">
                                                                <div class="col-sm-5 col-xs-6 zeros">
                                                                        <label for="textinput" class="control-labelz">Number of Days Left</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-labelz">:</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xs-5 zeros">
                                                                        <label for="textinput" class="control-labelz">30  (30/10) </label>
                                                                </div>
                                                        </div>

                                                        <div class="run">
                                                                <div class="col-sm-5 col-xs-6 zeros">
                                                                        <label for="textinput" class="control-labelz">Send	Message </label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-labelz">:</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xs-5 zeros">
                                                                        <label for="textinput" class="control-labelz">Yes</label>
                                                                </div>
                                                        </div>

                                                        <div class="run">
                                                                <div class="col-sm-5 col-xs-6 zeros">
                                                                        <label for="textinput" class="control-labelz">Search</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-labelz">:</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xs-5 zeros">
                                                                        <label for="textinput" class="control-labelz">No</label>
                                                                </div>
                                                        </div>



                                                </div>

                                                <div class="col-md-6">

                                                        <div class="run">
                                                                <div class="col-sm-5 col-xs-6 zeros">
                                                                        <label for="textinput" class="control-labelz">SMS Alert </label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-labelz">:</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xs-5 zeros">
                                                                        <label for="textinput" class="control-labelz">Yes</label>
                                                                </div>
                                                        </div>
                                                        <div class="run">
                                                                <div class="col-sm-5 col-xs-6 zeros">
                                                                        <label for="textinput" class="control-labelz">Email alert </label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-labelz">:</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xs-5 zeros">
                                                                        <label for="textinput" class="control-labelz">No</label>
                                                                </div>
                                                        </div>
                                                        <div class="run">
                                                                <div class="col-sm-5 col-xs-6 zeros">
                                                                        <label for="textinput" class="control-labelz">Featured Profile</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-labelz">:</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xs-5 zeros">
                                                                        <label for="textinput" class="control-labelz">No</label>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>

                                </div>

                        </div>
                </div>



                <div class="row">

                        <div class="col-md-3 newgens short">
                                <h3>Inbox</h3>
                                <ul class="list-unstyled">
                                        <li><?php echo CHtml::link('Message', array('Myaccount/Message')); ?></li>
                                        <li><?php echo CHtml::link('Invitations', array('Myaccount/Invitations')); ?></li>
                                        <li><?php echo CHtml::link('Photo Requests', array('Myaccount/PhotoRequests')); ?></li>

                                </ul>
                                <h3>Accepted</h3>
                                <h3>Sent</h3>
                                <ul class="list-unstyled">
                                        <li><?php echo CHtml::link('Message', array('Myaccount/Message')); ?></li>
                                        <li><?php echo CHtml::link('Invitations', array('Myaccount/SentInvitations')); ?></li>
                                </ul>
                                <h3>Quick Links</h3>
                                <ul class="list-unstyled">
                                        <li><a href="#">Shortlists & more</a></li>
                                        <li><a href="#">My Matches</a></li>
                                        <li><a href="#">Looking for Me</a></li>
                                        <li><a href="#">2-way Matches</a></li>
                                        <li><a href="#">Profile Visitors</a></li>
                                        <li><a href="#">Profile Visited</a></li>
                                        <li><a href="#">Saved Searches</a></li>
                                </ul>

                        </div>
                        <div class="col-md-9 mynewgenz actions">


                                <form action="action_page.php">
                                        <div class="zeros">
                                                <!--****-->







                                                <!--****-->
                                                <div class="listen">
                                                        <div class="match">
                                                                <div class="rel-1">
                                                                        <h5>My Matches  ( 30 )</h5>
                                                                </div>

                                                                <div class="rel-2">
                                                                        <h6><a class="viewall" href="#">View all<i class="fa cart fa-caret-right"></i></a></h6>
                                                                </div>
                                                        </div>
                                                        <div class="strip-paddings">


                                                                <div class="common">
                                                                        <div class="col-sm-12 col-xs-12 zeros">


                                                                                <div class="girls">
                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                                <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                                                                <p>Visible on Accept</p>
                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>

                                                                </div>
                                                        </div>

                                                </div>







                                                <!--****-->
                                                <div class="listen">
                                                        <div class="match">
                                                                <div class="rel-1">
                                                                        <h5>Two Way Matches  ( 430 )</h5>
                                                                </div>

                                                                <div class="rel-2">
                                                                        <h6><a class="viewall" href="#">View all<i class="fa cart fa-caret-right"></i></a></h6>
                                                                </div>
                                                        </div>
                                                        <div class="strip-paddings">


                                                                <div class="common">
                                                                        <div class="col-sm-12 col-xs-12 zeros">


                                                                                <div class="girls">

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                                <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                                                                <p>Visible on Accept</p>
                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>

                                                                </div>
                                                        </div>

                                                </div>






                                                <!--****-->
                                                <div class="listen">
                                                        <div class="match">
                                                                <div class="rel-1">
                                                                        <h5>Profile Visitors (26)</h5>
                                                                </div>

                                                                <div class="rel-2">
                                                                        <h6><a class="viewall" href="#">View all<i class="fa cart fa-caret-right"></i></a></h6>
                                                                </div>
                                                        </div>
                                                        <div class="strip-paddings">


                                                                <div class="common">
                                                                        <div class="col-sm-12 col-xs-12 zeros">


                                                                                <div class="girls">

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                                <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                                                                <p>Visible on Accept</p>
                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                                <div class="main">
                                                                                                        <div class="profile">
                                                                                                                <img class="center-block file img-responsive fullz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gg1.jpg">

                                                                                                        </div>
                                                                                                        <h1>Janet</h1>
                                                                                                        <h1>25 yrs,5 Ft 1 in</h1>
                                                                                                        <a class="viewallz" href="#">Full profile</a>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>

                                                                </div>
                                                        </div>

                                                </div>




                                        </div>
                                </form>
                        </div>
                </div>

        </div>
</section>


<script>

        $(document).ready(function () {

                $('.girls').slick({
                        slidesToShow: 4,
                        autoplay: false,
                        autoplaySpeed: 4000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
                        prevArrow: '<i id="prev_slide_3"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/prev.jpg"></i>',
                        nextArrow: '<i id="next_slide_3"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/nex.jpg"></i>',
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 3
                                        }
                                },
                                {
                                        breakpoint: 800,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 2
                                        }
                                },
                                {
                                        breakpoint: 767,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                }
                        ]
                });

        });

</script>