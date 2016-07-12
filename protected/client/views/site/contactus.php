<section class="banner">
        <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/static_pages/2/banner.jpg' ?>">
</section>


<section class="contactz-ui">
        <div class="container">
                <div class="row">
                        <?php if ($banner->title) { ?><h1><?php echo $banner->title ?><span class="us"><?php echo $banner->heading; ?></span></h1><?php } ?>
                        <div class="col-md-6">



                                <form name="enquiry" method="POST" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/enquiry">


                                        <div class="zeros">





                                                <div class="common">
                                                        <div class="col-sm-6 col-xs-6 mob-file zeros">
                                                                <div class="form-group">

                                                                        <input type="text" class="ui_source" id="email" required placeholder="Name" name="name">
                                                                </div>
                                                        </div>

                                                        <div class="col-sm-6 col-xs-6 mob-file zeros">
                                                                <div class="form-group">

                                                                        <input type="text" class="ui_source" id="email" required placeholder="Email address" name="email">
                                                                </div>
                                                        </div>

                                                </div>

                                                <div class="common">
                                                        <div class="col-sm-6 col-xs-6 mob-file zeros">
                                                                <div class="form-group">

                                                                        <input type="text" class="ui_source" id="email" required placeholder="Contact Number" name="phones">
                                                                </div>
                                                        </div>

                                                        <div class="col-sm-6 col-xs-6 mob-file zeros">
                                                                <div class="form-group">

                                                                        <input type="text" class="ui_source" id="email" required placeholder="Subject" name="subject">
                                                                </div>
                                                        </div>

                                                </div>

                                                <div class="common">
                                                        <div class="col-sm-12 col-xs-12 zeros">
                                                                <div class="form-group">
                                                                        <textarea class="form-control-ui" rows="5" required id="comments" placeholder="Message" name="coment"></textarea>
                                                                </div>

                                                        </div>



                                                </div>




                                                <div class="common tops">


                                                        <div class="col-sm-3 col-xs-3 zeros pull-right">

                                                                <input type="Submit" class="btn sub-con btn-default" name="Enquiry" value="Submit">
                                                        </div>
                                                </div>

                                        </div>

                                </form>

                        </div>



                        <div class="col-md-6">

                                <div class="win">
                                        <div class="add-left">
                                                <img class="makes" src="<?php echo Yii::app()->request->baseUrl; ?>/images/map.png">
                                        </div>
                                        <div class="add-right">
                                                <?php echo $banner->small_content; ?>
                                        </div>


                                        <div class="add-left">
                                                <img class="makes" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ph.png">
                                        </div>
                                        <div class="add-right">
                                                <?php echo $banner->big_content; ?>

                                        </div>

                                </div>

                        </div>








                </div>
        </div>
</section>